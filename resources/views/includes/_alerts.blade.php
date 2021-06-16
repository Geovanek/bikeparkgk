@if (session('strava-sex'))
    <div class="row">
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ session('strava-sex') }}
        </div>
    </div>
@endif

@if (session('strava-rate-limit'))
    <div class="row">
        <div class="alert alert-warning alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ session('strava-rate-limit') }}
        </div>
    </div>
@endif

@if (session('error-strava'))
    <div class="row">
        <div class="alert alert-info alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ session('error-strava') }}
        </div>
    </div>
@endif