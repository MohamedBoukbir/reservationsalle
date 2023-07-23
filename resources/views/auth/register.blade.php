<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/Login.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<title>register</title>
</head>
<body>
	<div class="login-wrap">
	<div class="login-html">
		{{-- <div>
			<h1 style="text-align: center;color: #1161ee;margin-bottom: 60px;font-family: 'nunito';font-weight: normal;">Réservation des salle</h1>
		</div> --}}
		
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sing Up</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="{{ route('register') }}" method="POST">
					@csrf
					<div class="group">
						<label for="name" class="label">Name</label>
						<input id="name" type="text" name="name" class="input @error('name') is-invalid @enderror" required autocomplete="name" autofocus>
					</div>
                    <div class="group">
						<label for="email" class="label">Email</label>
						<input id="email" type="email" name="email" class="input @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

					<div class="group">
						<label for="password" class="label">Password</label>
						<input id="password" 
                            type="password"
                            name="password"
                            required autocomplete="new-password"  class="input @error('password') is-invalid @enderror" >
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <div class="group">
						<label for="password_confirmation" class="label">Confirm Password</label>
						<input id="password_confirmation" 
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" class="input @error('password') is-invalid @enderror">
						@error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					{{-- <div class="group">
						<input id="check" type="checkbox" class="check" name="remember" {{ old('remember') ? 'checked' : '' }}>
						<label for="check"><span class="icon"></span> Remember Me</label>
					</div> --}}
					<div class="group">
						<input type="submit" class="button" value="Sing Up">
					</div>
					<div class="hr"></div>

					<div class="foot-lnk">
						<a href="{{ route('login') }}">Already registered ?</a>
					</div>
				
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>