@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit User Type') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('usertypes.update',$usertype) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inpName">{{ __('User Type') }}</label>
                            <input type="text" name="name" class="form-control" id="inpName" value="{{ old('name') ?  old('name') : $usertype->type_name }}">
                            @error('name')
                            {{ $message }}<br>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Edit User Type') }}</button>
                    </form>
                    <hr>
                    <form action="{{ route('usertypes.destroy',$usertype) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete User Type') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection