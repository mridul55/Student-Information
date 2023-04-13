<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 8 Ajax CRUD Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Student Information</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Class Name</th>
                  <th scope="col">Roll No</th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Father Name</th>
                  <th scope="col">Mother Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->class_name }}</td>
                    <td>{{ $book->roll_no }}</td>
                    <td>{{ $book->student_name }}</td>
                    <td>{{ $book->father_name }}</td>
                    <td>{{ $book->mother_name }}</td>
                    <td>{{ $book->email }}</td>
                    <td>{{ $book->phone }}</td>
                    <td>{{ $book->address }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $book->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $book->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {!! $books->links() !!}
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxBookModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Class Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Enter Class Name" value="" maxlength="50" required="">
                </div>
              </div>  
              
              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Roll No</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Enter Student Rool" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Student Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter Student Name" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Father Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Student Father Name" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Mother Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Student Mother Name" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Student Email Address</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter A Valid Email" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Phone Number</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Student Or Parents Phone Number" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Student Address</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="" maxlength="50" required="">
                </div>
              </div>  
         

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Student Information");
       $('#ajax-book-model').modal('show');
    });
 

// Edit Data    
    $('body').on('click', '.edit', function () {

        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-book') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#class_name').val(res.class_name);
              $('#roll_no').val(res.roll_no);
              $('#student_name').val(res.student_name);
              $('#father_name').val(res.father_name);
              $('#mother_name').val(res.mother_name);
              $('#email').val(res.email);
              $('#phone').val(res.phone);
              $('#address').val(res.address);        
           }
        });

    });

// Delete Data

    $('body').on('click', '.delete', function () {

       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-book') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){

              window.location.reload();
           }
        });
       }

    });

// Add or insert Data

    $('body').on('click', '#btn-save', function (event) {

          var id = $("#id").val();
          var class_name = $("#class_name").val();
          var roll_no = $("#roll_no").val();
          var student_name = $("#student_name").val();
          var father_name = $("#father_name").val();
          var mother_name = $("#mother_name").val();
          var email = $("#email").val();
          var phone = $("#phone").val();
          var address = $("#address").val();

          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('add-update-book') }}",
            data: {
              id:id,
              class_name:class_name,
              roll_no:roll_no,
              student_name:student_name,
              father_name:father_name,
              mother_name:mother_name,
              email:email,
              phone:phone,
              address:address,
              
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });

    });

});
</script>
</body>
</html>