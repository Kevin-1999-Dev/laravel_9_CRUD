@extends('../layout')

@section('catgory')
    <nav class="border border-dark mb-3">
        <div class="">
            <img src="{{  asset('images/menu.png') }}" class="user" alt="">
        </div>
    </nav>
    <div class="mb-3">
        <span>Categories ></span><a href="{{ route('category#updatePage',$data->id) }}" class="text-decoration-none">Edit Categories</a>
    </div>
    <div class="mb-3">
        <h2 class="bg-primary p-2 text-white">Edit Categories</h2>
    </div>
    <div class="">
        <form action="{{ route('category#edit',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Category</label><span class="text-danger">*</span>
                <input type="text" name="name" value="{{ old('name',$data->name) }}" class="form-control  @error('name')
                is-invalid
            @enderror" placeholder="Input Name...">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Photo</label><span class="text-danger">*</span>
                <small class="text-muted d-block">Recommended Size : 400 x 200</small>
                <input type="file" name="image" class="form-control  @error('image')
                is-invalid
            @enderror">
                @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
                <div class="col-3 mt-3">
                    <img src="{{ asset('storage/'.$data->image) }}" class="img-thumbnail shadow-sm" />
                </div>

            </div>
            <div class="mb-5">
                <label for="">Status</label>
                <input type="checkbox" name="categoryCheck" @if ($data->status == 1)
                    checked
                @endif value="done">
            </div>
            <div class="text-center">
                <input type="submit" value="Edit" class="btn btn-primary">
                <a href="{{ route('category#index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>


@endsection
