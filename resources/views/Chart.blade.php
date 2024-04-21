@extends('layouts.main', ['isChart' => true])
@section('title', 'Chart')

@section('content')
   <section class="lg:flex lg:flex-col mt-[72px] lg:mt-[120px] lg:gap-y-9 mx-2 lg:mx-0 lg:px-44 bg-[#F8F4EC]" id="chart">
      <div class="w-full text-center mb-14">
         <h1 class="text-7xl capitalize font-bold">
            <span class="text-[#8D334E] drop-shadow-xl">Keranjang</span>
            <span class="text-[#ffababc7]">Pesanan</span>
         </h1>
      </div>
      <div class="w-full flex lg:flex-row lg:gap-x-8">
         @php
            use App\Models\Produk;
            use App\Models\Order;
         @endphp
         @if (count($cartItems) == 0)
            <div class="w-full h-screen flex items-center justify-content-center">
               <h1 class="text-4xl font-bold text-black text-center mx-auto">Keranjang Anda Kosong</h1>
            </div>
         @else
            {{-- Dekstop Screen --}}
            {{-- Sisi Kiri: Form Data Diri  --}}
            <div class="hidden lg:block lg:basis-1/2 ">
               <form action="{{ route('checkout.submit') }}" method="POST" class="w-full lg:flex lg:flex-col lg:gap-y-4"
                  enctype="multipart/form-data">
                  @csrf
                  <label class="input  bg-[#8d334e31] flex items-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                        <path
                           d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                        <path
                           d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                     </svg>
                     <input type="text" class="grow border-none font-bold text-[#2d2d2db8]" name="email"
                        value="{{ $user->email }}" readonly />
                  </label>
                  <label class="input bg-[#8d334e31] flex items-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                        <path
                           d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                        <path
                           d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                     </svg>
                     <input type="text" class="grow border-none font-bold text-[#2d2d2db8]" name="nama"
                        value="{{ $user->name }}" readonly />
                  </label>
                  <label class="input bg-[#8d334e31] flex items-center gap-2" for="telp">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="" class="w-4 h-4 opacity-70">
                        <path
                           d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                        <path
                           d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                     </svg>
                     <input type="text" class="grow border-none" name="telp" placeholder="No.telepon" />
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

                  <textarea class="textarea textarea-bordered bg-[#8d334e31]" placeholder="Catatan" name="catatan"></textarea>
                  <button type="submit" class="btn bg-[#D14D72] text-white lg:w-[160px] lg:mx-auto lg:mt-4 rounded-xl">Pesan</button>
               </form>
            </div>
            {{-- Sisi Kanan: Tagihan Pembayaran + List Produk  --}}
            <div class="hidden w-full lg:flex lg:flex-col lg:basis-1/2 lg:gap-y-4" id="invoice-section">
               @foreach ($cartItems as $item)
                  @php
                     // Retrieve the product details
                     $product = Produk::find($item->product_id);
                  @endphp
                  <div class="w-full lg:flex lg:flex-row lg:h-fit px-3 py-4 border-[3px] border-[#8d334e71] relative"
                     data-id="{{ $item->id }}">
                     <div class="lg:my-auto">
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-[180px] h-[120px]  rounded-lg"
                           alt="Gambar Produk">
                     </div>
                     <div class="lg:flex lg:flex-col lg:gap-y-5 mx-auto">
                        <h2 class="text-3xl font-bold text-black">{{ $product->title }}</h2>
                        <span class="text-2xl font-light text-black mx-auto">{{ $product->harga }}</span>
                        <div class="flex flex-row">
                           {{-- Tombol Kurangi Jumlah Produk --}}
                           <button class="substract">
                              <svg class="w-[32px] h-[32px] text-gray-800" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14" />
                              </svg>
                           </button>
                           {{-- Jumlah Produk --}}
                           <div class="quantity mx-auto border-2 border-[#8d334e] px-4" data-price="{{ $product->harga }}">
                              {{ $item->quantity }}</div>
                           {{-- Tombol Tambah Jumlah Produk --}}
                           <button class="add">
                              <svg class="w-[32px] h-[32px] text-gray-800" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                              </svg>
                           </button>
                        </div>
                        <div class="absolute lg:top-2 lg:right-3">
                           {{-- Tombol Hapus Produk --}}
                           <button class="remove">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                           </button>
                        </div>
                        </a>
                     </div>
                  </div>
               @endforeach
               <div class="divider"></div>
               <div class="lg:flex lg:flex-col lg:gap-y-1">
                  <div class="flex flex-row">
                     @php
                        $totalPrice = 0;
                     @endphp
                     @foreach ($cartItems as $item)
                        @php
                           // Retrieve the product details
                           $product = Produk::find($item->product_id);

                           // Add the price of this item to the total price
                           $totalPrice += $product->harga * $item->quantity;
                        @endphp
                        <!-- ... -->
                     @endforeach
                     <h2 class="text-2xl font-semibold text-black lg:basis-1/2">Total</h2>
                     <h2 class="text-2xl font-semibold text-black lg:basis-1/4">Rp</h2>
                     <h2 id="total-price" class="text-2xl font-semibold text-black lg:basis-1/4 ">Rp {{ $totalPrice }}
                     </h2>
                  </div>
               </div>
            </div>
            {{-- Mobile Screen --}}
            <div class="w-full lg:hidden flex flex-col gap-y-8">
               {{-- Sisi Atas: Tagihan Pembayaran + List Produk  --}}
               <div class="lg:hidden w-full flex flex-col gap-y-4" id="invoice-section">
                  @foreach ($cartItems as $item)
                     @php
                        // Retrieve the product details
                        $product = Produk::find($item->product_id);
                     @endphp
                     <div class="w-full flex flex-row h-fit px-3 py-4 border-[3px] border-[#8d334e71] relative"
                        data-id="{{ $item->id }}">
                        <div class="my-auto">
                           <img src="{{ asset('storage/' . $product->image) }}" class="w-[180px] h-[120px]  rounded-lg"
                              alt="Gambar Produk">
                        </div>
                        <div class="flex flex-col gap-y-5 mx-auto">
                           <h2 class="text-3xl font-bold mx-auto text-black">{{ $product->title }}</h2>
                           <span class="text-2xl font-light text-black mx-auto">{{ $product->harga }}</span>
                           <div class="flex flex-row items-center justify-center">
                              {{-- Tombol Kurangi Jumlah Produk --}}
                              <button class="substract">
                                 <svg class="w-[32px] h-[32px] text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                       stroke-width="2" d="M5 12h14" />
                                 </svg>
                              </button>
                              {{-- Jumlah Produk --}}
                              <div class="quantity flex mx-auto border-2 border-[#8d334e] items-center h-[24px] px-4"
                                 data-price="{{ $product->harga }}">
                                 {{ $item->quantity }}</div>
                              {{-- Tombol Tambah Jumlah Produk --}}
                              <button class="add">
                                 <svg class="w-[32px] h-[32px] text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                       stroke-width="2" d="M5 12h14m-7 7V5" />
                                 </svg>
                              </button>
                           </div>
                           <div class="absolute top-2 right-3">
                              {{-- Tombol Hapus Produk --}}
                              <button class="remove">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-11 h-11 text-red-600 hover:text-red-800"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                 </svg>
                              </button>
                           </div>
                           </a>
                        </div>
                     </div>
                  @endforeach
                  <div class="divider"></div>
                  <div class="flex flex-col gap-y-1">
                     <div class="flex flex-row">
                        @php
                           $totalPrice = 0;
                        @endphp
                        @foreach ($cartItems as $item)
                           @php
                              // Retrieve the product details
                              $product = Produk::find($item->product_id);

                              // Add the price of this item to the total price
                              $totalPrice += $product->harga * $item->quantity;
                           @endphp
                           <!-- ... -->
                        @endforeach
                        <h2 class="text-2xl font-semibold text-black basis-1/2">Total</h2>
                        <h2 class="text-2xl font-semibold text-black basis-1/4">Rp</h2>
                        <h2 id="total-price" class="text-2xl font-semibold text-black basis-1/4 ">Rp
                           {{ $totalPrice }}
                        </h2>
                     </div>
                  </div>
               </div>
               <div class="divider"></div>
               {{-- Sisi Bawah: Form Data Diri  --}}
               <div class="w-full">
                  <form action="{{ route('checkout.submit') }}" method="POST" class="w-full flex flex-col gap-y-4"
                     enctype="multipart/form-data">
                     @csrf
                     <label class="input  bg-[#8d334e31] flex items-center gap-2 h-[36px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill=""
                           class="w-4 h-4 opacity-70">
                           <path
                              d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                           <path
                              d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="w-full grow border-none font-bold text-[#2d2d2db8]" name="email"
                           value="{{ $user->email }}" readonly />
                     </label>
                     <label class="input bg-[#8d334e31] flex items-center gap-2 h-[36px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill=""
                           class="w-4 h-4 opacity-70">
                           <path
                              d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                           <path
                              d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="w-full grow border-none font-bold text-[#2d2d2db8]" name="nama"
                           value="{{ $user->name }}" readonly />
                     </label>
                     <label class="input bg-[#8d334e31] flex items-center gap-2 h-[36px]" for="telp">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill=""
                           class="w-4 h-4 opacity-70">
                           <path
                              d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                           <path
                              d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="w-full grow border-none" name="telp"
                           placeholder="No.telepon" />
                     </label>
                     <label class="input bg-[#8d334e31] flex items-center gap-2 h-[36px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill=""
                           class="w-4 h-4 opacity-70">
                           <path
                              d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                           <path
                              d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="w-full grow border-none" placeholder="Alamat" name="alamat" />
                     </label>

                     <textarea class="textarea textarea-bordered bg-[#8d334e31] h-[56px]" placeholder="Catatan" name="catatan"></textarea>
                     <button type="submit" class="flex items-center justify-center btn bg-[#D14D72] h-[40px] rounded-xl text-white w-[140px] mx-auto mt-4">
                        <span class="text-lg">Pesan</span>
                    </button>
                  </form>
               </div>
            </div>

         @endif
      </div>
   </section>

   {{-- SweetAlert Script --}}
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   @if ($errors->any())
      <script>
         Swal.fire({
            title: 'Pemesanan Gagal!',
            text: 'Lengkapi Data Diri Anda',
            icon: 'error',
            confirmButtonText: 'Tutup Pesan Ini'
         });
      </script>
   @endif
   <script>
      // Update the quantity of a cart item
      function updateQuantity(index, change) {
         var quantityElements = document.querySelectorAll('.quantity');
         var newQuantity = parseInt(quantityElements[index].textContent) + change;

         // Update the total price
         var price = parseInt(quantityElements[index].dataset.price);
         var totalPriceElement = document.getElementById('total-price');
         var totalPrice = parseInt(totalPriceElement.textContent.replace('Rp ', ''));

         // If the new quantity is 0 and the change is negative, subtract the price from the total price
         if (newQuantity === 0 && change < 0) {
            totalPrice += price * change;
         } else if (!(newQuantity < 0)) {
            // If the new quantity is not less than 0, add the price change to the total price
            totalPrice += price * change;
         }

         totalPriceElement.textContent = 'Rp ' + totalPrice;

         if (newQuantity < 0) {
            newQuantity = 0;
         }

         quantityElements[index].textContent = newQuantity;

         // If the new quantity is 0, delete the item
         if (newQuantity === 0) {
            deleteItem(index);
            return;
         }

         fetch('/cart-items/' + quantityElements[index].closest('.w-full').dataset.id + '/quantity', {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json',
               'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
               quantity: newQuantity
            })
         });
      }

      // Delete a cart item
      function deleteItem(index) {
         var removeButtons = document.querySelectorAll('.remove');
         var item = removeButtons[index].closest('.w-full');

         // Update the total price
         var quantityElement = document.querySelectorAll('.quantity')[index];
         var price = parseInt(quantityElement.dataset.price);
         var quantity = parseInt(quantityElement.textContent);
         var totalPriceElement = document.getElementById('total-price');
         var totalPrice = parseInt(totalPriceElement.textContent.replace('Rp ', ''));
         totalPrice -= price * quantity;
         totalPriceElement.textContent = 'Rp ' + totalPrice;

         fetch('/cart-items/' + item.dataset.id, {
            method: 'DELETE',
            headers: {
               'Content-Type': 'application/json',
               'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
         }).then(function(response) {
            if (response.ok) {
               // Remove the cart item from the DOM
               item.remove();
               console.log('Item removed. Number of .w-full elements in invoice section:', document.querySelectorAll(
                  '#invoice-section .w-full').length);
            }
         });
      }

      // Create a MutationObserver instance to watch for changes in the cart
      var observer = new MutationObserver(function(mutations) {
         mutations.forEach(function(mutation) {
            console.log('Mutation type:', mutation.type);
            console.log('Number of .w-full elements in invoice section:', document.querySelectorAll(
               '#invoice-section .w-full').length);

            // If an item was removed and there are no items left, reload the page
            if (mutation.type === 'childList' && document.querySelectorAll('#invoice-section .w-full')
               .length === 0) {
               console.log('No items left');
               location.reload();
            }
         });
      });
      // Start observing the cart for changes
      var cart = document.querySelector(
         '#invoice-section'); // Replace '#invoice-section' with the selector for your invoice section
      observer.observe(cart, {
         childList: true
      });

      // Attach event listeners to the subtract, add, and remove buttons
      document.querySelectorAll('.substract').forEach(function(button, index) {
         button.addEventListener('click', function() {
            updateQuantity(index, -1);
         });
      });

      document.querySelectorAll('.add').forEach(function(button, index) {
         button.addEventListener('click', function() {
            updateQuantity(index, 1);
         });
      });

      document.querySelectorAll('.remove').forEach(function(button, index) {
         button.addEventListener('click', function() {
            deleteItem(index);
         });
      });
   </script>
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
   </script>
@endsection
