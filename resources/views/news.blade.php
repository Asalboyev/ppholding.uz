@extends('layouts.web')

@section('content')

    <main class="news-page">
        <div class="top">
            <div class="container">
                <div class="top__inner">
                    <h1 class="top__title ro-bold">{{ translation('navbar.news') }}</h1>
                    <a href="#" class="top__logo">
                        <img src="images/logo.png" alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="news__cards">
            <div class="container">
                <div class="news__cards-inner">
                    @foreach($news as $post)
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
{{--                            <img src="images/news-2.jpg" alt="">--}}
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
{{--                            <img src="images/news-3.jpg" alt="">--}}
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
{{--                            <img src="images/news-4.jpg" alt="">--}}
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
{{--                            <img src="images/news-5.jpg" alt="">--}}
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
{{--                            <img src="images/news-6.jpg" alt="">--}}
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
{{--                            <img src="images/news-7.jpg" alt="">--}}
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
{{--                            <img src="images/news-8.jpg" alt="">--}}
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
{{--                            <img src="images/news-9.jpg" alt="">--}}
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
                {{ $news->links() }}
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
