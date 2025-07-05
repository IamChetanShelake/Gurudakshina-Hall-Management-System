<!DOCTYPE html>
<html>
<head>
    <title>Hall Enquiry Confirmation</title>
</head>
<body>
    <h3>Dear {{ $enquiry->name }},</h3>
    <p>Thank you for your enquiry. Below are your details:</p>
    <ul>
        <li><strong>Event Type:</strong> {{ $enquiry->event_type }}</li>
        <li><strong>Event Date:</strong> {{ $enquiry->event_date }}</li>
        <li><strong>Hall Name:</strong> {{ $enquiry->hall}}</li>
        <li><strong>Duration:</strong> {{ ucfirst(str_replace('_', ' ', $enquiry->duration)) }}</li>
        <li><strong>Expected Audience:</strong> {{ $enquiry->expected_audience }}</li>
    </ul>
    <p>We will get back to you soon!</p>
    <p>Best Regards,<br>Team</p>
</body>
</html>
