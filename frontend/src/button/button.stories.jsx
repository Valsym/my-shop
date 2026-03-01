import React from "react";
import Button from "./button";

export default {
    title: 'Кнопка (Button)',
}
const Template = (args) => <Button {...args} />;

export const LargeButton  = Template.bind({});

LargeButton.args = {
    children: 'Большая кнопка',
    size: 'large',
}

LargeButton.argTypes = { onClick: { action: 'clicked' } }

LargeButton.argTypes = { onClick: { action: 'clicked' } }

export const MediumButton  = Template.bind({});

MediumButton.args = {
    children: 'Средняя кнопка',
    size: 'medium',
}

MediumButton.argTypes = { onClick: { action: 'clicked' } }

export const SmallButton  = Template.bind({});

SmallButton.args = {
    children: 'Маленькая кнопка',
    size: 'small',
}


