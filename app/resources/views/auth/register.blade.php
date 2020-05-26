<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>MonFamily</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('font/iconsmind/style.css')}}" />
    <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}" />

    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
  </head>

  <body class="background show-spinner">
    <div class="fixed-background"></div>
    <main>
      <div class="container">
	<div class="row justify-content-center">
	  <div class="col-md-8">
	    <div class="card">
	      <div class="card-header">{{ __('Register') }}</div>

	      <div class="card-body">
		<form method="POST" action="{{ route('register') }}">
		  @csrf

		  <!-- Name -->
		  <div class="form-group row">
		    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

		    <div class="col-md-6">
		      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

		      @if ($errors->has('name'))
			<span class="invalid-feedback" role="alert">
			  <strong>{{ $errors->first('name') }}</strong>
			</span>
		      @endif
		    </div>
		  </div>

		  <!-- Full Name -->
		  <div class="form-group row">
		    <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

		    <div class="col-md-6">
		      <input id="fullname-confirm" type="text" class="form-control" name="fullname" required>
		    </div>
		  </div>

		  <!-- Email -->
		  <div class="form-group row">
		    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

		    <div class="col-md-6">
		      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

		      @if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
			  <strong>{{ $errors->first('email') }}</strong>
			</span>
		      @endif
		    </div>
		  </div>

		  <!-- Register Dugaar -->
		  <div class="form-group row">
		    <label for="register" class="col-md-4 col-form-label text-md-right">{{ __('Register Dugaar') }}</label>

		    <div class="col-md-6">
		      <input id="register-confirm" type="text" class="form-control" name="register" required>
		    </div>
		  </div>


		  <!-- Phone Dugaar -->
		  <div class="form-group row">
		    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

		    <div class="col-md-6">
		      <input id="phone-confirm" type="text" class="form-control" name="phone" required>
		    </div>
		  </div>

		  <!-- Birth Date -->
		  <div class="form-group row">
		    <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

		    <div class="col-md-6">
		      <input id="birth-confirm" type="date" class="form-control" name="birth" required>
		    </div>
		  </div>

		  <!-- Sex -->
		  <div class="form-group row my-4">
		    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

		    <div class="col-md-6">
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
			<label class="form-check-label" for="male">
			  Male
			</label>
		      </div>
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="gender" id="female" value="2">
			<label class="form-check-label" for="female">
			  Female
			</label>
		      </div>
		    </div>
		  </div>

		  <!-- Role -->
		  <div class="form-group row my-4">
		    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

		    <div class="col-md-6">
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="role" id="admin" value="0" checked>
			<label class="form-check-label" for="admin">
			  Admin
			</label>
		      </div>
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="role" id="reception" value="1">
			<label class="form-check-label" for="reception">
			  Reception
			</label>
		      </div>
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="role" id="doctor" value="2">
			<label class="form-check-label" for="doctor">
			  Doctor
			</label>
		      </div>
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="role" id="assistant" value="3">
			<label class="form-check-label" for="assistant">
			  Assistant
			</label>
		      </div>
		      <div class="form-check">
			<input class="form-check-input" type="radio" name="role" id="accountant" value="4">
			<label class="form-check-label" for="accountant">
			  Accountant
			</label>
		      </div>
		    </div>
		  </div>

		  <!-- Password -->
		  <div class="form-group row">
		    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

		    <div class="col-md-6">
		      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

		      @if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
			  <strong>{{ $errors->first('password') }}</strong>
			</span>
		      @endif
		    </div>
		  </div>

		  <!-- Confirm Password -->
		  <div class="form-group row">
		    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

		    <div class="col-md-6">
		      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		    </div>
		  </div>

		  <!-- Register -->
		  <div class="form-group row mb-0">
		    <div class="col-md-6 offset-md-4">
		      <button type="submit" class="btn btn-primary">
			{{ __('Register') }}
		      </button>
		    </div>
		  </div>
		</form>
	      </div>
	    </div>
	  </div>
	</div>
      </div>
    </main>
    <script src="{{asset('js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/dore.script.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
  </body>

</html>
