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
   <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="relative lg:min-h-screen bg-[#F8F4EC]">
   {{-- Navbar --}}
   <header class="header-admin p-2 relative">
      {{-- Isset ischart ishistory --}}
         <a href="{{ route('home') }}"
            class="lg:absolute lg:left-3 lg:top-4 btn uppercase font-bold px-2 lg:px-2 text-[#F8F4EC] bg-[#FF3FA4] hover:bg-[#ff61b5] rounded-2xl">
            <svg class="lg:w-[32px] w-[24px] h-[24px] lg:h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
               xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 16.9V7a1 1 0 0 0-1.6-.8l-6 5a1 1 0 0 0 0 1.5l6 4.9a1 1 0 0 0 1.6-.8Z" />
            </svg>
         </a>
      <a href="#" class="logo">
         <img src="{{ asset('assets/images/logofaqiha.png') }}" alt="logoproduk" class="rounded-full w-19 h-16" />
      </a>

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
   {{-- Content --}}
   <div class="bg-[#f2f2f2]">
      @yield('content')
   </div>

   {{-- Footer --}}
   <footer class="lg:absolute lg:bottom-0 footer bg-[#f2f2f2] footer-center flex p-3 justify-center text-base-content">
      <aside>
         <span class="font-bold text-black text-xl ">By Rumah Salad Faqiha | All Rights Reserved</span>
      </aside>
   </footer>
   {{-- End Footer --}}

</body>


{{-- script Bawaan template --}}
<script>
   /*Toggle dropdown list*/
   /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

   var userMenuDiv = document.getElementById("userMenu");
   var userMenu = document.getElementById("userButton");

   var navMenuDiv = document.getElementById("nav-content");
   var navMenu = document.getElementById("nav-toggle");

   document.onclick = check;

   function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //User Menu
      if (!checkParent(target, userMenuDiv)) {
         // click NOT on the menu
         if (checkParent(target, userMenu)) {
            // click on the link
            if (userMenuDiv.classList.contains("invisible")) {
               userMenuDiv.classList.remove("invisible");
            } else {
               userMenuDiv.classList.add("invisible");
            }
         } else {
            // click both outside link and outside menu, hide menu
            userMenuDiv.classList.add("invisible");
         }
      }

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
         // click NOT on the menu
         if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
               navMenuDiv.classList.remove("hidden");
            } else {
               navMenuDiv.classList.add("hidden");
            }
         } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
         }
      }

   }

   function checkParent(t, elm) {
      while (t.parentNode) {
         if (t == elm) {
            return true;
         }
         t = t.parentNode;
      }
      return false;
   }
</script>

</html>
