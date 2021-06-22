<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title bg-info">
                    <h5>Registro de atividades</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <input type="text" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Procurar">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th data-toggle="true">Atividade</th>
                                <th>Atleta</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Início</th>
                                <th class="text-center">Término</th>
                                <th class="text-center">Voltas</th>
                                <th class="text-center">Compensar</th>
                                <th class="text-center">Link</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td>{{ $activity->name }}</td>
                                    <td>{{ Str::words($activity->user->name, 2, '') }}</td>
                                    <td class="text-center text-muted">
                                        {{ \Carbon\Carbon::parse($activity->start_date_local)->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center text-muted">
                                        {{ \Carbon\Carbon::parse($activity->start_date_local)->format('H:m:s') }}
                                    </td>
                                    <td class="text-center text-muted">
                                        {{ \Carbon\Carbon::parse($activity->start_date_local)->addSeconds($activity->elapsed_time)->format('H:m:s') }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $activity->flagged ? 'warning' : 'primary' }}">{{ $activity->segments_count }} </span>
                                    </td>
                                    <td class="text-center">
                                        <input wire:change.self="lapsToCompensate($event.target.value, {{ $activity->id }})" class="form-control form-control-sm" type="number" name="lapsToCompensate" style="width:70px" value="{{ $activity->laps_to_compensate }}">
                                    </td>
                                    <td class="text-center">
                                        <a href="https://www.strava.com/activities/{{ $activity->activity_id }}" target="_blank">
                                            <img src="{{ asset('img/strava_badge.png') }}">
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" wire:click.self="flagged({{ $activity->id }},{{ $activity->flagged }})" class="btn btn-warning {{ $activity->flagged ? '' : 'btn-outline' }} btn-sm" name="{{ $activity->activity_id }}">
                                            <i class="fa fa-{{ $activity->flagged ? 'flag' : 'flag-o' }}"></i> {{ $activity->flagged ? 'Sinalizada' : 'Sinalizar' }}
                                        </button>
                                        <button type="button" wire:click.self="showConfirmation({{ $activity->id }})" class="btn btn-danger btn-sm" name="{{ $activity->activity_id }}">
                                            <i class="fa fa-trash-o"></i> 
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

