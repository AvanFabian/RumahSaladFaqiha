@extends('admin.layouts.admin')
@section('title', 'Link Sosmed')

@section('content')
   <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
         <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold decoration-gray-400">
               Ubah Link Sosmed
            </h1>
         </div>

         <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" action="/info-toko/{{ $toko->id }}">
               @csrf
               <!-- Link Facebook -->
               <div class="mt-8">
                  <label class="block text-sm font-bold text-gray-700" for="akun_fb">
                     Link Akun Facebook
                     <input
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('no_whatsapp') ? 'border-red-500' : '' }}"
                        type="text" id="akun_fb" name="akun_fb" value="{{ $toko->akun_fb }}" required />
                  </label>
               </div>

               <!-- Link Instagram -->
               <div class="mt-8">
                  <label class="block text-sm font-bold text-gray-700" for="akun_ig">
                     Link Akun Instagram
                     <input
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('no_whatsapp') ? 'border-red-500' : '' }}"
                        type="text" id="akun_ig" name="akun_ig" value="{{ $toko->akun_ig }}" required />
                  </label>
               </div>

               <!-- Link Tiktok -->
               <div class="mt-4">
                  <label class="form-control w-full max-w-xs" for="akun_tiktok">
                     <div class="label">
                        <span class="label-text font-bold text-gray-700">Link Akun Tiktok</span>
                     </div>
                     <input
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('no_whatsapp') ? 'border-red-500' : '' }}"
                        type="text" id="akun_tiktok" name="akun_tiktok" value="{{ $toko->akun_tiktok }}" required />
                  </label>
               </div>

               <!-- Link WA -->
               <div class="mt-8">
                  <label class="block text-sm font-bold text-gray-700" for="no_whatsapp">
                     Link Nomor WhatsApp
                  </label>
                  <input
                     class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $errors->has('no_whatsapp') ? 'border-red-500' : '' }}"
                     type="number" id="no_whatsapp" name="no_whatsapp" value="{{ $toko->no_whatsapp }}" required />
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

   <script>
      document.getElementById('image').addEventListener('change', function(e) {
         document.getElementById('file-name').textContent = e.target.files[0].name;
      });
   </script>
@endsection
