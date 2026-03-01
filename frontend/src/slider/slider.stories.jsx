import React from "react";
import Slider  from "./slider";
import { products } from '/src/mock'

export default {
    title: 'Слайдер (Slider)'
}
const Template = (args) => <Slider {...args} />;

export const ProductSlider  = Template.bind({});

ProductSlider.args = {
    images: products[0].images,
    width: 200,
    height: 257,
}
