import { configureStore } from '@reduxjs/toolkit';
import { productsApi } from '../features/products/productsApi';
import { mainApi } from '../features/main/mainApi';

export const store = configureStore({
    reducer: {
        [productsApi.reducerPath]: productsApi.reducer,
        [mainApi.reducerPath]: mainApi.reducer,
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware().concat(productsApi.middleware, mainApi.middleware),
});
