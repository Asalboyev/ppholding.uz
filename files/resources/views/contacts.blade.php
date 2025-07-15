@extends('layouts.web')

@section('links')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
@endsection

@section('content')

    <main class="contacts-page">
        <div class="contacts-top">
            <div class="container">
                <h1 class="title ro-bold">{{ translation('navbar.contacts') }}</h1>
                <div class="items">
                    <div class="item">
                        <div class="item__icon">
                            <img src="{{ asset('images/phone.svg') }}" alt="">
                        </div>
                        <div class="item__info">
                            <span class="item__title">{{ translation('phone_number_txt') }}</span>
                            <a href="tel:+998889003009" class="item__link ro-medium">{{ translation('phone_number') }}:</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__icon">
                            <img src="{{ asset('images/email.svg') }}" alt="">
                        </div>
                        <div class="item__info">
                            <span class="item__title">E-mail:</span>
                            <a href="mailto:info@ppholding.uz" class="item__link ro-medium">{{ translation('email') }}</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__icon">
                            <img src="{{ asset('images/location.svg') }}" alt="">
                        </div>
                        <div class="item__info">
                            <span class="item__title">{{ translation('address') }}</span>
                            <p class="item__link ro-medium">{{ translation('address_sub') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="contacts-inner">
                <div class="contacts-form">
                    <h4 class="contacts-form__title ro-black">{{ translation('form_title') }}</h4>
                    <p class="contacts-form__subtitle">{{ translation('form_subtitle') }}</p>
                    <form action="{{ route('application') }}" method="post">
                        @csrf
                        <input type="text" class="contacts-form__input ro-regular" name="name" placeholder="{{ translation('your_name') }}">
                        <input type="text" class="contacts-form__input ro-regular" required name="phone_number" placeholder="{{ translation('phone_number_txt') }}">
                        <input type="text" class="contacts-form__input ro-regular" name="email" placeholder="{{ translation('your_email') }}">
                        <button class="contacts-form__btn ir-semibold">{{ translation('send') }}</button>
                    </form>
                </div>
                <div class="contacts-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
