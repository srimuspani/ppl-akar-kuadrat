<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Square Root</title>
    {{-- tailwind css cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.6/tailwind.min.css">
</head>

<body>
    {{-- square root calculator --}}
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md">
            <form id="square-form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="number">
                        Number
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="number" name="number" type="number" placeholder="Enter a number">
                </div>
                <div class="flex items-center justify-between">
                    <button id="calculate-btn"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Calculate API
                    </button>
                    <button id="calculate-btn-sql"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Calculate PL/SQL
                    </button>
                </div>
            </form>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="result">
                        Result
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="result" name="result" type="text" value="" readonly>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#square-form').submit(function(e) {
                e.preventDefault();
            });
            
            $('#calculate-btn').click(function() {
                var number = $('#number').val();
                $.ajax({
                    url: '/api/square/' + number,
                    type: 'GET',
                    success: function(result) {
                        $('#result').val(result.square_root);
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error);
                    }
                });
            });

            $('#calculate-btn-sql').click(function() {
                var number = $('#number').val();
                $.ajax({
                    url: '/api/sql/square/' + number,
                    type: 'GET',
                    success: function(result) {
                        $('#result').val(result.square_root);
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error);
                    }
                });
            });
        });
    </script>
</body>

</html>
