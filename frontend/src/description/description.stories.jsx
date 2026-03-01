import React, { useState } from "react";
import Description from "./description";

export default {
  title: "Описание (Description)"
};

const Template = (args) => <Description {...args} />;

export const DefaultDescription = Template.bind({});

DefaultDescription.argTypes = { onShowMore: { action: "change" } };

DefaultDescription.args = {
  text:
    'Lorem Ipsum - это "текст-рыба", часто используемый в печати и веб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.',
  isShowAllDescription: false
};

const TemplateDescriptionChangeSize = (args) => {
  const [isShowAllText, setIsShowAllText] = useState(false);
  return (
    <Description
      text={isShowAllText ? args.text : args.text.slice(0, 250)}
      isShowAllDescription={isShowAllText}
      onShowMore={() => setIsShowAllText(!isShowAllText)}
    />
  );
};

export const DescriptionChangeSize = TemplateDescriptionChangeSize.bind({});

DescriptionChangeSize.args = {
  text:
    'Lorem Ipsum - это "текст-рыба", часто используемый в печати и веб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.'
};
