<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
    <h2>placeholder</h2>
    <form action="/transfercompleted" method="POST">
        @csrf
        <input name="receiver" type="text" placeholder="receiver credit card number">
        <input name="amount" type="number" placeholder="amount">
        <input name="password" type="text" placeholder="password">
        <button>placeholder</button>
</body>
</html>