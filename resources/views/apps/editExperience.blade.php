@extends('layouts.app')


    {{-- <!-- library js validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}


@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Update Work Experience:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/jobs" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    
<div class="container">
    <h3>Relevant Work Experience</h3>
        {{-- <span id="message_error"></span> --}}
        <hr><br>
        <form id="exp" action="/experience" method="post">
            @csrf
    <table id="exptbl" class="table table-primary border-primar">
        <thead class="thead-primary">
            <tr class="table-primary">
                <th>Organisation</th>
                <th>Designation</th>
                <th>Start Date</th>
                <th>Current Post</th>
                <th>End Date</th>
                <th>Job Grade / Gross Monthly Salary</th>
                <th>Terms of Service</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-primary">
                <td id="col00">
                    @foreach ($expDetails->orgName as $org)
                    <input type="text" class="form-control" id="orgName" name="orgName[]" value={{$org}}>
                @endforeach
                </td>
                <td id="col10">
                    @foreach ($expDetails->designation as $des)
                    <input type="text" class="form-control" id="designation" name="designation[]" value={{$des}}>
                @endforeach
                </td>
                <td id="col20">
                    @foreach ($expDetails->startDate as $start)
                    <input type="date" class="form-control" id="startDate" name="startDate[]" value={{$start}}>
                @endforeach
                </td>
                <td id="col30">
                    @foreach ($expDetails->currJob as $curr)
                    <input type="checkbox"  id="currJob" name="currJob[]" checked=curr()>
                @endforeach
                </td>
                <td id="col40">
                    @foreach ($expDetails->endDate as $end)
                    <input type="date" class="form-control" id="startDate" name="startDate[]" value={{$end}}>
                @endforeach
                </td>
                <td id="col50">
                    @foreach ($expDetails->grade as $grd)
                    <input type="text" class="form-control" id="grade" name="grade[]" value={{$grd}}>
                @endforeach
                </td>
                <td id="col60">
                    @foreach ($expDetails->terms as $term)
                    <input type="text" class="form-control" id="terms" name="terms[]" value={{$term}}>
                @endforeach
                </td>
            </tr>
        </tbody>  
    </table>
        </form>
        <div class="block text-center pt-24">
        <div class="row mb-0">
            <div class="col-md-6 offset-md-3">
                <a href="/duties">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('Update & Continue') }}
                    </button> 
                </a>    
                            
            </div>       
        </div>
        </div>
</div>

@endsection            