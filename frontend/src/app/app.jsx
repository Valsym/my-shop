import React, { useState, useEffect } from "react";// стало
//import React from "react"; // было
//import { products, main } from "/src/mock"; // стало
import ProductPage from "/src/product-page/product-page";
import Catalog from "/src/catalog/catalog";
import Layout from "/src/layout/layout";
import MainPage from "/src/main-page/main-page";

import { BrowserRouter, Routes, Route, useParams } from "react-router-dom";

function ProducrOr404({ products }) {
  const { code } = useParams();
  const product = products.find((product) => product.code.toString() === code);
  return product ? (
    <ProductPage product={product} />
  ) : (
    <h1>404 страница не найдена</h1>
  );
}

export default function App() {
  // стало:
  const [products, setProducts] = useState([]);
  const [main, setMainData] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        // Одновременно запрашиваем товары и данные главной страницы
        const [productsRes, mainRes] = await Promise.all([
          fetch('/api/products'),
          fetch('/api/main')
        ]);
        if (!productsRes.ok) throw new Error('Ошибка загрузки товаров');
        if (!mainRes.ok) throw new Error('Ошибка загрузки главной');

        const productsData = await productsRes.json();
        const mainData = await mainRes.json();
        setProducts(productsData);
        setMainData(mainData);
      } catch (error) {
        console.error('Ошибка загрузки данных:', error);
        // Можно установить заглушки или показать сообщение
        // Устанавливаем заглушки, чтобы интерфейс не падал
        setMainData({
          text: 'Не удалось загрузить данные',
          images: []
        });
        setProducts([]);
      } finally {
        setLoading(false);
      }
    };
    fetchData();
  }, []);

  if (loading) return <div>Загрузка...</div>;

  // было / осталось
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<MainPage data={main} />} />
          <Route path="catalog" element={<Catalog products={products} />} />
          <Route path="product">
            <Route
              path=":code"
              element={<ProducrOr404 products={products} />}
            />
          </Route>
        </Route>
      </Routes>
    </BrowserRouter>
  );
}
