<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        .error-mess {
            color: red;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    {{-- yield() directive specifies name to the content will be rendered forth
        and name specfied will be called by the section() directive
      --}}
    <div>
        <h1>@yield('title')</h1>
        <div>@yield('content')</div>
    </div>
</body>

</html>
