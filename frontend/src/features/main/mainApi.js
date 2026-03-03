import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

export const mainApi = createApi({
    reducerPath: 'mainApi',
    baseQuery: fetchBaseQuery({ baseUrl: '/api/' }),
    endpoints: (builder) => ({
        getMain: builder.query({
            query: () => 'main',
        }),
    }),
});

export const { useGetMainQuery } = mainApi;
