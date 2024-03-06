import React from "react";
import { menu } from "@/Components/utils/Data";
const Menu = () => {
  return (
    <>
      <section className="menu" id="menu">
        <div className="w-full text-center p-10">
          <h1 className="text-7xl capitalize font-bold">
            <span className="">our</span>
            &nbsp;
            <span className="">menu</span>
          </h1>
        </div>

        <div className="grid grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 lg:gap-y-24">
          {menu.map((item, index) => (
            <div className="flex rounded-xl mx-auto w-full lg:w-[440px] p-2 bg-white" key={index * Math.random()}>
              <div className="flex flex-col gap-y-5 mx-auto text-center ">
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
          ))}
        </div>
      </section>
    </>
  );
};

export default Menu;
