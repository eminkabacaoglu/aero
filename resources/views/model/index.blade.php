@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Models') }}
                    @auth
                    <a href="{{ route('models.create') }}"
                        class="btn btn-sm btn-primary">{{ __('New Model') }}</a>
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($models as $model)
                    <a href="{{ route('models.show', $model) }}">
                        {{ $model->model_name }} - {{$model->manufacturer->manufacturer_name}}
                    </a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
