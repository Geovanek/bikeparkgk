<div>
    <div class="m-t-sm">
        <h4>Período:</h4>
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge badge-primary">03/06/2021</span>
                    Início
                </li>
                <li class="list-group-item ">
                    <span class="badge badge-info">27/06/2021</span>
                    Término
                </li>
                <li class="list-group-item">
                    <span class="badge badge-warning">13/06/2021</span>
                    Inscrições
                </li>
            </ul>
        </div>
    </div>

    <div class="m-t-md">
        <h4>Estatísticas</h4>
        <div class="row">
            <div class="col-6 p-w-xs">
                <span class="bar">5,3,9,6,5,3,5,2,9,8,2</span>
                <h5><strong>{{ $activities->count() }}</strong> atividades</h5>
            </div>
            <div class="col-6 p-w-xs">
                <span class="line">5,3,9,6,5,9,7,3,5,2,7,6,1</span>
                <h5><strong>{{ $countSegments }}</strong> voltas</h5>
            </div>
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