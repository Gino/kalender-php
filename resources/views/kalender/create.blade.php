<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voeg een user toe</title>
</head>
<body>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="create" method="POST">
        {{ csrf_field() }}
        <input type="text" name="name" placeholder="Naam">
        <input type="date" name="date" value="2000-01-01">

        <button type="submit">Voeg toe</button>
    </form>
</body>
</html>
