@extends('admin.layouts.app')
@section('content')
    <div class="error-page">
        <h2 class="headline text-danger"> 403</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> {{ tr('You do not have permission') }}!</h3>
            <p>
                We could not find the page you were looking for.
                Meanwhile, you may
                <a onclick="history.back(-1)">{{tr('return to dashboard')}}</a>
                or try using the
                search form.
            </p>
        </div>
    </div>
@endsection
