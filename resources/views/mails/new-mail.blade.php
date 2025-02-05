<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration: </title>
</head>
<body>
    
<h1> Hej Lilla Edet Tandläkarcenter!</h1>
<div> Vi har fått följande meddelande: <br>
    <strong>Name:</strong><span> {{ $lead->name }}</span><br>
    <strong>Från e-mail:</strong><span> {{ $lead->address }}</span><br>
    <strong>Meddelande:</strong>
    <div> {{ $lead->message }}</div>
</div>
</body>
</html>
