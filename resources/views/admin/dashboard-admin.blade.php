<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     hi admin
     <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                            this.closest('form').submit();"
            style="text-decoration: none;">
            <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</body>
</html>