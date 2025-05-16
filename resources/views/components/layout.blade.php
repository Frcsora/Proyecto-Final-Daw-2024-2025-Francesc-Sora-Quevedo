@props(['image', 'imageFondo', 'socialmedias'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}">    <style>
        body::before{
            background: url({{$imageFondo}}) center/cover;
        }
    </style>
</head>
<body class="text-3xl w-screen overflow-x-hidden min-h-screen h-auto flex flex-col justify-between items-center gap-3 font-arial relative before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-full before:opacity-70 before:z-[-1]">
@include("partials.header")
{{$slot}}
@include("partials.footer")
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="{{asset('index.js')}}"></script>
</body>
</html>
