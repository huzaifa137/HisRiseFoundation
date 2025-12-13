@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid" style="padding-bottom: 6rem; margin-bottom: 6rem;">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Contact Start -->
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg p-4 p-md-5">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h2 class="h3 card-title text-primary fw-bold">Sign In</h2>
                            <p class="text-muted">Access your account now.</p>
                        </div>
                        @if (session('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                        @endif

                        <form id="loginForm">
                            @csrf

                            <div class="mb-3">
                                <label for="email_card" class="form-label">Email address</label>
                                <input type="email" name="email" id="email_card" class="form-control"
                                    placeholder="name@example.com" autofocus>
                                <span class="text-danger" id="email_error"></span>
                            </div>

                            <div class="mb-3">
                                <label for="password_card" class="form-label">Password</label>
                                <input type="password" name="password" id="password_card" class="form-control"
                                    placeholder="********">
                                <span class="text-danger" id="password_error"></span>
                            </div>

                            <div id="login_message"></div>

                            <button type="submit" class="btn btn-primary w-100 py-2">Log In</button>
                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-0 text-muted">
                                New user?
                                <a href="#" class="text-primary fw-bold">Create an account</a>
                            </p>
                        </div>
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script>
                    $('#loginForm').on('submit', function (e) {
                        e.preventDefault();

                        // Clear previous errors
                        $('#email_error').text('');
                        $('#password_error').text('');
                        $('#login_message').text('');

                        let btn = $('#loginForm button[type="submit"]');

                        // Disable button + show loading text
                        btn.prop('disabled', true).text('Logging in...');

                        $.ajax({
                            url: "{{ route('auth.login') }}",
                            type: "POST",
                            data: $(this).serialize(),

                            success: function (response) {
                                $('#login_message').html('<span class="text-success">' + response.message + '</span>');

                                // Redirect after successful login
                                window.location.href = response.redirect;
                            },

                            error: function (xhr) {

                                // Re-enable button + restore text
                                btn.prop('disabled', false).text('Log In');

                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;

                                    if (errors.email) {
                                        $('#email_error').text(errors.email[0]);
                                    }
                                    if (errors.password) {
                                        $('#password_error').text(errors.password[0]);
                                    }
                                }
                                else if (xhr.status === 401) {
                                    let errors = xhr.responseJSON.errors;

                                    if (errors.email) {
                                        $('#email_error').text(errors.email[0]);
                                    }
                                    if (errors.password) {
                                        $('#password_error').text(errors.password[0]);
                                    }

                                    $('#login_message').html('<span class="text-danger">Login failed</span>');
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- Contact Start -->

@include('layouts.footer')