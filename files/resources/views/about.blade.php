@extends('layouts.web')

@section('links')
    <style>
        @media (min-width: 752px) {
            .gallery__block {
                width: 100%;
                margin: auto!important;
            }
            .gallery__item {
                width: 25%;
                height: 300px;
            }
            .gallery__item img {
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        }
        .gallery__item img {
            width: 100%;
        }
    </style>
@endsection

@section('content')

    <main class="about-page">
        <div class="top">
            <div class="container">
                <div class="top__inner">
                    <h1 class="top__title ro-bold">{{ translation('about_company') }}</h1>
                    <a href="#" class="top__logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <p class="text--gray">{!! isset($about->desc1[$lang]) ? $about->desc1[$lang] : $about->desc1['ru'] !!}</p>
            </div>
        </div>

        <div class="video">
            <div class="container">
                <div class="video__inner">
                    <div class="video-control" id="video-control">
                        <div class="play-btn">
                            <img src="{{ asset('images/play.svg') }}" alt="">
                        </div>
                    </div>
                    <video id="video">
                        <source src="{{ asset($about->video) }}" type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>

        <div class="container">
            <p class="text--gray">{!! isset($about->desc2[$lang]) ? $about->desc2[$lang] : $about->desc2['ru'] !!}</p>
        </div>

        <div class="cards">
            <div class="container">
                <div class="cards__inner">
                    <div class="card">
                        <span class="ir-semibold">{{ isset($about->done1[$lang]) ? $about->done1[$lang] : $about->done1['ru'] }}</span>
                        <p class="ir-semibold">{{ isset($about->done1_text[$lang]) ? $about->done1_text[$lang] : $about->done1_text['ru'] }}</p>
                    </div>
                    <div class="card">
                        <span class="ir-semibold">{{ isset($about->done2[$lang]) ? $about->done2[$lang] : $about->done2['ru'] }}</span>
                        <p class="ir-semibold">{{ isset($about->done2_text[$lang]) ? $about->done2_text[$lang] : $about->done2_text['ru'] }}</p>
                    </div>
                    <div class="card">
                        <span class="ir-semibold">{{ isset($about->done3[$lang]) ? $about->done3[$lang] : $about->done3['ru'] }}</span>
                        <p class="ir-semibold">{{ isset($about->done3_text[$lang]) ? $about->done3_text[$lang] : $about->done3_text['ru'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery">
            <div class="gallery__block">
                @foreach($gallery1 as $item)
                <div class="gallery__item">
                    <img src="{{ asset('images/'.$item->img) }}" alt="">
                </div>
                @endforeach
            </div>
            <div class="gallery__block">
                @foreach($gallery2 as $item)
                    <div class="gallery__item">
                        <img src="{{ asset('images/'.$item->img) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <p class="text--gray">{!! isset($about->desc3[$lang]) ? $about->desc3[$lang] : $about->desc3['ru'] !!}</p>
        </div>

        <div class="sertificates">
            <div class="container">
                <h3 class="sertificates__title ro-bold">{{ translation('sertificates') }}</h3>
                <div class="sertificates__items">
                    @foreach($sertificates as $item)
                    <div class="sertificates__item">
                        <img src="{{ asset($item->img) }}" alt="">
                    </div>
                    @endforeach
{{--                    <div class="sertificates__item">--}}
{{--                        <img src="images/sertificate-2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="sertificates__item">--}}
{{--                        <img src="images/sertificate-3.jpg" alt="">--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </main>

@endsection
