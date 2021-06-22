<div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Atividades no Bike Park GK</h5>
                </div>

                <div class="ibox-content">
                    @foreach($activities as $activity)
                        <div class="activity-stream">
                            <div class="stream">
                                <div class="stream-badge">
                                    <i class="fa fa-history"></i>
                                </div>
                                <div class="stream-panel">
                                    <div class="stream-info">
                                        @if ($loop->first)
                                            <span class="date text-navy">
                                                {{ \Carbon\Carbon::parse($activity->start_date_local)->calendar() }}
                                            </span>
                                        @else
                                            <span class="date">
                                                {{ \Carbon\Carbon::parse($activity->start_date_local)->calendar() }}
                                            </span>
                                        @endif

                                        @if($activity->flagged)
                                            <span class="float-right text-left label label-warning" data-toggle="tooltip" data-placement="top" title="Provavelmente atividade duplicada.">
                                                <i class="fa fa-flag"></i> Atividade sinalizada
                                            </span>
                                        @endif
                                    </div>
                                    {{ $activity->name }}
                                    <span class="float-right text-left">
                                        <span class="badge badge-primary">{{ $activity->segments->count() }} </span>
                                        {{ $activity->segments->count() > 1 ? 'voltas' : 'volta' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
