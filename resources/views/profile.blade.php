<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-blue-500">BankMik</h2>
    <h2 class="mt-10 text-left text-2xl font-bold leading-9 tracking-tight text-gray-900">Your Profile</h2>
</head>
<body>
    <form action="/profile/{userid}" method="POST">
        @csrf
        <h4><?php echo "User ID: " . $BankAccount['id']; ?></h4>
        <h4><?php echo "Name: " . $BankAccount['name']; ?></h4>
        <h4><?php echo "Email: " . $BankAccount['email']; ?></h4>
        <h4><?php if($BankAccount['admin']){
            echo "Admin: true";
        }else{
            echo "Admin: false";
        }?></h4>
        <h4><?php echo "Account Balance: " . floatval($Bank['balance']); ?></h4>
        <h4><?php echo "Deposito Balance: " . floatval($Bank['deposito_balance']); ?></h4>
        <h4><?php echo "Credit Card Number: " . $Bank['credit_card_number']; ?></h4>
        <h4><?php if($Bank['credit_card_blocked']){
            echo "Credit Card Blocked: true";
        }else{
            echo "Credit Card Blocked: false";
        }?></h4>
</body>
</html>