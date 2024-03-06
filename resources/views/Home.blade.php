@extends('layouts.main')
@section('title', 'RumahSaladFaqiha')

@section('content')
   {{-- home --}}
   <section class="home bg-gradient-to-r from-[#FDFFEC] to-[#DEA9AF]" id="home">
      <div class="flex flex-col w-3/4 gap-y-32 lg:w-1/2 lg:gap-y-8 lg:px-20">
         <h3 class="text-8xl font-bold text-[#8D334E] ">
            Rumah Salad Faqiha
         </h3>
         <p class="text-xl text-[#8D334E]">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat
            labore, sint cupiditate distinctio tempora reiciendis.
         </p>
         <a href="#" class="btn bg-[#D14D72] hover:bg-[#f0618a] rounded-[28px] font-bold w-[180px] p-1 mx-auto text-[#F8F4EC] lg:mx-0">
            Pesan Sekarang!
         </a>
      </div>
   </section>

   {{-- About --}}
   <section class="about lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="about">
      <div class="flex flex-col my-10">
         {{-- {/* margin atas bawah */} --}}
         <div class="w-full text-center mb-12">
            <h1 class="text-7xl capitalize font-bold">
               <span class="text-[#8D334E]">Tentang </span>
               <span class="text-[#ffababc7]">Kami</span>
            </h1>

         </div>

         <div class="flex flex-col lg:flex-row gap-y-12 lg:gap-x-4 rounded-custom60 bg-[#fcc8d147]">
            <div class="flex relative">
               <img src="{{ asset('assets/images/about-img.jpeg') }}" alt=""
                  class="rounded-2xl lg:h-[360px] lg:w-[630px] opacity-0" />
               <img src="{{ asset('assets/images/about-img.jpeg') }}" alt=""
                  class="lg:absolute lg:-top-7 left-0 rounded-2xl lg:h-[410px] lg:w-[570px] rounded-custom60" />
            </div>

            <div class="basis-1/2 flex flex-col gap-y-6">
               <div class="flex flex-col w-full my-auto gap-y-9">
                  <h3 class="text-6xl font-bold text-[#8D334E]">Mengapa Salad Kami Istimewa?</h3>
                  <div class="flex lg:w-[590px]">
                     <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae
                        ratione a officiis id temporibus autem? Quod nemo facilis
                        cupiditate. Ex, vel?
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   {{-- Menu Salad --}}
   <section class="menu lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="menu">
      <div class="flex flex-col my-10">
         <div class="w-full text-center p-10">
            <h1 class="text-7xl capitalize font-bold">
               <span class="text-[#8D334E]">Menu</span>
               <span class="text-[#ffababc7]">Salad</span>
            </h1>
         </div>

         <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 lg:gap-y-24">
            <div class="flex rounded-xl mx-auto w-full lg:w-[440px] p-2 bg-white">
               <div class="flex flex-col gap-y-5 mx-auto text-center ">
                  <img src={item.img} alt="" class="w-[120px] h-[120px] lg:mx-auto" />
                  <h3 class="text-2xl text-black font-bold">tasty and healty</h3>
                  <div class="">
                     <span>20.99$</span>
                  </div>
                  <a href="#" class="btn rounded-full ">
                     add to cart
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>

   {{-- Menu lain --}}
   <section class="menulain lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="menulain">
      <div class="flex flex-col my-10">
         <div class="w-full text-center p-10">
            <h1 class="text-7xl capitalize font-bold">
               <span class="text-[#8D334E]">Menu</span>
               <span class="text-[#ffababc7]">Lain</span>
            </h1>
         </div>

         <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 lg:gap-y-24">
            <div class="flex rounded-xl mx-auto w-full lg:w-[440px] p-2 bg-white">
               <div class="flex flex-col gap-y-5 mx-auto text-center ">
                  <img src={item.img} alt="" class="w-[120px] h-[120px] lg:mx-auto" />
                  <h3 class="text-2xl text-black font-bold">tasty and healty</h3>
                  <div class="">
                     <span>20.99$</span>
                  </div>
                  <a href="#" class="btn rounded-full ">
                     add to cart
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section>

   {{-- Review --}}
   <section class="review lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="review">
      <div class="w-full text-center p-10">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E]">Apa Kata</span>
            <span class="text-[#ffababc7]">Mereka?</span>
         </h1>
      </div>

      <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-3 lg:gap-y-24">
         <div class="flex rounded-xl mx-auto px-4 py-6 lg:w-[440px] lg:px-8 lg:py-16 bg-white">
            <div class="flex flex-col gap-y-8 lg:gap-y-5 mx-auto text-center ">
               <img src="{{ asset('assets/images/quote-img.png') }}" alt="" class="lg:w-16 mx-auto" />
               <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                  nulla sit libero nemo fuga sequi nobis? Necessitatibus aut
                  laborum, nisi quas eaque laudantium consequuntur iste ex aliquam
                  minus vel? Nemo.
               </p>
               <h3>john deo</h3>
            </div>
         </div>
      </div>
   </section>

   {{-- Sosmed --}}
   <section class="contact lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20" id="contact">
      <div class="w-full text-center p-10">
         <h1 class="text-7xl capitalize font-bold">
            <span class="">Media</span>
            <span class="">Sosial</span>
         </h1>
      </div>

      <div class="flex flex-row">
         {{-- {/* gambar */} --}}
         <div class="">

         </div>
         {{-- {/* akun sosmed */} --}}
         <div class="">

         </div>
      </div>
   </section>


@endsection
