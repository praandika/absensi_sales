<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}" type="image/png">
    <title>Original Document</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <style>
        body{
            background-color: #121418;
        }

        .kotak{
            margin-top: 100px;
        }

        .text-gradient{
            background: #f6ce6f; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #f6ce6f, #c17917); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #f6ce6f, #c17917); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto kotak">
                <div class="text-center">
                    <img src="{{ asset('img/original.png') }}" alt="Original Document!" width="300px">
                    <h4 class="text-gradient">Original Document</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>