<section class="layout">
    <div class="container">
        <div class="row">
            <div class="col-my-4 col-xl-6">
                <div class="layout-left">
                    <a href="/">
                        <span>{!! tr('HIGH LEVEL INTERNATIONAL CONFERENCE') !!}</span>
                    </a>
                </div>
            </div>
            <div class="col-my-4 col-xl-6">
                <div class="layout-right">
                    <span>{{ tr('Regional cooperation of the countries of Central Asia within the framework of the Joint Action Plan for the implementation of the UN Global Counter-Terrorism Strategy') }}</span>
                </div>
            </div>
            <div class="col-my-4 col-xl-12">
                <div class="asia">
                    @if($app->getLocale() == 'ru')
                        <img src="{{ asset('img/ru.jpg') }}" alt="alter">
                    @else
                        <img src="{{ asset('img/en.jpg') }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

