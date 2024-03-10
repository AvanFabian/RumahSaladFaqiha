<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield ('title')</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
   {{-- css --}}
   @vite('resources/css/app.css')
   {{-- web icon --}}
   <link rel="shortcut icon" type="image/png" href="{{ url('') }}">
</head>

<body class="relative min-h-screen">
   {{-- Navbar --}}
   <header class="header">
      <a href="#" class="logo">
         <img src="{{ asset('assets/images/logofaqiha.png') }}" alt="logoproduk" class="rounded-full w-19 h-16" />
      </a>
      {{-- {/* Ini NAVBAR */} --}}
      <nav class="transition-all duration-300 ease-in-out">
         {{-- {/* menu tampilan dekstop */} --}}
         <div class="hidden lg:flex lg:flex-row lg:text-white gap-x-6">
            <a href="#home" class="capitalize hover:text-[#FF9BD2]">home</a>
            <a href="#about" class="capitalize hover:text-[#FF9BD2]">about</a>
            <a href="#menusalad" class="capitalize hover:text-[#FF9BD2]">menu salad</a>
            <a href="#menulain" class="capitalize hover:text-[#FF9BD2]">menu lain</a>
            <a href="#review" class="capitalize hover:text-[#FF9BD2]">review</a>
            <a href="#sosmed" class="capitalize hover:text-[#FF9BD2]">sosmed</a>
         </div>
         {{-- {/* menu tampilan mobile */} --}}
         <div class="lg:hidden">
            <div class="drawer drawer-end">
               <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
               <div class="drawer-content ">
                  {{-- logo garistiga --}}
                  <label htmlFor="my-drawer-4" class="w-[35px] drawer-button btn btn-primary">
                     GarisTiga
                  </label>
               </div>
               <div class="drawer-side">
                  <label htmlFor="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                  <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
                     {{--  Sidebar content here --}}
                     <li><a class="">Sidebar Item 1</a></li>
                     <li><a>Sidebar Item 2</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>

      {{-- {/* icon navbar untuk screen dekstop */} --}}
      <div class="hidden lg:flex lg:flex-row lg:gap-11">

         <div class="my-auto">
            <a href="{{ route('chart') }}" target="_blank">
               <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.3L19 7H7.3" />
               </svg>
            </a>
         </div>

         @auth
            <form action="{{ route('auth.google.logout') }}" method="POST">
               @csrf
               <button type="submit"
                  class="btn uppercase font-bold lg:px-7 text-[#F8F4EC] bg-[#FF3FA4] hover:bg-[#ff61b5] rounded-2xl">
                  Keluar&nbsp;
               </button>
            </form>
         @endauth

         @guest
            <a class="btn uppercase font-bold lg:px-7 text-[#F8F4EC] bg-[#FF3FA4] hover:bg-[#ff61b5] rounded-2xl"
               href="{{ route('auth.google.login') }}">
               Masuk
            </a>
         @endguest
      </div>
   </header>
   {{-- End Navbar --}}
   {{-- Content --}}
   <div class="bg-[#F8F4EC]">
      @yield('content')
   </div>
   {{-- End Content --}}

   {{-- Footer --}}
   <footer class="footer footer-center flex p-7 justify-center bg-[#F8F4EC] text-base-content">
      <aside>
         <span class="text-[#8D334E] text-xl ">By Rumah Salad Faqiha | All Rights Reserved</span>
      </aside>
   </footer>
   {{-- End Footer --}}
</body>

</html>
