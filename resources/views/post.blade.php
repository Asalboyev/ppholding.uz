@extends('layouts.web')

@section('content')

    <main class="news-inner-page">
        <div class="content">
            <div class="container">
                <h1 class="content__title ro-bold">{{ isset($post->title[$lang]) ? $post->title[$lang] : $post->title['ru'] }}</h1>
                <div class="content__img">
                    <p class="content__date">{{ date('j.n.Y', strtotime($post->created_at)) }}</p>
                    <img src="{{ asset($post->img) }}" alt="">
                </div>
                <p class="content__text">{!! isset($post->desc[$lang]) ? $post->desc[$lang] : $post->desc['ru'] !!}</p>
            </div>
        </div>
        <div class="news__cards">
            <div class="container">
                <h5 class="news__cards-title ro-bold">{{ translation('other_news') }}</h5>
                <div class="news__cards-inner">
                    @foreach($other as $post)
                    <div class="news__card">
                        <p class="news__card-date">{{ date('j.n.Y', strtotime($post->created_at)) }}</p>
                        <div class="news__card-img">
                            <img src="{{ asset($post->img) }}" alt="">
                        </div>
                        <p class="news__card-title">{{ isset($post->title[$lang]) ? $post->title[$lang] : $post->title['ru'] }}</p>
                        <a href="{{ route('post', ['id' => $post->id]) }}" class="link link--blue news__card-link">
                            <span>{{ translation('more_details') }}</span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    @endforeach
{{--                    <div class="news__card">--}}
{{--                        <p class="news__card-date">15.09.2021</p>--}}
{{--                        <div class="news__card-img">--}}
{{--                            <img src="{{ asset('images/news-8.jpg') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <p class="news__card-title">Производитель качественных Линия по производству флаконов антибиотиков</p>--}}
{{--                        <a href="#" class="link link--blue news__card-link">--}}
{{--                            <span>Подробнее</span>--}}
{{--                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="news__card">--}}
{{--                        <p class="news__card-date">15.09.2021</p>--}}
{{--                        <div class="news__card-img">--}}
{{--                            <img src="{{ asset('images/news-9.jpg') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <p class="news__card-title">Производитель качественных Линия по производству флаконов антибиотиков</p>--}}
{{--                        <a href="#" class="link link--blue news__card-link">--}}
{{--                            <span>Подробнее</span>--}}
{{--                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M10.664 6.05301L14.611 10L10.664 13.947M5.413 10H14.599M19.334 10C19.334 15.1556 15.1546 19.335 9.999 19.335C4.84342 19.335 0.664001 15.1556 0.664001 10C0.664001 4.84443 4.84342 0.665009 9.999 0.665009C15.1546 0.665009 19.334 4.84443 19.334 10Z" stroke="#2E57EA" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </main>

@endsection
