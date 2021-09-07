@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Manufacturer') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('manufacturers.update',$manufacturer) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inpName">{{ __('Manufacturer Name') }}</label>
                            <input type="text" name="name" class="form-control" id="inpName" value="{{$manufacturer->manufacturer_name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create Manufacturer') }}</button>
                    </form>
                    <hr>
                    <form action="{{ route('manufacturers.destroy',$manufacturer) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete Manufacturer') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection