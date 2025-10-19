<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container">
        <h1 class="text-center mb-4">Mini Test - Invoice</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price (EGP)</th>
                    <th>Total (EGP)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill as $row)
                    <tr>
                        <td>{{ $row['item'] }}</td>
                        <td>{{ $row['qty'] }}</td>
                        <td>{{ $row['price'] }}</td>
                        <td>{{ $row['qty'] * $row['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end mt-3">
            Total =
            <span class="text-success fw-bold">
                {{ array_sum(array_map(fn($x) => $x['qty'] * $x['price'], $bill)) }}
            </span> EGP
        </h4>
    </div>
</body>
</html>
