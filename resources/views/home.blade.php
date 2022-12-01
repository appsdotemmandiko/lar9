@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="block text-center pt-24">
                        <div class="float-right">
                            @if (Auth::check()&& Auth::user()->role=='admin')
                                <a href="/jobs"> 
                                <button    
                                    class="btn btn-outline-primary font-italic">
                                    Post Available Jobs
                                </button>
                                </a>
                            @else
                                <a href="/profile"> 
                                    <button    
                                        class="btn btn-outline-primary font-italic">
                                        Update Profile
                                    </button>
                                    </a>
                            @endif
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
