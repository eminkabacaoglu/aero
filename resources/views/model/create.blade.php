@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('New Model') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('models.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="manufId">{{ __('Manufacturer') }}</label>
                            <select class="form-control" name="manufacturer_id" id='manufId'>
                                @foreach ($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                                @endforeach
                                
                              </select>
                              <br>
                            <label for="modelName">{{ __('Model Name') }}</label>
                            <input type="text" name="name" class="form-control" id="modelName" value="{{ old('modelName') }}">
                            @error('name')
                            <br>{{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create Model') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection