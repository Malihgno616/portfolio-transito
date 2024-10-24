import React from "react";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";

// import required modules
import { Navigation } from "swiper/modules";
import styles from "./style.module.scss";

// Imagens

import image1 from "../../assets/image/img-slider7.png";
import image2 from "../../assets/image/img-slider8.png";
import image3 from "../../assets/image/img-slider9.jpg";

export const Slide: React.FC = () => {
  return (
    <>
      <Swiper
        navigation={true}
        modules={[Navigation]}
        className={styles.mySwiper}
      >
        <SwiperSlide>
          <img src={image1} alt="Imagem 1" />
        </SwiperSlide>
        <SwiperSlide>
          <img src={image2} alt="Imagem 2" />
        </SwiperSlide>
        <SwiperSlide>
          <img src={image3} alt="Imagem 3" />
        </SwiperSlide>
      </Swiper>
    </>
  );
};
