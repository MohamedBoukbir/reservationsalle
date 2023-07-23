<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* body {
            background: #f7f7ff;
            margin-top: 20px;
        } */

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-secondary p-0">
         {{-- !START NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-primary fw-bold" href="#">Modification De Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav active" aria-current="true">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-2">
                            <div class="fw-bold"><a href="{{route('admin.all.reservation')}}" style="text-decoration: none;">Tous Les
                                Reservation</a>
                            </div>
                        </div>
                        {{-- <span class="badge bg-primary rounded-pill">{{$allresrvationCount}}</span> --}}
                    </li>
                </ul>
            </div>
            <div class=" justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                style="text-decoration: none;">
                                <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li> --}}
                    {{-- ! ///////////////////////// --}}
     <li class="nav-item dropdown has-arrow main-drop">
      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        {{-- ! image --}}

       
        @if (Auth::user()->image)
            <span class="user-img">
                <img class="rounded-circle" src="/storage/{{ Auth::user()->image }}" alt=""
                    style="width: 40px;height: 40px;">
                <span class="status online"></span>
            </span>
        @else
            <span class="user-img">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                    alt="" style="width: 40px;height: 40px;">
                <span class="status online"></span>
            </span>
        @endif
        {{-- ! end image --}}
        {{-- <span>{{ Auth::user()->username}}</span> --}}
        {{-- <span>username</span> --}}
       </a>
       <div class="dropdown-menu">
        <a class="dropdown-item disabled" href="#">{{ Auth::user()->name }}</a>
        <a class="dropdown-item" href="#"><i
                data-feather="user" class="mr-1"></i>
            Profile</a>
        <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="mr-1"></i>
            Settings</a>


        {{-- <a class="dropdown-item" href="login.html" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i
                data-feather="log-out" class="mr-1"></i> Logout</a> --}}
        <style>
            .btn-logout {
                width: 150px;
                height: 50px;
                /* min-width: 230px; */
                /* padding: 10px 20px; */
                /* background: transparent; */
                cursor: pointer;
                /* background-color: #4fb8a3; */
                color: #fff;
                /* border: 2px solid #4fb8a3; */
                padding: 5px;
                border-radius: 6px;
                box-sizing: border-box;
                font-size: 11px;
                font-weight: 600;
                text-align: center;
                text-decoration: none;
                /* margin-left: 5px; */
                /* margin-right: 5px; */
                transition: background-color .3s, border-color .3s;
                box-shadow: 0 2px 10px rgba(54, 54, 54, .2);
            }
        </style>
        {{-- !logout --}}
        {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button class="btn btn-logout btn-danger" type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </button>
                </div>
            </div> --}}
        {{-- <button class="btn-logout" type="submit">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout</button> --}}
        {{-- </form> --}}

        <a class="dropdown-item" href="login.html" href="{{ route('logout') }}"
            onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
              {{-- !image logout --}}
            <i data-feather="log-out" class="mr-1"></i> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        {{-- !logout --}}
        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form> --}}
       </div>
                        </li>
                    <style>
                                        .btn-upgrade {
                                            width: 15%;
                                            height: 50px;
                                            /* min-width: 230px; */
                                            /* padding: 10px 20px; */
                                            background: transparent;
                                            cursor: pointer;
                                            background-color: #4fb8a3;
                                            color: #fff;
                                            border: 2px solid #4fb8a3;
                                            padding: 5px;
                                            border-radius: 6px;
                                            box-sizing: border-box;
                                            font-size: 11px;
                                            font-weight: 600;
                                            text-align: center;
                                            text-decoration: none;
                                            transition: background-color .3s, border-color .3s;
                                            margin: 15px;
                                            box-shadow: 0 2px 10px rgba(54, 54, 54, .2);
                                        }
                                    </style>
                    {{--!  /////////////////////////////////// --}}
                                    </ul>
                                </div>

                            </div>
    </nav>
    {{-- !END NAVBAR --}}

    </div>

    <div class="container mt-5">
        <form action="{{route('admin.updateprofile', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    {{-- {{$candidat->image}} --}}
                                    @if (Auth::user()->image)
                                        {{-- <img class="flex-shrink-0 img-fluid rounded"
                                src="/storage/{{ $candidat->image }}" alt=""
                                style="width: 80px; height: 80px;"> --}}

                                        {{-- <img src="/storage/{{ $candidat->image }}" alt="Admin"
                                            class="rounded-circle p-1" style="width: 110;height: 110px;"> --}}
                                        <span class="user-img">
                                            <img class="rounded-circle mb-3" src="/storage/{{ Auth::user()->image }}"
                                                alt="" style="width: 100px;height: 100px;">
                                            <span class="status online"></span>
                                        </span>
                                    @else
                                        <img  class="rounded-circle" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                                            alt="Admin" class="rounded-circle p-1"
                                            style="width: 110;height: 110px;">
                                    @endif
                                    <div class="form-group">


                                        {{-- <span class="user-img">
                                            <img class="rounded-circle" src="/storage/{{ Auth::user()->image }}"
                                                alt="" style="width: 100px;height: 100px;">
                                            <span class="status online"></span>
                                        </span> --}}



                                        <label for="">Image profile</label>
                                        <input class="form-control" type="file" id="file" accept="image/*"
                                            name="image">
                                        <span class="text-danger">
                                            @error('image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class=" profile mt-3">
                                        {{-- <h4>USERNAME</h4>
                                    <p class="text-secondary mb-1">ADRESSE</p>
                                    <p class="text-muted font-size-sm">COUNTRY</p> --}}
                                        {{-- <button type="button" class="btn-upgrade w-100">Get Verified</button> --}}
                                        {{-- <button class="btn btn-primary">Follow</button> --}}
                                        {{-- <button class="btn btn-outline-primary">Message</button> --}}
                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-mail me-2 icon-inline">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                                <polyline points="22,6 12,13 2,6" />
                                            </svg>
                                            Gmail
                                        </h6>
                                        <span class="text-secondary">{{ Auth::user()->email }}</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-facebook me-2 icon-inline ">
                                                <path
                                                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                </path>
                                            </svg>Facebook</h6>

                                        <span class="text-secondary">HERE FACEBOOK</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            disabled>
                                        @error('name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                            disabled>
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="phone"   class="form-control"
                                            value="{{ Auth::user()->phone }}" autocomplete="off">
                                        @error('phone')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="address"   class="form-control"
                                            value="{{ Auth::user()->address }}" autocomplete="off">
                                        @error('address')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="country" class="form-control"
                                            value="{{ $admin->country }}" autocomplete="off">
                                        @error('country')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="button" class="btn btn-primary px-4" value="Save Changes">
                                </div>
                            </div> --}}
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-5">Password</h5>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Current password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" name="current_password"
                                            id="current_password" autocomplete="off" value="">
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">New password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" autocomplete="off" name="password" id="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Confirmation</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" autocomplete="off"  name="password_confirmation"
                                            id="password_confirmation">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-primary px-4"> Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                    <p>Web Design</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Website Markup</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>One Page</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Mobile Template</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Backend API</p>
                                    <div class="progress" style="height: 5px">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
