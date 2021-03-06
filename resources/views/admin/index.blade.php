@extends('admin.layouts.app')
@section('title')
    {{ tr('Dashboard') }}
@endsection
@section('header')
    <div class="col-sm-6">
        <h1>{{ tr("Dashboard") }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('admin') }}
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="row col-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ tr('Registers') }}</h3>
                </div>
                <div class="card-body">
                    <canvas id="donutChart"
                            style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="row col-8">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
            <span class="info-box-icon bg-primary">
                <i class="fab fa-elementor"></i>
            </span>
                    <div class="info-box-content">
                        <a href="{{ route('menus.index') }}" class="text-dark">
                            <span class="info-box-text">{{ tr('Menus') }}</span>
                        </a>
                        <span class="info-box-number">{{ $totalMenus }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="far fa-newspaper"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('news.index') }}" class="text-dark">
                            <span class="info-box-text">{{tr('News')}}</span>
                        </a>
                        <span class="info-box-number">{{$totalNews}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('pages.index') }}" class="text-dark">
                            <span class="info-box-text">{{tr('Pages')}}</span>
                        </a>
                        <span class="info-box-number">{{ $totalPages }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"> <i class="fas fa-tv"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('useful.index') }}" class="text-dark">
                            <span class="info-box-text">{{tr('Useful')}}</span>
                        </a>
                        <span class="info-box-number">{{$totalUseful}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-camera"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('photos.index') }}" class="text-dark">
                            <span class="info-box-text">{{ tr('Photos') }}</span>
                        </a>
                        <span class="info-box-number">{{$totalPhotos}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-photo-video"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('videos.index') }}" class="text-dark">
                            <span class="info-box-text">{{ tr('Videos') }}</span>
                        </a>
                        <span class="info-box-number">{{$totalVideos}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ tr('Managements') }}</span>
                        <span class="info-box-number">{{$totalManagements}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('users.index') }}" class="text-dark">
                            <span class="info-box-text">{{ tr('Users') }}</span>
                        </a>
                        <span class="info-box-number">{{$totalUsers}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-user-tag"></i></span>

                    <div class="info-box-content">
                        <a href="{{ route('roles.index') }}" class="text-dark">
                            <span class="info-box-text">{{ tr('Roles') }}</span>
                        </a>
                        <span class="info-box-number">{{$totalRoles}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            var onlineUsers = <?php echo json_decode($onlineUsers, true) ?>;
            var offlineUsers = <?php echo json_decode($offlineUsers, true) ?>;
            $(function () {
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        '{{ tr('Online') }}',
                        '{{ tr('Offline') }}'
                    ],
                    datasets: [
                        {
                            data: [onlineUsers, offlineUsers],
                            backgroundColor: ['#28a745', '#dc3545'],
                        }
                    ]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            });
        </script>
    @endpush
@endsection
