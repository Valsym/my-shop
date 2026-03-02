import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

export const productsApi = createApi({
    reducerPath: 'productsApi',
    baseQuery: fetchBaseQuery({ baseUrl: '/api/' }), // если используете proxy, оставьте '/api/'
    endpoints: (builder) => ({
        getProducts: builder.query({
            query: () => 'products', // полный URL = baseUrl + 'products'
        }),
        // можно добавить другие endpoints: getProductById, createProduct и т.д.
    }),
});

// Экспортируем хуки для использования в компонентах
export const { useGetProductsQuery } = productsApi;
