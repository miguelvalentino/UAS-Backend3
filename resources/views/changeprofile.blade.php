<x-layout>
<x-slot:title>Change Profile</x-slot:title>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
    <h2>placeholder</h2>
    <form action="/changedprofile" method="POST">
        @csrf
        <input name="password" type="text" placeholder="Password">
        <input name="newEmail" type="text" placeholder="New Email">
        <input name="newName" type="text" placeholder="New Name">
        <button>placeholder</button>
</body>
</html>
</x-layout>