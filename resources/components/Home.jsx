import React from "react";

const Home = () => {
  return (
    <>
      <section className="home" id="home">
        <div className="flex flex-col w-3/4 gap-y-32 lg:w-1/2 lg:gap-y-8 lg:px-20" >
          <h3 className="text-8xl font-bold text-[#8D334E] ">
            Rumah Salad Faqiha
          </h3>
          <p className="text-xl text-[#8D334E]">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat
            labore, sint cupiditate distinctio tempora reiciendis.
          </p>
          <a href="#" className="btn bg-[#D14D72] rounded-xl w-[180px] mx-auto lg:mx-0">
            Pesan Sekarang!
          </a>
        </div>
      </section>
    </>
  );
};

export default Home;
