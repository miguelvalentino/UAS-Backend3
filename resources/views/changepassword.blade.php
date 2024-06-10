<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
    <h2>placeholder</h2>
    <form action="/changedpass" method="POST">
        @csrf
        <input name="id"type="text" placeholder="id">
        <input name="oldPassword" type="text" placeholder="old password">
        <input name="newPassword" type="text" placeholder="new password">
        <button>placeholder</button>
</body>
</html>