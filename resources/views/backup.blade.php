
{{-- About --}}
<section class="about" id="about">
    {{-- {/* margin atas bawah */} --}}
    <div class="w-full text-center my-12">
       <h1 class="text-7xl capitalize font-bold">
          <span class="">about</span>
          &nbsp;
          <span class="">us</span>
       </h1>
 
    </div>
 
    <div class="flex flex-col lg:flex-row gap-y-12 lg:gap-x-4">
       <div class="flex">
          <img src="{{ asset('assets/images/about-img.jpeg') }}" alt=""
             class="rounded-2xl lg:h-[360px] lg:w-[550px]" />
       </div>
 
       <div class="basis-1/2 flex flex-col gap-y-6">
          <h3 class="text-6xl">what makes our food special?</h3>
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
 </section>
 
 {{-- Menu Salad --}}
 <section class="menu" id="menu">
    <div class="w-full text-center p-10">
       <h1 class="text-7xl capitalize font-bold">
          <span class="">Menu</span>
          &nbsp;
          <span class="">Salad</span>
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
 </section>
 
 {{-- Review --}}
 <section className="review px-2 " id="review">
    <div className="w-full text-center p-10">
       <h1 className="text-7xl capitalize font-bold">
          <span className="">Apa Kata</span>
          &nbsp;
          <span className="">Mereka?</span>
       </h1>
    </div>
 
    <div className="grid grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-3 lg:gap-y-24">
       <div className="flex rounded-xl mx-auto px-4 py-6 lg:w-[440px] lg:px-8 lg:py-16 bg-white">
          <div className="flex flex-col gap-y-8 lg:gap-y-5 mx-auto text-center ">
             <img src="{{ asset('assets/images/quote-img.png') }}" alt="" className="lg:w-16 mx-auto" />
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
 <section class="contact" id="contact">
    <div className="w-full text-center p-10">
       <h1 className="text-7xl capitalize font-bold">
          <span className="">Media</span>
          &nbsp;
          <span className="">Sosial</span>
       </h1>
    </div>
 
    <div className="flex flex-row">
       {{-- {/* gambar */} --}}
       <div className="">
 
       </div>
       {{-- {/* akun sosmed */} --}}
       <div className="">
 
       </div>
    </div>
 </section>
 
 
 {{-- Menu lain --}}
 <section className="lg:flex lg:flex-col lg:gap-y-9 px-2 lg:px-20" id="menu">
    <div className="w-full text-center p-10">
       <h1 className="text-7xl capitalize font-bold">
          <span className="">lain</span>
          &nbsp;
          <span className="">menu</span>
       </h1>
    </div>
 
    <div className="grid grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 lg:gap-y-24 ">
       <div className="flex rounded-xl mx-auto w-full lg:w-[440px] p-2 bg-white" key={index * Math.random()}>
          <div className="flex flex-col gap-y-5 mx-auto text-center  ">
             <img src={item.img} alt="" className="w-[120px] h-[120px] lg:mx-auto" />
             <h3 className="text-2xl text-black font-bold">tasty and healty</h3>
             <div className="">
                <span>20.99$</span>
             </div>
             <a href="#" className="btn rounded-full ">
                add to cart
             </a>
          </div>
       </div>
    </div>
 </section>

