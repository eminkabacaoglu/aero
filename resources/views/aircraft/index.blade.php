@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Aircrafts') }}
                    @auth
                    <a href="{{ route('aircrafts.create') }}"
                        class="btn btn-sm btn-primary">{{ __('New Aircraft') }}</a>
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($aircrafts as $aircraft)
                    <a href="{{ route('aircrafts.show', $aircraft) }}">
                        {{ $aircraft->manufacturerModel->model_name }} - {{$aircraft->manufacturerModel->manufacturer->manufacturer_name}} - {{$aircraft->tail_number}}
                    </a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
