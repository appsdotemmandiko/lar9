@extends('layouts.app')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


@section('content')
    
        <div class="m-auto w-4/5 py-12">
        <div class="text-center">
            <h3 class="text-5xl uppercase bold">
               Referees:
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
        <form id="validate" action="/referees" method="post">
            @csrf   
            <table id="academictbl" class="table table-bordered border-primar">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Occupation</th>
                        <th>Address</th>
                        <th>Postal Code</th>
                        <th>City/Town</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Period known</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td id="col0"><input type="text" class="form-control" name="name[]" placeholder="Name" required></td>
                        <td id="col1"><input type="text" class="form-control" name="occupation[]" placeholder="Occupation" required></td>
                        <td id="col2"><input type="text" class="form-control" name="address[]" placeholder="Address" required></td>
                        <td id="col3"><input type="text" class="form-control" name="code[]" placeholder="Postal Code" required></td>
                        <td id="col4"><input type="text" class="form-control" name="town[]" placeholder="City/Town" required></td>
                        <td id="col5"><input type="text" class="form-control" name="mobile[]" placeholder="Mobile Number" required></td>
                        <td id="col6"><input type="text" class="form-control" name="email[]" placeholder="Email" required></td>
                        <td id="col7"><input type="text" class="form-control" name="period[]" placeholder="Period Known" required></td>
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
            
            if (rowCount <= 3){
            
            for(var i =0; i <= cellCount; i++)
            {
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
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
                alert('Fill in your professional referees!');
            }
        }
    </script>
@endsection            