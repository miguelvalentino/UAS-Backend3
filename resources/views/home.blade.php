@auth
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <div style="border:3px solid black;">
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
<form action="/BankAccount/changeprofile" method="GET">
        <button>change profile</button>
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
</body>
</html>
@else
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>
  @vite('resources/css/app.css')
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/loggedin" method="POST">
        @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input name="email" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input name="password" type="text" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>
    <p class="mt-10 text-center text-sm text-gray-500">
      Tidak Punya akun?
      <a href="/BankAccount/createaccount" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Buat sekarang!</a>
    </p>
  </div>
</div>
@endauth