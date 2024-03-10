@extends('layouts.main')
@section('title', 'Chart')

@section('content')
   <section class="chart lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-44 bg-[#F8F4EC]" id="chart">
      <div class="w-full text-center lg:mt-[120px] mb-8">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Keranjang</span>
            <span class="text-[#ffababc7]">Pesanan</span>
         </h1>
      </div>
      <div class="w-full flex lg:flex-row lg:gap-x-8">
         {{-- Sisi Kiri: Form Data Diri  --}}
         <div class="w-full lg:flex lg:flex-col lg:basis-1/2 lg:gap-y-4">
            <label class="input  bg-[#8d334e31] flex items-center gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                  <path
                     d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                     d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
               </svg>
               <input type="text" class="grow border-none" placeholder="Email" name="email" />
            </label>
            <label class="input bg-[#8d334e31] flex items-center gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                  <path
                     d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                     d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
               </svg>
               <input type="text" class="grow border-none" placeholder="Nama" name="nama" />
            </label>
            <label class="input bg-[#8d334e31] flex items-center gap-2" for="telp">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                  <path
                     d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                     d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
               </svg>
               <input type="tel" class="grow border-none" name="telp" placeholder="No.telepon" />
            </label>
            <label class="input bg-[#8d334e31] flex items-center gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                  <path
                     d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                     d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
               </svg>
               <input type="text" class="grow border-none" placeholder="Alamat" name="alamat" />
            </label>
            <label for="fileInput"
               class="file-input lg:justify-start file-input-secondary bg-[#8d334e31] w-full flex  items-center gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill=""
                  class="w-4 h-4 lg:ml-4 opacity-70">
                  <path
                     d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                  <path
                     d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
               </svg>
               <span class="lg:ml-3 text-gray">Choose file</span>
               <input type="file" id="fileInput" name="buktitransfer" class="hidden" />
            </label>
            <textarea class="textarea textarea-bordered bg-[#8d334e31]" placeholder="Catatan" name="catatan"></textarea>
            <button class="btn bg-[#D14D72] text-white lg:w-[160px] lg:mx-auto lg:mt-4">Submit</button>
         </div>
         {{-- Sisi Kanan: Tagihan Pembayaran + List Produk  --}}
         <div class="w-full lg:flex lg:flex-col lg:basis-1/2 lg:gap-y-4">
             <div class="w-full lg:flex lg:flex-row lg:h-fit px-3 py-4 border-[3px] border-[#8d334e71] relative">
                <div class="lg:my-auto">
                   <img src="{{ asset('assets/images/blog-1.jpeg') }}" class="w-[180px] h-[120px]  rounded-lg" alt="">
                </div>
                <div class="lg:flex lg:flex-col lg:gap-y-5 mx-auto">
                   <h2 class="text-3xl font-bold text-black">Judul Produk</h2>
                   <span class="text-2xl font-light text-black mx-auto">Rp 8.500,-</span>
                   <div class="flex flex-row">
                      <span>substract</span>
                      <div class="mx-auto border-2 border-[#8d334e] px-4">1</div>
                      <span>add</span>
                   </div>
                   <div class="absolute lg:top-2 lg:right-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                   </div>
                </div>
             </div>
             <div class="divider"></div> 
             <div class="lg:flex lg:flex-col lg:gap-y-1">
                <div class="flex flex-row">
                    <h2 class="text-2xl font-semibold text-black lg:basis-1/2">Total</h2>
                    <h2 class="text-2xl font-semibold text-black lg:basis-1/4">Rp</h2>
                    <h2 class="text-2xl font-semibold text-black lg:basis-1/4">52.000</h2>
                </div>
             </div>
         </div>
      </div>
   </section>
@endsection

{{-- 
<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg>    
--}}
