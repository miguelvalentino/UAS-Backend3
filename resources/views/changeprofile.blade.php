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
    <form action="/changedProfile" method="POST">
        @csrf
        <input name="id"type="text" placeholder="id">
        <input name="Password" type="text" placeholder="Password">
        <input name="newtelno" type="text" placeholder="new Telephone Number">
        <input name="newEmail" type="text" placeholder="New Email">
        <button>placeholder</button>
</body>
</html>
</x-layout>