  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="{{ route('student.store')}}" method="post" id="addStudentForm" id="myForm">
     @csrf
     <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="addModalLabel">Add Student</h5>
             <button type="button" class="btn-close mClose" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             <div class="errorMsg">
               
             </div>
             <div class="form-group">
              <label for="class">Class Name</label>
              <input type="text" class="form-control" name="class" id="class" required>
             </div>
             <div class="form-group">
              <label for="roll">Student Roll No.</label>
              <input type="text" class="form-control" name="roll" id="roll" required>
            </div>
              <div class="form-group">
                 <label for="name">Student Name</label>
                 <input type="text" class="form-control" name="name" id="name" required>
              </div>
              <div class="form-group">
                <label for="father_name">Father Name</label>
                <input type="text" class="form-control" name="father_name" id="father_name" required>
             </div>
             <div class="form-group">
              <label for="mother_name">Mother Name</label>
              <input type="text" class="form-control" name="mother_name" id="mother_name" required>
            </div>
            <div class="form-group">
            <label for="email">Student Email Address</label>
            <input type="email" class="form-control" name="email" id="email" required>
            </div>
           <div class="form-group">
          <label for="phone">Student Phone Number</label>
          <input type="text" class="form-control" name="phone" id="phone" required>
          </div>
          <div class="form-group">
            <label for="address">Student Address</label>
            <input type="text" class="form-control" name="address" id="address" required>
            </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary mClose" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary add_Student">Submit</button>
           </div>
         </div>
       </div>
    </form>
   </div>
