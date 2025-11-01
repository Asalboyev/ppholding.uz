@extends('layouts.web')

@section('content')

    <main class="main-page">
        <section class="main-section">
            <div class="container">
                <div class="main-section__inner">
                    <div class="main-section__info">
{{--                        <div class="main-section__logo">--}}
{{--                            <img src="{{ asset('images/logo-white.png') }}" alt="">--}}
{{--                        </div>--}}
                        <h1 class="main-section__title ro-bold">{{ translation('index.title') }}</h1>
                        <p class="main-section__subtitle ro-bold">{{ translation('index.subtitle') }}</p>
                        <div class="main-section__bottom">
                            <a href="{{ route('catalog') }}" class="button main-section__btn ro-bold">{{ translation('index.go_to_catalog') }}</a>
                            <a href="#" class="link main-section__link">
                                <span>{{ translation('index.production') }}</span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="main-section__img">
                        <img class="main-section__img1" src="{{ asset('images/Flakon1-2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="about__inner">
                    <div class="about__logo">
                        <img style="height: 100px" src="{{ asset('images/logo-black.png') }}" alt="">
                    </div>
                    <div class="about__info">
                        <p>{{ translation('index.desc') }}</p>
                        <a href="{{ route('about') }}" class="link link--blue about__link">
                            <span>{{ translation('index.more_about_us') }}</span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="#" class="link link--blue about__link">
                            <span>{{ translation('index.export') }}</span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="products">
            <div class="container">
                <div class="products__items">
                    @foreach($catalog as $item)
                    <div class="products__item">
                        <div class="products__item-top">
                            <div class="products__item-title">
                                <span>{{ translation('index.services') }}</span>
                                <p class="ro-bold">{{ isset($item->title[$lang]) ? $item->title[$lang] : $item->title['ru'] }}</p>
                            </div>
                            <div class="products__item-logo">
                                <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.8448 12.4646C10.8448 13.6325 10.3581 14.6336 9.37793 15.4747C8.39773 16.309 7.21592 16.7261 5.82562 16.7261H4.37961V28.4468H5.42242V29.1976H0V28.4468H1.04273V0.750801H0V0H5.8325C7.2159 0 8.39773 0.417096 9.37793 1.2514C10.3581 2.0925 10.8448 3.09359 10.8448 4.26149V12.4646ZM7.50793 14.2999V2.4262C7.50793 1.9604 7.34114 1.5642 7.01434 1.2375C6.68764 0.9107 6.2913 0.750801 5.8325 0.750801H4.37961V15.9753H5.8325C6.2913 15.9753 6.68764 15.8154 7.01434 15.4887C7.34114 15.1619 7.50793 14.7657 7.50793 14.2999ZM23.1495 12.4646C23.1495 13.6325 22.6628 14.6336 21.6826 15.4747C20.7024 16.309 19.5206 16.7261 18.1303 16.7261H16.6843V28.4468H17.7271V29.1976H12.3047V28.4468H13.3474V0.750801H12.3047V0H18.1372C19.5206 0 20.7024 0.417096 21.6826 1.2514C22.6628 2.0925 23.1495 3.09359 23.1495 4.26149V12.4646ZM19.8126 14.2999V2.4262C19.8126 1.9604 19.6458 1.5642 19.319 1.2375C18.9923 0.9107 18.596 0.750801 18.1372 0.750801H16.6843V15.9753H18.1372C18.596 15.9753 18.9923 15.8154 19.319 15.4887C19.6458 15.1619 19.8126 14.7657 19.8126 14.2999ZM36.7055 29.1976H31.2831V28.4468H32.3259V14.14H28.989V28.4468H30.0318V29.1976H24.6094V28.4468H25.6521V0.750801H24.6094V0H30.0318V0.750801H28.989V13.3892H32.3259V0.750801H31.2831V0H36.7055V0.750801H35.6627V28.4468H36.7055V29.1976Z" fill="#E5E5E5"/>
                                </svg>
                            </div>
                        </div>
                        <div class="products__item-bottom">
                            <div class="products__item-bg-text ro-bold">
                                {{ isset($item->title[$lang]) ? $item->title[$lang] : $item->title['ru'] }}
                            </div>
                            <div class="products__item-img">
                                <img src="{{ asset($item->img) }}" alt="">
                            </div>
                            <a href="{{ route('catalog-inner', ['id' => $item->id]) }}" class="link link--blue products__link">
                                <span>{{ translation('index.go_to_catalog') }}</span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="products__item">--}}
{{--                        <div class="products__item-top">--}}
{{--                            <div class="products__item-title">--}}
{{--                                <span>Продукция</span>--}}
{{--                                <p class="ro-bold">Капсулы</p>--}}
{{--                            </div>--}}
{{--                            <div class="products__item-logo">--}}
{{--                                <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M10.8448 12.4646C10.8448 13.6325 10.3581 14.6336 9.37793 15.4747C8.39773 16.309 7.21592 16.7261 5.82562 16.7261H4.37961V28.4468H5.42242V29.1976H0V28.4468H1.04273V0.750801H0V0H5.8325C7.2159 0 8.39773 0.417096 9.37793 1.2514C10.3581 2.0925 10.8448 3.09359 10.8448 4.26149V12.4646ZM7.50793 14.2999V2.4262C7.50793 1.9604 7.34114 1.5642 7.01434 1.2375C6.68764 0.9107 6.2913 0.750801 5.8325 0.750801H4.37961V15.9753H5.8325C6.2913 15.9753 6.68764 15.8154 7.01434 15.4887C7.34114 15.1619 7.50793 14.7657 7.50793 14.2999ZM23.1495 12.4646C23.1495 13.6325 22.6628 14.6336 21.6826 15.4747C20.7024 16.309 19.5206 16.7261 18.1303 16.7261H16.6843V28.4468H17.7271V29.1976H12.3047V28.4468H13.3474V0.750801H12.3047V0H18.1372C19.5206 0 20.7024 0.417096 21.6826 1.2514C22.6628 2.0925 23.1495 3.09359 23.1495 4.26149V12.4646ZM19.8126 14.2999V2.4262C19.8126 1.9604 19.6458 1.5642 19.319 1.2375C18.9923 0.9107 18.596 0.750801 18.1372 0.750801H16.6843V15.9753H18.1372C18.596 15.9753 18.9923 15.8154 19.319 15.4887C19.6458 15.1619 19.8126 14.7657 19.8126 14.2999ZM36.7055 29.1976H31.2831V28.4468H32.3259V14.14H28.989V28.4468H30.0318V29.1976H24.6094V28.4468H25.6521V0.750801H24.6094V0H30.0318V0.750801H28.989V13.3892H32.3259V0.750801H31.2831V0H36.7055V0.750801H35.6627V28.4468H36.7055V29.1976Z" fill="#E5E5E5"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="products__item-bottom">--}}
{{--                            <div class="products__item-bg-text ro-bold">--}}
{{--                                Кап сулы--}}
{{--                            </div>--}}
{{--                            <div class="products__item-img">--}}
{{--                                <img src="images/product-2.png" alt="">--}}
{{--                            </div>--}}
{{--                            <a href="#" class="link link--blue products__link">--}}
{{--                                <span>Перейти в каталог</span>--}}
{{--                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="products__item">--}}
{{--                        <div class="products__item-top">--}}
{{--                            <div class="products__item-title">--}}
{{--                                <span>Продукция</span>--}}
{{--                                <p class="ro-bold">Крышка</p>--}}
{{--                            </div>--}}
{{--                            <div class="products__item-logo">--}}
{{--                                <svg width="37" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M10.8448 12.4646C10.8448 13.6325 10.3581 14.6336 9.37793 15.4747C8.39773 16.309 7.21592 16.7261 5.82562 16.7261H4.37961V28.4468H5.42242V29.1976H0V28.4468H1.04273V0.750801H0V0H5.8325C7.2159 0 8.39773 0.417096 9.37793 1.2514C10.3581 2.0925 10.8448 3.09359 10.8448 4.26149V12.4646ZM7.50793 14.2999V2.4262C7.50793 1.9604 7.34114 1.5642 7.01434 1.2375C6.68764 0.9107 6.2913 0.750801 5.8325 0.750801H4.37961V15.9753H5.8325C6.2913 15.9753 6.68764 15.8154 7.01434 15.4887C7.34114 15.1619 7.50793 14.7657 7.50793 14.2999ZM23.1495 12.4646C23.1495 13.6325 22.6628 14.6336 21.6826 15.4747C20.7024 16.309 19.5206 16.7261 18.1303 16.7261H16.6843V28.4468H17.7271V29.1976H12.3047V28.4468H13.3474V0.750801H12.3047V0H18.1372C19.5206 0 20.7024 0.417096 21.6826 1.2514C22.6628 2.0925 23.1495 3.09359 23.1495 4.26149V12.4646ZM19.8126 14.2999V2.4262C19.8126 1.9604 19.6458 1.5642 19.319 1.2375C18.9923 0.9107 18.596 0.750801 18.1372 0.750801H16.6843V15.9753H18.1372C18.596 15.9753 18.9923 15.8154 19.319 15.4887C19.6458 15.1619 19.8126 14.7657 19.8126 14.2999ZM36.7055 29.1976H31.2831V28.4468H32.3259V14.14H28.989V28.4468H30.0318V29.1976H24.6094V28.4468H25.6521V0.750801H24.6094V0H30.0318V0.750801H28.989V13.3892H32.3259V0.750801H31.2831V0H36.7055V0.750801H35.6627V28.4468H36.7055V29.1976Z" fill="#E5E5E5"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="products__item-bottom">--}}
{{--                            <div class="products__item-bg-text ro-bold">--}}
{{--                                Кры шка--}}
{{--                            </div>--}}
{{--                            <div class="products__item-img">--}}
{{--                                <img src="images/product-1.png" alt="">--}}
{{--                            </div>--}}
{{--                            <a href="#" class="link link--blue products__link">--}}
{{--                                <span>Перейти в каталог</span>--}}
{{--                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>

        <section class="about-product">
            <div class="container">
                <div class="about-product__inner">
                    <div class="about-product__img">
                        <img src="{{ asset('images/Flakon3.png') }}" alt="">
                    </div>
                    <div class="about-product__info">
                        <h3 class="about-product__title ro-bold">{{ translation('index.about_our_products') }}</h3>
                        <ul class="about-product__list">
                            <li class="about-product__item">
                                <p class="about-product__item-title ir-bold">{{ translation('index.done1_title') }}</p>
                                <p class="about-product__item-text">{{ translation('index.done1_sub') }}</p>
                            </li>
                            <li class="about-product__item">
                                <p class="about-product__item-title ir-bold">{{ translation('index.done2_title') }}</p>
                                <p class="about-product__item-text">{{ translation('index.done2_sub') }}</p>
                            </li>
                            <li class="about-product__item">
                                <p class="about-product__item-title ir-bold">{{ translation('index.done3_title') }}</p>
                                <p class="about-product__item-text">{{ translation('index.done3_sub') }}</p>
                            </li>
                            <li class="about-product__item">
                                <p class="about-product__item-title ir-bold">{{ translation('index.done4_title') }}</p>
                                <p class="about-product__item-text">{{ translation('index.done4_sub') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="partners">
            <h3 class="partners__title ro-bold">{{ translation('index.our_partners') }}</h3>
            <div class="partners__slider">
                <div class="partners__wrapper">
                    <div class="partners__slider-inner">
                        @foreach($partners as $partner)
                            <div class="partners__slide">
                                <img src="{{ asset($partner->img) }}" alt="" />
                            </div>
                        @endforeach
                    </div>
                    <div class="partners__slider-inner">
                        @foreach($partners as $partner)
                            <div class="partners__slide">
                                <img src="{{ asset($partner->img) }}" alt="" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
