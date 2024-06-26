<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-blue-500">BankMik</h2>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Deposito</h2>
  </div>
  @vite('resources/css/app.css')
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/depositocompleted" method="POST">
        @csrf
      <div>
        <label for="depositoAmount" class="block text-sm font-medium leading-6 text-gray-900">Jumlah Deposito</label>
        <div class="mt-2">
          <input name="depositoAmount" type="number" autocomplete="depositoAmount" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
      <p><font color="white">space</font></p>
        <button class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Konfirmasi</button>
      </div>
    </form>
  </div>
</div>