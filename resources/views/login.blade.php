@extends('layouts.pages')
@section('content')
{{Auth::logout()}}
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="https://www.wandesk.fr/wp-content/uploads/2019/11/gestion-de-parc-informatique.png" style="margin-left:200px;" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login</h2>
						</div>
						<form action="{{ route('login') }}" method="POST">
                        @csrf
							<div class="input-group custom">
								<input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>this email doesn't exist</strong>
                                    </span>
                                @enderror
							</div>
							<div class="input-group custom">
								<input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="**********" name="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>this password incorrect</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            {{ __('Login') }}
                                        </button>
									</div>
								</div>
                        </div>
                        </div>
						
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection