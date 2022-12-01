@extends('layouts.app')


    {{-- <!-- library js validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}


@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Work Experience:
            </h3>
        </div>
        <div class="pt-10">
            <a href="/professionalbodies" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                &larr; Back
            </a>
        </div>
    </div>
    
  
    <div class="container">
        <br><br>
        <h3>Relevant Work Experience</h3>
        {{-- <span id="message_error"></span> --}}
        <hr><br>
        <form id="exp" action="/experience" method="post">
            @csrf   
            <table id="exptbl" class="table table-bordered border-primar">
                <thead class="thead-light">
                    <tr>
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
                    <tr> 
                        <td id="col0"><input type="text" class="form-control" id="orgName" name="orgName[]" placeholder="Organisation name" required></td> 
                        <td id="col1"><input type="text" class="form-control" id="designation" name="designation[]" placeholder="Designation" required></td>
                        <td id="col2"><input type="date" class="form-control" id="startDate" name="startDate[]" placeholder="Start Date" required></td>
                        <td id="col3"><input type="checkbox" id="currJob" name="currJob[]"></td>
                        <td id="col4"><input type="date" class="form-control" id="endDate" name="endDate[]" placeholder="End Date" required></td>
                        <td id="col5"><input type="text" class="form-control" id="grade" name="grade[]" placeholder="Grade/Gross Monthly Salary" required></td> 
                        <td id="col6"> 
                            <select class="form-control" name="terms[]" id="terms" required> 
                                <option selected disabled>-- Select --</option> 
                                <option value=3>Pensionable</option>
                                <option value=2>Contract</option>
                                <option value=1>Temporary</option>
                            </select> 
                        </td> 
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
            var table = document.getElementById('exptbl');
            var col = document.getElementById('col'); 
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            
            if (rowCount <= 15){
                
            for(var i =0; i < cellCount; i++)
            {
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;

                if(i == 8)
                { 
                    var radioinput = document.getElementById('col7').getElementsByTagName('input'); 
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
            var table = document.getElementById('exptbl');
            var col = document.getElementById('col');
            var rowCount = table.rows.length;
            if(rowCount > '2')
            {
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }else{
                alert('Fill in your work experience!');
            }
        }
    </script>

@endsection            