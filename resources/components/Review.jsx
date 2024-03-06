import React from "react";
import { review, product } from "@/Components/utils/Data";
import qouteImg from "@/Components/Assets/images/quote-img.png";
const Review = () => {
  return (
    <>
      <section className="review px-2 " id="review">
        <div className="w-full text-center p-10">
          <h1 className="text-7xl capitalize font-bold">
            <span className="">review</span>
            &nbsp;
            <span className="">cust</span>
          </h1>
        </div>

        <div className="grid grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-3 lg:gap-y-24">
          {review.map((item, index) => (
            <div className="flex rounded-xl mx-auto px-4 py-6 lg:w-[440px] lg:px-8 lg:py-16 bg-white" key={index * Math.random()}>
              <div className="flex flex-col gap-y-8 lg:gap-y-5 mx-auto text-center ">
                <img src={qouteImg} alt="" className="lg:w-16 mx-auto" />
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                  nulla sit libero nemo fuga sequi nobis? Necessitatibus aut
                  laborum, nisi quas eaque laudantium consequuntur iste ex aliquam
                  minus vel? Nemo.
                </p>
                <h3>john deo</h3>
              </div>
            </div>
          ))}

        </div>
      </section>
    </>
  );
};

export default Review;
