@extends('backend.master.admin')
@section('body')

<div class="page-main">
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Edit Product</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Category Form -->
                <div class="row row-deck">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Edit Product Form</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal"
                                    action="{{ route('product.update',['id' => $product->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Product Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="Enter Product Name" name="name"
                                                type="text" value="{{$product->name}}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="category_id"
                                                onchange="getSubCategoryByCategory(this.value)">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{$category->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Sub-Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="sub_category_id" id="subcategory">
                                                <option value="">Select Sub-Category</option>
                                                @foreach ($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}"
                                                    {{ $subcategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                                    {{$subcategory->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Brand</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="brand_id">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}"
                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                    {{$brand->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Unit</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="unit_id">
                                                <option value="">Select Unit</option>
                                                @foreach ($units as $unit)
                                                <option value="{{$unit->id}}"
                                                    {{ $unit->id == $product->unit_id ? 'selected' : '' }}>
                                                    {{$unit->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Short
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="short_description"
                                                placeholder="Enter Short Description">{{$product->short_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Long
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="summernote" name="long_description"
                                                placeholder="Enter Long Description">{{$product->long_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Featured Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="image" type="file">
                                            <img src="{{asset($product->image)}}" alt="image" height="100">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Gallery Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="gallery[]" type="file" multiple>
                                            @foreach ($product->gallery as $gallery)
                                            <img src="{{asset($gallery->gallery)}}" alt="image" height="100">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Regular Price</label>
                                        <div class="col-md-9 input-group">
                                            <input class="form-control" placeholder="Enter Regular Price"
                                                name="regular_price" type="number" value="{{$product->regular_price}}">
                                            <input class="form-control" placeholder="Enter Selling Price"
                                                name="sale_price" type="number" value="{{$product->sale_price}}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Stock Amount</label>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="Enter Stock Quantity"
                                                name="stock_amount" type="number" value="{{$product->stock_amount}}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Product Code</label>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="Enter Product Code" name="code"
                                                type="text" value="{{$product->code}}">
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Meta Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="meta_title"
                                                placeholder="Enter Meta Title">{{$product->meta_title}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Meta Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="meta_description"
                                                placeholder="Enter Meta Description">{{$product->meta_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Publication Status</label>
                                        <div class="col-md-9">
                                            <label><input type="radio" name="status"
                                                    {{$product->status == 1 ? 'checked' : ''}} value="1">
                                                Published</label>
                                            <label><input type="radio" name="status"
                                                    {{$product->status == 0 ? 'checked' : ''}} value="0">
                                                Unpublished</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection