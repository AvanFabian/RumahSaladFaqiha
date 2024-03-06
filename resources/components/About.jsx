import React from "react";
import AboutImg from "@/Components/Assets/images/about-img.jpeg";
const About = () => {
  return (
    <>
      <section className="about" id="about">
        {/* margin atas bawah */}
        <div className="w-full text-center my-12"> 
          <h1 className="text-7xl capitalize font-bold">
            <span className="">about</span>
            &nbsp;
            <span className="">us</span>
          </h1>

        </div>

        <div className="flex flex-col lg:flex-row gap-y-12 lg:gap-x-4">
          <div className="flex">
            <img src={AboutImg} alt="" className="rounded-2xl lg:h-[360px] lg:w-[550px]" />
          </div>

          <div className="basis-1/2 flex flex-col gap-y-6">
            <h3 className="text-6xl">what makes our food special?</h3>
            <div className="flex lg:w-[590px]">
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
    </>
  );
};

export default About;
