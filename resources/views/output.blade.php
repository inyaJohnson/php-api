<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<div>

    {{--{{dd($data)}}--}}

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>
<div>
    @foreach($data as $item)
        <pre>
            {{$item}}
            {{--{{print_r($item)}}--}}
        </pre>
    @endforeach
</div>
</body>
</html>
