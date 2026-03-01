import React from "react";
import Code from "./code";

export default {
  title: "Артикул (Code)"
};
const Template = (args) => <Code {...args} />;

export const defaultArticle = Template.bind({});

defaultArticle.args = {
  children: "3432343"
};
