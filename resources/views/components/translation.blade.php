<section class="online-section">
    <div class="container">
        <div class="heading">
            <span>{{ tr('Online streaming') }}</span>
        </div>
    </div>
    <div class="online">
        <div class="online-img">
            <img src="{{ asset('img/online.jpg') }}">
        </div>
        <div class="online-play">
            <div class="online-play-in">
                <img src="{{ asset('img/play.png') }}">
                <span>{{ tr('Watch') }}</span>
            </div>
        </div>
        <div class="online-time">
            <div class="online-time-in">
                <div class="online-time-title">
                    <span>{{ tr('There is still time left before the conference') }}:</span>
                </div>
                <div class="online-time-date">
                    <div class="online-time-number">
                        <span>0</span>
                        <span>{{ tr('days') }}</span>
                    </div>
                    <div class="online-time-dots">
                        <span>:</span>
                    </div>
                    <div class="online-time-number">
                        <span>1</span>
                        <span>{{ tr('Hours') }}</span>
                    </div>
                    <div class="online-time-dots">
                        <span>:</span>
                    </div>
                    <div class="online-time-number">
                        <span>46</span>
                        <span>{{ tr('Minutes') }}</span>
                    </div>
                    <div class="online-time-dots">
                        <span>:</span>
                    </div>
                    <div class="online-time-number">
                        <span>45</span>
                        <span>{{ tr('Seconds') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
