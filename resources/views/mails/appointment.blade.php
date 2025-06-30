<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h1>Dear {{ $student->fullname }},</h1>
    <p>We are pleased to confirm your appointment scheduled for <strong>{{ $schedule_date }}</strong>.</p>
    <p>Please make sure to be available at the appointed time. If you need to reschedule or have any questions, feel free to contact us.</p>
    <p>Thank you for your attention.</p>
    <br>
    <p>Sincerely,</p>
    <p><strong>Ry</strong></p>
</body>
</html>
