<div>
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-6">

            <div class="profile-image">
                <img src="{{ $user->avatar }}" class="rounded-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            {{ $user->name }}
                        </h2>
                        <h4><a href="{{ $user->profile_link }}">{{ $user->profile_link }}</a></h4>
                        {{ $user->email }} 
                        <small>
                            <button class="btn btn-outline btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                                Alterar e-mail
                            </button>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <table class="table small m-b-xs">
                <tbody>
                <tr>
                    <td>
                        <strong>--</strong> Total de Voltas
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>--</strong> Ranking
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>--</strong> Total de Dias
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <small>Voltas Por Dia</small>
            <div id="sparkline1"></div>
        </div>


        <!-- Modal -->
        <div wire:ignore.self wire:keydown.escape="cancel()" class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <i class="fa fa-envelope-open modal-icon"></i>
                        <h4 class="modal-title">Atualizar E-mail</h4>
                        Por favor, mantenha seu e-mail atualizado para receber notificações das trocas de posições na classificação.
                    </div>
                    <div class="modal-body">
                        <form role="form" class="form-horizontal style-form">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="col-sm-2 control-form-label">E-mail:</label>
                                <div class="col-sm-10">
                                    <input wire:model.defer="email" type="email" placeholder="E-mail" id="email" class="form-control">
                                    @error('email') <p class="help-block">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click.prevent="cancel()" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button wire:click.prevent="update()" type="button" class="btn btn-primary">Salvar alterações</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>