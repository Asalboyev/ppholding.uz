@extends('layouts.web')

@section('content')

    <main class="catalog-inner-page">
        <div class="main-section">
            <div class="container">
                <div class="main-section__img">
                    <img src="{{ asset($catalog->img) }}" alt="">
                </div>
                <h1 class="main-section__title ro-bold">{{ isset($catalog->title[$lang]) ? $catalog->title[$lang] : $catalog->title['ru'] }}</h1>
            </div>
        </div>

        <div class="catalog-cards">
            <div class="container">
                <div class="catalog-cards__inner">
                    @foreach($all as $item)
                        <div class="catalog-card">
                            <div class="catalog-card__top">
                                <div class="catalog-card__top-left">
                                    <p class="catalog-card__subtitle">{{ translation('products') }}</p>
                                    <p class="catalog-card__title ro-bold">{{ isset($item->title[$lang]) ? $item->title[$lang] : $item->title['ru'] }}</p>
                                </div>
                                <div class="catalo-card__logo">
                                    <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.8448 12.4646C10.8448 13.6325 10.3581 14.6336 9.37793 15.4747C8.39773 16.309 7.21592 16.7261 5.82562 16.7261H4.37961V28.4468H5.42242V29.1976H0V28.4468H1.04273V0.750801H0V0H5.8325C7.2159 0 8.39773 0.417096 9.37793 1.2514C10.3581 2.0925 10.8448 3.09359 10.8448 4.26149V12.4646ZM7.50793 14.2999V2.4262C7.50793 1.9604 7.34114 1.5642 7.01434 1.2375C6.68764 0.9107 6.2913 0.750801 5.8325 0.750801H4.37961V15.9753H5.8325C6.2913 15.9753 6.68764 15.8154 7.01434 15.4887C7.34114 15.1619 7.50793 14.7657 7.50793 14.2999ZM23.1495 12.4646C23.1495 13.6325 22.6628 14.6336 21.6826 15.4747C20.7024 16.309 19.5206 16.7261 18.1303 16.7261H16.6843V28.4468H17.7271V29.1976H12.3047V28.4468H13.3474V0.750801H12.3047V0H18.1372C19.5206 0 20.7024 0.417096 21.6826 1.2514C22.6628 2.0925 23.1495 3.09359 23.1495 4.26149V12.4646ZM19.8126 14.2999V2.4262C19.8126 1.9604 19.6458 1.5642 19.319 1.2375C18.9923 0.9107 18.596 0.750801 18.1372 0.750801H16.6843V15.9753H18.1372C18.596 15.9753 18.9923 15.8154 19.319 15.4887C19.6458 15.1619 19.8126 14.7657 19.8126 14.2999ZM36.7055 29.1976H31.2831V28.4468H32.3259V14.14H28.989V28.4468H30.0318V29.1976H24.6094V28.4468H25.6521V0.750801H24.6094V0H30.0318V0.750801H28.989V13.3892H32.3259V0.750801H31.2831V0H36.7055V0.750801H35.6627V28.4468H36.7055V29.1976Z" fill="#2E57EA"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="catalog-card__img">
                                <img src="{{ asset($item->img) }}" alt="">
                            </div>
                            <p class="catalog-card__bg-text ro-bold">{{ isset($item->title[$lang]) ? $item->title[$lang] : $item->title['ru'] }}</p>
                            <a href="{{ route('catalog-inner', ['id' => $item->id]) }}" class="catalog-card__link">{{ count($item->products) }} {{ translation('copies') }}</a>
                        </div>
                    @endforeach
                    {{--                    <div class="catalog-card">--}}
                    {{--                        <div class="catalog-card__top">--}}
                    {{--                            <div class="catalog-card__top-left">--}}
                    {{--                                <p class="catalog-card__subtitle">Продукция</p>--}}
                    {{--                                <p class="catalog-card__title ro-bold">Флаконы</p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="catalo-card__logo">--}}
                    {{--                                <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                                    <path d="M10.8448 12.4646C10.8448 13.6325 10.3581 14.6336 9.37793 15.4747C8.39773 16.309 7.21592 16.7261 5.82562 16.7261H4.37961V28.4468H5.42242V29.1976H0V28.4468H1.04273V0.750801H0V0H5.8325C7.2159 0 8.39773 0.417096 9.37793 1.2514C10.3581 2.0925 10.8448 3.09359 10.8448 4.26149V12.4646ZM7.50793 14.2999V2.4262C7.50793 1.9604 7.34114 1.5642 7.01434 1.2375C6.68764 0.9107 6.2913 0.750801 5.8325 0.750801H4.37961V15.9753H5.8325C6.2913 15.9753 6.68764 15.8154 7.01434 15.4887C7.34114 15.1619 7.50793 14.7657 7.50793 14.2999ZM23.1495 12.4646C23.1495 13.6325 22.6628 14.6336 21.6826 15.4747C20.7024 16.309 19.5206 16.7261 18.1303 16.7261H16.6843V28.4468H17.7271V29.1976H12.3047V28.4468H13.3474V0.750801H12.3047V0H18.1372C19.5206 0 20.7024 0.417096 21.6826 1.2514C22.6628 2.0925 23.1495 3.09359 23.1495 4.26149V12.4646ZM19.8126 14.2999V2.4262C19.8126 1.9604 19.6458 1.5642 19.319 1.2375C18.9923 0.9107 18.596 0.750801 18.1372 0.750801H16.6843V15.9753H18.1372C18.596 15.9753 18.9923 15.8154 19.319 15.4887C19.6458 15.1619 19.8126 14.7657 19.8126 14.2999ZM36.7055 29.1976H31.2831V28.4468H32.3259V14.14H28.989V28.4468H30.0318V29.1976H24.6094V28.4468H25.6521V0.750801H24.6094V0H30.0318V0.750801H28.989V13.3892H32.3259V0.750801H31.2831V0H36.7055V0.750801H35.6627V28.4468H36.7055V29.1976Z" fill="#2E57EA"/>--}}
                    {{--                                </svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="catalog-card__img">--}}
                    {{--                            <img src="{{ asset('images/catalog-card.png') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="catalog-card__bg-text ro-bold">Флаконы</p>--}}
                    {{--                        <a href="#" class="catalog-card__link">56 экземпляров</a>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="catalog-card">--}}
                    {{--                        <div class="catalog-card__top">--}}
                    {{--                            <div class="catalog-card__top-left">--}}
                    {{--                                <p class="catalog-card__subtitle">Продукция</p>--}}
                    {{--                                <p class="catalog-card__title ro-bold">Флаконы</p>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="catalo-card__logo">--}}
                    {{--                                <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                                    <path d="M10.8448 12.4646C10.8448 13.6325 10.3581 14.6336 9.37793 15.4747C8.39773 16.309 7.21592 16.7261 5.82562 16.7261H4.37961V28.4468H5.42242V29.1976H0V28.4468H1.04273V0.750801H0V0H5.8325C7.2159 0 8.39773 0.417096 9.37793 1.2514C10.3581 2.0925 10.8448 3.09359 10.8448 4.26149V12.4646ZM7.50793 14.2999V2.4262C7.50793 1.9604 7.34114 1.5642 7.01434 1.2375C6.68764 0.9107 6.2913 0.750801 5.8325 0.750801H4.37961V15.9753H5.8325C6.2913 15.9753 6.68764 15.8154 7.01434 15.4887C7.34114 15.1619 7.50793 14.7657 7.50793 14.2999ZM23.1495 12.4646C23.1495 13.6325 22.6628 14.6336 21.6826 15.4747C20.7024 16.309 19.5206 16.7261 18.1303 16.7261H16.6843V28.4468H17.7271V29.1976H12.3047V28.4468H13.3474V0.750801H12.3047V0H18.1372C19.5206 0 20.7024 0.417096 21.6826 1.2514C22.6628 2.0925 23.1495 3.09359 23.1495 4.26149V12.4646ZM19.8126 14.2999V2.4262C19.8126 1.9604 19.6458 1.5642 19.319 1.2375C18.9923 0.9107 18.596 0.750801 18.1372 0.750801H16.6843V15.9753H18.1372C18.596 15.9753 18.9923 15.8154 19.319 15.4887C19.6458 15.1619 19.8126 14.7657 19.8126 14.2999ZM36.7055 29.1976H31.2831V28.4468H32.3259V14.14H28.989V28.4468H30.0318V29.1976H24.6094V28.4468H25.6521V0.750801H24.6094V0H30.0318V0.750801H28.989V13.3892H32.3259V0.750801H31.2831V0H36.7055V0.750801H35.6627V28.4468H36.7055V29.1976Z" fill="#2E57EA"/>--}}
                    {{--                                </svg>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="catalog-card__img">--}}
                    {{--                            <img src="{{ asset('images/catalog-card.png') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="catalog-card__bg-text ro-bold">Флаконы</p>--}}
                    {{--                        <a href="#" class="catalog-card__link">56 экземпляров</a>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="catalog-header">
            <div class="container">
                <div class="catalog-header__inner">
                    <div class="catalog-header__title">
                        <span class="ro-bold">{{ isset($catalog->title[$lang]) ? $catalog->title[$lang] : $catalog->title['ru'] }}</span>
                        {{ translation('shown') }} {{ count($catalog->products) }} {{ translation('products2') }}
                    </div>
{{--                    <a href="{{ route('catalog-all', ['id' => $catalog->id]) }}" class="button button--white catalog-header__btn ro-regular">Показать все продукции</a>--}}
                </div>
            </div>
        </div>

        <div class="products">
            <div class="container">
                <div class="products__inner">
                    @foreach($catalog->products as $product)
                        <div class="products__card product-card">
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                <div class="product-card__img">
                                    <img src="{{ asset($product->main_img) }}" alt="">
                                </div>
                                <p class="product-card__title ro-bold">{{ isset($product->title[$lang]) ? $product->title[$lang] : $product->title['ru'] }}</p>
                                <p class="product-card__subtitle">{{ translation('vendor_code') }} {{ $product->vendor_code }}</p>
                            </a>
                        </div>
                    @endforeach
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-2.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="products__card product-card">--}}
                    {{--                        <div class="product-card__img">--}}
                    {{--                            <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
                    {{--                        <p class="product-card__subtitle">Артикул: 06.009</p>--}}
                    {{--                    </div>--}}
                </div>
{{--                <ul class="pagination">--}}
{{--                    <li>--}}
{{--                        <a class="pagination-item ro-medium" href="#">1</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="pagination-item pagination-item--active ro-medium" href="#">2</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="pagination-item ro-medium" href="#">3</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="pagination-item ro-medium" href="#">4</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="pagination-item ro-medium" href="#">5</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </main>

@endsection
