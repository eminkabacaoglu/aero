@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('User Types') }}
                    @auth
                    <a href="{{ route('usertypes.create') }}"
                        class="btn btn-sm btn-primary">{{ __('New User Type') }}</a>
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($userTypes as $userType)
                    <a href="{{ route('usertypes.show', $userType) }}">
                        {{ $userType->type_name }}
                    </a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
