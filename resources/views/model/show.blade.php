@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $model->model_name }} - {{$model->manufacturer->manufacturer_name}}
                    @auth
                    <a href="{{ route('models.edit', $model) }}"
                        class="btn btn-sm btn-warning">{{ __('Edit Model') }}</a>
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
{{--                     
                    @foreach($manufacturer_Model->aircrafts as $aircraft)
                    <a href="{{ route('model.show', $model) }}">
                        {{ $aircraft->name }}
                    </a>
                    aircrafts
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
