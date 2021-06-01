@extends('layouts.app')

@section('title', " - Perfil")

@section('page-css')

@endsection

@section('content')

<section class="wrapper site-min-height">
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
                    @livewire('profile', ['id' => $user->id])
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
                            <h5>1 HOUR AGO</h5>
                            <p>Purchased: Dashio Admin Panel & Front-end theme.</p>
                        </div>
                        <div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
                        <div class="activity-panel">
                            <h5>5 HOURS AGO</h5>
                            <p>Task Completed. Resolved issue with Disk Space.</p>
                        </div>
                        <div class="activity-icon bg-theme04"><i class="fa fa-rocket"></i></div>
                        <div class="activity-panel">
                            <h5>3 DAYS AGO</h5>
                            <p>Launched a new product: Flat Pack Heritage.</p>
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
</section>
<!-- /wrapper -->
@endsection

@push('custom-scripts')

@endpush

@section('livewire-js')
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#myModal').modal('hide');
        });

        window.addEventListener('closeModal', event => {
            $("#myModal").modal('hide');                
        })
    </script>
@endsection
