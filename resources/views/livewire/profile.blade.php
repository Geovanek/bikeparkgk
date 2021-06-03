<div>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row content-panel">
                <div class="col-md-6 profile-text mt mb centered">
                    <h4>Estatísticas do Segmento</h4>
                    <div class="row centered mt mb">
                        <div class="col-sm-4">
                            <h1><i class="fa fa-signal"></i></h1>
                            <h3></h3>
                            <h6>Total de voltas</h6>
                        </div>
                        <div class="col-sm-4">
                            <h1><i class="fa fa-trophy"></i></h1>
                            <h3></h3>
                            <h6>Ranking</h6>
                        </div>
                        <div class="col-sm-4">
                            <h1><i class="fa fa-tachometer"></i></h1>
                            <h3></h3>
                            <h6>Número de vezes na pista</h6>
                        </div>
                    </div>
                </div>
                <!-- /col-md-6 -->
                <div class="col-md-3 profile-text">
                    <h4>{{ $user->name }}</h4>
                    </br>
                    <h5>E-mail: <em>{{ $user->email }}</em></h5>
                    <p>
                        <button class="btn btn-theme btn-xs" data-toggle="modal" data-target="#myModal">
                            Alterar e-mail
                        </button>
                    </p>
                    <!-- Modal -->
                    <div wire:ignore.self wire:keydown.escape="cancel()" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Atualizar E-mail</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" class="form-horizontal style-form">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label class="col-lg-2 control-label">E-mail:</label>
                                            <div class="col-lg-10">
                                                <input wire:model.defer="email" type="email" placeholder="E-mail" id="email" class="form-control">
                                                @error('email') <p class="help-block">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button wire:click.prevent="cancel()" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button wire:click.prevent="update()" type="button" class="btn btn-theme03">Salvar alterações</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /col-md-3 -->
                <div class="col-md-3 centered">
                    <div class="profile-pic">
                    <p><img src="{{ $user->avatar }}" class="img-circle"></p>
                    </div>
                </div>
                <!-- /col-md-3 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-lg-12 -->
        <div class="col-lg-12 mt">
            <div class="row">
                <div class="detailed mt">
                    <h4>Últimos Treinos no Bike Park GK</h4>
                    <div class="recent-activity">
                        <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                        <div class="activity-panel">
                            <h5></h5>
                            <p></p>
                        </div>
                    </div>
                    <!-- /recent-activity -->
                </div>
                <!-- /detailed -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
</div>