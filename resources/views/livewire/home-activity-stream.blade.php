<div>
    <h4>Estísticas</h4>
    <div class="row m-t-sm">
        <div class="col-6">
            <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
            <h5><strong>{{ $activities->count() }}</strong> atividades</h5>
        </div>
        <div class="col-6">
            <span class="line">5,3,9,6,5,9,7,3,5,2</span>
            <h5><strong>{{ $countSegments }}</strong> voltas</h5>
        </div>
    </div>


    <div class="m-t-md">
        <h4>Últimas 5 atividades</h4>
        @foreach($activities as $activity)
            @break($loop->iteration == 6)
            <div class="feed-element">
                <a href="#" class="float-left">
                    <img alt="image" class="rounded-circle" src="{{ $activity->user->avatar }}">
                </a>
                <div class="media-body">
                    <h6>{{ $activity->user->name }}</h6>
                    {{ $activity->name }}
                    <br>
                    @if ($loop->first)
                        <small class="text-navy">
                            {{ \Carbon\Carbon::parse($activity->start_date_local)->calendar() }}
                        </small>
                    @else
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($activity->start_date_local)->calendar() }}
                        </small>
                    @endif

                    <span class="float-right text-left">
                        <small>
                            <span class="badge badge-primary">{{ $activity->segments_count }} </span>
                            {{ $activity->segments_count > 1 ? 'voltas' : 'volta' }}
                        </small>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>