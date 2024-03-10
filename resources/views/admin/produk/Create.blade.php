@extends('admin.layouts.admin')
@section('title', 'Tambahkan Produk')

@section('content')
   <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
         <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400">
               Tambahkan Produk
            </h1>
         </div>

         <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            {{-- HAndle error pas ngisi form --}}
            {{-- @if ($errors->any())
               <div class="alert alert-error mb-4">
                  <ol>
                     @foreach ($errors->all() as $error)
                        <li class="font-semibold text-white">{{ $error }}</li>
                     @endforeach
                  </ol>
               </div>
            @endif --}}
            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
               @csrf
               <!-- Judul -->
               <div>
                  <label class="block text-sm font-bold text-gray-700" for="title">
                     Judul Produk
                  </label>

                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('title') ? 'border-red-500' : '' }}"
                     type="text" id="title" name="title" placeholder="Product Title" />

                  @if ($errors->has('title'))
                     <p class="text-red-500 text-xs mt-2">{{ $errors->first('title') }}</p>
                  @endif
               </div>

               <!-- Description -->
               <div class="mt-4">
                  <label class="block text-sm font-bold text-gray-700" for="desc">
                     Deskripsi Produk
                  </label>
                  <textarea id="desc" name="desc"
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('desc') ? 'border-red-500' : '' }}"
                     rows="4" placeholder="Product Description"></textarea>

                  @if ($errors->has('desc'))
                     <p class="text-red-500 text-xs mt-2">{{ $errors->first('desc') }}</p>
                  @endif
               </div>

               <!-- Image -->
               <div class="mt-4">
                  <label class="form-control w-full max-w-xs">
                     <div class="label">
                        <span class="label-text font-bold text-gray-700">Pilih Gambar Produk</span>
                     </div>
                     <input type="file" id="image" name="image"
                        class="file-input text-white file-input-bordered w-full max-w-xs {{ $errors->has('image') ? 'border-red-500' : '' }}" />

                     @if ($errors->has('image'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('image') }}</p>
                     @endif
                  </label>
               </div>

               <!-- Price -->
               <div class="mt-4">
                  <label class="block text-sm font-bold text-gray-700" for="harga">
                     Harga Produk
                  </label>
                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('harga') ? 'border-red-500' : '' }}"
                     type="number" id="harga" name="harga" placeholder="Product Price" step="1000" min="0" required />

                  @if ($errors->has('harga'))
                     <p class="text-red-500 text-xs mt-2">{{ $errors->first('harga') }}</p>
                  @endif
               </div>

               {{-- Success message --}}
               @if (session('success'))
                  <div class="alert alert-success mt-3">
                     {{ session('success') }}
                  </div>
               @endif
               <div class="flex items-center justify-start mt-4 gap-x-2">
                  <button type="submit"
                     class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                     Simpan
                  </button>
                  <a href="{{ route('admin.dashboard') }}"
                     class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                     Kembali
                  </a>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection
