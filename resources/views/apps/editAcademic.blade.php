@extends('layouts.app')
@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Academic Qualifications:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/profile" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    
<div class="container">
    <h3>Update Academic Qualifications</h3>
        {{-- <span id="message_error"></span> --}}
        <hr><br>
        <form id="exp" action="/experience" method="post">
            @csrf
    <table id="exptbl" class="table table-primary border-primar">
        <thead class="thead-primary">
            <tr class="table-primary">
                <th>Institution</th>
                <th>Start Date</th>
                <th>End Date</th> 
                <th>Course / Program</th>
                <th>Specialization</th>
                <th>Grade / Class</th>
                <th>Level</th>
                <th>Graduated</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-primary">
                <td id="col00">
                    @foreach ($acDetails->instName as $inst)
                    <input type="text" class="form-control" id="instName" name="instName[]" value={{$inst}}>
                @endforeach
                </td>
                <td id="col10">
                    @foreach ($acDetails->startDate as $start)
                    <input type="date" class="form-control" id="start" name="start[]" value={{$start}}>
                @endforeach
                </td>
                <td id="col20">
                    @foreach ($acDetails->endDate as $end)
                    <input type="date" class="form-control" id="endDate" name="endDate[]" value={{$end}}>
                @endforeach
                </td>
                <td id="col30">
                    @foreach ($acDetails->course as $curr)
                    <input type="text"  id="course" name="course[]">
                @endforeach
                </td>
                <td id="col40">
                    @foreach ($acDetails->major as $maj)
                    <input type="text" class="form-control" id="major" name="major[]" value={{$maj}}>
                @endforeach
                </td>
                <td id="col50">
                    @foreach ($acDetails->grade as $grd)
                    <input type="text" class="form-control" id="grade" name="grade[]" value={{$grd}}>
                @endforeach
                </td>
                <td id="col60">
                    @foreach ($acDetails->level as $lvl)
                    <input type="text" class="form-control" id="level" name="level[]" value={{$lvl}}>
                @endforeach
                </td>
                <td id="col70">
                    @foreach ($acDetails->graduated as $grad)
                    <input type="text" class="form-control" id="grad" name="grad[]" value={{$grad}}>
                @endforeach
                </td>
            </tr>
        </tbody>  
    </table>
        </form>
        <div class="block text-center pt-24">
        <div class="row mb-0">
            <div class="col-md-6 offset-md-3">
                <a href="/certifications">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('Update & Continue') }}
                    </button> 
                </a>    
                            
            </div>       
        </div>
        </div>
</div>

@endsection            