@extends('admin.layouts.admin')
@section('title', 'Tambahkan Produk')

@section('content')
   <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
         <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
               Tambahkan Review
            </h1>
         </div>

         <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="/review/{{ $review->id }}" enctype="multipart/form-data">
               @csrf
               <!-- Title -->
               <div>
                  <label class="block text-sm font-bold text-gray-700" for="nama">
                     Nama Pelanggan
                  </label>

                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('nama') ? 'border-red-500' : '' }}"
                     type="text" id="nama" name="nama" value="{{ $review->nama }}" required />
               </div>

               <!-- Review -->
               <div class="mt-4">
                  <label class="block text-sm font-bold text-gray-700" for="komentar">
                     Review Pelanggan
                  </label>
                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('komentar') ? 'border-red-500' : '' }}"
                     type="text" id="komentar" name="komentar" value="{{ $review->komentar }}" required />
               </div>
               <div class="flex items-center justify-start mt-4 gap-x-2">
                  <button type="submit"
                     class="px-6 py-2 text-sm font-bold rounded-md shadow-md text-black  hover:bg-[#d0c2bf] focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                     Simpan
                  </button>
                  <a href="{{ route('admin.dashboard') }}"
                     class="px-6 py-2 text-sm font-bold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                     Kembali
                  </a>
               </div>
            </form>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         @if ($errors->any())
            Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Something went wrong!',
               footer: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
            })
         @endif

         @if (session('success'))
            Swal.fire({
               icon: 'success',
               title: 'Success',
               text: '{{ session('success') }}',
            })
         @endif
      });
   </script>

@endsection
