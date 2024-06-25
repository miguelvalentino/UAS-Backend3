<x-layout>
<x-slot:title>Profile<x-slot:title>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/profile/{userid}" method="POST">
        @csrf
        <p><?php echo "User ID: " . $BankAccount['id']; ?></p>
        <p><?php echo "Name: " . $BankAccount['name']; ?></p>
        <p><?php echo "Email: " . $BankAccount['email']; ?></p>
        <p><?php echo "Account Balance: " . $Bank['balance']; ?></p>
</body>
</html>
</x-layout>