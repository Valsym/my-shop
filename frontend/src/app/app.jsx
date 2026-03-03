import React, { useState, useEffect } from "react";
import ProductPage from "/src/product-page/product-page";
import Catalog from "/src/catalog/catalog";
import Layout from "/src/layout/layout";
import MainPage from "/src/main-page/main-page";
import { useGetProductsQuery } from '/src/features/products/productsApi';
import { useGetMainQuery } from '/src/features/main/mainApi';
import { useGetProductByCodeQuery } from '/src/features/products/productsApi';

import { BrowserRouter, Routes, Route, useParams } from "react-router-dom";

function ProducrOr404() {
  const { code } = useParams();
  const { data: product, isLoading, isError } = useGetProductByCodeQuery(code);

  if (isLoading) return <div>Загрузка...</div>;
  if (isError || !product) return <h1>404 страница не найдена</h1>;
  // console.log(product);

  return <ProductPage product={product} />;
}

export default function App() {
  const { data: products, isLoading: productsLoading, error: productsError } = useGetProductsQuery();
  const { data: mainData, isLoading: mainLoading, error: mainError } = useGetMainQuery();

  if (productsLoading || mainLoading) return <div>Загрузка...</div>;
  if (productsError || mainError) return <div>Ошибка загрузки</div>;

  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<MainPage data={mainData} />} />
          <Route path="catalog" element={<Catalog products={products} />} />
          <Route path="product">
            <Route
              path=":code"
              element={<ProducrOr404 />}
            />
          </Route>
        </Route>
      </Routes>
    </BrowserRouter>
  );
}
