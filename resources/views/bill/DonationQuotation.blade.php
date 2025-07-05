<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Quotation</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; margin: 0; padding: 0; }
        .container { width: 90%; margin: auto; padding: 20px; border: 1px solid #ddd; text-align: center; }
        h2, h3 { margin: 10px 0; }
        p { margin: 5px 0; text-align: left; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
        .footer { margin-top: 20px; font-weight: bold; }
        @media print {
            .container { width: 100%; padding: 10px; border: none; }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>G. E. Society's Gurudakshina Project</h2>
    <h3>Quotation</h3>
    <p><strong>Donor Name:</strong> {{ $donation->donar_name }}</p>
    <p><strong>Payment Date:</strong> {{ date('d-m-Y') }}</p>

    <h3>Payment Details</h3>
    <table>
        <tr>
            <th>Particulars</th>
            <th>Amount (Rs.)</th>
        </tr>
        <tr>
            <td>Donation Amount</td>
            <td>{{ number_format($donation->amount, 2) }}</td>
        </tr>
        <tr>
            <td>Payment Method</td>
            <td>{{ ucfirst($donation->payment_method) }}</td>
        </tr>
        @if($donation->payment_method == 'check')
            <tr>
                <td>Check Number</td>
                <td>{{ $donation->check_number }}</td>
            </tr>
            <tr>
                <td>Bank Name</td>
                <td>{{ $donation->bank_name }}</td>
            </tr>
        @elseif($donation->payment_method == 'upi')
            <tr>
                <td>UPI ID</td>
                <td>{{ $donation->upi_id }}</td>
            </tr>
        @elseif($donation->payment_method == 'bank_transfer')
            <tr>
                <td>Bank Name</td>
                <td>{{ $donation->bank_name }}</td>
            </tr>
            <tr>
                <td>Transaction ID</td>
                <td>{{ $donation->transaction_id }}</td>
            </tr>
        @endif
    </table>

    <h3>Message:</h3>
    <p>{{ $donation->message ?? 'No message provided' }}</p>

    <p class="footer">Thank you for your support!</p>
</div>

</body>
</html>
