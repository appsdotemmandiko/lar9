@extends('layouts.app')
@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Update Professional Bodies:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/certifications" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    
<div class="container">
    {{-- <h3>Update Academic Qualifications</h3> --}}
        {{-- <span id="message_error"></span> --}}
        <hr><br>
        <form id="exp" action="/professionalbodies" method="post">
            @csrf
    <table id="proftbl" class="table table-primary border-primar">
        <thead class="thead-primary">
            <tr class="table-primary">
                <th>Professional Body</th>
                <th>Membership / Registration No.</th>
                <th>Membership Type</th>
                <th>Date of Renewal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-primary">
                <td id="col00">
                    @foreach ($profDetails->body as $inst)
                    <input type="text" class="form-control" id="instName" name="body[]" value={{$inst}}>
                @endforeach
                </td>
                <td id="col10">
                    @foreach ($profDetails->regNo as $reg)
                    <input type="text" class="form-control" id="reg" name="regNo[]" value={{$reg}}>
                @endforeach
                </td>
                <td id="col20">
                    @foreach ($profDetails->type as $typ)
                    <input type="text" class="form-control" id="endDate" name="type[]" value={{$typ}}>
                @endforeach
                </td>
                <td id="col30">
                    @foreach ($profDetails->renewal as $rnw)
                    <input type="date" class="form-control" id="course" name="renewal[]" value={{$rnw}}>
                @endforeach
                </td>
            </tr>
        </tbody>  
    </table>
        </form>
        <div class="block text-center pt-24">
        <div class="row mb-0">
            <div class="col-md-6 offset-md-3">
                <a href="/experience">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('Update & Continue') }}
                    </button> 
                </a>    
                            
            </div>       
        </div>
        </div>
</div>

@endsection            