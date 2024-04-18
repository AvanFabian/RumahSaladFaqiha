@extends('layouts.main')
@section('title', 'RumahSaladFaqiha')

@section('content')
   {{-- home --}}
   <section class="home relative bg-gradient-to-r from-[#FDFFEC] to-[#DEA9AF]" id="home" data-aos="fade-right" data-aos-duration="800">
      <div class="flex flex-col w-3/4 gap-y-32 lg:w-1/2 lg:gap-y-8 lg:px-20">
         <h3 class="text-8xl font-bold text-[#8D334E] drop-shadow-xl ">
            Rumah Salad Faqiha
         </h3>
         <p class="text-xl text-[#8D334E] drop-shadow-xl">
            Nikmati salad buatan rumah terbaik di kota Malang, dibuat dengan sempurna hanya untukmu!
         </p>
         <a href="#menusalad"
            class="btn bg-[#D14D72] hover:bg-[#f0618a] text-lg rounded-[20px] font-bold w-[180px] h-20 p-1 mx-auto text-[#F8F4EC] lg:mx-0">
            Pesan Sekarang!
         </a>
      </div>
      <img src="{{ asset('assets/images/mangkok.png') }}" alt=""
         class="absolute lg:top-17 lg:left-1/2 lg:right-1/2 opacity-25 h-[500px] lg:h-[600px]" />
   </section>

   {{-- About --}}
   <section class="about lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="about" data-aos="fade-left" data-aos-duration="800">
      {{-- {/* margin atas bawah */} --}}
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Tentang</span>
            <span class="text-[#ffababc7]">Kami</span>
         </h1>
      </div>

      {{-- dekstop --}}
      <div class="hidden lg:flex flex-col lg:flex-row gap-y-12 lg:gap-x-4 rounded-custom60 bg-[#fcc8d147]">
         <div class="basis-1/2 flex relative">
            <img src="{{ asset('assets/images/about-img.jpeg') }}" alt=""
               class="lg:absolute lg:-top-4 left-0 rounded-2xl lg:h-[450px] lg:w-[570px] rounded-custom60" />
         </div>

         <div class="basis-1/2 flex flex-col min-h-[410px] gap-y-6">
            <div class="flex flex-col w-full my-auto gap-y-9">
               <h3 class="text-6xl font-bold text-[#8D334E] drop-shadow-xl">Mengapa Salad Kami Istimewa?</h3>
               <div class="flex lg:w-[590px]">
                  <p class="font-semibold text-base text-[#57375D] capitalize"style="line-height: 1.75;">
                     Dengan campuran segar dari sayuran organik yang dipilih secara cermat, penyajian yang kreatif, dan
                     dressing buatan sendiri yang memikat, salad kami mempersembahkan pengalaman gastronomi yang tak
                     terlupakan bagi para penikmat makanan yang menghargai kualitas dan keberlanjutan.
                  </p>
               </div>
            </div>
         </div>
      </div>
      {{-- mobile --}}
      <div class="lg:hidden flex flex-col gap-y-8 gap-x-4 rounded-custom60 bg-[#fcc8d147]">
         <div class="flex relative">
            {{-- <img src="{{ asset('assets/images/about-img.jpeg') }}" alt=""
               class="rounded-2xl lg:h-[360px] lg:w-[630px] opacity-0" /> --}}
            <img src="{{ asset('assets/images/about-img.jpeg') }}" alt=""
               class="rounded-2xl w-full h-[275px] rounded-custom60" />
         </div>

         <div class="flex flex-col h-fit gap-y-6 mb-16">
            <div class="flex flex-col w-full text-center my-auto gap-y-9">
               <h3 class="text-6xl font-bold text-[#8D334E] drop-shadow-xl">Mengapa Salad Kami Istimewa?</h3>
               <div class="flex flex-col font-semibold mx-auto w-3/4 gap-y-2">
                  <p class="text-xl text-[#57375D] text-justify">
                     Dengan campuran segar dari sayuran organik yang dipilih secara cermat, penyajian yang kreatif, dan
                     dressing buatan sendiri yang memikat.
                  </p>
                  <p class="text-xl text-[#57375D] text-justify">
                     Salad kami mempersembahkan pengalaman gastronomi yang tak
                     terlupakan bagi para penikmat makanan yang menghargai kualitas dan keberlanjutan.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>

   {{-- Menu Salad --}}
   <section class="menu lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="menusalad" data-aos="fade-right" data-aos-duration="800">
      {{-- <div class="flex flex-col my-16"> --}}
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Menu</span>
            <span class="text-[#ffababc7]">Salad</span>
         </h1>
      </div>

      {{-- success message --}}
      {{-- @if (session('success'))
         <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
               <svg onclick="this.parentElement.style.display='none'" class="fill-current h-6 w-6 text-green-500"
                  role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <title>Close</title>
                  <path
                     d="M14.348 14.849a1 1 0 01-1.497 1.316l-3.851-4.103-3.849 4.103a1 1 0 01-1.497-1.316l3.849-4.103-3.849-4.103a1 1 0 111.497-1.316l3.849 4.103 3.851-4.103a1 1 0 111.497 1.316l-3.851 4.103 3.851 4.103a1 1 0 010 1.532z" />
               </svg>
            </span>
         </div>
      @endif --}}
      <div class="grid grid-cols-2 lg:grid-cols-3 place-items-center gap-y-8 lg:gap-y-24">
         @if ($menusalad->isEmpty())
            <div class="hidden lg:flex rounded-xl w-full lg:w-[320px] pb-8 drop-shadow-xl">
            </div>
            <div
               class="flex rounded-xl w-full ml-52 mt-16 text-center lg:ml-0 lg:mt12 lg:mb-12 lg:w-[320px] pb-8 drop-shadow-xl">
               <div class="w-full flex flex-col gap-y-3 ">
                  <h3 class="text-3xl text-[#57375D] font-bold capitalize">Maaf, Belum ada menu tersedia</h3>
               </div>
            </div>
            <div class="hidden lg:flex rounded-xl w-full lg:w-[320px] pb-8 drop-shadow-xl">
            </div>
         @else
            @foreach ($menusalad as $salad)
               <div
                  class="flex rounded-xl mx-auto w-full lg:w-[320px] pb-8 border-[5px] border-[#8d334e71] drop-shadow-xl">
                  <div class="w-full flex flex-col gap-y-3 mx-auto text-center">
                     <img src="{{ asset('storage/' . $salad->image) }}" alt=""
                        class="w-full h-[155px] lg:mx-auto" />
                     <h3 class="text-base text-[#57375D] font-bold capitalize">{{ $salad->title }}</h3>
                     <h3 class="text-base text-[#57375D] font-bold capitalize">{{ $salad->desc }}</h3>
                     <span class="text-xl text-[#57375D]">Rp {{ $salad->harga }},-</span>
                     <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $salad->id }}">
                        <button type="submit"
                           class="btn rounded-[30px]  text-white bg-[#D14D72] hover:bg-[#d14d72ce] lg:w-26 lg:mx-auto">
                           Tambah ke Keranjang
                        </button>
                     </form>
                  </div>
               </div>
            @endforeach
         @endif
      </div>
      </div>
   </section>

   {{-- Menu lain --}}
   <section class="menulain lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="menulain" data-aos="fade-left" data-aos-duration="800">
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Menu</span>
            <span class="text-[#ffababc7]">Lain</span>
         </h1>
      </div>

      <div class="grid grid-cols-2 lg:grid-cols-3 place-items-center gap-y-8 lg:gap-y-24">
         @if ($menulain->isEmpty())
            <div class="hidden lg:flex rounded-xl w-full lg:w-[320px] pb-8 drop-shadow-xl">
            </div>
            <div
               class="flex rounded-xl w-full ml-52 mt-16 text-center lg:ml-0 lg:mt12 lg:mb-12 lg:w-[320px] pb-8 drop-shadow-xl">
               <div class="w-full flex flex-col gap-y-3 ">
                  <h3 class="text-3xl text-[#57375D] font-bold capitalize">Maaf, Belum ada Menu Ditambahkan</h3>
               </div>
            </div>
            <div class="hidden lg:flex rounded-xl w-full lg:w-[320px] pb-8 drop-shadow-xl">
            </div>
         @else
            @foreach ($menulain as $lain)
               <div
                  class="flex rounded-xl mx-auto w-full lg:w-[320px] pb-8 border-[5px] border-[#8d334e71] drop-shadow-xl">
                  <div class="w-full flex flex-col gap-y-3 mx-auto text-center">
                     <img src="{{ asset('storage/' . $lain->image) }}" alt=""
                        class="w-full h-[155px] lg:mx-auto" />
                     <h3 class="text-base text-[#57375D] font-bold capitalize">{{ $lain->title }}</h3>
                     <h3 class="text-base text-[#57375D] font-bold capitalize">{{ $lain->desc }}</h3>
                     <span class="text-xl text-[#57375D]">Rp {{ $lain->harga }},-</span>
                     <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $lain->id }}">
                        <button type="submit"
                           class="btn rounded-[30px]  text-white bg-[#D14D72] hover:bg-[#d14d72ce] lg:w-26 lg:mx-auto">
                           Tambah ke Keranjang
                        </button>
                     </form>
                  </div>
               </div>
            @endforeach
         @endif
      </div>
   </section>

   {{-- Review --}}
   <section class="review lg:flex lg:flex-col lg:gap-y-9 mx-2 lg:mx-0 lg:px-20 bg-[#F8F4EC]" id="review" data-aos="fade-right" data-aos-duration="800">
      <div class="w-full text-center my-16">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Apa Kata</span>
            <span class="text-[#ffababc7]">Mereka?</span>
         </h1>
      </div>

      <div class="grid grid-cols-2 lg:grid-cols-3 place-items-center gap-y-8 lg:gap-y-24">
         @if ($reviews->isEmpty())
            <div class="hidden lg:flex rounded-xl w-full lg:w-[320px] pb-8 drop-shadow-xl">
            </div>
            <div
               class="flex rounded-xl w-full ml-52 mt-16 text-center lg:ml-0 lg:mt12 lg:mb-12 lg:w-[320px] pb-8 drop-shadow-xl">
               <div class="w-full flex flex-col gap-y-3 ">
                  <h3 class="text-3xl text-[#57375D] font-bold capitalize">Maaf, Belum ada Ulasan Ditambahkan</h3>
               </div>
            </div>
            <div class="hidden lg:flex rounded-xl w-full lg:w-[320px] pb-8 drop-shadow-xl">
            </div>
         @else
            @foreach ($reviews as $review)
               <div
                  class="flex mx-auto px-4 py-6 lg:w-[320px] lg:px-8 lg:py-[48px] bg-[#fcc8d165] rounded lg:rounded-custom60">
                  <div class="flex flex-col lg:gap-y-5 mx-auto text-center">
                     <img src="{{ asset('assets/images/quote-img.png') }}" alt="" class="lg:w-16 mx-auto" />
                     <p class="text-[#8D334E] text-xl mt-7 mb-7 font-semibold">
                        {{ $review->komentar }}
                     </p>
                     <h3 class="text-2xl font-bold text-[#8D334E]">- {{ $review->nama }}</h3>
                  </div>
               </div>
            @endforeach
         @endif
      </div>
   </section>

   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
      AOS.init();
    </script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      @if (session('success'))
         Swal.fire({
            title: 'Produk Ditambahkan Kedalam Keranjang!',
            icon: 'success',
            confirmButtonText: 'Tutup Pesan Ini'
         });
      @endif
   </script>

@endsection
