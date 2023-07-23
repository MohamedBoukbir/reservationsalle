<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> All reservation</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    {{-- <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    {{-- !START NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-primary fw-bold" href="#">Tous Les
                Reservation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav active" aria-current="true">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-2">
                            <div class="fw-bold"><a href="{{ route('admin') }}" style="text-decoration: none;">Reservation</a></div>
                            {{-- <a class="nav-link" href="#">Cours</a> --}}
                        </div>
    
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
             <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
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
        <a class="dropdown-item" href="{{route('user.profile')}}"><i
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

    {{-- !TABLE 1 --}}
    <div class="my-5 ms-5 me-5">
        {{-- <button type="button" class="btn btn-outline-success mb-1" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="fa-solid fa-plus"></i> Add course
        </button> --}}
        <table id="example" class="table table-hover table-bordered text-center table-responsive">
            <thead class="table table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">effectif</th>
                    <th scope="col">start_time</th>
                    <th scope="col">end_time</th>
                    <th scope="col">date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $reservation->title }}</td>
                    <td>{{ $reservation->effectif }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td>{{ $reservation->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{-- !END TABLE --}}


    <script>
        const textarea = document.getElementById('floatingTextarea2');
        const form = document.getElementById('myForm');
        textarea.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault(); // Prevent line break
                form.submit(); // Submit the form
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
