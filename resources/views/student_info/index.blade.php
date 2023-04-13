@extends('admin.admin_master')
@section('admin')

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Student Information</h2>
        </div>
        @if ($user->role == 1 )
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewStudent" class="btn btn-success">Add Student</button>
        </div>
        @endif
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
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->class_name }}</td>
                    <td>{{ $student->roll_no }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->mother_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                      
                      @if ($user->role == 1 )
                      <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $student->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $student->id }}">Delete</a>
                      @endif
                      <a href="javascript:void(0)" class="btn btn-primary view" data-id="{{ $student->id }}">View</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {!! $students->links() !!}
        </div>
    </div>        
</div>

<!-- boostrap model -->
 {{-- Insert And Edit Code student_info/insert_edit --}}
<!-- end bootstrap model -->


   @include('student_info/insert_edit')
   @include('student_info/js')
@endsection