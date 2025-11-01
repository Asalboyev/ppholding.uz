<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharm Plast Holding</title>
    <!-- Notyf -->
    <link type="text/css" href="{{ asset('app/notyf.min.css') }}" rel="stylesheet">
    @yield('links')
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <style>
        .page-link {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #F1F1F1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        .page-link:hover {
            background-color: #2E57EA;
            color: #fff;
        }

        .page-item.active>span {
            background-color: #2E57EA;
            color: #fff;
        }

        .page-item:first-child,
        .page-item:last-child {
            display: none;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="{{ route('index') }}" class="header__logo">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </a>
                <div class="header__burger">
                    <span></span>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li>
                            <a href="{{ route('index') }}" class="header__link">{{ translation('navbar.main') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('catalog') }}" class="header__link">{{ translation('navbar.catalog') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="header__link">{{ translation('navbar.about') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}" class="header__link">{{ translation('navbar.gallery') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('news') }}" class="header__link">{{ translation('navbar.news') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts') }}" class="header__link">{{ translation('navbar.contacts') }}</a>
                        </li>
                    </ul>
                    <div class="header__lang">
                        <?php is_null(\App\Http\Middleware\LocaleMiddleware::getLocale()) ? $current_lang = 'ru' : $current_lang =  \App\Http\Middleware\LocaleMiddleware::getLocale();  ?>
                        @foreach($langs as $language)
                        <a class="header__lang-item {{ $current_lang === $language->small ? 'header__lang-item--active' : '' }}" style="text-transform: capitalize" href="{{ route('setlocale', ['lang' => $language->small]) }}">{{ $language->small }}</a>
                        @endforeach
                        {{-- <a href="#" class="header__lang-item header__lang-item--active">Ру</a>--}}
                    </div>
                    <div class="header__contact">
                        <span class="header__contact-title">{{ translation('navbar.contact_us') }}</span>
                        <a href="tel:{!! translation('phone_number') !!}" class="header__contact-link">{!! translation('phone_number') !!}</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <div class="footer__left">
                    <a href="#" class="footer__logo">
                        <img style="width: 100px; height: 200;"  src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                    <p class="footer__left-text ir-regular">{{ translation('footer.subtitle') }}</p>
                </div>
                <div class="footer__menu">
                    <div class="footer__list-box">
                        <ul class="footer__list">
                            <li>
                                <a href="{{ route('index') }}" class="footer__link">{{ translation('navbar.main') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('gallery') }}" class="footer__link">{{ translation('navbar.gallery') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}" class="footer__link">{{ translation('navbar.about') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('news') }}" class="footer__link">{{ translation('navbar.news') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('career') }}" class="footer__link">{{ translation('footer.career') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('location') }}" class="footer__link">{{ translation('footer.location') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__list-box">
                        <p class="footer__list-title ro-bold">{{ translation('products') }}</p>
                        <ul class="footer__list">
                            @foreach($catalog_for_footer as $product)
                            <li>
                                <a href="{{ route('catalog-inner', ['id' => $product->id]) }}" class="footer__link">{{ isset($product->title[$lang]) ? $product->title[$lang] : $product->title['ru'] }}</a>
                            </li>
                            @endforeach
                            {{-- <li>--}}
                            {{-- <a href="#" class="footer__link">Крышки</a>--}}
                            {{-- </li>--}}
                            {{-- <li>--}}
                            {{-- <a href="#" class="footer__link">Капсулы</a>--}}
                            {{-- </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="footer__address">
                    <div class="footer__map">
                        <a href="{{ route('contacts') }}" class="link footer__map-link">
                            <span>{{ translation('open_map') }}</span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#fff" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <p class="footer__address-title ro-bold">{{ translation('address') }}</p>
                    <p class="footer__address-text">{{ translation('address_sub') }}</p>
                </div>
                <div class="footer__contacts">
                    <div class="footer__contacts-item">
                        <span class="footer__contacts-item-title ir-medium">{{ translation('navbar.contact_us') }}</span>
                        <a href="tel:{!! translation('phone_number') !!}" class="footer__contacts-item-link ir-bold">{!! translation('phone_number') !!}</a>
                    </div>
                    <div class="footer__contacts-item">
                        <span class="footer__contacts-item-title ir-medium">E-mail:</span>
                        <a href="mailto:info@ppholding.uz" class="footer__contacts-item-link ir-bold">{{ translation('email') }}</a>
                    </div>
                    <div class="footer__social">
                        <a href="#" class="footer__social-item">
                            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5026 25.5043C20.1265 25.5043 25.4962 20.1351 25.4962 13.5119C25.4962 6.8887 20.1265 1.51953 13.5026 1.51953C6.87865 1.51953 1.50891 6.8887 1.50891 13.5119C1.50891 20.1351 6.87865 25.5043 13.5026 25.5043ZM13.5026 25.5043V15.0863M18.6416 7.86522L18.4642 7.8134C15.9839 7.08873 13.5026 8.94884 13.5026 11.5329V15.0863M13.5026 15.0863H17.7698M13.5026 15.0863H10.0193" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a target="_blank" href="https://instagram.com/ppholdinguz?utm_medium=copy_link" class="footer__social-item">
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.9717 9.03938L21.9744 9.04104M13.8925 27.4536H17.1075C20.7245 27.4536 22.533 27.4536 23.9145 26.7497C25.1297 26.1305 26.1177 25.1425 26.7369 23.9273C27.4408 22.5458 27.4408 20.7373 27.4408 17.1203V13.9054C27.4408 10.2883 27.4408 8.47985 26.7369 7.09833C26.1177 5.88312 25.1297 4.89512 23.9145 4.27594C22.533 3.57202 20.7245 3.57202 17.1074 3.57202H13.8925C10.2755 3.57202 8.46703 3.57202 7.08551 4.27594C5.8703 4.89512 4.8823 5.88312 4.26312 7.09833C3.5592 8.47985 3.5592 10.2884 3.5592 13.9054V17.1203C3.5592 20.7373 3.5592 22.5458 4.26312 23.9273C4.8823 25.1425 5.8703 26.1305 7.08551 26.7497C8.46703 27.4536 10.2755 27.4536 13.8925 27.4536ZM20.234 15.5132C20.234 18.1264 18.1156 20.2447 15.5025 20.2447C12.8894 20.2447 10.771 18.1264 10.771 15.5132C10.771 12.9001 12.8894 10.7817 15.5025 10.7817C18.1156 10.7817 20.234 12.9001 20.234 15.5132Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="#" class="footer__social-item">
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.646 10.6242C24.646 17.9861 19.2206 25.2124 11.6197 25.2124C7.55001 25.2124 3.48083 23.0177 3.48083 23.0177C5.15326 23.0177 8.00362 22.3589 10.4528 20.5109C9.22391 20.102 7.19639 18.9638 5.24001 17.541M24.646 10.6242C24.646 9.62086 24.339 8.68927 23.8138 7.91818M24.646 10.6242L27.5271 9.42226M3.48083 5.81104C7.11752 10.5734 13.1774 12.1643 14.9716 11.8898C15.0033 11.4818 15.0197 11.0601 15.0197 10.6242C15.0197 7.96594 17.1746 5.81104 19.8328 5.81104C21.4878 5.81104 22.9476 6.64626 23.8138 7.91818M23.8138 7.91818C24.3814 8.03604 25.7578 7.77961 26.7229 5.81104M4.54117 12.1461C5.88726 13.2574 6.29033 13.6286 7.73052 14.3162" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-inner">
                    <p class="footer__rights">Pharm Plast Holding. {{ translation('all_right') }}</p>
                    <p class="footer__dev">
                        {{ translation('developed_by') }}
                        <span>NDC</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @yield('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
    <!-- Notyf -->
    <script src="{{ asset('app/notyf.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('message'))
        const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
            types: [{
                type: 'info',
                background: '#0948B3',
                icon: {
                    className: 'fas fa-times',
                    tagName: 'span',
                    color: '#fff'
                },
                dismissible: false
            }]
        });
        notyf.open({
            type: 'info',
            message: '{{ Session::get('
            message ') }}'
        });
        @endif
    </script>
</body>

</html>
