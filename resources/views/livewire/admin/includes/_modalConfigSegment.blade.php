<!-- Modal -->
<div wire:ignore.self wire:keydown.escape="cancel()" class="modal inmodal" id="modalConfigSegment" tabindex="-1" role="dialog" aria-labelledby="modalConfigSegmentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Atualizar Segmento</h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal style-form">
                    <div class="form-group {{ $errors->has('segment_id') ? 'has-error' : '' }}">
                        <label class="col-sm-12 control-form-label">ID do Segmento:</label>
                        <div class="col-sm-10">
                            <input wire:model.defer="segment_id" type="text" id="segment_id" class="form-control">
                            @error('segment_id') <p class="help-block">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="form-group {{-- {{ $errors->has('start_date') ? 'has-error' : '' }} --}}">
                        <label class="font-normal">Data de Início:</label>
                        <div class="input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input wire:model.defer="start_date" type="date" id="start_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-normal">Data de Término:</label>
                        <div class="input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input wire:model.defer="end_date" type="date" id="end_date" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="cancel()" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button wire:click.prevent="updateOrCreate()" type="button" class="btn btn-primary">Salvar alterações</button>
            </div>
        </div>
    </div>
</div>