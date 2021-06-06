<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-title bg-primary">
                    <h5>Atletas Cadastrados no Local Legend</h5>
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
                                <th data-toggle="true">Nome</th>
                                <th data-hide="all">Strava ID</th>
                                <th>Sexo</th>
                                <th data-hide="all">E-mail</th>
                                <th data-hide="all">Cidade</th>
                                <th data-hide="all">Estado</th>
                                <th data-hide="all">Atividades até</th>
                                <th>Inscrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($athletes as $athlete)
                                <tr>
                                    <td>{{ $athlete->name }}</td>
                                    <td>{{ $athlete->strava_id }}</td>
                                    <td>{{ $athlete->sex }}</td>
                                    <td>{{ $athlete->email }}</td>
                                    <td>{{ $athlete->city }}</td>
                                    <td>{{ $athlete->state }}</td>
                                    <td>{{ $athlete->activities_until}}</td>
                                    <td>
                                        <button type="button" wire:click.self="subscription({{ $athlete->id }},{{ $athlete->subscription }})" class="btn {{ $athlete->subscription ? 'btn-primary' : 'btn-danger' }} btn-xs" name="{{ $athlete->strava_id }}">
                                            <i class="fa fa-{{ $athlete->subscription ? 'check' : 'times' }}"></i> 
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
