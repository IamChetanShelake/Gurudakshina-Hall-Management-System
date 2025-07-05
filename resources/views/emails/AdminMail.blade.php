<!DOCTYPE html>
<html>
<head>
    <title>New Hall Enquiry</title>
</head>
<body>
    <h3>New Hall Enquiry Received</h3>
    <p><strong>Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Email:</strong> {{ $enquiry->email }}</p>
    <p><strong>Contact:</strong> {{ $enquiry->contact_no }}</p>
    <p><strong>Event Type:</strong> {{ $enquiry->event_type }}</p>
    <p><strong>Event Date:</strong> {{ $enquiry->event_date }}</p>
    <p><strong>Hall Name:</strong> {{ $enquiry->hall }}</p>
    <p><strong>Expected Audience:</strong> {{ $enquiry->expected_audience }}</p>
    <p>Please review the enquiry and follow up accordingly.</p>
</body>
</html>
