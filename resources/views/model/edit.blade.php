@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Model') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('models.update',$model) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="manufId">{{ __('Manufacturer') }}</label>
                            <select class="form-control" name="manufacturer_id" id='manufId'>
                                @foreach ($manufacturers as $manufacturer)
                                    @if ($manufacturer->id == $model->manufacturer->id)
                                        <option value="{{$manufacturer->id}}" selected>{{$manufacturer->manufacturer_name}}</option>
                                    @else
                                        <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                                    @endif
                                @endforeach

                            </select>
                            <br>
                            <label for="modelName">{{ __('Model Name') }}</label>
                            <input type="text" name="name" class="form-control" id="modelName" value="{{$model->model_name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Edit Model') }}</button>
                    </form>
                    <hr>
                    <form action="{{ route('models.destroy',$model) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete Model') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection