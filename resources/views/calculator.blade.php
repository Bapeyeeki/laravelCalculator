<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Laravel</title>
</head>
<body>
    <h1>Prosty Kalkulator</h1>

    <form method="POST" action="/calculate">
        @csrf
        <input type="number" name="a" value="{{ old('a', $a ?? '') }}" placeholder="Liczba A" required>
        <input type="number" name="b" value="{{ old('b', $b ?? '') }}" placeholder="Liczba B" required>
        <button type="submit">Dodaj</button>
    </form>

    @if (isset($sum))
        <h2>Wynik: {{ $a }} + {{ $b }} = {{ $sum }}</h2>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>