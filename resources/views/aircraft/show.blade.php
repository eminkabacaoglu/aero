@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $aircraft->manufacturerModel->model_name }} - {{$aircraft->manufacturerModel->manufacturer->manufacturer_name}}
                    @auth
                    <a href="{{ route('aircrafts.edit', $aircraft) }}"
                        class="btn btn-sm btn-warning">{{ __('Edit Model') }}</a>
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <label for=""><strong>Tail Number: </strong> </label>
                    {{ $aircraft->tail_number }} <br>
                    <label for=""><strong>Year: </strong></label>
                    {{ $aircraft->year }} <br>
                    <label for=""><strong>Flight Hours: </strong></label>
                    {{ $aircraft->flight_hours }} <br>
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
