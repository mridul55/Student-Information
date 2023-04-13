  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
      <form action="" method="post" id="updateStudentForm" class="update_Student">
          @csrf

          <input type="hidden" id="id">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="updateModalLabel">Edit Student</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary ">Update</button>
                      </div>
                  </div>
              </div>
        </div>
      </form>
  </div>
