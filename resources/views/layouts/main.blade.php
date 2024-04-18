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

<body class="bg-[#F8F4EC] relative min-h-screen">
   {{-- Navbar --}}
   <header class="header relative">
      {{-- Isset ischart ishistory --}}
      @if (isset($isChart) || isset($isHistory))
         <a href="{{ route('home') }}"
            class="lg:absolute lg:left-3 lg:top-4 btn uppercase font-bold px-2 lg:px-2 text-[#F8F4EC] bg-[#FF3FA4] hover:bg-[#ff61b5] rounded-2xl">
            <svg class="lg:w-[32px] w-[24px] h-[24px] lg:h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
               xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 16.9V7a1 1 0 0 0-1.6-.8l-6 5a1 1 0 0 0 0 1.5l6 4.9a1 1 0 0 0 1.6-.8Z" />
            </svg>
         </a>
      @endif
      <a href="#" class="logo">
         <img src="{{ asset('assets/images/logofaqiha.png') }}" alt="logoproduk" class="rounded-full w-19 h-16" />
      </a>
      {{-- {/* Ini NAVBAR */} --}}
      <nav class="transition-all duration-300 ease-in-out">
         {{-- {/* menu tampilan dekstop */} --}}
         {{-- check route --}}
         @if (Route::currentRouteName() == 'history' || Route::currentRouteName() == 'chart')
            <div class="hidden lg:flex lg:flex-row lg:text-white gap-x-6">
               <a href="#home" class="capitalize hover:text-[#FF9BD2]">home</a>
               <a href="#about" class="capitalize hover:text-[#FF9BD2]">tentang Kami</a>
               <a href="#menusalad" class="capitalize hover:text-[#FF9BD2]">menu salad</a>
               <a href="#menulain" class="capitalize hover:text-[#FF9BD2]">menu lain</a>
               <a href="#review" class="capitalize hover:text-[#FF9BD2]">ulasan</a>
            </div>
         @endif
      </nav>

      {{-- {/* icon navbar untuk screen dekstop */} --}}
      <div class="flex flex-row gap-x-4 lg:gap-11">
         <div class="my-auto">
            <a href="{{ route('chart') }}">
               <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.3L19 7H7.3" />
               </svg>
            </a>
         </div>

         @auth
            <form action="{{ route('auth.google.logout') }}" method="POST" class="my-auto">
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
   <div class="flex flex-col lg:min-h-screen">
      {{-- Content --}}
      <div class="flex-grow">
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
   </div>
</body>

{{--  Import sweetalert2  --}}
<script>
   const Swal = require('sweetalert2')
</script>

</html>
