@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Aircraft') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('aircrafts.update',$aircraft) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="modelId">{{ __('Manufacturer') }}</label>
                            <select class="form-control" name="modelId" id='modelId'>
                                @foreach ($models as $model) 
                                    @if ($model->id == $aircraft->manufacturer_model_id)
                                        <option value="{{$model->id}}" selected>{{$model->model_name}} - {{$model->manufacturer->manufacturer_name}}</option>
                                    @else
                                        <option value="{{$model->id}}">{{$model->model_name}} - {{$model->manufacturer->manufacturer_name}}</option>
                                    @endif
                                @endforeach

                            </select>
                            <br>
                            <label for="tailNumber">{{ __('Tail Number') }}</label>
                            <input type="text" name="tailNumber" class="form-control" id="tailNumber" value="{{ old('tailNumber') ?  old('tailNumber') : $aircraft->tail_number }}">
                            @error('tailNumber')
                            {{ $message }}<br>
                            @enderror
                            <br>
                            <label for="year">{{ __('Year') }}</label>
                            <input type="number" name="year" class="form-control" id="year" value="{{ old('year') ?  old('year') : $aircraft->year }}">
                            @error('year')
                            {{ $message }}<br>
                            @enderror
                            <br>
                            <label for="fhours">{{ __('Flight Hours') }}</label>
                            <input type="number" name="fhours" class="form-control" id="fhours" value="{{ old('fhours') ?  old('fhours') : $aircraft->flight_hours }}">
                            @error('fhours')
                            {{ $message }}<br>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Edit Aircraft') }}</button>
                    </form>
                    <hr>
                    <form action="{{ route('aircrafts.destroy',$aircraft) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete Aircraft') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection