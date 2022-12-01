@extends('layouts.app')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Update Referees:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/duties" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    
  
    <div class="container">
        <br><br>
        <h3>People who have interacted with you professionally</h3>
        {{-- <span id="message_error"></span> --}}
        <hr><br>
        <form action="/referees" method="post">
            @csrf
    <table id="exptbl" class="table table-primary border-primar">
        <thead class="thead-primary">
            <tr class="table-primary">
                <th>Name</th>
                <th>Occupation</th>
                <th>Address</th> 
                <th>Postal Code</th>
                <th>Town</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Period</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-primary">
                <td id="col00">
                    @foreach ($refDetails->name as $name)
                    <input type="text" class="form-control" id="name" name="name[]" value={{ $name }}>
                @endforeach
                </td>
                <td id="col10">
                    @foreach ($refDetails->occupation as $occ)
                    <input type="text" class="form-control" id="occupation" name="occupation[]" value={{$occ}}>
                @endforeach
                </td>
                <td id="col20">
                    @foreach ($refDetails->address as $add)
                    <input type="text" class="form-control" id="address" name="address[]" value={{$add}}>
                @endforeach
                </td>
                <td id="col30">
                    @foreach ($refDetails->code as $code)
                    <input type="text" class="form-control" id="code" name="course[]" value={{$code}}>
                @endforeach
                </td>
                <td id="col40">
                    @foreach ($refDetails->town as $twn)
                    <input type="text" class="form-control" id="town" name="town[]" value={{$twn}}>
                @endforeach
                </td>
                <td id="col50">
                    @foreach ($refDetails->mobile as $mbl)
                    <input type="text" class="form-control" id="mobile" name="mobile[]" value={{$mbl}}>
                @endforeach
                </td>
                <td id="col60">
                    @foreach ($refDetails->email as $eml)
                    <input type="text" class="form-control" id="email" name="email[]" value={{$eml}}>
                @endforeach
                </td>
                <td id="col70">
                    @foreach ($refDetails->period as $prd)
                    <input type="text" class="form-control" id="period" name="period[]" value={{$prd}}>
                @endforeach
                </td>
            </tr>
        </tbody>  
    </table>
        </form>
        <div class="block text-center pt-24">
        <div class="row mb-0">
            <div class="col-md-6 offset-md-3">
                <a href="/jobs">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('Update & Continue') }}
                    </button> 
                </a>    
                            
            </div>       
        </div>
        </div>
    </div>
@endsection            