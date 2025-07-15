@extends('layouts.web')

@section('content')

{{--    <main class="career-page">--}}
{{--        <div class="top">--}}
{{--            <div class="container">--}}
{{--                <h1 class="top__title ro-bold">{{ translation('footer.career') }}</h1>--}}
{{--                <p class="top__text">{{ translation('career_desc1') }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="career-content">--}}
{{--            <div class="container">--}}
{{--                <div class="career-img">--}}
{{--                    <img src="{{ asset('images/photo.jpg') }}" alt="">--}}
{{--                </div>--}}
{{--                <p class="career-text">{{ translation('career_desc2') }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="career-contact">--}}
{{--            <div class="container">--}}
{{--                <h4 class="career-contact__title ro-black">{{ translation('form_title') }}</h4>--}}
{{--                <p class="career-contact__subtitle">{{ translation('form_subtitle') }}</p>--}}
{{--                <form class="career-contact__form" action="{{ route('application') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input class="form__input ro-regular" name="name" type="text" placeholder="{{ translation('your_name') }}">--}}
{{--                    <input class="form__input ro-regular" name="email" type="text" placeholder="{{ translation('your_email') }}">--}}
{{--                    <input class="form__input ro-regular" required name="phone_number" type="text" placeholder="{{ translation('phone_number_txt') }}">--}}
{{--                    <button class="form__btn ir-semibold">{{ translation('send') }}</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}

    <main class="career-page">
        <div class="top">
            <div class="container">
                <h1 class="top__title ro-bold">{{ translation('footer.career') }}</h1>
                <p class="top__text">{{ translation('career_desc1') }}</p>
            </div>
        </div>

        <div class="career-content">
            <div class="container">
                <div class="career-img">
                    <img src="{{ asset('images/photoss.jpg') }}" alt="">
                </div>
                <p class="career-text">{{ translation('career_desc2') }}</p>
            </div>
        </div>

        <div class="career-contact">
            <div class="container">
                <h4 class="career-contact__title ro-black">{{ translation('form_title') }}</h4>
                <p class="career-contact__subtitle">{{ translation('form_subtitle') }}</p>
                <form class="career-contact__form" action="{{ route('application') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form__input ro-regular" name="name" type="text" placeholder="{{ translation('your_name') }}">
                    <input class="form__input ro-regular" name="email" type="text" placeholder="{{ translation('your_email') }}">
                    <input class="form__input ro-regular" required name="phone_number" type="text" placeholder="{{ translation('phone_number_txt') }}">
                    <div class="form__file-box">
                        <input type="file" id="file" class="form__file" name="cv">
                        <label for="file">
                            <span id="file-name" class="file-box">ВЫБЕРИТЕ ФАЙЛ… </span>
                            <span class="form__file-button"></span>
                        </label>
                    </div>
                    <div class="form__condition">
                        <input type="checkbox">
                        <p>«Я соглашаюсь с тем, что мои персональные данные, предоставленные Pharm Plast Holding, будут включены в базу данных компании и могут быть использованы на дальнейших этапах процесса набора кадров в целях вашей компании».</p>
                    </div>
                    <button class="form__btn ir-semibold">{{ translation('send') }}</button>
                </form>
            </div>
        </div>
    </main>

@endsection

@section('scripts')

    <script src="{{ asset('js/career.js') }}"></script>

@endsection
