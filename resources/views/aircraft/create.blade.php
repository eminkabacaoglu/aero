@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('New Aircraft') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('aircrafts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            {{-- <label for="manufId">{{ __('Manufacturer') }}</label>
                            <select class="form-control" name="manufacturer_id" id='manufId'>
                                @foreach ($models as $model)
                                <option value="{{$model->manufacturer->id}}">{{$model->manufacturer->manufacturer_name}}
                                </option>
                                @endforeach
                            </select>
                            <br> --}}
                            <label for="modelId">{{ __('Model Name') }}</label>
                            <select class="form-control" name="model_id" id='modelId'>
                                @foreach ($models as $model)
                                <option value="{{$model->id}}">{{$model->model_name}} -
                                    {{$model->manufacturer->manufacturer_name}}</option>
                                @endforeach

                            </select>
                            <br>
                            <label for="tailNumber">{{ __('Tail Number') }}</label>
                            <input type="text" name="tailNumber" class="form-control" id="tailNumber" value="{{ old('tailNumber') }}">
                            @error('tailNumber')
                            {{ $message }}<br>
                            @enderror
                            <br>
                            <label for="year">{{ __('Year') }}</label>
                            <input type="number" name="year" class="form-control" id="year" value="{{ old('year') }}">
                            @error('year')
                            {{ $message }}<br>
                            @enderror
                            <br>
                            <label for="fhours">{{ __('Flight Hours') }}</label>
                            <input type="number" name="fhours" class="form-control" id="fhours" value="{{ old('fhours') }}">
                            @error('fhours')
                            <br>{{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create Aircraft') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection