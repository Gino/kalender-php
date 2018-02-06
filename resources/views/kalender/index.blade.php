<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalender</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
    @foreach ($birthdays as $birthday)
        @if ($lastMonth != $birthday->monthNumber())
            @php
                $lastMonth = $birthday->monthNumber();
            @endphp
            <h1>{{ $birthday->month() }}</h1>
                @php
                    $lastDay = 0;
                @endphp
        @endif

        @if ($lastDay < $birthday->day)
            <h2>{{ $birthday->day }}</h2>
            @php
                $lastDay = $birthday->day;
            @endphp
        @endif

        <p>
            <a href="kalender/edit/{{ $birthday->id }}">
                {{ $birthday->person }} ({{ $birthday->year }})
            </a>
            <a href="kalender/delete/{{ $birthday->id }}">x</a>
        </p>
    @endforeach

    <p><a href="{{ url(route('kalender.create'))}}">+ Toevoegen</a></p>
</body>
</html>
