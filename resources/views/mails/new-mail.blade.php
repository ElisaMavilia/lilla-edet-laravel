<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliveBoo</title>
</head>
<body>
    
<h1> Hello Admin!</h1>
<p> 
    You got a new message <br>
    <strong>Name:</strong><span>{{ $lead->name }}</span><br>
    <strong>Message:</strong><span>{{ $lead->message }}</span>
</p>
</body>
</html>
