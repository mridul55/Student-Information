<div class="modal fade" id="ajax-student-model" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ajaxStudentModel"></h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="addEditStudentForm" name="addEditStudentForm" class="form-horizontal" method="POST">
          <input type="hidden" name="id" id="id">
          @include('include.error')
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
            <button type="submit" class="btn btn-primary" id="btn-save" value="addNewStudent">Save changes
            </button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>