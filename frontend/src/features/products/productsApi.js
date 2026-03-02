import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

export const productsApi = createApi({
    reducerPath: 'productsApi',
    baseQuery: fetchBaseQuery({ baseUrl: '/api/' }), // если используете proxy, оставьте '/api/'
    endpoints: (builder) => ({
        getProducts: builder.query({
            // Пагинация
            query: (page = 1) => `products?page=${page}`,
            // Извлекаем только массив товаров
            transformResponse: (response) => response.data,

            // query: () => 'products', // полный URL = baseUrl + 'products'
        }),
        // можно добавить другие endpoints: getProductById, createProduct и т.д.
    }),
});

// Экспортируем хуки для использования в компонентах
export const { useGetProductsQuery } = productsApi;
