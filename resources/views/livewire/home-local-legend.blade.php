<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-lg">
                                <h2><i class="fa fa-trophy"></i> Ranking Local Legends</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3><i class="fa fa-male"></i> Masculino</h3>
                            <dl class="row mb-0">
                                @foreach($usersMale as $userMale)
                                    @php
                                        if ($loop->iteration == 1) {
                                            $first = $userMale->segments_count;
                                        }

                                        $progress = round($userMale->segments_count/$first*100);
                                    @endphp
                                    <div class="col-sm-2 text-center">
                                        <dt class="project-people text-sm-center">
                                            <a href="{{ $userMale->profile_link }}" target="_blank">
                                                <img alt="image" class="rounded-circle" src="{{ $userMale->avatar }}">
                                            </a>
                                        </dt> 
                                    </div>
                                    <div class="col-sm-10 text-sm-left">
                                        <dd>
                                            {{ Str::words($userMale->name, 4, '') }}
                                        </dd>
                                    </div>
                                    <div class="col-sm-2 text-sm-center m-b-md">
                                        <dt>{{ $loop->iteration }}#</dt>
                                    </div>
                                    <div class="col-sm-10 text-sm-left">
                                        <dd>
                                            <div class="progress progress-small m-t-n-sm m-b-1">
                                                <div style="width: {{ $progress }}%;" class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                            </div>
                                            <small><strong>{{ $userMale->segments_count }}</strong> volta(s)</small>
                                        </dd>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-right">Feminino <i class="fa fa-female"></i></h3>
                            <dl class="row mb-0">
                                @foreach($usersFemale as $userFemale)
                                    @php
                                        if ($loop->iteration == 1) {
                                            $first = $userFemale->segments_count;
                                        }

                                        $progress = round($userFemale->segments_count/$first*100);
                                    @endphp
                                    <div class="col-sm-10 text-sm-right">
                                        <dd>
                                            {{ Str::words($userFemale->name, 4, '') }}
                                        </dd>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <dt class="project-people text-sm-center">
                                            <a href="{{ $userFemale->profile_link }}" target="_blank">
                                                <img alt="image" class="rounded-circle" src="{{ $userFemale->avatar }}">
                                            </a>
                                        </dt> 
                                    </div>
                                    <div class="col-sm-10 text-sm-right">
                                        <dd>
                                            <div style="display:inherit" class="progress progress-small m-t-n-sm m-b-1">
                                                <div style="width: {{ $progress }}%; float: right;display: flex;" class="progress-bar progress-bar-striped progress-bar-animated progress-bar-danger"></div>
                                            </div>
                                            <small><strong>{{ $userFemale->segments_count }}</strong> volta(s)</small>
                                        </dd>
                                    </div>
                                    <div class="col-sm-2 text-sm-center m-b-md">
                                        <dt>{{ $loop->iteration }}#</dt>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-t-n">
        <div class="col-sm-3 col-6">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-male fa-3x"></i>
                    </div>
                    <div class="col-10 text-right">
                        <span> Atletas inscritos: </span>
                        <h3 class="font-bold">{{ $usersMale->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-6">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-money fa-3x"></i>
                    </div>
                    <div class="col-10 text-right">
                        <span> Premiação Total: </span>
                        <h3 class="font-bold">R${{ $usersMale->count()*10 }},00</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-6">
            <div class="widget style1 red-bg">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-female fa-3x"></i>
                    </div>
                    <div class="col-10 text-right">
                        <span> Atletas inscritas: </span>
                        <h3 class="font-bold">{{ $usersFemale->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-6">
            <div class="widget style1 red-bg">
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-money fa-3x"></i>
                    </div>
                    <div class="col-10 text-right">
                        <span> Premiação Total: </span>
                        <h3 class="font-bold">R${{ $usersFemale->count()*10 }},00</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
   {{--  <script type="text/javascript">
        $(function () {
            $("#sparkline1").sparkline([20,20,20], {
                type: 'bullet',
                targetWidth: 0
            });
        });
    </script> --}}
@endpush