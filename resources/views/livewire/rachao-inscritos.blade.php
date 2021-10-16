<div>
    <div class="col-12">
        <div class="ibox">
            <div class="ibox-content">
                <h2>Lista de Inscritos</h2>
                <h6><span class="text-muted">Total inscritos confirmados: {{ $athletesCount }}</span></h6>
                <div class="clients-list">
                
                    <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"><i class="fa fa-user-secret"></i> Ranca Toco</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-male"></i> Pé de Pano</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"><i class="fa fa-child"></i> Galáticas</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-female"></i> Aventureiras</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @foreach ($athletes as $athlete )  
                                            @if($athlete->category == 1)
                                                <tr>
                                                    <td> {{ $athlete->name }}</td>
                                                    <td class="client-status">
                                                        <span class="label {{ ($athlete->subscription == 1) ? 'label-primary' : 'label-warning' }}">{{ ($athlete->subscription == 1) ? 'Confirmado' : 'Aguardando confirmação' }}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @foreach ($athletes as $athlete )  
                                            @if($athlete->category == 2)
                                                <tr>
                                                    <td> {{ $athlete->name }}</td>
                                                    <td class="client-status">
                                                        <span class="label {{ ($athlete->subscription == 1) ? 'label-primary' : 'label-warning' }}">{{ ($athlete->subscription == 1) ? 'Confirmado' : 'Aguardando confirmação' }}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @foreach ($athletes as $athlete )  
                                            @if($athlete->category == 3)
                                                <tr>
                                                    <td> {{ $athlete->name }}</td>
                                                    <td class="client-status">
                                                        <span class="label {{ ($athlete->subscription == 1) ? 'label-primary' : 'label-warning' }}">{{ ($athlete->subscription == 1) ? 'Confirmado' : 'Aguardando confirmação' }}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @foreach ($athletes as $athlete )  
                                            @if($athlete->category == 4)
                                                <tr>
                                                    <td> {{ $athlete->name }}</td>
                                                    <td class="client-status">
                                                        <span class="label {{ ($athlete->subscription == 1) ? 'label-primary' : 'label-warning' }}">{{ ($athlete->subscription == 1) ? 'Confirmado' : 'Aguardando confirmação' }}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
