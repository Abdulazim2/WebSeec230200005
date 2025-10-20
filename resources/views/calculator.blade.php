@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>🧮 Simple Calculator</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">First Number</label>
                        <input type="number" id="num1" class="form-control" placeholder="Enter first number">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Second Number</label>
                        <input type="number" id="num2" class="form-control" placeholder="Enter second number">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Operation</label>
                        <select id="operation" class="form-select">
                            <option value="+">Addition (+)</option>
                            <option value="-">Subtraction (-)</option>
                            <option value="*">Multiplication (×)</option>
                            <option value="/">Division (÷)</option>
                        </select>
                    </div>

                    <button class="btn btn-success w-100" onclick="calculate()">Calculate</button>

                    <div class="alert alert-info text-center mt-3 d-none" id="resultBox">
                        <strong>Result:</strong> <span id="result"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculate() {
    const num1 = parseFloat(document.getElementById('num1').value);
    const num2 = parseFloat(document.getElementById('num2').value);
    const operation = document.getElementById('operation').value;
    const resultBox = document.getElementById('resultBox');
    const resultText = document.getElementById('result');

    if (isNaN(num1) || isNaN(num2)) {
        resultBox.classList.remove('d-none');
        resultText.innerText = "Please enter both numbers!";
        resultBox.classList.replace('alert-info', 'alert-danger');
        return;
    }

    let result = 0;
    switch (operation) {
        case '+': result = num1 + num2; break;
        case '-': result = num1 - num2; break;
        case '*': result = num1 * num2; break;
        case '/':
            if (num2 === 0) {
                resultBox.classList.remove('d-none');
                resultText.innerText = "Cannot divide by zero!";
                resultBox.classList.replace('alert-info', 'alert-danger');
                return;
            }
            result = num1 / num2;
            break;
    }

    resultBox.classList.remove('d-none');
    resultBox.classList.replace('alert-danger', 'alert-info');
    resultText.innerText = result;
}
</script>
@endsection
