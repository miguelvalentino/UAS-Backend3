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
        <p><?php if($BankAccount['admin']){
            echo "Admin: true";
        }else{
            echo "Admin: false";
        }?></p>
        <p><?php echo "Account Balance: " . floatval($Bank['balance']); ?></p>
        <p><?php echo "Deposito Balance: " . floatval($Bank['deposito_amount']); ?></p>
        <p><?php echo "Credit Card Number: " . $Bank['credit_card_number']; ?></p>
        <p><?php if($Bank['credit_card_blocked']){
            echo "Credit Card Blocked: true";
        }else{
            echo "Credit Card Blocked: false";
        }?></p>

</body>
</html>
</x-layout>