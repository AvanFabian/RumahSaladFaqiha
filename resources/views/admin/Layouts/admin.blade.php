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

<body class="relative lg:min-h-screen bg-[#d2d2d2]">
   {{-- Navbar --}}
   <nav id="header" class="bg-[#f2f2f2] fixed w-full z-10 top-0 shadow lg:px-4">
      <div class="w-full container mx-auto flex items-center mt-0 lg:pt-5 lg:pb-5">
         <div class="w-1/2">
            <a class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
               <i class="fas fa-sun text-pink-600 pr-3"></i> Rumah Salad Faqiha
            </a>
         </div>
         {{-- Navigasi --}}
         {{-- <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-[#f2f2f2] z-20"
            id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
               <li class="mr-6 my-2 md:my-0">
                  <a href="#"
                     class="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-gray-900 border-b-2 border-orange-600 hover:border-orange-600">
                     <i class="fas fa-home fa-fw mr-3 text-pink-600"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                  </a>
               </li>
               <li class="mr-6 my-2 md:my-0">
                  <a href="#"
                     class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                     <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Tasks</span>
                  </a>
               </li>
               <li class="mr-6 my-2 md:my-0">
                  <a href="#"
                     class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                     <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Messages</span>
                  </a>
               </li>
               <li class="mr-6 my-2 md:my-0">
                  <a href="#"
                     class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                     <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Analytics</span>
                  </a>
               </li>
               <li class="mr-6 my-2 md:my-0">
                  <a href="#"
                     class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                     <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Payments</span>
                  </a>
               </li>
            </ul>
         </div> --}}
         {{-- Profile User --}}
         <div class="w-1/2 lg:flex flex-row gap-x-3 h-full pr-0 lg:justify-end items-center">
            @auth('admin')
               <span class="hidden text-base font-bold text-black md:inline-block">Selamat Datang,
                  {{ Auth::guard('admin')->user()->username }} </span>
               <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <button type="submit"
                     class="inline-block my-auto px-4 py-2 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-500">
                     Logout
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
