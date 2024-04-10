@extends('layouts.app2')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card d-flex gap-5">
					<div class="card-header"
						style="background:linear-gradient(118deg, rgba(11, 17, 27, 1), rgba(11, 17, 27, 0.7))!important; color:white;">
						{{ __('Register') }}
					</div>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}" id="register-form" class="d-flex flex-column gap-4">
							@csrf
							<input type="hidden" id="register_type" name="register_type" value="1">
							<!-- 1: customer, 2: business -->
							<div class="row">
								<div class="col-md-6">
									<label for="company_name" class="col-md-4 col-form-label text-md-start">
										{{ __('Company Name') }}
									</label>

									<div>
										<input id="company_name" type="text"
											class="form-control @error('company_name') is-invalid @enderror" name="company_name"
											value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

										@error('company_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<label for="website" class="col-md-4 col-form-label text-md-start">
										{{ __('Website') }}
									</label>
									<div>
										<input 
											id="website" type="text"	
											class="form-control @error('website') is-invalid @enderror" 
											name="website"
											value="{{ old('website') }}" 
											required autocomplete="website" autofocus
										>
										@error('website')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<label for="first_name"	class="col-md-4 col-form-label text-md-start">
										{{ __('First Name') }}
									</label>

									<div>
										<input 
											id="first_name" 
											type="text"
											class="form-control @error('first_name') is-invalid @enderror" 
											name="first_name"
											value="{{ old('first_name') }}" 
											required autocomplete="first_name" autofocus
										>

										@error('first_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<label for="last_name" class="col-md-4 col-form-label text-md-start">
										{{ __('Last Name') }}
									</label>

									<div>
											<input 
												id="last_name" type="text"
												class="form-control @error('last_name') is-invalid @enderror" 
												name="last_name"
												value="{{ old('last_name') }}" 
												required autocomplete="last_name" autofocus
											>

											@error('last_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
									</div>
								</div>
							</div>	

							<div class="row">
								<div class="col-md-6">
									<label for="email" class="col-md-4 col-form-label text-md-start">
										{{ __('Email Address') }}
									</label>

									<div>
										<input 
											id="email" 
											type="email"
											class="form-control @error('email') is-invalid @enderror" 
											name="email"
											value="{{ old('email') }}" 
											required autocomplete="email"
										>

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<label for="phone" class="col-md-4 col-form-label text-md-start">
										{{ __('Phone') }}
									</label>

									<div>
										<input 
											id="phone" 
											type="text"
											class="form-control @error('phone') is-invalid @enderror" 
											name="phone"
											value="{{ old('phone') }}" 
											required autocomplete="phone" autofocus
										>

										@error('phone')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<label for="new_password"	class="col-md-4 col-form-label text-md-start">
										{{ __('New Password') }}
									</label>

									<div>
										<input 
											id="new_password" 
											type="password"
											class="pr-password form-control @error('new_password') is-invalid @enderror"
											name="new_password" required autocomplete="new-password"
										>

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6">
									<label for="confirm_password"	class="col-md-4 col-form-label text-md-start">
										{{ __('Confirm Password') }}
									</label>

									<div>
										<input 
											id="confirm_password" 
											type="password" 
											class="form-control"
											name="password_confirmation" 
											required autocomplete="new-password"
										>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<label for="plan"	class="col-md-4 col-form-label text-md-start">
										{{ __('Select Plan') }}
									</label>
									<div>
										<input 
											id="confirm_password" 
											type="password" 
											class="form-control"
											name="password_confirmation" 
											required autocomplete="new-password"
										>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="offset-md-4">
										<div class="form-check">
											<input 
												class="form-check-input" 
												type="checkbox" 
												name="add_cookie_banner"
												id="add_cookie_banner" {{ old('add_cookie_banner') ? 'checked' : '' }}
											>
											<label class="form-check-label" for="add_cookie_banner">
												Active
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="offset-md-4">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="active_send_setup_email"
												id="active_send_setup_email" {{ old('active_send_setup_email') ? 'checked' : '' }}>
											<label class="form-check-label" for="active_send_setup_email">
												Send Setup Email
											</label>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-md-6 d-flex gap-4">
									<div class="col-md-6 offset-md-4">
										<div class="form-check">
											<input 
												class="form-check-input" 
												type="checkbox" 
												name="add_cookie_banner"
												id="add_cookie_banner" {{ old('add_cookie_banner') ? 'checked' : '' }}
											>
											<label class="form-check-label" for="add_cookie_banner">
												Add Cookie Consent Banner to Company's Website
											</label>
										</div>
									</div>
								</div> -->
						
							<div class="row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-dark">
										{{ __('Register') }}
									</button>
								</div>
							</div>
							@if(env('APP_ENV') == 'local')
							{{-- <div class="row mt-3">
								<div class="col-md-6 offset-md-4">
									<button type="button" class="btn btn-dark" onclick="test_toast()">
										{{ __('Notification') }}
									</button>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-6 offset-md-4">
									<button type="button" class="btn btn-dark" onclick="test_loading()">
										{{ __('Loading') }}
									</button>
								</div>
							</div> --}}
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="overlay">
		The processing may take a moment to complete.
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('libs/toaster/toaster.js') }}"></script>
@stop

@push('scripts')
	<script>
		$.validator.addMethod("password_match_func", function(value, element) {
			let new_password = $("#new_password").val();
			let password_confirmation = $("#confirm_password").val();
			if (new_password != password_confirmation) {
				return false;
			}
			return true;
		});

		$("#register-form").validate({
			// ignore: ":hidden",
			rules: {
				company_name: {
					required: true
				},
				website: {
					required: true
				},
				first_name: {
					required: true,
					minlength: 1,
					maxlength: 300,
				},
				last_name: {
					required: true,
					minlength: 1,
					maxlength: 300,
				},
				email: {
					required: true
				},
				phone: {
					required: true
				},
				new_password: {
					required: true,
					minlength: 8,
					password_validation_func: true
				},
				password_confirmation: {
					required: true,
					password_match_func: true
				},
			},
			messages: {
				password_confirmation: {
					password_match_func: "Confirmation password does not match.",
				}
			},
			submitHandler: function(form) {
				// form.submit();
				let link =  "{{ env('CUSTOMER_API_URL') }}";

				$.ajax({
					type: "POST",
					url: link,
					dataType: 'json',
					data: {
						"register_type": $("#register_type").val(),
						"company_name": $("#company_name").val(),
						"website": $("#website").val(),
						"first_name": $("#first_name").val(),
						"last_name": $("#last_name").val(),
						"email": $("#email").val(),
						"phone": $("#phone").val(),
						"new_password": $("#new_password").val(),
						"confirm_password": $("#confirm_password").val(),
						"add_cookie_banner": $('#add_cookie_banner').is(':checked') ? 1 : 0,
						"active_send_setup_email": $('#active_send_setup_email').is(':checked') ? 1 : 0
					},
					beforeSend: function(){
						console.log("processing ...");
						test_loading();
					},
					success: function(data, textStatus, error) {
						console.log(data);
						if(data.state == 1){
							location.href = "{{ env('CUSTOMER_API_REDIRECT_URL') }}";
							// Toaster.toast(data.message, {
							//     autoClose: true,
							//     autoCloseDelay: 5000,
							//     color: '#4CAF50',
							//     position: 'right-top',
							//     onClick: function(){}
							// });
							// clear_value();
						} else {
							Toaster.error(data.message, {
								autoClose: true,
								autoCloseDelay: 5000,
								// color: '#333',
								position: 'right-top',
								onClick: function(){}
							});
						}
						$("body").removeClass("loading");
					},
					error: function(request, textStatus, error) {
						console.log(request);
						$("body").removeClass("loading");
						Toaster.error('Server Internal Error.');
					}
				});
			}
		});

		function init_value() {
			$("#company_name").val("business 002");
			$("#website").val("example.com");
			$("#first_name").val("business");
			$("#last_name").val("002")
			$("#email").val("business002@gamil.com"),
			$("#phone").val("123456789"),
			$("#new_password").val("bYXZtQKh"),
			$("#confirm_password").val("bYXZtQKh")
			$('#add_cookie_banner').prop('checked', false);
			$('#active_send_setup_email').prop('checked', false);
		}

		function clear_value(){
			$("#company_name").val("");
			$("#website").val("");
			$("#first_name").val("");
			$("#last_name").val("");
			$("#email").val("");
			$("#phone").val("");
			$("#new_password").val("");
			$("#confirm_password").val("");
			$('#add_cookie_banner').prop('checked', false);
			$('#active_send_setup_email').prop('checked', false);
		}

		function test_toast() {
			// Toaster.error('warning --------------------------------------');

			Toaster.toast('text', {
				autoClose: true,
				autoCloseDelay: 2000,
				// color: 'rgb(51, 51, 51)',
				color: '#333',
				position: 'right-top',
				onClick: function(){}
			})
		}

		function test_loading() {
			console.log("test_loading");
			$("body").addClass("loading");
		}

		@if(env("APP_ENV") == "local")
				// init_value();
		@endif

		window.onload = function () {
			if (window.location.href.toString().toLocaleLowerCase().indexOf("customer.leadpipe.com") > -1) {
				$("#register_type").val("1"); // customer
			} else if (window.location.href.toString().toLocaleLowerCase().indexOf("customer.leadpipe.com") > -1) {
				$("#register_type").val("2"); // business
			} else {
				$("#register_type").val("2"); // localhost - test business
			}
			console.log("window load function");
		}
	</script>
@endpush

@section('styles')
<style>
	.overlay {
		display: none;
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		z-index: 999;
		background: rgba(255,255,255,0.8) url({{ asset('img/loader.gif') }}) center no-repeat;
		text-align:center;
		align-items:center;
		justify-content: center;
		align-items: center;
		font-size: 20px;
	}
	/* Turn off scrollbar when body element has the loading class */
	body.loading {
		overflow: hidden;   
	}
	/* Make spinner image visible when body element has the loading class */
	body.loading .overlay {
			display: flex;
			padding-top: 150px;
	}
</style>
<link rel="stylesheet" href="{{ asset('libs/toaster/toaster.css') }}">
@stop
