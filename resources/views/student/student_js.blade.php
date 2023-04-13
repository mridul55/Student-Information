{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}


<script>
     $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
<script>
 // alert(location.href+' .table')
    $(document).ready(function(){
      $(document).on('click','.mClose',function(){
        $('.errorMsg').empty();
      });

       $(document).on('click','.add_Student',function(e){
         e.preventDefault();
         let classnew = $('#class').val();
         let roll = $('#roll').val();
         let name = $('#name').val();
         let father_name = $('#father_name').val();
         let mother_name = $('#mother_name').val();
         let email = $('#email').val();
         let phone = $('#phone').val();
         let address = $('#address').val();
         
        console.log(classnew+roll+name+father_name+mother_name+email+phone+address);
       let submitUrl = $('#addStudentForm').attr('action');
        //alert(submitUrl);
        
       $.ajax({
        url:submitUrl,
        method:'post',
        data:{class:classnew,roll:roll,name:name,father_name:father_name,mother_name:mother_name,email:email,phone:phone,address:address},
        success:function(res){
         if(res.status == 'success'){   
           $('#addModal').modal('hide');
           $('#addStudentForm')[0].reset();
           $('.table').load(location.href+'.table');   

           Command: toastr["success"]("Student Added!", "Success")
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
         }
        },error:function(err){
          let error = err.responseJSON;
          $.each(error.errors,function(index,value){
            $('.errorMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
          });
        }

      });

    })

    // show Student Value
    $(document).on('click','.updateStudent', function(){
     let id = $(this).data('id');
     let classnew = $(this).data('class');
     let roll = $(this).data('roll');
     let name = $(this).data('name');
     let father_name = $(this).data('father_name');
     let mother_name = $(this).data('mother_name');
     let email = $(this).data('email');
     let phone = $(this).data('phone');
     let address = $(this).data('address');

     $('#updateStudentForm').attr('action',"{{ route('student.all') }}" +'/' + id);
     $('#id').val(id);
     $('#class').val(classnew);
     $('#roll').val(roll);
     $('#name').val(name);
     $('#father_name').val(father_name);
     $('#mother_name').val(mother_name);
     $('#email').val(email);
     $('#phone').val(phone);
     $('#address').val(address);

   });
    //update data
    $(document).on('submit', '.update_Student', function(e){
      e.preventDefault();
         let classnew = $('#class').val();
         let roll = $('#roll').val();
         let name = $('#name').val();
         let father_name = $('#father_name').val();
         let mother_name = $('#mother_name').val();
         let email = $('#email').val();
         let phone = $('#phone').val();
         let address = $('#address').val();
      let submitUrl = $(this).attr('action');
     // console.log(up_name,up_brand);
      $.ajax({
          url:submitUrl,
          method:'put',
          data:{class:classnew,roll:roll,name:name,father_name:father_name,mother_name:mother_name,email:email,phone:phone,address:address},
          success:function(res){
           if(res.status == 'success'){   
            $('#updateModal').modal('hide');
           $('#updateStudentForm')[0].reset();
             $('.table').load(location.href+' .table');
             Command: toastr["success"](res.msg, "Success")

              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }

           }
          },error:function(err){
            let error = err.responseJSON;
            $.each(error.errors,function(index,value){
              $('.error').append('<span class="text-danger">'+value+'</span>'+'<br>');
            });
          }

        });

    })
    // Delete Data
    $(document).on('click','.delete_student',function(e){
    e.preventDefault();
    let submitUrl = $(this).attr('href');
    alert(submitUrl);
    if(confirm('Are you sure to delete ??')){
      $.ajax({
          url: submitUrl,
          method: 'delete',
          success:function(res){
            if(res.status =='success'){
              $('.table').load(location.href+' .table');
              Command: toastr["success"](res.msg, "Success")

            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            }
          }
      })
    }
   })
  //  //pagination
  //   $(document).on('click','.pagination a', function(e){
  //        e.preventDefault();
  //        let page = $(this).attr('href').split('page=')[1]
  //        pagination(page);
  //   })
  //        function pagination(page){
  //         $.ajax({
  //           url:"/pagination/paginate-data?page="+page,
  //           success: function(res) {
  //             $(' .table-data').html(res);
  //           }

  //         })
  //        }
    });
</script>