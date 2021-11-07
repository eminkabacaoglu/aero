@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $manufacturer->manufacturer_name }}

                    <a href="{{ route('manufacturers.edit', $manufacturer) }}"
                        class="btn btn-sm btn-warning">{{ __('Edit Manufacturer') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    @foreach($manufacturer->manufacturermodels as $model)
                    <a href="{{ route('models.show', $model) }}">
                        {{ $model->model_name }}
                    </a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
