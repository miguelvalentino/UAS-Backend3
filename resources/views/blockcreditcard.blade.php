<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
    <h2>placeholder</h2>
    <form action="/blockcompleted" method="POST">
        @csrf
        <input name="target" type="text" placeholder="credit card">
        <button>placeholder</button>
</body>
</html>