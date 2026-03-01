import React, {useState} from "react";
import Counter from "./counter";

export default {
    title: 'Счётчик (Counter)',
}

const Template = (args) => <Counter {...args} />;

export const defaultCounter  = Template.bind({});

defaultCounter.argTypes = { onChange: { action: 'change' } }

defaultCounter.args = {
    className: 'css-class',
    value: 5,
    minValue: 0,
}

const TemplateWorkCounter = (args) => {
  const [value, setValue] = useState(args.value || 0);
  return <Counter {...args} value={value} onChange={setValue} />
};

export const WorkCounter  = TemplateWorkCounter.bind({});

WorkCounter.args = {
    value: 3,
    minValue: 0,
}
