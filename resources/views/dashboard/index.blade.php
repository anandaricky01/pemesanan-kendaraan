@extends('dashboard.layout.layout')
@section('container')
    <div class="grid grid-cols-2">
        <div>
            <canvas id="myChart" width="200" height="200"></canvas>
        </div>
    </div>
    @include('dashboard.utils.chart')
@endsection
