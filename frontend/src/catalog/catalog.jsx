import React, { useState } from 'react';
import { useGetProductsQuery } from '/src/features/products/productsApi';

import { Image } from "/src/elements";
import Title from "/src/title/title";
import FullPrice from "/src/full-price/full-price";
import { List, ListItem, StyledLink } from "./styled";

export default function Catalog() {
// export default function Catalog({ products }) {
    // Состояние для текущей страницы
    const [page, setPage] = useState(1);

    // Используем хук с параметром page
    const { data, isLoading, isError, isFetching } = useGetProductsQuery(page);

    // Если данные ещё загружаются (первый запрос)
    if (isLoading) return <div>Загрузка каталога...</div>;
    if (isError) return <div>Ошибка загрузки товаров</div>;

    // Извлекаем данные из ответа
    const products = data?.items ?? [];
    const currentPage = data?.currentPage ?? 1;
    const lastPage = data?.lastPage ?? 1;

    // Обработчики для кнопок
    const goToPrevPage = () => {
        if (currentPage > 1) setPage(currentPage - 1);
    };

    const goToNextPage = () => {
        if (currentPage < lastPage) setPage(currentPage + 1);
    };


    return (
    <>
      <Title>Каталог</Title>
      <List>
        {products &&
          products.length &&
          products.map((product) => (
            <ListItem key={product.code}>
              <StyledLink to={`/product/${product.code}`}>
                <Image src={product.images[0]} />
                <h2>{product.name}</h2>
                <span>
                  <FullPrice
                    oldPrice={product.oldPrice}
                    price={product.price}
                  />
                </span>
              </StyledLink>
            </ListItem>
          ))}
      </List>

      {/* Элементы пагинации */}
      <div className="pagination">
          <button onClick={goToPrevPage} disabled={currentPage === 1 || isFetching}>
              Предыдущая
          </button>

          {/* Информация о странице */}
          <span>
          Страница {currentPage} из {lastPage}
        </span>

          <button onClick={goToNextPage} disabled={currentPage === lastPage || isFetching}>
              Следующая
          </button>
      </div>

      {/* Индикатор загрузки при переходе на другую страницу */}
      {isFetching && <div>Загрузка...</div>}
    {/*</div>*/}

</>
  );
}
