
   {{-- <script type="text/javascript">

    $(document).ready(function (){
        $('#myForm').validate({
            rules:{
              class:{
                   required : true,
                },
                roll:{
                   required : true,
                },
                name:{
                   required : true,
                },
                father_name:{
                   required : true,
                },
                mother_name:{
                   required : true,
                },
                email:{
                   required : true,
                },
                phone:{
                   required : true,
                },
                address:{
                   required : true,
                }
            },
            messages : {
              class:{
                    required: 'Please Enter Student Class',
                },
                roll:{
                    required: 'Please Enter Student Roll Number',
                },
                name:{
                    required: 'Please Enter Student Name',
                },
                father_name:{
                    required: 'Please Enter Student Father Name',
                },
                mother_name:{
                    required: 'Please Enter Student Mother Name',
                },
                email:{
                    required: 'Please Enter Student Email',
                },
                phone:{
                    required: 'Please Enter Student Phone Number',
                },
                address:{
                    required: 'Please Enter Student Address',
                }
            },
            errorElement : 'span',
            errorPlacement : function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },

        })
    })

</script> --}}