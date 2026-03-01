import React, { useState } from "react";
import Description from "/src/description/description";
import Line from "/src/line/line";
import { StyledTitle, DescriptionWrapper, StyledSlider } from "./styled";

export default function MainPage({ data }) {
  const [showAll, setShowAll] = useState(false);
  return (
    <>
      <StyledTitle>Магазин 3D принтеров</StyledTitle>
      <Line />
      <StyledSlider images={data.images} width={500} height={281} />
      <Line />
      <DescriptionWrapper>
        <Description
          text={showAll ? data.text : data.text.slice(0, 200)}
          isShowAllDescription={showAll}
          onShowMore={() => setShowAll(!showAll)}
        />
      </DescriptionWrapper>
    </>
  );
}
