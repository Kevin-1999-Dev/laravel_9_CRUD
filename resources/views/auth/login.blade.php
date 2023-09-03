<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    {{-- bootstrap-css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row mt-5">
        <div class="col-4 offset-4 shadow-sm">
            <div class="text-center">
                <img src="{{ asset('images/logo-social.png') }}" class="w-25" alt="">
                <h3>Log in to your account</h3>
                <p class="text-muted">Welcome Back!</p>
            </div>
            <div>
                <form action="{{ route('login#process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror">
                        @error('email')
                            <small class="text-danger">{{  $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid  @enderror">
                        @error('password')
                        <small class="text-danger">{{  $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Sign in" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
