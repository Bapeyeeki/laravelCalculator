<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide,power,sqrt',
        ]);
    
        $a = $validated['a'];
        $b = $validated['b'];
        $operation = $validated['operation'];
        $result = null;
        $symbol = '';
    
        switch ($operation) {
            case 'add':
                $result = $a + $b;
                $symbol = '+';
                break;
            case 'subtract':
                $result = $a - $b;
                $symbol = '-';
                break;
            case 'multiply':
                $result = $a * $b;
                $symbol = '*';
                break;
            case 'divide':
                if ($b == 0) {
                    return back()->withErrors(['b' => 'Nie można dzielić przez zero.'])->withInput();
                }
                $result = $a / $b;
                $symbol = '/';
                break;
            case 'power':
                $result = pow($a, $b);
                $symbol = '^';
                break;
            case 'sqrt':
                if ($a < 0) {
                    return back()->withErrors(['a' => 'Nie można pierwiastkować liczby ujemnej.'])->withInput();
                }
                $result = pow($a, 1/$b);
                $symbol = '√';
                break;
        }
    
        return redirect()->route('index')->with(compact('a', 'b', 'operation', 'result', 'symbol'));
    }
}