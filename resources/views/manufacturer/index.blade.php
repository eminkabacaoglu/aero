@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Manufacturers') }}
                    <a href="{{ route('manufacturers.create') }}"
                        class="btn btn-sm btn-primary">{{ __('New Manufacturer') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($manufacturers as $manufacturer)
                    <a href="{{ route('manufacturers.show', $manufacturer) }}">
                        {{ $manufacturer->manufacturer_name }}
                    </a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
