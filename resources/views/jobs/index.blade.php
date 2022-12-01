            @vite('resources/css/app.css')

        @extends('layouts.app')
        @section('content')
    
        <div class="m-auto w-4/5 py-24">
            <div class="text-center">
                <h3 class="text-5xl uppercase bold"> Available jobs:</h3>
            </div>
            
            <div class="pt-10">
                @if (Auth::check()&& Auth::user()->role =='admin')
                <a href="jobs/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Post a job &rarr;
                </a>
                @endif
            </div>
          
            <div class="w-5/6 py-10"> 
                    @foreach ($jobs as $job )
                    <div class="m-auto">
                        @if (Auth::check()&& Auth::user()->role=='admin')
                        <div class="float-right">
                            <a href="jobs/{{  $job->id }}/edit"
                                class="border-b-2 pb-2 border-dotted italic text-gray-500">
                                Edit &rarr;
                            </a>
                        </div>
                        @endif
                        <br>
                        
                        @if (Auth::check()&& Auth::user()->role!='admin')
                        <div class="float-right pt-3">
                            <a href="jobs/{{  $job->id }}"
                                class="border-b-2 pb-2 border-dotted italic text-blue-500">
                                Apply &rarr;
                            </a>
                        </div>
                        @endif

                        <span class="uppercase text-blue-500 font-bold text-xs italic">
                            {{  $job->ref }}
                        </span>
                        <h2 class="text-gray-700 text-4xl">
                            {{  $job->title }}
                        </h2>
                        <p text-lg text-gray-700 py-6>
                            Deadline: {{  $job->expiry }}
                        </p>
                        <hr class="mt-4 mb-8">
                        
                    </div>
                    @endforeach
                    </div>
        </div>
    
           
            
        </div>
        @endsection
    {{-- </body>
</html> --}}
