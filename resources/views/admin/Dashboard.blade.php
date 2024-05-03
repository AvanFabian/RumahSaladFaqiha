@extends('admin.layouts.admin')
@section('title', 'Halaman Admin')

@section('content')
   <!-- Index Post -->
   <div class="lg:py-16 max-w-7xl lg:mx-auto my-[54px] mx-2">
      {{-- Title + Tombol --}}
      <div class="flex w-full flex-row mb-4 justify-between items-center">
         <div class="self-end px-4 py-3 rounded-md text-black text-2xl font-bold ">
            Daftar Produk
         </div>
         <a class="px-4 py-3 rounded-md bg-[#F9E8E4] text-black  hover:bg-[#d0c2bf] font-bold "
            href="{{ route('produk.create') }}">Tambah Produk</a>
      </div>
      {{-- Tabel Produk --}}
      <div class="flex flex-col">
         <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
               <table class="min-w-full">
                  <thead>
                     <tr>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           ID</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Judul Produk</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Deskrpsi Produk</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Gambar Produk</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Kategori Produk</th>
                        <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                           colspan="3">
                           Aksi</th>
                     </tr>
                  </thead>

                  <tbody class="bg-white">
                     @forelse ($produk as $product)
                        <tr>
                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="flex items-center">
                                 {{ $product->id }}
                              </div>

                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                 {{ $product->title }}
                              </div>
                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <p>{{ $product->desc }}</p>
                           </td>

                           <td
                              class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                              <img src="{{ asset('storage/' . $product->image) }}" width="100">
                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <p>{{ $product->kategori }}</p>
                           </td>

                           <td
                              class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                              {{-- Edit --}}
                              <a href="{{ route('produk.edit', $product->id) }}" class="text-gray-600 hover:text-gray-900">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg>
                              </a>
                           </td>

                           <td class="text-sm font-medium whitespace-no-wrap border-b border-gray-200 ">
                              <!-- Delete button -->
                              <form method="POST" id="deleteproduk{{ $product->id }}"
                                 action="{{ route('produk.destroy', $product->id) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"
                                    onclick="event.preventDefault(); confirmDeleteProduk({{ $product->id }});">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                                       fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                 </button>
                              </form>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="p-5 text-center">Belum ada Produk Ditambahkan</td>
                        </tr>
                     @endforelse
                  </tbody>
                  {{-- Pagination --}}
                  <tfoot>
                     <tr>
                        <td colspan="5" class="p-5 text-center">
                           {{ $produk->links('vendor.pagination.custom') }}
                        </td>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
      {{-- Title + Tombol Review  --}}
      <div class="flex lg:mt-8 w-full flex-row mb-4 justify-between items-center">
         <div class="self-end px-4 py-3 rounded-md text-black text-2xl font-bold ">
            Daftar Review
         </div>
         <a class="px-4 py-3 rounded-md bg-[#F9E8E4] text-black hover:bg-[#d0c2bf] font-bold "
            href="{{ route('review.create') }}">Tambah Review</a>
      </div>
      {{-- Tabel Review --}}
      <div class="flex flex-col">
         <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
               class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
               <table class="min-w-full">
                  <thead>
                     <tr>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           ID</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Nama Pelanggan</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Komentar Pelanggan</th>
                        <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                           colspan="3">
                           Aksi</th>
                     </tr>
                  </thead>

                  <tbody class="bg-white">
                     @forelse ($ulasan as $review)
                        <tr>
                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="flex items-center">
                                 {{ $review->id }}
                              </div>

                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                 {{ $review->nama }}
                              </div>
                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <p>{{ $review->komentar }}</p>
                           </td>
                           <td
                              class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                              {{-- Edit --}}
                              <a href="{{ route('review.edit', $review->id) }}" class="text-gray-600 hover:text-gray-900">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg>
                              </a>

                           </td>

                           <td class="text-sm font-medium whitespace-no-wrap border-b border-gray-200 ">
                              <!-- Delete button -->
                              <form method="POST" id="deletereview{{ $review->id }}"
                                 action="{{ route('review.destroy', $review->id) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"
                                    onclick="event.preventDefault(); confirmDeleteReview({{ $review->id }});">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                                       fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                 </button>
                              </form>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="p-5 text-center">Belum ada Review Ditambahkan</td>
                        </tr>
                     @endforelse
                  </tbody>

               </table>
            </div>
         </div>
      </div>
      {{--  --}}
      {{-- Title + Tombol Sosmed  --}}
      <div class="flex lg:mt-8 w-full flex-row mb-4 justify-between items-center">
         <div class="self-end px-4 py-3 rounded-md text-black text-2xl font-bold ">
            Daftar Sosmed
         </div>
         <a class="px-4 py-3 rounded-md bg-[#F9E8E4] text-black hover:bg-[#d0c2bf] font-bold "
            href="{{ route('info-toko.create') }}">Tambah Akun Sosmed</a>
      </div>
      {{-- Tabel Sosmed --}}
      <div class="flex flex-col">
         <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
               class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
               <table class="min-w-full">
                  <thead>
                     <tr>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Akun Facebook</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Akun Instagram</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Akun Tiktok</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Nomor Whatsapp</th>
                        <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                           colspan="3">
                           Aksi</th>
                     </tr>
                  </thead>

                  <tbody class="bg-white">
                     @forelse ($infotoko as $toko)
                        <tr>
                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="flex items-center">
                                 {{ $toko->akun_fb }}
                              </div>

                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                 {{ $toko->akun_ig }}
                              </div>
                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <p>{{ $toko->akun_tiktok }}</p>
                           </td>

                           <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <p>{{ $toko->no_whatsapp }}</p>
                           </td>
                           <td
                              class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                              {{-- Edit --}}
                              <a href="{{ route('info-toko.edit', $toko->id) }}"
                                 class="text-gray-600 hover:text-gray-900">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg>
                              </a>

                           </td>

                           <td class="text-sm font-medium whitespace-no-wrap border-b border-gray-200 ">
                              <!-- Delete button -->
                              <form method="POST" id="deletetoko{{ $toko->id }}"
                                 action="{{ route('info-toko.destroy', $toko->id) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"
                                    onclick="event.preventDefault(); confirmDeleteInfoToko({{ $toko->id }});">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                       class="w-6 h-6 text-red-600 hover:text-red-800" fill="none"
                                       viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                 </button>
                              </form>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="p-5 text-center">Belum ada Akun Sosmed Ditambahkan</td>
                        </tr>
                     @endforelse
                  </tbody>

               </table>
            </div>
         </div>
      </div>
      {{-- Title List Order  --}}
      <div class="flex lg:mt-8 w-full flex-row mb-4 justify-between items-center">
         <div class="self-end px-4 py-3 rounded-md text-black text-2xl font-bold ">
            Daftar Pesanan
         </div>
      </div>
      {{-- Tabel List Order --}}
      <div class="flex flex-col">
         <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="inline-block min-w-full align-middle border-b border-gray-200 shadow sm:rounded-lg">
               <table class="min-w-full overflow-x-auto ">
                  <thead>
                     <tr>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Order ID</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Tanggal Pesanan</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Customer Email</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Customer Name</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           No. Telepon</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Alamat</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Jenis Produk Dipesan</th>
                        <th
                           class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                           Status</th>
                        <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                           Total Harga</th>
                        <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                           Aksi</th>
                     </tr>
                  </thead>

                  <tbody class="bg-white">
                     @if ($orders->isEmpty())
                        <tr>
                           <td colspan="10" class="p-5 text-center">No Orders Yet</td>
                        </tr>
                     @else
                        @foreach ($orders as $order)
                           <tr>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                 <div class="flex items-center">
                                    {{ $order->id }}
                                 </div>
                              </td>

                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                 <div class="flex items-center">
                                    {{-- order date --}}
                                    {{ $order->created_at }}
                                 </div>
                              </td>

                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                 <div class="text-sm leading-5 text-gray-900">
                                    {{ $order->email }}
                                 </div>
                              </td>

                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                 <p>{{ $order->username }}</p>
                              </td>

                              <td
                                 class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                 <span>{{ $order->telp }}</span>
                              </td>

                              <td
                                 class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                 {{ $order->alamat }}
                              </td>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                 @foreach ($order->products as $product)
                                    <span class="text-sm font-semibold">{{ $loop->iteration }}.
                                       {{ $product->title }},</span><br>
                                 @endforeach
                                 {{-- Debugging --}}
                                 {{-- {{ dd($order->products) }} --}}
                              </td>

                              <td
                                 class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                 {{ $order->status }}
                              </td>

                              </td>
                              <td
                                 class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                 {{ $order->total_price }}
                              </td>
                              <td
                                 class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                 @if ($order->status != 'done')
                                    <form action="{{ route('markorder.done', $order->id) }}" method="POST">
                                       @csrf
                                       <button type="submit" class="btn">Mark as Done</button>
                                    </form>
                                 @else
                                    <p class="mx-auto">Done</p>
                                 @endif
                              </td>
                           </tr>
                        @endforeach
                        <tr>
                           <td colspan="10" class="p-5 text-center">{{ $orders->links('vendor.pagination.custom') }}
                           </td>
                        </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      function confirmDeleteProduk(id) {
         Swal.fire({
            title: 'Apakah Yakin Ingin Menghapus Produk?',
            text: "Produk akan Diberi Label Nonaktif dan Aksi ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
         }).then((result) => {
            if (result.isConfirmed) {
               document.getElementById('deleteproduk' + id).submit();
            }
         })
      }

      function confirmDeleteReview(id) {
         Swal.fire({
            title: 'Apakah Yakin Ingin Menghapus Review Pengguna ini?',
            text: "Review akan Dihapus dan Aksi ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
         }).then((result) => {
            if (result.isConfirmed) {
               document.getElementById('deletereview' + id).submit();
            }
         })
      }
      function confirmDeleteInfoToko(id) {
         Swal.fire({
            title: 'Apakah Yakin Ingin Menghapus Akun Sosmed  ini?',
            text: "Akun sosmed akan Dihapus dan Aksi ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
         }).then((result) => {
            if (result.isConfirmed) {
               document.getElementById('deletetoko' + id).submit();
            }
         })
      }
   </script>

   <script>
      document.addEventListener('DOMContentLoaded', function() {
         @if (session('deleted'))
            Swal.fire({
               icon: 'success',
               title: 'Deleted',
               text: '{{ session('deleted') }}',
            })
         @endif
      });
   </script>

@endsection
