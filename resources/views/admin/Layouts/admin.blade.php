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
   <nav id="header" class="bg-[#D14D72] fixed w-full z-10 top-0 shadow lg:px-4">

      <div class="w-full container mx-auto flex items-center mt-0 lg:pt-5 lg:pb-5">
         <div class="flex flex-row w-1/2 items-center">
            <a href="{{ route('home') }}"
               class="btn uppercase font-bold px-2 lg:px-2 text-[#F8F4EC] bg-[#FF3FA4] hover:bg-[#ff61b5] rounded-2xl">
               <svg class="lg:w-[32px] w-[24px] h-[24px] lg:h-[32px] text-gray-800 dark:text-white" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M16 16.9V7a1 1 0 0 0-1.6-.8l-6 5a1 1 0 0 0 0 1.5l6 4.9a1 1 0 0 0 1.6-.8Z" />
               </svg>
            </a>
            <a class="text-white text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
               <i class="fas fa-sun text-pink-600 pr-3"></i> Rumah Salad Faqiha
            </a>
         </div>
         {{-- Profile User --}}
         <div class="w-1/2 lg:flex flex-row gap-x-3 h-full pr-0 lg:justify-end items-center">
            @auth('admin')
               <span class="hidden text-base font-bold text-white md:inline-block">Selamat Datang,
                  {{ Auth::guard('admin')->user()->username }} </span>
               <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <button type="submit"
                     class="btn uppercase font-bold lg:px-7 text-[#F8F4EC] bg-[#FF3FA4] hover:bg-[#ff61b5] rounded-2xl">
                     Keluar&nbsp;
                  </button>
               </form>
            @endauth
         </div>
      </div>
   </nav>
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
