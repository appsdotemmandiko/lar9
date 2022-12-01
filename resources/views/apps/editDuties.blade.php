@extends('layouts.app')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Update Duties & Skills:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/professionalbodies" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    
        <div class="flex justify-center pt-5">
            <form action="/duties" method="POST">
                @csrf
                <div class="form-floating">
                    <textarea
                        class="form-control"
                        placeholder="duties, responsibilities and assignments"
                        style="width: 450px; height: 350px;"
                        id="floatingTextarea"
                        name="duties">{{$dutyDetails->duties}}</textarea>
                        <label for="floatingTextarea">Briefly state your current duties, responsibilities and assignments</label>
                </div>
                <br>
                <div class="form-floating">
                    <textarea
                    class="form-control"
                    placeholder="description"
                    style="width: 450px; height: 350px;"
                    id="floatingTextarea1"
                    name="skills">{{$dutyDetails->skills}}</textarea>
                    <label for="floatingTextarea1">Abilities, skills & experience relevant to the position</label>
                </div>
                <div class="block text-center pt-5">
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3">
                            <a href="/referees">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Update & Continue') }}
                                </button> 
                            </a>    
                                        
                        </div>       
                    </div>
                    </div>
            </form>
        </div>
@endsection            