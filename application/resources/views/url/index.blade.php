@extends('template.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($urls as $url)
                <div class="col-5">{{ $url['address'] }}</div>
                <div class="col-4">{{ $url['response'] }}</div>
                <div class="col-1">{{ $url['status_code'] }}</div>
                <div class="col-2">{{ $url['created_at'] }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
