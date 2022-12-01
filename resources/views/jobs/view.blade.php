{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Career Portal</title>
            @vite('resources/css/app.css')
    </head>
    <body> --}}
        @extends('layouts.app')
        @section('content')
            <div class="m-auto w-4/5 py-12">
                <div class="text-center">
                    <h1 class="text-5xl uppercase bold">
                        {{  $job->title }}
                    </h1>
                </div>
                <div class="pt-10">
                    <a href="/jobs" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                        &larr; Back
                    </a>
                </div>
            </div>
            
            <div class="m-auto w-4/5 py-2">
            <div class="block text-center">
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                    {{  $job->ref }}
                </span>
                <h2 class="text-gray-700 text-4xl">
                    Deadline: {{  $job->expiry }}
                </h2>
                <p class="text-lg text-gray-700 py-6">
                     {{  $job->description }}
                </p>
                    <div class="block text-center pt-24">
                        <div class="float-center">
                            @if (Auth::check()&& Auth::user()->role!='admin')
                            <a href="/jobs/{{ $job->id}}/apply"> 
                            <button    
                                class="btn btn-outline-primary">
                                Apply
                            </button>
                            </a>
                            @endif
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection            
    {{-- </body>
</html> --}}
