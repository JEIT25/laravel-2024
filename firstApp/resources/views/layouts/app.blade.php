<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
    <style>
        .error-mess {
            color: red;
            font-size: 0.8rem;
        }
    </style>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    {{-- yield() directive specifies name to the content will be rendered forth
        and name specfied will be called by the section() directive
      --}}
    <div>
        <h1 class="text-2xl font-bold mb-4">@yield('title')</h1>
        <div>@yield('content')</div>
    </div>
</body>

</html>
