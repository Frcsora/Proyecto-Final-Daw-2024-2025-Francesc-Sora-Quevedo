@props(['image', 'imageFondo', 'socialmedias'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body::before{
            background: url({{$imageFondo}}) center/cover;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            min-height: 100%;
            opacity: 0.5;
            z-index: -2;
        }
    </style>
</head>
<body>

@include("partials.header", ['image' => $image])
{{$slot}}
@include("partials.footer")
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="{{asset('index.js')}}"></script>
</body>
</html>
