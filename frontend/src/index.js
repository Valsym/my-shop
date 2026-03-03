import { createRoot } from "react-dom/client";

import { ThemeProvider } from "styled-components";
import { theme } from "./theme/defaultTheme";
import App from "./app/app";
import { Provider } from 'react-redux';
import { store } from './app/store';

const rootElement = createRoot(document.getElementById("root"));
rootElement.render(
  <ThemeProvider theme={theme}>
      <Provider store={store}>
          <App />
      </Provider>
  </ThemeProvider>
);
