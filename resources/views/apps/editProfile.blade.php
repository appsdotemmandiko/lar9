@extends('layouts.app')
@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
                Update Your Profile:
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
            <label for="prof"><input type="radio" name="title" id="prof" value="Prof." checked=title() required> Prof.</label>&nbsp;
            <label for="dr"><input type="radio" name="title" id="dr" value="Dr." checked=title()> Dr.</label>&nbsp;
            <label for="mr"><input type="radio" name="title" id="mr" value="Mr." checked=title()> Mr.</label>&nbsp;
            <label for="mrs"><input type="radio" name="title" id="mrs" value="Mrs." checked=title()> Mrs.</label>&nbsp;
            <label for="ms"><input type="radio" name="title" id="ms" value="Ms." checked=title()> Ms.</label>
        </div>
        
        </div> 
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('DOB') }}</label>
        <input type="date" name="dob" value="{{ $profileDetails->dob}}"class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-'label text-md-end">{{ __('National ID/ Passport') }}</label>
        <input type="text" name="passportId" value="{{ $profileDetails->passportId}}" class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
        <div class="col-md-4">
            <label for="male"><input type="radio" name="gender" id="male" value="Male"  checked=gender() autofocus> Male</label>&nbsp;
            <label for="female"><input type="radio" name="gender" id="female" value="Female" checked=gender()> Female</label>
        </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Postal Address') }}</label>
        <input type="text" name="postalAdd" value="{{ $profileDetails->postalAdd}}" class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Postal Code') }}</label>
        <input type="text" name="postalCode" value="{{ $profileDetails->postalCode}}" class="col-md-4" required autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Town') }}</label>
        <input type="text" name="town" value="{{ $profileDetails->town}}" class="col-md-4" required autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>
        <input type="tel" name="telephone"  value="{{ $profileDetails->telephone}}" class="col-md-4" required autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Alternative Telephone') }}</label>
        <input type="tel" name="telephoneAlt" value="{{ $profileDetails->telephoneAlt}}" class="col-md-4" autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Do you have a disability') }}</label>
        <div class="col-md-4">
            <label for="yes"><input type="radio" name="disability" id="disabilityYes" value=1  checked=disability()> Yes</label>&nbsp;
            <label for="no"><input type="radio" name="disability" id="disabilityNo" value=2 checked=disability()> No</label>
        </div>
        </div>
    </div>

    <div class="row mb-3" id="disabilityNature">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nature of disability') }}</label>
        <input type="text" name="disabilityNature" value="{{ $profileDetails->disabilityNature}}" class="col-md-4" autofocus>
        </div>
    </div>

    <div class="row mb-3" id="ncpwd">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('NCPWD No.') }}</label>
        <input type="text" name="ncpwd" value="{{ $profileDetails->ncpwd}}" class="col-md-4" autofocus>    
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Civil Status') }}</label>
        <div class="col-md-4">
            <label for="married"><input type="radio" name="civilStatus" id="married" value="Married"  checked=civilStatus() autofocus> Married</label>&nbsp;
            <label for="single"><input type="radio" name="civilStatus" id="single" value="Single" checked=civilStatus()> Single</label>&nbsp;
            <label for="widowed"><input type="radio" name="civilStatus" id="widowed" value="Widowed" checked=civilStatus()> Widowed</label>&nbsp;
            <label for="separted"><input type="radio" name="civilStatus" id="separated" value="Separated" checked=civilStatus()> Separated</label>&nbsp;
            <label for="divorced"><input type="radio" name="civilStatus" id="divorced" value="Divorced" checked=civilStatus()> Divorced</label>
        </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Have you been convicted of a criminal offence?') }}</label>
        <div class="col-md-4">
            <label for="yes"><input type="radio" name="crimeOffence" id="criminalYes" value=1  checked=criminal() autofocus> Yes</label>&nbsp;
            <label for="no"><input type="radio" name="crimeOffence" id="criminalNo" value=0 checked=criminal()> No</label>
        </div>  
    </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nature of the crime') }}</label>
        <input type="text" name="crimeNature" value="{{ $profileDetails->crimeNature}}" class="col-md-4" autofocus>
        </div>
    </div>
    
    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Duration') }}</label>
        <input type="text" name="crimeDuration" value="{{ $profileDetails->crimeDuration}}" class="col-md-4" autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
        <input type="date" name="crimeYear" value="{{ $profileDetails->crimeYear}}" class="col-md-4" autofocus>
       

        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Have you ever been dismissed from employment?') }}</label>
        <div class="col-md-4">
            <label for="yes"><input type="radio" name="empDismissal" id="edYes" value=1  checked=dis() autofocus> Yes</label>&nbsp;
            <label for="no"><input type="radio" name="empDismissal" id="edNo" value=0 checked=dis()> No</label>
        </div>  
    </div>
    </div>

    <div class="row mb-3" id="empDismissalReasonDisp">
     <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Reason') }}</label>
        <div class="col-md-4">
        <input type="text" name="empDismissalReason" value="{{ $profileDetails->empDismissalReason }}" class="col-md-4" autofocus>
        </div>
    </div>
    
    <input type="hidden" name="profileSession" value=1>

    <div class="block text-center pt-24">
        @if (Auth::check()&& Auth::user()->role!='admin')
                    
        <div class="row mb-0">
            <div class="col-md-6 offset-md-3">
                <a href="">
                    <button type="submit" class="btn btn-outline-primary">
                        {{ __('Update') }}
                    </button> 
                </a>
                <a href="/academic">
                    <button type="button" class="btn btn-outline-primary">
                        {{ __('Next') }}
                    </button> 
                </a>    
                            
            </div>       
        </div>
                    
        @endif
    </div>
  
 
</div> 
</form>
<script>
    function title(){
        @if ($profileDetails->title == 'Prof.')
            document.getElementById('prof').checked=true;
        @elseif($profileDetails->title == 'Dr.')
            document.getElementById('dr').checked=true;
        @elseif($profileDetails->title == 'Mr.')
        document.getElementById('mr').checked=true;
        @elseif($profileDetails->title == 'Mrs.')
        document.getElementById('mrs').checked=true;
        @else($profileDetails->title == 'Ms.')
        document.getElementById('ms').checked=true;
        @endif
     }

    function gender(){
        @if ($profileDetails->gender == 'Male')
            document.getElementById('male').checked=true;
        @else
            document.getElementById('female').checked=true;    
        @endif
     }

    function disability(){
        @if ($profileDetails->disability == 1)
            document.getElementById('disabilityYes').checked=true;
        @else
            document.getElementById('disabilitylNo').checked=true;
        @endif
     }

    function civilStatus(){
        @if ($profileDetails->title == 'Married')
            document.getElementById('married').checked=true;
        @elseif($profileDetails->title == 'Single')
            document.getElementById('single').checked=true;
        @elseif($profileDetails->title == 'Widowed')
        document.getElementById('widowed).checked=true;
        @elseif($profileDetails->title == 'Separated')
        document.getElementById('separated').checked=true;
        @else($profileDetails->title == 'Divorced')
        document.getElementById('divorced').checked=true;
        @endif
     }

    function criminal(){
        @if ($profileDetails->crimeOffence == 1)
            document.getElementById('criminalYes').checked=true;
        @else
            document.getElementById('criminalNo').checked=true;    
        @endif
     }

     function dis(){
        @if ($profileDetails->empDismissal == 1)
            document.getElementById('edYes').checked = true;
        @else
            document.getElementById('edNo').checked = true;    
        @endif
     }
     
</script>
@endsection 
         

    
         