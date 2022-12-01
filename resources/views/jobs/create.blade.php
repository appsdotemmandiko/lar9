
        @extends('layouts.app')
        @section('content')
            <div class="m-auto w-4/5 py-18">
                <div class="text-center">
                    <h1 class="text-5xl uppercase bold">
                        Post a job
                    </h1>
                </div>
                <div class="pt-10">
                    <a href="/jobs" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                        &larr; Back
                    </a>
                </div>
            </div>
            <div class="w-4/8 m-auto text-center">
                @error('ref')
                <li class="text-red-500 list-none">
                    {{  $message }}
                </li>
            @enderror
            
            @error('title')
                <li class="text-red-500 list-none">
                    {{  $message }}
                </li>
            @enderror
           
            @error('description')
                <li class="text-red-500 list-none">
                    {{  $message }}
                </li>
            @enderror
        
            @error('expiry')
                <li class="text-red-500 list-none">
                    {{  $message }}
                </li>
            @enderror
            </div> 
            <div class="flex justify-center pt-20">
                <form action="/jobs" method="POST">
                    @csrf
                    <div class="block">
                        <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="ref"
                            placeholder="Ref No.">
                        <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="title"
                            placeholder="Job Title">
                        {{-- <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"    
                            placeholder="Application Deadline"
                            onfocus="(this.type='date')"> --}}
                        <textarea 
                            rows="10" cols="30" 
                            placeholder="Job Description..."
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                            name="description"></textarea>
                        <input type="text" 
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"    
                            placeholder="Application Deadline"
                            onfocus="(this.type='date')"
                            name="expiry">
                            <button 
                                type="submit"    
                                class="bg-blue-900 text-white block shadow-5xl mb-10 p-2 w-60 uppercase font-italic">
                            Submit
                            </button>

                    </div>
                </form>
            </div>
          
      
    @endsection    
    {{-- </body>
</html> --}}
