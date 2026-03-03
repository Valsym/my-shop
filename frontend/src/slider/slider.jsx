import React, { useRef } from "react";
import { SwiperSlide } from "swiper/react";
import "swiper/swiper.scss";
import SwiperCore, { Navigation } from "swiper";
import { Image } from "/src/elements";
import { StyledWrapper, StyledButton, StyledSlider } from "./styled";

// const placeholderSVG = (text, bgColor = '#ccc', textColor = '#333', width = 200, height = 267) => {
//     return `data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='${width}' height='${height}' viewBox='0 0 ${width} ${height}'%3E%3Crect width='${width}' height='${height}' fill='${bgColor.replace('#', '%23')}' /%3E%3Ctext x='50%25' y='50%25' font-size='20' text-anchor='middle' dy='.3em' fill='${textColor.replace('#', '%23')}'%3E${encodeURIComponent(text)}%3C/text%3E%3C/svg%3E`;
// };
const productImages = [
    //'/img/1.png', '/img/2.jpg', '/img/3.jpg',
    '/img/4.png', '/img/5.png',
    '/img/6.png', '/img/7.png', '/img/8.png', '/img/9.png', '/img/10.png',
    '/img/11.png', '/img/12.png',
];

function getThreeAfter(arr, target) {
    const index = arr.indexOf(target);
    if (index === -1) return []; // элемент не найден
    if (index + 2 > arr.length) return arr.slice(index + 1); // меньше трёх — берём, что есть
    return arr.slice(index, index + 2); // три элемента после target
}

function Slider({ images, code, width= 200, height= 257 }) {
  SwiperCore.use([Navigation]);
  const navigationPrevRef = useRef(null);
  const navigationNextRef = useRef(null);
  const target = productImages[code % productImages.length];
  const imgs = (images && images.length) ? images :
      getThreeAfter(productImages, target);

  // console.log(code, target, imgs);

  return (
    <StyledWrapper width={width}>
      <StyledButton left ref={navigationPrevRef} title="Назад">
        &lt;
      </StyledButton>
      <StyledButton right ref={navigationNextRef} title="Вперёд">
        &gt;
      </StyledButton>
      <StyledSlider
        width={width}
        height={height}
        onBeforeInit={(swiper) => {
          swiper.params.navigation.prevEl = navigationPrevRef.current;
          swiper.params.navigation.nextEl = navigationNextRef.current;
        }}
        navigation={{
          prevEl: navigationPrevRef.current,
          nextEl: navigationNextRef.current
        }}
        freeMode
        watchSlidesProgress
        slidesPerView={1}
        loop
      >
          {imgs.map((image) => (
            <SwiperSlide key={image}>
              <Image
                  src={image}
                  //alt={name}
                  // alt={product.name}
                // src={image}
                 alt="изображение продукта"
                height={height}
                maxWidth={width}
              />
            </SwiperSlide>
          ))}
      </StyledSlider>
    </StyledWrapper>
  );
}

export default Slider;
