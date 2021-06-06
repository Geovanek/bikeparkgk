<div>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox ">
                <div class="ibox-title p-sm">
                    <span class="label label-primary float-right">Local Legend</span>
                    <h5>ID do Segmento</h5>
                </div>
                <div class="ibox-content">
                    <h4 class="no-margins">{{ isset($configSegment->segment_id) ? $configSegment->segment_id : '' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox ">
                <div class="ibox-title p-sm">
                    <span class="label label-primary float-right">Local Legend</span>
                    <h5>Data de Início</h5>
                </div>
                <div class="ibox-content">
                    <h4 class="no-margins">{{ isset($configSegment->start_date) ? \Carbon\Carbon::parse($configSegment->start_date)->isoFormat('DD/MM/YYYY') : '' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox ">
                <div class="ibox-title p-sm">
                    <span class="label label-primary float-right">Local Legend</span>
                    <h5>Data Final</h5>
                </div>
                <div class="ibox-content">
                    <h4 class="no-margins">{{ isset($configSegment->end_date) ? \Carbon\Carbon::parse($configSegment->end_date)->isoFormat('DD/MM/YYYY') : '' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-title p-sm">
                    <h5>Atualizar Segmento</small></h5>
                </div>
                <div class="ibox-content p-xs">
                    <div class="text-center">
                        <a data-toggle="modal" class="btn btn-primary" href="#modalConfigSegment">Atualizar</a>
                    </div>
                    @include('livewire.admin.includes._modalConfigSegment')
                </div>
            </div>
        </div>
    </div>
</div>
