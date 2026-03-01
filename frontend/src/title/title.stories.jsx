import React from "react";
import Title from "./title";

export default {
    title: 'Заголовок (Title)',
}

const Template = (args) => <Title {...args} />;

export const DefaultTitle  = Template.bind({});

DefaultTitle.args = {
    children: 'Заголовок',
    small: false,
}

export const SmallTitle  = Template.bind({});

SmallTitle.args = {
    small: true,
    children: 'Заголовок'
}
