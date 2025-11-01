@extends('layouts.web')

@section('content')

    <main class="gallery-page">
        <div class="top">
            <div class="container">
                <div class="top__inner">
                    <h1 class="top__title ro-bold">{{ translation('navbar.gallery') }}</h1>
                    <a href="#" style="height: 60px" class="top__logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="gallery">
            <div class="container">
                <div class="gallery__inner">
                    @foreach($photos as $photo)
                    <div class="gallery__item">
                        <img src="{{ asset($photo->img) }}" alt="">
                    </div>
                    @endforeach
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-4.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-5.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-6.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="gallery__item">--}}
{{--                        <img src="images/gallery-item-7.jpg" alt="">--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </main>

@endsection
