@extends('layouts.admin')

@section('content')
    <div class="container ms_daschboard-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4 ms_card-container">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }} <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
