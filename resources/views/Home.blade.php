@extends('layouts.main')
@section('title', 'RumahSaladFaqiha')

@section('content')
   {{-- home --}}
   <section class="home relative bg-gradient-to-r from-[#FDFFEC] to-[#DEA9AF]" id="home">
      <div class="flex flex-col w-3/4 gap-y-32 lg:w-1/2 lg:gap-y-8 lg:px-20">
         <h3 class="text-8xl font-bold text-[#8D334E] drop-shadow-xl ">
            Rumah Salad Faqiha
         </h3>
         <p class="text-xl text-[#8D334E] drop-shadow-xl">
            Nikmati salad buatan rumah terbaik di kota Malang, dibuat dengan sempurna hanya untukmu!
         </p>
         <a href="#"
            class="btn bg-[#D14D72] hover:bg-[#f0618a] text-lg rounded-[20px] font-bold w-[180px] p-1 mx-auto text-[#F8F4EC] lg:mx-0">
            Pesan Sekarang!
         </a>
      </div>
      <img src="{{ asset('assets/images/mangkok.png') }}" alt=""
         class="absolute lg:top-17 lg:left-1/2 lg:right-1/2 opacity-25 h-[500px] lg:h-[600px]" />
   </section>

   {{-- About --}}
   <section class="about lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="about">
      {{-- {/* margin atas bawah */} --}}
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Tentang </span>
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
               <h3 class="text-6xl font-bold text-[#8D334E] drop-shadow-xl">Mengapa Salad Kami Istimewa?</h3>
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
   <section class="menu lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="menusalad">
      {{-- <div class="flex flex-col my-16"> --}}
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Menu</span>
            <span class="text-[#ffababc7]">Salad</span>
         </h1>
      </div>

      {{-- <div class="w-full flex flex-col gap-y-3 mx-auto text-center">
         <img src="{{ asset('assets/images/blog-1.jpeg') }}" alt="" class="w-full h-[155px] lg:mx-auto" />
         <h3 class="text-base text-[#57375D] font-bold capitalize">tasty and healty</h3>
         <span class="text-xl text-[#57375D]">Rp 8.500,-</span>
         <a href="#"
            class="btn rounded-[30px]  text-white bg-[#D14D72] hover:bg-[#d14d72ce] lg:w-26 lg:mx-auto">
            Tambah ke Keranjang
         </a>
      </div> --}}

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-y-8 lg:gap-y-24">
         @foreach ($menusalad as $salad)
            <div class="flex rounded-xl mx-auto w-full lg:w-[320px] pb-8 border-[5px] border-[#8d334e71] drop-shadow-xl">
               <div class="w-full flex flex-col gap-y-3 mx-auto text-center">
                  <img src="{{ asset('storage/' . $salad->image) }}" alt="" class="w-full h-[155px] lg:mx-auto" />
                  <h3 class="text-base text-[#57375D] font-bold capitalize">{{ $salad->title }}</h3>
                  <h3 class="text-base text-[#57375D] font-bold capitalize">{{ $salad->desc }}</h3>
                  <span class="text-xl text-[#57375D]">Rp {{ $salad->harga }},-</span>
                  <a href="#"
                     class="btn rounded-[30px]  text-white bg-[#D14D72] hover:bg-[#d14d72ce] lg:w-26 lg:mx-auto">
                     Tambah ke Keranjang
                  </a>
               </div>
            </div>
         @endforeach
      </div>
      </div>
   </section>

   {{-- Menu lain --}}
   <section class="menulain lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="menulain">
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Menu</span>
            <span class="text-[#ffababc7]">Lain</span>
         </h1>
      </div>

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-y-8 lg:gap-y-24">
         <div class="flex rounded-xl mx-auto w-full lg:w-[320px] pb-8 border-[5px] border-[#8d334e71] drop-shadow-xl">
            <div class="w-full flex flex-col gap-y-3 mx-auto text-center">
               <img src="{{ asset('assets/images/blog-1.jpeg') }}" alt="" class="w-full h-[155px] lg:mx-auto" />
               <h3 class="text-base text-[#57375D] font-bold capitalize">tasty and healty</h3>
               <span class="text-xl text-[#57375D]">Rp 8.500,-</span>
               <a href="#"
                  class="btn rounded-[30px]  text-white bg-[#D14D72] hover:bg-[#d14d72ce] lg:w-26 lg:mx-auto">
                  Tambah ke Keranjang
               </a>
            </div>
         </div>
      </div>
   </section>

   {{-- Review --}}
   <section class="review lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="review">
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Apa Kata</span>
            <span class="text-[#ffababc7]">Mereka?</span>
         </h1>
      </div>

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-y-8 lg:gap-y-24">
         <div class="flex mx-auto px-4 py-6 lg:w-[320px] lg:px-8 lg:py-[48px] bg-[#fcc8d165] rounded-custom60">
            <div class="flex flex-col lg:gap-y-5 mx-auto text-center">
               <img src="{{ asset('assets/images/quote-img.png') }}" alt="" class="lg:w-16 mx-auto" />
               <p class="text-[#8D334E] mb-7 font-semibold">
                  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                  nulla sit libero nemo fuga sequi nobis? Necessitatibus aut"
               </p>
               <h3 class="text-xl font-bold text-[#8D334E]">- Bu Dhia</h3>
            </div>
         </div>
      </div>
   </section>

   {{-- Sosmed --}}
   <section class="contact lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="contact">
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Media</span>
            <span class="text-[#ffababc7]">Sosial</span>
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
