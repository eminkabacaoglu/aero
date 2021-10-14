@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('New Manufacturer') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('usertypes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inpName">{{ __('Type Name') }}</label>
                            <input type="text" name="name" class="form-control" id="inpName" value="{{ old('name') }}">
                            @error('name')
                            <br>{{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create User Type') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection