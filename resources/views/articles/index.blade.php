<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @dd($articles) --}}
    @foreach ($articles as $article)
    <ul>
        <li>{{ $article['id'] }}</li>
        <li>{{ $article['name'] }}</li>
    </ul>

    @endforeach
    <h1>Article One</h1>
    <h3>Article Two</h3>
</body>
</html>
