@extends('../layout')

@section('item')
    <nav class="p-2 shadow-sm mb-3">
        <div class="">
            <i class="fa-solid fa-bars fs-2"></i>
        </div>
    </nav>
    <div class="mb-3">
        <span>Item Lists ></span><a href="{{ route('item#updatePage',$data->id) }}" class="text-decoration-none">Edit Items</a>
    </div>
    <div class="mb-3">
        <h2 class="bg-primary p-2 text-white">Edit Items</h2>
    </div>
    <div>
        <form action="{{ route('item#edit',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <h3>Item Information</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">Item Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" value="{{ old('name',$data->name) }}"
                            class="form-control  @error('name')
                        is-invalid
                    @enderror"
                            placeholder="Input Name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select Category</label><span class="text-danger">*</span>
                        <select name="category_id" id=""
                            class="form-control  @error('category_id')
                        is-invalid
                    @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}" {{ old('category_id',$data->category_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label><span class="text-danger">*</span>
                        <input type="number" name="price" value="{{ old('price',$data->price) }}"
                            class="form-control  @error('price')
                        is-invalid
                    @enderror"
                            placeholder="Enter Price">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label><span class="text-danger">*</span>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form-control  @error('description')
                        is-invalid
                    @enderror"
                            placeholder="Enter Description">{{ old('description',$data->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select Item Condition</label>
                        <select name="condition" id=""
                            class="form-control  @error('condition')
                        is-invalid
                    @enderror">
                            <option value="">Select Item Condition</option>
                            <option value="new" {{ old('conditon',$data->condition ) == 'new' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ old('condition',$data->condition ) == 'used' ? 'selected' : '' }}>Used</option>
                        </select>
                        @error('condition')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select Item Type</label>
                        <select name="type" id=""
                            class="form-control  @error('type')
                        is-invalid
                    @enderror">
                            <option value="">Select Item Type</option>
                            <option value="buy" {{ old('type',$data->type ) == 'buy' ? 'selected' : '' }}>Buy</option>
                            <option value="sell" {{ old('type',$data->type ) == 'sell' ? 'selected' : '' }}>Sell</option>
                            <option value="exchange" {{ old('type',$data->type ) == 'exchange' ? 'selected' : '' }}>Exchange</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <input type="checkbox" name="itemCheck" @if ( $data->status == 1 ) checked @endif value="done">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Item Photo</label><span class="text-danger">*</span>
                        <input type="file" name="image"
                            class="form-control  @error('image')
                        is-invalid
                    @enderror">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="col-3 mt-3">
                            <img src="{{ asset('storage/'.$data->image) }}" class="img-thumbnail shadow-sm" />
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h3>Owner Information</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">Owner Name</label><span class="text-danger">*</span>
                        <input type="text" name="owner_name" value="{{ old('owner_name',$data->owner_name) }}"
                            class="form-control  @error('owner_name')
                        is-invalid
                    @enderror"
                            placeholder="Input Owner Name">
                        @error('owner_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contact Number</label><span class="text-danger">*</span>
                        <input type="number" name="contact_number" value="{{ old('contact_number',$data->contact_number) }}"
                            class="form-control  @error('contact_number')
                        is-invalid
                    @enderror"
                            placeholder="Add Number">
                        @error('contact_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label><span class="text-danger">*</span>
                        <input type="text" name="address" value="{{ old('address',$data->address) }}"
                            class="form-control  @error('address')
                        is-invalid
                    @enderror"
                            placeholder="Enter Address">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 map">
                        <input class="example" type="text" value="" />
                        <div id="mapContainer"></div>
                    </div>
                    <div class="mb-3 ">
                        <input type="submit" value="Edit" class="btn btn-primary">
                        <a href="{{ route('item#index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.example').leafletLocationPicker({
                alwaysOpen: true,
                mapContainer: "#mapContainer",
                position: 'bottomleft',
            });
        });
    </script>
@endsection
