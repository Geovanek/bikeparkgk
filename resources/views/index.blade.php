@extends('layouts.app')

@section('page-css')

@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                        <div>
                            <span class="float-right text-right">
                            <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                <br/>
                                All sales: 162,862
                            </span>
                            <h1 class="m-b-xs">$ 50,992</h1>
                            <h3 class="font-bold no-margins">
                                Half-year revenue margin
                            </h3>
                            <small>Sales marketing.</small>
                        </div>

                    <div>
                        <canvas id="lineChart" height="70"></canvas>
                    </div>

                    <div class="m-t-md">
                        <small class="float-right">
                            <i class="fa fa-clock-o"> </i>
                            Update on 16.07.2015
                        </small>
                       <small>
                           <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                       </small>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('faq')

</div>

@include('layouts.sidebarRight')

@endsection

@push('custom-scripts')
@endpush