@extends('admin.admin_master')
@section('admin')


  <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="my-3">Student Table </h2>
            <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</a>
            {{-- <div class="table-data"> --}}
                        <table class="table table-bordered">
                      
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Student Class</th>
                              <th scope="col">Student Roll</th>
                              <th scope="col">Student Name</th>
                              <th scope="col">Student Father Name</th>
                              <th scope="col">Student Mother Name</th>
                              <th scope="col">Student Email</th>
                              <th scope="col">Student Contact Number</th>
                              <th scope="col">Student Address</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            @foreach($students as $key=>$student)
                            <tr>
                                 <th>{{$key+1 }}</th>
                                <td>{{ $student->class}}</td>
                                <td>{{ $student->roll}}</td>
                                <td>{{ $student->name}}</td>
                                <td>{{ $student->father_name}}</td>
                                <td>{{ $student->mother_name}}</td>
                                <td>{{ $student->email}}</td>
                                <td>{{ $student->phone}}</td>
                                <td>{{ $student->address}}</td>
                                
                              <td>
                                <a href=""
                                class="btn btn-success updateStudent"
                                data-bs-toggle="modal"
                                 data-bs-target="#updateModal"
                                 {{-- data-id="{{ $student->id}}"
                                 data-name="{{ $student->class}}"
                                 data-name="{{ $student->roll}}"
                                 data-name="{{ $student->name}}"
                                 data-name="{{ $student->father_name}}"
                                 data-name="{{ $student->mother_name}}"
                                 data-name="{{ $student->email}}"
                                 data-name="{{ $student->phone}}"
                                 data-name="{{ $student->address}}" --}}
                                 >
                                <i class="fas fa-edit"></i>
                               </a>
  
                              <a href="{{ route('student.delete',$student->id)}}" title="Delete" class="btn btn-danger delete_student">
                                    <i class="fa-solid fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        
                        
                  </table>
                      
                      
                </table>
                {{-- {!! $categories->links() !!} --}}
            {{-- </div> --}}
        </div>
    </div>
  </div>
   
   @include('student/add_student')
   @include('student/update_student')
   @include('student/student_js')

   @endsection