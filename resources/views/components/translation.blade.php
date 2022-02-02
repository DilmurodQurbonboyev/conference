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
        <div class="online-content">
            <div class="online-play">
                <div class="online-time">
                    <div class="online-time-in"></div>
                </div>
                <div class="online-play-in">
                    <a data-fancybox data-type="iframe" data-src="https://www.youtube.com/embed/TiYyagm0EEc"
                       href="javascript:;">
                        <img src="{{ asset('img/play.png') }}">
                        <span>{{ tr('Watch') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="d-none">
    <div class="online-time-title">
        <span>{{ tr('There is still time left before the conference') }}:</span>
    </div>
</div>
@push('javascript')
    <script>
        $(document).ready(function (argument) {
            var day_tr = <?php echo json_encode(tr('days')); ?>;
            var hours_tr = <?php echo json_encode(tr('Hours')); ?>;
            var minutes_tr = <?php echo json_encode(tr('Minutes')); ?>;
            var seconds_tr = <?php echo json_encode(tr('Seconds')); ?>;
            var one = <?php echo json_encode(tr('There is still time left before the conference')); ?>;
            var two = <?php echo json_encode(tr('Until the end of the conference')); ?>;
            var three = <?php echo json_encode(tr('Conference ended')); ?>;
            let date;
            let date_from;
            let date_to;
            let day;
            let hours;
            let minutes;
            let seconds;
            let html;

            function online(argument) {
                date = new Date();
                date_from = new Date('03 03 2022 10:30:00');
                date_to = new Date('03 04 2022 15:40:00');
                if (date <= date_from) {
                    day = parseInt((date_from - date) / (60 * 60 * 24 * 1000));
                    hours = parseInt((date_from - date) / (60 * 60 * 1000)) - day * 24;
                    minutes = parseInt((date_from - date) / (60 * 1000)) - (day * 24 * 60) - (hours * 60);
                    seconds = parseInt((date_from - date) / (1000)) - (day * 24 * 60 * 60) - (hours * 60 * 60) - (minutes * 60);
                    html = `<div class="online-time-title">
								<span>` + one + `:</span>
							</div>
							<div class="online-time-date">
								<div class="online-time-number">
									<span>` + day + `</span>
									<span>` + day_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + hours + `</span>
									<span>` + hours_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + minutes + `</span>
									<span>` + minutes_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + seconds + `</span>
									<span>` + seconds_tr + `</span>
								</div>
							</div>`
                    $('.online-time-in').html(html);
                }
                if ((date_from < date) && (date <= date_to)) {
                    day = parseInt((date_to - date) / (60 * 60 * 24 * 1000));
                    hours = parseInt((date_to - date) / (60 * 60 * 1000)) - day * 24;
                    minutes = parseInt((date_to - date) / (60 * 1000)) - (day * 24 * 60) - (hours * 60);
                    seconds = parseInt((date_to - date) / (1000)) - (day * 24 * 60 * 60) - (hours * 60 * 60) - (minutes * 60);
                    html = `<div class="online-time-title">
								<span>` + two + `:</span>
							</div>
							<div class="online-time-date">
								<div class="online-time-number">
									<span>` + day + `</span>
									<span>` + day_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + hours + `</span>
									<span>` + hours_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + minutes + `</span>
									<span>` + minutes_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + seconds + `</span>
									<span>` + seconds_tr + `</span>
								</div>
							</div>`
                    $('.online-time-in').html(html);
                }
                if (date_to < date) {
                    html = `<div class="online-time-title">
								<span>` + three + `:</span>
							</div>
							<div class="online-time-date">
								<div class="online-time-number">
									<span>` + 0 + `</span>
									<span>` + day_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + 0 + `</span>
									<span>` + hours_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + 0 + `</span>
									<span>` + minutes_tr + `</span>
								</div>
								<div class="online-time-dots">
									<span>:</span>
								</div>
								<div class="online-time-number">
									<span>` + 0 + `</span>
									<span>` + seconds_tr + `</span>
								</div>
							</div>`
                    $('.online-time-in').html(html);
                }
            }

            setInterval(online, 1000);
        })
    </script>
@endpush
