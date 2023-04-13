

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/dashboard') }}" class="waves-effect">
                      <i class="ri-home-fill"></i> <span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>



                <li>
                  <a href="javascript: void(0)" class="has-arrow waves-effect">
                  <i class="fa-thin fa-user"></i>
                  <span>Student Info....</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                    <li type="button" class="btn btn-primary bg-primary text-black" ><a href="{{ url('/student-information') }} ">Add Information</a></li>
                  </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>