import styled from "styled-components";

const Line = styled.hr`
  background: ${(props) => props.theme.buttonColor};
  height: 2px;
  border: 0;
`;

export default Line;
