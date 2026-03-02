import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

export const productsApi = createApi({
    reducerPath: 'productsApi',
    baseQuery: fetchBaseQuery({ baseUrl: '/api/' }), // если используете proxy, оставьте '/api/'
    endpoints: (builder) => ({
        getProducts: builder.query({
            // Пагинация
            query: (page = 1) => `products?page=${page}`,
            // Трансформируем ответ: извлекаем товары и пагинацию
            transformResponse: (response) => ({
                items: response.data,                // массив товаров
                total: response.meta.total,           // всего товаров
                perPage: response.meta.per_page,      // товаров на странице
                currentPage: response.meta.current_page, // текущая страница
                lastPage: response.meta.last_page,    // последняя страница
                from: response.meta.from,              // первый элемент на странице
                to: response.meta.to,                   // последний элемент на странице
            }),

            // Извлекаем только массив товаров
            // transformResponse: (response) => response.data,

            // query: () => 'products', // полный URL = baseUrl + 'products'
        }),
        // можно добавить другие endpoints: getProductById, createProduct и т.д.
        // getProductByCode: builder.query({
        //     query: (code) => `products/${code}`,
        // }),
    }),
});

// Экспортируем хуки для использования в компонентах
export const { useGetProductsQuery, useGetProductByCodeQuery } = productsApi;
