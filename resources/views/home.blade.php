@auth
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-blue-500">Welcome To BankMik!</h2>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">current user : {{auth()->user()->name}}</h2>
  </div>
  @vite('resources/css/app.css')
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
@if(auth()->user()->admin==true)
<form action="/BankAccount" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">All Users</button>
      </div>
      <p><font color="white">space</font></p>
</form>
@endif
<form action="/BankAccount/profile/{{auth()->user()->id}}" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Profile</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/changeprofile" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Change Profile</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/changepassword" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Change Password</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/deposit" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Deposit</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/withdraw" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Withdraw</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/transfer" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Transfer</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/deposito" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Deposito</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/withdrawdep" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Withdraw Deposito</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/BankAccount/requestkartu" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Request Credit Card</button>
      </div>
      <p><font color="white">space</font></p>
</form>
@if(auth()->user()->admin==true)
<form action= "/BankAccount/blockcreditcard" method= "GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Block Credit Card</button>
      </div>
      <p><font color="white">space</font></p>
</form>
@endif
<form action="/BankAccount/deleteaccount" method="GET">
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete Account</button>
      </div>
      <p><font color="white">space</font></p>
</form>
<form action="/logout" method="POST">
        @csrf
      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button>
      </div>
      <p><font color="white">space</font></p>
</form>
</div>
@else
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-blue-500">BankMik</h2>
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
      <p><font color="white">space</font></p>
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