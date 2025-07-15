@extends('layouts.web')

@section('content')

{{--    <main class="location-page">--}}
{{--        <div class="top">--}}
{{--            <div class="container">--}}
{{--                <h1 class="top__title ro-bold">{{ translation('footer.location') }}</h1>--}}
{{--                <p class="top__text">{{ translation('location_desc1') }}</p>--}}
{{--                <p class="top__text">{{ translation('location_desc2') }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="items">--}}
{{--            <div class="container">--}}
{{--                <div class="items__inner">--}}
{{--                    <div class="item">--}}
{{--                        <div class="item__img">--}}
{{--                            <img src="{{ asset('images/ship.svg') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5 class="item__title ro-black">{{ translation('waterway') }}</h5>--}}
{{--                        <ul class="item__list">--}}
{{--                            {!! translation('waterway_sub') !!}--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="item__img">--}}
{{--                            <img src="{{ asset('images/truck.svg') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5 class="item__title ro-black">{{ translation('road_transport') }}</h5>--}}
{{--                        <ul class="item__list">--}}
{{--                            {!! translation('road_transport_sub') !!}--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="item__img">--}}
{{--                            <img src="{{ asset('images/train.svg') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5 class="item__title ro-black">{{ translation('rail_transport') }}</h5>--}}
{{--                        <ul class="item__list">--}}
{{--                            {!! translation('rail_transport_sub') !!}--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="bottom">--}}
{{--            <div class="container">--}}
{{--                <p class="bottom__text">{{ translation('location_desc3') }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}

<main class="location-page">
    <div class="top">
        <div class="container">
            <h1 class="top__title ro-bold">{{ translation('footer.location') }}</h1>
            <p class="top__text">{{ translation('location_desc1') }}</p>
            <p class="top__text">{{ translation('location_desc2') }}</p>
        </div>
    </div>

    <div class="items">
        <div class="container">
            <div class="items__inner">
                <div class="item">
                    <div class="item__img">
                        <img src="{{ asset('images/truck.svg') }}" alt="">
                    </div>
                    <h5 class="item__title ro-black">{{ translation('road_transport') }}</h5>
                    <ul class="item__list">
                        {!! translation('road_transport_sub') !!}
                    </ul>
                </div>
                <div class="item">
                    <div class="item__img">
                        <img src="{{ asset('images/train.svg') }}" alt="">
                    </div>
                    <h5 class="item__title ro-black">{{ translation('rail_transport') }}</h5>
                    <ul class="item__list">
                        {!! translation('rail_transport_sub') !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="container">
            <p class="bottom__text">{{ translation('location_desc3') }}</p>
        </div>
    </div>
</main>

@endsection
