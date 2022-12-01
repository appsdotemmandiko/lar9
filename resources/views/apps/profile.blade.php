@extends('layouts.app')
@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
                Fill Your Profile:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    <form action="/profile" method="POST" onsubmit="changeValue()">
        @csrf
        @if (session('status'))
            <div class="alert alert-success">
             {{ Session::get('status') }}
            </div>
        @endif
        <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" class="col-md-4 bg-light" value="{{ $name }}" readonly autofocus>
    </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
        <input id="email" type="text" name="email" class="col-md-4 bg-light" value="{{ $email }}" readonly autofocus>
    </div>
    </div>

    <div class="row mb-3">
        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

        <div class="col-md-4">
            <label for="prof"><input type="radio" name="title" id="prof" value="Prof." required> Prof.</label>&nbsp;
            <label for="dr"><input type="radio" name="title" id="dr" value="Dr."> Dr.</label>&nbsp;
            <label for="mr"><input type="radio" name="title" id="mr" value="Mr."> Mr.</label>&nbsp;
            <label for="mrs"><input type="radio" name="title" id="mrs" value="Mrs."> Mrs.</label>&nbsp;
            <label for="ms"><input type="radio" name="title" id="ms" value="Ms."> Ms.</label>
        </div>
        
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('DOB') }}</label>
        <input type="date" name="dob" class="col-md-4" required autofocus>
        {{-- value={{  $request->old('dob', 'default') }} --}}
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('National ID/ Passport') }}</label>
        <input type="text" name="passportId" class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
        <div class="col-md-4">
            <label for="male"><input type="radio" name="gender" id="mele" value="Male"  autofocus> Male</label>&nbsp;
            <label for="female"><input type="radio" name="gender" id="female" value="Female"> Female</label>
        </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Postal Address') }}</label>
        <input type="text" name="postalAdd" class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Postal Code') }}</label>
        <input type="text" name="postalCode" class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Town') }}</label>
        <input type="text" name="town" class="col-md-4" required autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>
        <input type="tel" name="telephone" class="col-md-4" required autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Alternative Telephone') }}</label>
        <input type="tel" name="telephoneAlt" class="col-md-4" autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Do you have a disability') }}</label>
        <div class="col-md-4">
            <label for="yes"><input type="radio" name="disability" onclick="disabilityDispShow()" value=1 required autofocus> Yes</label>&nbsp;
            <label for="no"><input type="radio" name="disability" id="no" onclick="disabilityDispHide()" value=2> No</label>
        </div>
        </div>
    </div>

    <div class="row mb-3" id="disabilityNatureDisp" style="display: none;">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nature of disability') }}</label>
        <input type="text" name="disabilityNature" class="col-md-4" autofocus>
        </div>
    </div>

    <div class="row mb-3" id="ncpwdDisp" style="display: none;">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('NCPWD No.') }}</label>
        <input type="text" name="ncpwd" id="" class="col-md-4" autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Civil Status') }}</label>
        <div class="col-md-4">
            <label for="married"><input type="radio" name="civilStatus" id="married" value="Married"  autofocus> Married</label>&nbsp;
            <label for="single"><input type="radio" name="civilStatus" id="single" value="Single"> Single</label>&nbsp;
            <label for="widowed"><input type="radio" name="civilStatus" id="widowed" value="Widowed"> Widowed</label>&nbsp;
            <label for="separted"><input type="radio" name="civilStatus" id="separated" value="Separated"> Separated</label>&nbsp;
            <label for="divorced"><input type="radio" name="civilStatus" id="divorced" value="Divorced"> Divorced</label>
        </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Have you been convicted of a criminal offence?') }}</label>
        <div class="col-md-4">
            <label for="yes"><input type="radio" name="crimeOffence" id="yes" onclick="crimeDispShow()" value=1  autofocus> Yes</label>&nbsp;
            <label for="no"><input type="radio" name="crimeOffence" id="no" onclick="crimeDispHide()" value=0> No</label>
        </div>  
    </div>
    </div>

    <div class="row mb-3" id="crimeNatureDisp" style="display: none;">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nature of the crime') }}</label>
        <input type="text" name="crimeNature" id="" class="col-md-4" autofocus>
        </div>
    </div>
    
    <div class="row mb-3" id="crimeDurationDisp" style="display: none;">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Duration') }}</label>
        <input type="text" name="crimeDuration" id="" class="col-md-4" autofocus>
        </div>
    </div>

    <div class="row mb-3" id="crimeYearDisp" style="display: none;">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
        <input type="date" name="crimeYear" id="" class="col-md-4" autofocus>
       

        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Have you ever been dismissed from employment?') }}</label>
        <div class="col-md-4">
            <label for="yes"><input type="radio" name="empDismissal" id="yes" onclick="dismissalDispShow()" value=1> Yes</label>&nbsp;
            <label for="no"><input type="radio" name="empDismissal" id="no" onclick="dismissalDispHide()" value=0> No</label>
        </div> 
        

        </div>
    </div>

    <div class="row mb-3" id="empDismissalReasonDisp" style="display: none;">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Reason for Dismissal') }}</label>
        <input type="text" name="empDismissalReason" id="" class="col-md-4" autofocus>
        </div>
    </div>
    <input type="hidden" name="profileSession" value=0>
            <div class="block text-center pt-24">
                {{-- <div class="float-right"> --}}
                    @if (Auth::check()&& Auth::user()->role!='admin')
                    
                   
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-3">
                            <a href="/academic">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Save and Continue') }}
                                </button>
                            </a>    
                            
                            
                    </div>
                    
                    @endif
                {{-- </div> --}}
            </div>
        
 
</div>
<script>
    function changeValue(){
        document.getElementById("profileSession").value = 1;
    }
    
    function disabilityDispShow(){
        document.getElementById('disabilityNatureDisp').style.display = "flex";
        document.getElementById('ncpwdDisp').style.display = "flex";
    }

    function disabilityDispHide(){
        document.getElementById('disabilityNatureDisp').style.display = "none";
        document.getElementById('ncpwdDisp').style.display = "none";
    }

    function crimeDispShow(){
        document.getElementById('crimeNatureDisp').style.display = "flex";
        document.getElementById('crimeDurationDisp').style.display = "flex";
        document.getElementById('crimeYearDisp').style.display = "flex";
    }

    function crimeDispHide(){
        document.getElementById('crimeNatureDisp').style.display = "none";
        document.getElementById('crimeDurationDisp').style.display = "none";
        document.getElementById('crimeYearDisp').style.display = "none";
    }

    function dismissalDispShow(){
        document.getElementById('empDismissalReasonDisp').style.display = "flex";
    }

    function dismissalDispHide(){
        document.getElementById('empDismissalReasonDisp').style.display = "none";
    }

</script>  
</form>
@endsection 
         