@extends('../layout')

@section('category')
    <nav class="d-flex justify-content-center align-items-center border border-dark mb-3">
        <div class="">
            <img src="{{ asset('images/menu.png') }}" class="user" alt="">
        </div>
        <div>
            <img src="{{ asset('images/user.png') }}" class="user" alt="">
        </div>
    </nav>
    <div>
        <a href="" class="text-decoration-none">Categories</a>
    </div>
    <div class="float-end">
        <a href="{{ route('category#createPage') }}" class="btn btn-primary text-white"><i class="fa-solid fa-plus"></i> Add
            Categories</a>
    </div>
    <div class="mt-5 text-center col-6 offset-3">
        @if (session('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div>
        <table class="table">
            <thead class="text-white bg-primary">
                <tr>
                    <th>Action</th>
                    <th>No</th>
                    <th>Categories</th>
                    <th>Publish</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists as $list)
                <tr>
                    <td>
                        <a href="" class="btn btn-sm btn-success"><i class="fa-solid fa-pencil"></i></a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                    <td>
                        {{ $list->id }}
                    </td>
                    <td>
                     {{ $list->name }}
                    </td>
                    <td>
                        {{ $list->status }}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
