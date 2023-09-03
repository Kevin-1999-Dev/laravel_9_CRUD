<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    {{-- boostrap-css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="row">
        <div class="main col-3">
            <div class="my-5">
                <img src="{{ asset('images/logo4.jpg') }}" class="w-25" alt="">
                <span class="fs-3 fw-bold">Admin Panel</span>
            </div>
            <div class="text-left ps-5">
                <a href="{{ route('item#index') }}" class="text-decoration-none">
                    <h5 class="list w-75"><i class="fa-solid fa-table-cells-large"></i> Item</h5>
                </a>
                <a href="{{ route('category#index') }}" class="text-decoration-none">
                    <h5 class="list w-75"><i class="fa-solid fa-list"></i> Category</h5>
                </a>
            </div>
            <div class="logout text-left ps-5">
                <a href="{{ route('auth#logout') }}" class="text-decoration-none text-dark"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
        <div class="col-9">
            @yield('item')
            @yield('category')
        </div>
    </div>

</body>
{{-- vue2-cdnjs --}}
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
{{-- bootstrap-js --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
