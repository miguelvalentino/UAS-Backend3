<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <div style="border:3px solid black;">
    @auth
    <h2>current user:{{auth()->user()->name}}</h2>
    <form action="/logout" method="POST">
        @csrf
        <button>logout</button>
</form>
@if(auth()->user()->admin==true)
<form action= "/BankAccount" method= "GET">
        <button>all users</button>
</form>
<form action= "/BankAccount/blockcreditcard" method= "GET">
        <button>block credit card</button>
</form>
@endif
    <form action="/BankAccount/profile/{{auth()->user()->id}}" method="GET">
        <button>profile</button>
    </form>
    <form action="/BankAccount/deleteaccount/{{auth()->user()->id}}" method="GET">
        <button>delete account(1 by default)</button>
</form>
    <form action="/BankAccount/deposit" method="GET">
        <button>deposit</button>
</form>
    <form action="/BankAccount/withdraw" method="GET">
        <button>withdraw</button>
</form>
    <form action="/BankAccount/changepassword" method="GET">
        <button>change password</button>
</form>
    <form action="/BankAccount/biayaadmin" method="GET">
        <button>biaya admin</button>
</form>
    <form action="/BankAccount/deposito" method="GET">
        <button>deposito</button>
</form>
    <form action="/BankAccount/transfer" method="GET">
        <button>transfer</button>
</form>
    <form action="/BankAccount/requestkartu" method="GET">
        <button>request kartu</button>
</form>
    @else
    <h2>welcome</h2>
    <form action="/BankAccount/createaccount" method="GET">
        <button>create account</button>
</form>
    <form action="/BankAccount/login" method="GET">
        <button>login</button>
</form>
    @endauth
</body>
</html>