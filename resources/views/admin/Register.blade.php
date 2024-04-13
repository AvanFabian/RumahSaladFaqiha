<head>
   @vite('resources/css/app.css')
</head>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
   <div style="position: absolute; top: 2rem; left: 2rem;">
      <a href="{{ route('home') }}" class="bg-gray-600 px-4 py-3 rounded text-gray-100 hover:text-gray-600 hover:bg-gray-300 focus:bg-gray-300 focus:outline-none">
         Kembali
      </a>
   </div>
   <div
      class="relative mx-auto w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
      <div class="w-full">
         <div class="text-center">
            <h1 class="text-3xl font-semibold text-gray-900">Buat akun admin</h1>
            <p class="mt-2 text-gray-500">Buat akun admin anda</p>
         </div>
         <div class="mt-5">
            <form method="POST" action="{{ route('admin.register.submit') }}">
               @csrf
               <div class="relative mt-6">
                  <input type="text" name="username" id="username" placeholder="Username"
                     class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                     autocomplete="NA" required="" />
                  <label for="username"
                     class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Username</label>
               </div>
               <div class="relative mt-6">
                  <input type="password" name="password" id="password" placeholder="Password"
                     class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                     required="" />
                  <label for="password"
                     class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Password</label>
               </div>
               <div class="relative mt-6">
                  <input type="password" name="password_confirmation" id="password_confirmation"
                     placeholder="Confirm Password"
                     class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                     required="" />
                  <label for="password_confirmation"
                     class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Confirm
                     Password</label>
               </div>
               <div class="my-6">
                  <button type="submit"
                     class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">Create
                     an account</button>
               </div>
               <p class="text-center text-sm text-gray-500">Sudah punya akun?
                  <a href="{{ route('admin.login') }}"
                     class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">Masuk
                     disini</a>.
               </p>
            </form>
         </div>
      </div>
   </div>
</div>
