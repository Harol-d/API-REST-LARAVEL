    @foreach ($inventarios as $item)
        <p>{{ $item->name }}</p>
    @endforeach
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vista de ejemplo</h1>
    <p>Este es un ejemplo de una vista en Laravel.</p>    
    @foreach ($inventarios as $item)        
        <p>{{ $item->name }}</p>php
        <p>{{ $item->description }}</p>
    @endforeach



</body>
</html>
