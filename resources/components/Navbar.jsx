import React, { useRef } from "react";
import Logo from "@/Components/Assets/images/logo.png";
import { cart } from "@/Components/utils/Data";
import { FaSearch, FaShoppingCart, FaBars, FaTimes, FaAlignJustify  } from "react-icons/fa";

const transition = "transition transition-all duration-300 ease-in-out";

const Navbar = ({ auth }) => {
  const navbarRef = useRef();
  const searchRef = useRef();
  const cartRef = useRef();

  // mendapatkan CSRF Token
  function getCsrfToken() {
    let tokenElement = document.querySelector('meta[name="csrf-token"]');
    return tokenElement ? tokenElement.content : '';
  }

  const navbarHandler = () => {
    navbarRef.current.classList.toggle("active");
    searchRef.current.classList.remove("active");
    cartRef.current.classList.remove("active");
  };

  return (
    <>
      <header className="header">
        <a href="#" className="logo">
          <img src={Logo} alt="" />
        </a>
        {/* Ini NAVBAR */}
        <nav className={`${transition}`} ref={navbarRef}>
          {/* menu tampilan dekstop */}
          <div className="hidden lg:flex lg:flex-row lg:text-white lg:gap-12">
            <a href="#home" className="uppercase hover:text-[#ffc107]">home</a>
            <a href="#about" className="uppercase hover:text-[#ffc107]">about</a>
            <a href="#menu" className="uppercase hover:text-[#ffc107]">menu</a>
            <a href="#products" className="uppercase hover:text-[#ffc107]">products</a>
            <a href="#review" className="uppercase hover:text-[#ffc107]">review</a>
          </div>
          {/* menu tampilan mobile */}
          <div className="lg:hidden">
            <div className="drawer drawer-end">
              <input id="my-drawer-4" type="checkbox" className="drawer-toggle" />
              <div className="drawer-content ">
                {/* Page content here */}
                <label htmlFor="my-drawer-4" className="w-[35px] drawer-button btn btn-primary">
                  <FaAlignJustify className="text-[16px]" />
                </label>
              </div>
              <div className="drawer-side">
                <label htmlFor="my-drawer-4" aria-label="close sidebar" className="drawer-overlay"></label>
                <ul className="menu p-4 w-80 min-h-full bg-base-200 text-base-content">
                  {/* Sidebar content here */}
                  <li><a className="">Sidebar Item 1</a></li>
                  <li><a>Sidebar Item 2</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>

        {/* icon navbar untuk screen dekstop */}
        <div className="hidden lg:flex lg:flex-row lg:gap-11">

          <div className="drawer drawer-end">
            <input id="my-drawer-4" type="checkbox" className="drawer-toggle" />
            <div className="drawer-content my-auto">
              {/* Page content here */}
              <label htmlFor="my-drawer-4" className="drawer-button" >
                <FaShoppingCart className="w-8 h-8 text-white hover:text-[#ffc107]" />
              </label>
            </div>
            <div className="drawer-side">
              <label htmlFor="my-drawer-4" aria-label="close sidebar" className="drawer-overlay"></label>
              <ul className="menu p-4 w-[390px] gap-y-5 min-h-full bg-[#020202] text-base-content">
                {/* Sidebar content here */}
                {cart.map((item, index) => (
                  <div className="cart-item gap-x-5  flex flex-row" key={index * Math.random()}>
                    <div className="cursor-pointer basis-1/7"><FaTimes /></div>
                    <img src={item.img} alt="" className="basis-1/3" />
                    <div className="text-[#f6f6f6] basis-1/2">
                      <h3>cart item 01</h3>
                      <div className="price">$15.99/-</div>
                    </div>
                  </div>
                ))}
                <a href="#" className="btn text-[#0f0e0e] bg-white mx-auto w-1/2">
                  checkout now
                </a>
              </ul>
            </div>
          </div>

          <div
            id="menu-btn"
            className="w-fit text-white cursor-pointer"
            onClick={navbarHandler}
          ><FaBars className="w-8 h-8 hover:text-[#ffc107]" /></div>

          {auth.user ? (
            <form action="/auth/google/logout" method="POST">
              <input type="hidden" name="_token" value={getCsrfToken()} />
              <button type="submit" className="btn hover:bg-[#b9b8b8] uppercase font-bold lg:px-7 text-[#020202] bg-white rounded-2xl">
                Logout&nbsp;
              </button>
            </form>
          ) : (
            <a className="btn hover:bg-[#b9b8b8] uppercase font-bold lg:px-7 text-[#020202] bg-white rounded-2xl" href='/auth/google/redirect'>
              Login
            </a>
          )}
        </div>
      </header>
    </>
  );
};

export default Navbar;
