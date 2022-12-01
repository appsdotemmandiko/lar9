@extends('layouts.app')
        @section('content')
            <div class="m-auto w-4/5 py-18">
                <div class="text-center">
                    <h1 class="text-5xl uppercase bold">
                        Upload Documents
                    </h1>
                </div>
                <div class="pt-10">
                    <a href="/jobs" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                        &larr; Back
                    </a>
                </div>
            </div>
            <div class="flex justify-center pt-20">
                <form action="{{route('apply.store', [$id])}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    @if (session('status'))
                             <div class="alert alert-success">
                                 {{ Session::get('status') }}
                            </div>
                        @endif

                    <h5>Upload your relevant supporting documents</h5>
                    <br>
                    <div class="block">
                        <input type="hidden" name="job_id" value="{{ $id}}">
                        Cover Letter : <input type="file" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="cover"  required>
                        CV: <input type="file" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="cv" required>
                                          
                        Licence: <input type="file" 
                        class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                        name="licence">
            
                            <button 
                                type="submit"    
                                class="btn btn-outline-primary">
                            Apply
                            </button>

                    </div>
                </form>
            </div>
          
      
@endsection