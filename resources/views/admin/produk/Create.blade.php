@extends('admin.layouts.admin')
@section('title', 'Tambahkan Produk')

@section('content')
   <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
         <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold decoration-gray-400">
               Tambahkan Produk
            </h1>
         </div>

         <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
               @csrf
               <!-- Judul -->
               <div>
                  <label class="block text-sm font-bold text-gray-700" for="title">
                     Judul Produk
                  </label>

                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('title') ? 'border-red-500' : '' }}"
                     type="text" id="title" name="title" placeholder="Judul Produk" />
               </div>

               <!-- Description -->
               <div class="mt-8">
                  <label class="block text-sm font-bold text-gray-700" for="desc">
                     Deskripsi Produk
                  </label>
                  <textarea id="desc" name="desc"
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('desc') ? 'border-red-500' : '' }}"
                     rows="4" placeholder="Deskripsi Produk"></textarea>
               </div>

               <!-- Image -->
               <div class="mt-4">
                  <label class="form-control w-full max-w-xs">
                     <div class="label">
                        <span class="label-text font-bold text-gray-700">Pilih Gambar Produk</span>
                     </div>
                     <input type="file" id="image" name="image"
                        class="file-input text-white file-input-bordered w-full max-w-xs {{ $errors->has('image') ? 'border-red-500' : '' }}" />
                     <span id="file-name"></span>
                  </label>
               </div>

               <!-- Price -->
               <div class="mt-8">
                  <label class="block text-sm font-bold text-gray-700" for="harga">
                     Harga Produk
                  </label>
                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('harga') ? 'border-red-500' : '' }}"
                     type="number" id="harga" name="harga" placeholder="Harga Produk" step="500" min="0" required />

               </div>

               <!-- Kategori -->
               <div class="mt-8">
                  <label class="block text-sm font-bold text-gray-700" for="harga">
                     Kategori Produk
                  </label>
                  <select class="select select-bordered w-full" name="kategori">
                     <option disabled selected>Kategori Produk</option>
                     <option value="menusalad">Menu Salad</option>
                     <option value="menulain">Menu Lain</option>
                   </select>

                  @if ($errors->has('harga'))
                     <p class="text-red-500 text-xs mt-2">{{ $errors->first('harga') }}</p>
                  @endif
               </div>
               <div class="flex items-center justify-start mt-4 gap-x-2">
                  <button type="submit"
                     class="px-6 py-2 text-sm rounded-md shadow-md text-black  hover:bg-[#d0c2bf] font-bold focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
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
      document.addEventListener('DOMContentLoaded', function () {
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

   <script>
      document.getElementById('image').addEventListener('change', function(e) {
          document.getElementById('file-name').textContent = e.target.files[0].name;
      });
      </script>
@endsection
