{{-- <!DOCTYPE html>
<html>
<head>
    <title>Quotation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">G. E. Society's Gurudakshina Project</h2>

    <p>Event Venue: {{ $enquiry->hall }}</p>
    <p>Date of Event: {{ $enquiry->event_date }}</p>
    <p>Type of Event: {{ $enquiry->event_type }}</p>

    <table>
        <tr>
            <th>Sr. No</th>
            <th>Particulars</th>
            <th>Amount (Rs.)</th>
        </tr>
        <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }}</td>
            <td>{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>

        @foreach($enquiry->accessories as $key => $accessory)
            @if($accessory->price)
                <tr>
                    <td>{{ $key + 2 }}</td>
                    <td>{{ $accessory->name }}</td>
                    <td>{{ number_format($accessory->price * $accessory->quantity * ($accessory->hours ?? 1), 2) }}</td>
                </tr>
            @endif
        @endforeach

        <tr>
            <td colspan="2"><strong>Accessories Amount</strong></td>
            <td>{{ number_format($totalAmount, 2) }}</td>
        </tr>





        <tr>
            <td colspan="2"><strong>GST @ 18%</strong></td>
            <td>{{ number_format($gst, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Final Amount</strong></td>
            <td><strong>{{ number_format($finalAmount, 2) }}</strong></td>
        </tr>
    </table>

</body>
</html> --}}
{{-- <!DOCTYPE html>
<html>
<head>
    <title>Quotation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">G. E. Society's Gurudakshina Project</h2>

    <p><strong>Event Venue:</strong> {{ $enquiry->hall }}</p>
    <p><strong>Date of Event:</strong> {{ $enquiry->event_date }}</p>
    <p><strong>Type of Event:</strong> {{ $enquiry->event_type }}</p>

    <table>
        <tr>
            <th>Sr. No</th>
            <th>Particulars</th>
            <th>Amount (Rs.)</th>
        </tr>

        <!-- Hall Rent -->
        <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }} (Hall Rent)</td>
            <td>{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>

        <!-- Accessories -->
        @php $srNo = 2; @endphp
        @foreach($accessories as $accessory)
            @if($accessory->price)
                <tr>
                    <td>{{ $srNo++ }}</td>
                    <td>{{ $accessory->name }}</td>
                    <td>{{ number_format($accessory->price * $accessory->quantity * ($accessory->hours ?? 1), 2) }}</td>
                </tr>
            @endif
        @endforeach

        <!-- Accessories Total -->
        <tr>
            <td colspan="2"><strong>Total Accessories Price</strong></td>
            <td>{{ number_format($totalAccessoriesPrice, 2) }}</td>
        </tr>

        <!-- Total Amount (Hall Rent + Accessories) -->
        <tr>
            <td colspan="2"><strong>Total Amount (Hall Rent + Accessories)</strong></td>
            <td>{{ number_format($totalAmount, 2) }}</td>
        </tr>

        <!-- GST Calculation -->
        <tr>
            <td colspan="2"><strong>GST @ 18%</strong></td>
            <td>{{ number_format($gst, 2) }}</td>
        </tr>

        <!-- Final Amount -->
        <tr>
            <td colspan="2"><strong>Final Amount</strong></td>
            <td><strong>{{ number_format($finalAmount, 2) }}</strong></td>
        </tr>
    </table>

</body>
</html> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; }
        .container { width: 60%; margin: auto; background: #fff; padding: 20px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); border-radius: 8px; }
        h2, h3 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; text-transform: uppercase; }
        .total-row td { font-weight: bold; background-color: #f2f2f2; }
        .summary { text-align: right; font-weight: bold; padding-top: 10px; }
        .final-amount { color: #d9534f; font-size: 18px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Hall Booking Invoice</h2>

    <p><strong>Customer Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Event Date:</strong> {{ $enquiry->event_date }}</p>
    <p><strong>Event Type:</strong> {{ $enquiry->event_type }}</p>
    <p><strong>Hall Name:</strong> {{ $enquiry->hall ?? 'N/A' }}</p>

    <h3>Accessories</h3>
    <table>
        <tr>
            <th>Accessory Name</th>
            <th>Quantity</th>
            <th>Hours</th>
            <th>Price</th>
        </tr>
        @foreach($accessories as $accessory)
            <tr>
                <td>{{ $accessory->name }}</td>
                <td>{{ $accessory->quantity ?? '-' }}</td>
                <td>{{ $accessory->hours ?? '-' }}</td>
                <td>{{ $accessory->price ? number_format($accessory->price, 2) : 'Free' }}</td>
            </tr>
        @endforeach
    </table>

    <h3>Billing Summary</h3>
    <table>
        <tr>
            <td class="summary">Hall Rent:</td>
            <td>₹{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>
        <tr>
            <td class="summary">Total Accessories Price:</td>
            <td>₹{{ number_format($totalAccessoriesPrice, 2) }}</td>
        </tr>
        <tr>
            <td class="summary">GST (18%):</td>
            <td>₹{{ number_format($gst, 2) }}</td>
        </tr>
        <tr class="total-row">
            <td class="summary final-amount">Final Amount:</td>
            <td class="final-amount">₹{{ number_format($finalAmount, 2) }}</td>
        </tr>
    </table>
</div>

</body>
</html> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: auto; padding: 20px; border: 1px solid #ddd; }
        h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>G. E. Society's Gurudakshina Project</h2>
    <p><strong>Customer Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Event Venue:</strong> Gurudakshina Auditorium & Parking Space</p>
    <p><strong>Event Date:</strong> {{ $enquiry->event_date }}</p>
    <p><strong>Schedule of Event:</strong> {{ $enquiry->event_type }}</p>
    <p><strong>Hall Name:</strong> {{ $enquiry->hall ?? 'N/A' }}</p>

    <h3>Quotation</h3>

    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Particulars</th>
            <th>Amount (Rs.)</th>
        </tr>

        <!-- Refundable Deposits -->
        <tr>
            <td>1</td>
            <td>{{$enquiry->hall}} (Refundable Deposit)</td>
            <td>{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Parking Space</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Deposit</strong></td>
            <td><strong>{{ number_format($enquiry->rent_amount, 2) }}</strong></td>
        </tr>

        <!-- Charges Section -->
        <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }}</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Parking Space</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Charges</strong></td>
            <td><strong>0.00</strong></td>
        </tr>

        <!-- GST -->
        <tr>
            <td colspan="2" class="total">CGST @ 9%</td>
            <td>{{ number_format($gst / 2, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2" class="total">SGST @ 9%</td>
            <td>{{ number_format($gst / 2, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Charges (Including GST)</strong></td>
            <td><strong>{{ number_format($finalAmount, 2) }}</strong></td>
        </tr>

        <tr>
            <td colspan="2" class="total"><strong>Total Amt. (Including Deposit & GST)</strong></td>
            <td><strong>{{ number_format($finalAmount ,2) }}</strong></td>
        </tr>
    </table>

    <!-- Amount in Words -->


    <!-- Notes -->
    <h3>Notes:</h3>
    <ul>
        <li>1) Eatables are not allowed in the hall other than allotted space.</li>
        <li>2) Parking at Owners' Risk.</li>
        <li>3) Signing rules and regulations of respective halls.</li>
        <li>4) All rights are reserved with the Management.</li>
        <li>5) Every amount other than Deposit will be charged with GST.</li>
        <li>6) Full amount must be paid 7 Days before the event.</li>
    </ul>

    <!-- Bank Details -->
    <h3>Bank Details for Booking</h3>
    <table>
        <tr><td><strong>Bank A/c Name:</strong></td> <td>Gokhale Education Society’s Gurudakshina Project A/c</td></tr>
        <tr><td><strong>Bank:</strong></td> <td>Bank of Maharashtra</td></tr>
        <tr><td><strong>Branch:</strong></td> <td>College Campus, Nashik - 5</td></tr>
        <tr><td><strong>A/c No.:</strong></td> <td>6045177965</td></tr>
        <tr><td><strong>IFSC:</strong></td> <td>MAHB0000214</td></tr>
    </table>

    <!-- Service Contact Details -->
    <h3>Gurudakshina Auditorium – Services Contact No.</h3>
    <table>
        <tr>
            <th>Role</th>
            <th>Name</th>
            <th>Contact</th>
        </tr>
        <tr><td>Event Manager</td><td>Ketan Ahire</td><td>79722 41909</td></tr>
        <tr><td>Event Manager (Optional)</td><td>Ajay Gangurde</td><td>74208 21466</td></tr>
        <tr><td>Catering Service</td><td>Deepak Rai (Curry Leaves)</td><td>77220 15994</td></tr>
        <tr><td>Catering Service</td><td>Mr. Rao</td><td>77740 62994</td></tr>
        <tr><td>Light & Sound Assistant</td><td>Harish Pardeshi</td><td>98602 34696</td></tr>
    </table>

</div>

</body>
</html> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: auto; padding: 20px; border: 1px solid #ddd; }
        h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>G. E. Society's Gurudakshina Project</h2>
    <p><strong>Customer Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Event Venue:</strong> Gurudakshina Auditorium & Parking Space</p>
    <p><strong>Event Date:</strong> {{ $enquiry->event_date }}</p>
    <p><strong>Schedule of Event:</strong> {{ $enquiry->event_type }}</p>
    <p><strong>Hall Name:</strong> {{ $enquiry->hall ?? 'N/A' }}</p>

    <h3>Quotation</h3>

    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Particulars</th>
            <th>Amount (Rs.)</th>
        </tr>

        <!-- Refundable Deposits -->
        <tr>
            <td>1</td>
            <td>{{$enquiry->hall}} (Refundable Deposit)</td>
            <td>{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Parking Space</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Deposit</strong></td>
            <td><strong>{{ number_format($enquiry->rent_amount, 2) }}</strong></td>
        </tr>

        <!-- Charges Section -->
        <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }}</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Parking Space</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Charges</strong></td>
            <td><strong>0.00</strong></td>
        </tr>


        <!-- Charges Section (Hall Rent + Accessories) -->
        <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }} (Hall Rent)</td>
            <td>{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>

        @php $srNo = 2; @endphp
        @foreach ($accessories as $accessory)
        <tr>
            <td>{{ $srNo++ }}</td>
            <td>{{ $accessory->name }}</td>
            <td>{{ number_format($accessory->price, 2) }}</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="2" class="total"><strong>Total Charges (Hall + Accessories)</strong></td>
            <td><strong>{{ number_format($totalAmount, 2) }}</strong></td>
        </tr>

        <!-- GST -->
        <tr>
            <td colspan="2" class="total">CGST @ 9%</td>
            <td>{{ number_format($gst / 2, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2" class="total">SGST @ 9%</td>
            <td>{{ number_format($gst / 2, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Charges (Including GST)</strong></td>
            <td><strong>{{ number_format($finalAmount, 2) }}</strong></td>
        </tr>

    </table>

    <!-- Amount in Words -->


    <!-- Notes -->
    <h3>Notes:</h3>
    <ul>
        <li>1) Eatables are not allowed in the hall other than allotted space.</li>
        <li>2) Parking at Owners' Risk.</li>
        <li>3) Signing rules and regulations of respective halls.</li>
        <li>4) All rights are reserved with the Management.</li>
        <li>5) Every amount other than Deposit will be charged with GST.</li>
        <li>6) Full amount must be paid 7 Days before the event.</li>
    </ul>

    <!-- Bank Details -->
    <h3>Bank Details for Booking</h3>
    <table>
        <tr><td><strong>Bank A/c Name:</strong></td> <td>Gokhale Education Society’s Gurudakshina Project A/c</td></tr>
        <tr><td><strong>Bank:</strong></td> <td>Bank of Maharashtra</td></tr>
        <tr><td><strong>Branch:</strong></td> <td>College Campus, Nashik - 5</td></tr>
        <tr><td><strong>A/c No.:</strong></td> <td>6045177965</td></tr>
        <tr><td><strong>IFSC:</strong></td> <td>MAHB0000214</td></tr>
    </table>

    <!-- Service Contact Details -->
    <h3>Gurudakshina Auditorium – Services Contact No.</h3>
    <table>
        <tr>
            <th>Role</th>
            <th>Name</th>
            <th>Contact</th>
        </tr>
        <tr><td>Event Manager</td><td>Ketan Ahire</td><td>79722 41909</td></tr>
        <tr><td>Event Manager (Optional)</td><td>Ajay Gangurde</td><td>74208 21466</td></tr>
        <tr><td>Catering Service</td><td>Deepak Rai (Curry Leaves)</td><td>77220 15994</td></tr>
        <tr><td>Catering Service</td><td>Mr. Rao</td><td>77740 62994</td></tr>
        <tr><td>Light & Sound Assistant</td><td>Harish Pardeshi</td><td>98602 34696</td></tr>
    </table>

</div>

</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 0; padding: 0; }
        .container { width: 92%; margin: auto; padding: 10px; border: 1px solid #ddd; }
        h2, h3 { text-align: center; margin: 5px 0; font-size: 14px; }
        p { margin: 3px 0; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #ddd; padding: 4px; text-align: left; }
        th { background-color: #f2f2f2; font-size: 12px; }
        .total { text-align: right; font-weight: bold; }
        ul { padding-left: 15px; font-size: 12px; margin: 5px 0; }





        /* Printing adjustments */
        @media print {
            body { margin: 0; padding: 0; }
            .container { width: 100%; padding: 5px; border: none; }
            h2, h3 { font-size: 13px; }
            table, th, td { font-size: 11px; padding: 3px; }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>G. E. Society's Gurudakshina Project</h2>
    <p><strong>Customer Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Event Venue:</strong> Gurudakshina Auditorium & Parking Space</p>
    <p><strong>Event Date:</strong> {{ $enquiry->event_date }}</p>
    <p><strong>Schedule of Event:</strong> {{ $enquiry->event_type }}</p>
    <p><strong>Hall Name:</strong> {{ $enquiry->hall ?? 'N/A' }}</p>



    <h3>Quotation</h3>

    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Particulars</th>
            <th>Amount (Rs.)</th>
        </tr>

        <!-- Refundable Deposits -->
        <tr>
            <td>1</td>
            <td>{{$enquiry->hall}} (Refundable Deposit)</td>
            <td>{{ number_format($enquiry->deposit, 2) }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Parking Space</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Deposit</strong></td>
            <td><strong>{{ number_format($enquiry->deposit, 2) }}</strong></td>
        </tr>

        <!-- Charges Section -->
        {{-- <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }}</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Parking Space</td>
            <td>0.00</td>
        </tr> --}}
        {{-- <tr>
            <td colspan="2" class="total"><strong>Total Charges</strong></td>
            <td><strong>0.00</strong></td>
        </tr> --}}

        <!-- Charges Section (Hall Rent + Accessories) -->
        <tr>
            <td>1</td>
            <td>{{ $enquiry->hall }} (Hall Rent)</td>
            <td>{{ number_format($enquiry->rent_amount, 2) }}</td>
        </tr>

        @php $srNo = 2; @endphp
        @foreach ($accessories as $accessory)
        <tr>
            <td>{{ $srNo++ }}</td>
            <td>{{ $accessory->name }}</td>
            <td>{{ number_format($accessory->price, 2) }}</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="2" class="total"><strong>Total Charges (Hall + Accessories)</strong></td>
            <td><strong>{{ number_format($totalAmount, 2) }}</strong></td>
        </tr>

        <!-- GST -->
        <tr>
            <td colspan="2" class="total">CGST @ 9%</td>
            <td>{{ number_format($gst / 2, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2" class="total">SGST @ 9%</td>
            <td>{{ number_format($gst / 2, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2" class="total"><strong>Total Charges (Including GST)</strong></td>
            <td><strong>{{ number_format($finalAmount, 2) }}</strong></td>
        </tr>

    </table>

    <!-- Notes -->
    <h3>Notes:</h3>
    <ul>
        <li>1) Eatables are not allowed in the hall other than allotted space.</li>
        <li>2) Parking at Owners' Risk.</li>
        <li>3) Signing rules and regulations of respective halls.</li>
        <li>4) All rights are reserved with the Management.</li>
        <li>5) Every amount other than Deposit will be charged with GST.</li>
        <li>6) Full amount must be paid 7 Days before the event.</li>
    </ul>

    <!-- Bank Details -->
    <h3 style="margin-top: 20px">Bank Details for Booking</h3>
    <table>
        <tr><td><strong>Bank A/c Name:</strong></td> <td>Gokhale Education Society’s Gurudakshina Project A/c</td></tr>
        <tr><td><strong>Bank:</strong></td> <td>Bank of Maharashtra</td></tr>
        <tr><td><strong>Branch:</strong></td> <td>College Campus, Nashik - 5</td></tr>
        <tr><td><strong>A/c No.:</strong></td> <td>6045177965</td></tr>
        <tr><td><strong>IFSC:</strong></td> <td>MAHB0000214</td></tr>
    </table>

    <!-- Service Contact Details -->
    <h3 style="margin-top: 20px">Gurudakshina Auditorium – Services Contact No.</h3>
    <table>
        <tr>
            <th>Role</th>
            <th>Name</th>
            <th>Contact</th>
        </tr>
        <tr><td>Event Manager</td><td>Ketan Ahire</td><td>79722 41909</td></tr>
        <tr><td>Event Manager (Optional)</td><td>Ajay Gangurde</td><td>74208 21466</td></tr>
        <tr><td>Catering Service</td><td>Deepak Rai (Curry Leaves)</td><td>77220 15994</td></tr>
        <tr><td>Catering Service</td><td>Mr. Rao</td><td>77740 62994</td></tr>
        <tr><td>Light & Sound Assistant</td><td>Harish Pardeshi</td><td>98602 34696</td></tr>
    </table>

</div>

</body>
</html>







