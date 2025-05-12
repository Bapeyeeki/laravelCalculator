<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator JS</title>
</head>
<body>
    <h1>Prosty kalkulator (działa w przeglądarce)</h1>

    <input type="number" id="a" placeholder="Liczba A">
    <select id="operation">
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="number" id="b" placeholder="Liczba B">
    <button onclick="calculate()">Oblicz</button>

    <h2 id="result"></h2>

    <script>
        function calculate() {
            const a = parseFloat(document.getElementById('a').value);
            const b = parseFloat(document.getElementById('b').value);
            const op = document.getElementById('operation').value;
            let result;

            if (isNaN(a) || isNaN(b)) {
                result = 'Podaj poprawne liczby';
            } else {
                switch (op) {
                    case 'add':
                        result = a + b;
                        break;
                    case 'subtract':
                        result = a - b;
                        break;
                    case 'multiply':
                        result = a * b;
                        break;
                    case 'divide':
                        result = b === 0 ? 'Nie można dzielić przez zero' : a / b;
                        break;
                }
            }

            document.getElementById('result').innerText = `Wynik: ${result}`;
        }
    </script>
</body>
</html>