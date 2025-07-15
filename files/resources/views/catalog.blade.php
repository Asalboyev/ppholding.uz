@extends('layouts.web')

@section('content')

    <main class="catalog-page">
        <div class="main-section">
            <div class="container">
                <h1 class="main-section__title ro-bold">{{ translation('catalog.product_catalog') }}</h1>
                <div class="main-section__img">
                    <img src="{{ asset('images/catalog.png') }}" alt="">
                </div>
            </div>
        </div>
        @foreach($catalog as $item)
        <div class="product-banner">
            <div class="container">
                <div class="product-banner__inner">
                    <div class="product-banner__info">
                        <p class="product-banner__subtitle">{{ translation('products') }}</p>
                        <h5 class="product-banner__title ro-bold">{{ isset($item->title[$lang]) ? $item->title[$lang] : $item->title['ru'] }}</h5>
                        <a href="{{ route('catalog-inner', ['id' => $item->id]) }}" class="button button--white product-banner__btn ro-bold">{{ translation('catalog.show_all_products') }}</a>
                    </div>
                    <div class="product-banner__img">
                        <img src="{{ asset('images/product-banner.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="slider">
            <div class="container">
                <div class="slider__inner">
                    <div class="swiper-wrapper">
                        @foreach($item->products as $product)
                        <div class="product-card swiper-slide">
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                <div class="product-card__img">
                                    <img src="{{ asset($product->main_img) }}" alt="">
                                </div>
                                <p class="product-card__title ro-bold">{{ isset($product->title[$lang]) ? $product->title[$lang] : $product->title['ru'] }}</p>
                                <p class="product-card__subtitle">{{ translation('vendor_code') }} {{ $product->vendor_code }}</p>
                            </a>
                        </div>
                        @endforeach
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-2.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-2.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
                    </div>
                    <div class="slider-button-next">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.503906 0.569946L6.93391 6.99995L0.503906 13.4299" stroke="#050505" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="slider-button-prev">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.49597 0.569946L1.06597 6.99995L7.49597 13.4299" stroke="#050505" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

{{--        <div class="products">--}}
{{--            <div class="container">--}}
{{--                <div class="products__inner">--}}
{{--                    <div class="products__left">--}}
{{--                        <div class="products__left-img">--}}
{{--                            <img src="{{ asset('images/product-1.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="products__left-info">--}}
{{--                            <p class="products__left-subtitle">Продукция</p>--}}
{{--                            <p class="products__left-title ro-bold">Флаконы</p>--}}
{{--                            <button class="button products__btn ro-bold">Показать все продукции</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="products__right">--}}
{{--                        <div class="products__right-item product-card">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="products__right-item product-card">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-2.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="products__right-item product-card">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="products__right-item product-card">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-banner">--}}
{{--            <div class="container">--}}
{{--                <div class="product-banner__inner">--}}
{{--                    <div class="product-banner__info">--}}
{{--                        <p class="product-banner__subtitle">Продукция</p>--}}
{{--                        <h5 class="product-banner__title ro-bold">Флаконы</h5>--}}
{{--                        <button class="button button--white product-banner__btn ro-bold">Показать все продукции</button>--}}
{{--                    </div>--}}
{{--                    <div class="product-banner__img">--}}
{{--                        <img src="{{ asset('images/product-banner.png') }}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="slider">--}}
{{--            <div class="container">--}}
{{--                <div class="slider__inner">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-2.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-1.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-2.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                        <div class="product-card swiper-slide">--}}
{{--                            <div class="product-card__img">--}}
{{--                                <img src="{{ asset('images/product-3.jpg') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <p class="product-card__title ro-bold">Флакон "Мика-5"</p>--}}
{{--                            <p class="product-card__subtitle">Артикул: 06.009</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="slider-button-next">--}}
{{--                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M0.503906 0.569946L6.93391 6.99995L0.503906 13.4299" stroke="#050505" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="slider-button-prev">--}}
{{--                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M7.49597 0.569946L1.06597 6.99995L7.49597 13.4299" stroke="#050505" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </main>

@endsection

@section('scripts')
    <script src="{{ asset('js/libs.min.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection
