
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a {{ config('app.name', 'Laravel') }} class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100   border-top border-white pt-3" id="menu">

                    <li class="nav-item w-100">
                        <a href="{{ route('student.dashboard') }}" class="nav-link  text-white align-middle  {{ request()->routeIs(['student.dashboard'])? 'active' : '' }}">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">{{ __('sidebar.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="nav-item w-100">
                        <a href="{{ route('student.assignment.index') }}" class="nav-link  text-white align-middle {{ request()->routeIs(['student.assignment.index','student.assignment.show','student.assignment.create','student.assignment.edit'])? 'active' : '' }}">
                            <i class="fs-4 bi-file-earmark-text-fill"></i> <span class="ms-1 d-none d-sm-inline">{{ __('sidebar.assignments') }}</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a href="{{ route('student.submitted.assignment.index') }}" class="nav-link  text-white align-middle {{ request()->routeIs(['student.submitted.assignment.index','student.submitted.assignment.show','student.submitted.assignment.create','student.submitted.assignment.edit'])? 'active' : '' }}">
                            <i class="fs-4 bi-file-earmark-check"></i> <span class="ms-1 d-none d-sm-inline">{{ __('sidebar.submittedassignment') }}</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4  border-top border-white w-100 pt-3">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.freepik.com/free-icon/user_318-159711.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="#"href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
