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
            <a href="#menu" class="capitalize hover:text-[#FF9BD2]">menu salad</a>
            <a href="#products" class="capitalize hover:text-[#FF9BD2]">menu lain</a>
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
   
         <div class="drawer drawer-end">
            <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content my-auto">
               {{-- {/* Page content here */} --}}
               <label htmlFor="my-drawer-4" class="drawer-button">
                  LogoChart
               </label>
            </div>
            <div class="drawer-side">
               <label htmlFor="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
               <ul class="menu p-4 w-[390px] gap-y-5 min-h-full bg-[#020202] text-base-content">
                  <div class="cart-item gap-x-5  flex flex-row">
                     <div class="cursor-pointer basis-1/7">
                        Silang
                     </div>
                     <img src={item.img} alt="" class="basis-1/3" />
                     <div class="text-[#f6f6f6] basis-1/2">
                        <h3>cart item 01</h3>
                        <div class="price">$15.99/-</div>
                     </div>
                  </div>
                  <a href="#" class="btn text-[#0f0e0e] bg-white mx-auto w-1/2">
                     checkout now
                  </a>
               </ul>
            </div>
         </div>
   
         <div id="menu-btn" class="w-fit text-white cursor-pointer">Bars</div>
   
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
