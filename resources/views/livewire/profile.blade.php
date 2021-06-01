<div>
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