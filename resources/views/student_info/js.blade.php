<script type="text/javascript">
    $(document).ready(function($){
   
       $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
   
       $('#addNewStudent').click(function () {
          $('#addEditStudentForm').trigger("reset");
          $('#ajaxStudentModel').html("Add Student Information");
          $('#ajax-student-model').modal('show');
       });

    // View Data    
    $('body').on('click', '.view', function () {
   
   var id = $(this).data('id');
    
   $.ajax({
       type:"POST",
       url: "{{ url('view-student') }}",
       data: { id: id },
       dataType: 'json',
       success: function(res){
         $('#ajaxStudentModel').html("View Student");
         $('#ajax-student-model').modal('show');
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
   
   // Edit Data    
       $('body').on('click', '.edit', function () {
   
           var id = $(this).data('id');
            
           $.ajax({
               type:"POST",
               url: "{{ url('edit-student') }}",
               data: { id: id },
               dataType: 'json',
               success: function(res){
                 $('#ajaxStudentModel').html("Edit Student");
                 $('#ajax-student-model').modal('show');
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
               url: "{{ url('delete-student') }}",
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
               url: "{{ url('add-update-student') }}",
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