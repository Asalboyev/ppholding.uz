@extends('layouts.web')

@section('content')

    <main class="product-inner-page">
        <div class="product-inner__slider">
            <div class="product-inner__slider-inner">
                <div class="swiper-wrapper">
                    <div class="product-card__img">
                        <img src="{{ asset($product->main_img) }}" alt="">
                    </div>
{{--                    <div class="product-inner__slider-item swiper-slide">--}}
{{--                        <img src="{{ asset('images/product-inner-2.jpg') }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="product-inner__slider-item swiper-slide">--}}
{{--                        <img src="{{ asset('images/product-inner-2.jpg') }}" alt="">--}}
{{--                    </div>--}}
                </div>
{{--                <div class="product-inner__slider-button-next">--}}
{{--                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M0.503906 0.569946L6.93391 6.99995L0.503906 13.4299" stroke="#050505" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div class="product-inner__slider-button-prev">--}}
{{--                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M7.49597 0.569946L1.06597 6.99995L7.49597 13.4299" stroke="#050505" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
            </div>
        </div>

        <div class="info">
            <div class="container">
                <h2 class="info__title ro-bold">{{ isset($product->title[$lang]) ? $product->title[$lang] : $product->title['ru'] }}</h2>

                <p class="info__text">{!! isset($product->desc[$lang]) ? $product->desc[$lang] : $product->desc['ru'] !!}</p>
            </div>
        </div>

        <div class="slider">
            <div class="container">
                <div class="slider__inner">
                    <div class="swiper-wrapper">
                        @foreach($other as $product)
                        <div class="product-card swiper-slide">
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                <div class="product-card__img">
                                    <img src="{{ asset($product->main_img) }}" alt="">
                                </div>
                                <p class="product-card__title ro-bold">{{ isset($product->title[$lang]) ? $product->title[$lang] : $product->title['ru'] }}</p>
                                <p class="info__text">{!! isset($product->desc[$lang]) ? $product->desc[$lang] : $product->desc['ru'] !!}</p>

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
    </main>

@endsection

@section('scripts')
    <script src="{{ asset('js/libs.min.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection
