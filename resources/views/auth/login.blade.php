<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
     {{-- fontawesome --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
     integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- bootstrap-css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row mt-5" id="app">
        <div class="col-4 offset-4 shadow-sm">
            <div class="text-center">
                <img src="{{ asset('images/kaung1.png') }}" class="w-25" alt="">
                <h3>Log in to your account</h3>
                <p class="text-muted">Welcome Back!</p>
            </div>
            <div>
                <form action="{{ route('auth#login') }}" method="POST">
                    @if (session('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('logout'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('logout') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                        <div class="input-group">
                            <input type="text" v-if="isShowPassword" name="password" class="form-control @error('password') is-invalid  @enderror">
                            <input type="password" v-else name="password" class="form-control @error('password') is-invalid  @enderror">
                            <span class="input-group-text btn btn-primary"  v-on:click="showPassword"><i :class="!isShowPassword ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash' "  ></i></span>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
{{-- bootstrap-js --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    let app = new Vue({
        el : '#app',
        data : {
            isShowPassword : false,
        },
        methods: {
            showPassword(){
                this.isShowPassword = !this.isShowPassword
            }
        }

    });
</script>
</html>
