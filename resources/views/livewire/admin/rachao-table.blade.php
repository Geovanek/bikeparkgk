<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title bg-primary">
                    <h5>Atletas Inscritos no Rachão</h5>
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
                                <th>E-mail</th>
                                <th class="text-center">Whatsapp</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Inscrição</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($athletes as $athlete)
                                <tr>
                                    <td>{{ $athlete->name }}</td>
                                    <td>{{ $athlete->email }}</td>
                                    <td>{{ $athlete->phone }}</td>
                                    <td>{{ $athlete->category }}</td>
                                    <td class="text-center">
                                        <button type="button" wire:click.self="subscription({{ $athlete->id }},{{ $athlete->subscription }})" class="btn {{ $athlete->subscription ? 'btn-primary' : 'btn-danger' }} btn-sm" name="{{ $athlete->strava_id }}">
                                            <i class="fa fa-{{ $athlete->subscription ? 'check' : 'times' }}"></i> 
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" wire:click.self="showConfirmation({{ $athlete->id }})" class="btn btn-danger btn-sm" name="{{ $athlete->strava_id }}">
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
