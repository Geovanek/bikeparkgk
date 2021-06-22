<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-lg">
                                <a href="{{ route('home') }}" class="btn btn-white btn-xs float-right">Voltar para Home</a>
                                <h2><i class="fa fa-trophy"></i> Ranking Local Legends</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><i class="fa fa-male"></i> Masculino</h3>
                            <dl class="row mb-0">
                                @if($usersMale->isEmpty())
                                    <div class="col-sm-10 text-sm-right">
                                        <dd>
                                            Nenhuma volta computada.
                                        </dd>
                                    </div>
                                @endif
                                @foreach($usersMale as $userMale)
                                    @php
                                        if ($loop->iteration == 1) {
                                            $first = $userMale->segments_count + $userMale->activities_sum_laps_to_compensate;
                                        }

                                        if (!empty($userMale->segments_count)) {
                                            $progress = round(($userMale->segments_count + $userMale->activities_sum_laps_to_compensate) / $first * 100);
                                        } else {
                                            $progress = 0;
                                        }
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
                                        <dt>{{ $progress == 0 ? '' : $loop->iteration }}#</dt>
                                    </div>
                                    <div class="col-sm-10 text-sm-left">
                                        <dd>
                                            <div class="progress progress-small m-t-n-sm m-b-1">
                                                <div style="width: {{ $progress }}%;" class="progress-bar progress-bar-striped"></div>
                                            </div>
                                            <small><strong>{{ $userMale->segments_count + $userMale->activities_sum_laps_to_compensate }}</strong> volta(s)</small>
                                        </dd>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-right">Feminino <i class="fa fa-female"></i></h3>
                            <dl class="row mb-0">
                                @if($usersFemale->isEmpty())
                                    <div class="col-sm-10 text-sm-right">
                                        <dd>
                                            Nenhuma volta computada.
                                        </dd>
                                    </div>
                                @endif
                                @foreach($usersFemale as $userFemale)
                                    @php
                                        if ($loop->iteration == 1) {
                                            $first = $userFemale->segments_count + $userFemale->activities_sum_laps_to_compensate;
                                        }

                                        if (!empty($userFemale->segments_count)) {
                                            $progress = round(($userFemale->segments_count + $userFemale->activities_sum_laps_to_compensate) / $first * 100);
                                        } else {
                                            $progress = 0;
                                        }
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
                                                <div style="width: {{ $progress }}%; float: right;display: flex;" class="progress-bar progress-bar-striped progress-bar-danger"></div>
                                            </div>
                                            <small><strong>{{ $userFemale->segments_count + $userFemale->activities_sum_laps_to_compensate }}</strong> volta(s)</small>
                                        </dd>
                                    </div>
                                    <div class="col-sm-2 text-sm-center m-b-md">
                                        <dt>{{ $progress == 0 ? '' : $loop->iteration }}#</dt>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
