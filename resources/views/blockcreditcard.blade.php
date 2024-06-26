<x-layout>
<x-slot name="title">Block credit card</x-slot>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block Credit Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        .input-group {
            margin: 20px 0;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #555;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #c0392b;
        }
        .message {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Block Credit Card</h1>
        <form action="/blockcompleted" method="POST">
            @csrf
            <div class="input-group">
                <label for="target">Credit Card Number</label>
                <input type="text" id="target" name="target" required>
            </div>
            <button type="submit" class="btn">Block Card</button>
        </form>
        @if (session('message'))
            <div class="message">
                {{ session('message') }}
            </div>
        @endif
    </div>
</body>
</html>
</x-layout>