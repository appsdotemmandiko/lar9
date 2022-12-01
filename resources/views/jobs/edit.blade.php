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
                        Update a job posting
                    </h1>
                </div>
                <div class="pt-10">
                    <a href="/jobs" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                        &larr; Back
                    </a>
                </div>
            </div>
            <div class="flex justify-center pt-20">
                <form action="/jobs/{{  $job->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="block pl-12">
                        <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic text-black"
                            name="ref"
                            value="{{  $job->ref }}">
                        <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="title"
                            value="{{  $job->title }}">
                        {{-- <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"    
                            placeholder="Application Deadline"
                            onfocus="(this.type='date')"> --}}
                        <textarea 
                            rows="10" cols="30"
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="description">{{  $job->description }}</textarea>
                        <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"    
                            value="{{  $job->expiry }}"
                            onfocus="(this.type='date')"
                            name="expiry">
                        <button 
                                type="submit"    
                                class="bg-blue-900 text-white block shadow-5xl mb-10 p-2 w-60 uppercase font-italic">
                            Save
                    </button>
                    </div>
                </form>
                
            </div>
            </div>
            <div class="m-auto w-1/5">
                <div class="flex justify-between">
                    <form action="/jobs/{{  $job->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex-1">
                        <button type="submit"
                        class="bg-red-700 text-white block shadow-5xl mb-10 p-2 w-60 uppercase font-italic">
                            Delete
                        </button>
                        </div>
                    </form>
                </div>
                
            </div>
@endsection         
    {{-- </body>
</html> --}}
