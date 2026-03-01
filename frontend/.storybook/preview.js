import { ThemeProvider } from "styled-components";
import { theme } from "/src/theme/defaultTheme";

export const decorators = [
  Story => (
      <ThemeProvider theme={theme}>
        <Story />
      </ThemeProvider>
  )
];
export const parameters = {
  actions: { argTypesRegex: "^on[A-Z].*" },
  controls: {
    matchers: {
      color: /(background|color)$/i,
      date: /Date$/,
    },
  },
}
