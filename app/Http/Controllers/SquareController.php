<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SquareController extends Controller
{
    function square($number) {
        // square root using algorithm
        if ($number < 0) {
            // status code 400 means bad request
            return response()->json([
                'error' => 'Invalid number'
            ], 400);
        }
    
        // Initialize the initial guess and the precision
        $guess = $number / 2;
        $precision = 0.00001;
    
        while (abs(($guess * $guess) - $number) > $precision) {
            $guess = ($guess + ($number / $guess)) / 2;
        }
    
        return response()->json([
            'number' => $number,
            'square_root' => $guess
        ]);
    }

    // call square procedure from database
    function square_db($number) {
        // square root using algorithm
        if ($number < 0) {
            // status code 400 means bad request
            return response()->json([
                'error' => 'Invalid number'
            ], 400);
        }
        $result = 0;
    
        $result = DB::statement('CALL square_root(?, @result)', array($number));
        $result = DB::select('SELECT @result as result')[0]->result;

        return response()->json([
            'number' => $number,
            'square_root' => $result
        ]);
    }
}
