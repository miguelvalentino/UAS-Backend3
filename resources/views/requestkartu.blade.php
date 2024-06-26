<x-layout>
<x-slot name="title">Request card</x-slot>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Kartu</title>
    <style>
        .form-container {
            border: 3px solid black;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .form-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-container button {
            background-color: #87cefa;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #87cefa;
        }
    </style>
</head>
<body>
    
    <div class="form-container">
        <h2>Request Kartu</h2>
        <form action="/requestcomplete" method="POST">
            @csrf
            <button type="submit">Request Kartu</button>
        </form>
        @if (session('credit_card_number'))
            <div class="credit-card-number">
            The card you made is ready <br> Your credit card number is {{ session('credit_card_number') }}
            </div>
        @endif
    </div>
</body>
</html>

</x-layout>