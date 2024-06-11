<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
    <h2>placeholder</h2>
    <form action="/createdaccount" method="POST">
        @csrf
        <input name='name' type="text" placeholder="name">
        <input name='email' type="text" placeholder="email">
        <input name='telno' type="text" placeholder="telno">
        <input name='balance' type="number" placeholder="balance">
        <input name='password' type="text" placeholder="password">
        <button>placeholder</button>
</body>
</html>