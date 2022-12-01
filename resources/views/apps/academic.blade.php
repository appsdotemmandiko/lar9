@extends('layouts.app')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


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
        <br><br>
        {{-- <h3>Relevant Work Experience</h3> --}}
        {{-- <span id="message_error"></span> --}}
        <br>
        <form id="acValidate" action="/academic" method="post">
            @csrf   
            <table id="academictbl" class="table table-bordered border-primar">
                <thead class="thead-light">
                    <tr>
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
                    <tr> 
                        <td id="col0"><input type="text" class="form-control" name="instName[]" placeholder="Institution name" required></td>
                        <td id="col1"><input type="date" class="form-control" name="startDate[]" placeholder="Start Date" required></td>
                        <td id="col2"><input type="date" class="form-control" name="endDate[]" placeholder="End Date" required></td> 
                        <td id="col3"><input type="text" class="form-control" name="course[]" placeholder="Course / Program" required></td>
                        <td id="col4"><input type="text" class="form-control" name="major[]" placeholder="Specialization" required></td>
                        <td id="col5"><input type="text" class="form-control" name="grade[]" placeholder="Grade/ Class" required></td>
                        <td id="col6"> 
                            <select class="form-control" name="level[]" id="lvl" required> 
                                <option selected disabled>-- Select --</option> 
                                <option value=3>Primary</option>
                                <option value=2>Secondary</option>
                                <option value=1>Certificate</option>
                                <option value=1>Diploma</option>
                                <option value=1>Graduate</option>
                                <option value=1>Post Graduate</option>
                            </select> 
                        </td> 
                        <td id="col7"><input type="checkbox" id="graduated" name="graduated[]" value=1></td>
                    </tr>
                </tbody>  
            </table> 
            <table>
                <br>
                <tr> 
                    <td><button type="button" class="btn btn-outline-primary" onclick="addRows()">Add</button></td>
                    <td><button type="button" class="btn btn-outline-primary" onclick="deleteRows()">Remove</button></td>
                    <td><button type="submit" class="btn btn-outline-primary">Save</button></td> 
                </tr>  
            </table>
        </form>
    </div>

    <script>
        function addRows()
        { 
            var table = document.getElementById('academictbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length; 
            var row = table.insertRow(rowCount);
            
            if (rowCount <= 15){
            
            for(var i =0; i <= cellCount; i++)
            {
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
                if(i == 7)
                { 
                    var radioinput = document.getElementById('col6').getElementsByTagName('input'); 
                    for(var j = 0; j <= radioinput.length; j++)
                    { 
                        if(radioinput[j].type == 'radio')
                        { 
                            var rownum = rowCount;
                            radioinput[j].name = 'terms['+rownum+']';
                        }
                    }
                }
            }
        }
        }
        function deleteRows()
        {
            var table = document.getElementById('academictbl');
            var rowCount = table.rows.length;
            if(rowCount > '2')
            {
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }else{
                alert('Fill in your academic qualifications!');
            }
        }
    </script>
@endsection            