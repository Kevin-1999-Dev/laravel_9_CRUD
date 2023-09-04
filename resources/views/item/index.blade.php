@extends('../layout')

@section('item')
<nav class="d-flex justify-content-between align-items-center shadow-sm mb-3 p-2">
    <div class="">
        <i class="fa-solid fa-bars fs-2"></i>
    </div>
    <div>
        <img src="{{ asset('images/user.png') }}" class="user" alt="">
    </div>
</nav>
<div>
    <a href="{{ route('item#index') }}" class="text-decoration-none">Items List</a>
</div>
<div class="float-end me-5 mb-3">
    <a href="{{ route('item#createPage') }}" class="btn btn-primary text-white"><i class="fa-solid fa-plus"></i> Add
        Items</a>
</div>
<div class="mt-5 text-center col-6 offset-3">
    @if (session('createSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('createSuccess') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('updateMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('updateMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('deleteSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('deleteSuccess') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>
<div>
    <table class="table">
        <thead class="text-white text-center bg-primary">
            <tr>
                <th>Action</th>
                <th>No</th>
                <th>Item</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Owner</th>
                <th>Publish</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($lists as $list)
            <tr>
                <td>
                    <a href="{{ route('item#updatePage',$list->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pencil"></i></a>
                    <a href="{{ route('item#delete',$list->id) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                </td>
                <td>
                    {{ $list->id }}
                </td>
                <td>
                    {{ $list->name }}
                </td>
                <td>
                    {{ $list->category_name }}
                </td>
                <td>{{ $list->description }} </td>
                <td>${{ $list->price }}</td>
                <td>{{ $list->owner_name }}</td>
                <td>
                    @if ($list->status == 1)
                    <a href="{{ route('item#status',$list->id) }}" class="btn btn-primary">On</a>
               @else
               <a href="{{ route('item#status',$list->id) }}" class="btn btn-primary">Off</a>
               @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $lists->links() }}
</div>


@endsection
