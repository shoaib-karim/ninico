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
                        <h1 class="page-title">Add Product</h1>
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
                                <h3 class="card-title">Add Product Form</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-success" id="successMessage">{{ session('message') }}</p>
                                <form class="form-horizontal" action="{{ route('product.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Product Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="Enter Product Name" name="name"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Category</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="category_id"
                                                onchange="getSubCategoryByCategory(this.value)">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
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
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Short
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="short_description"
                                                placeholder="Enter Short Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Long
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="summernote" name="long_description"
                                                placeholder="Enter Long Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Featured Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="image" type="file">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Gallery Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="gallery[]" type="file" multiple>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Regular Price</label>
                                        <div class="col-md-9 input-group">
                                            <input class="form-control" placeholder="Enter Regular Price"
                                                name="regular_price" type="number">
                                            <input class="form-control" placeholder="Enter Selling Price"
                                                name="sale_price" type="number">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Stock Amount</label>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="Enter Stock Quantity"
                                                name="stock_amount" type="number">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Product Code</label>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="Enter Product Code" name="code"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Meta Title</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="meta_title"
                                                placeholder="Enter Meta Title"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Meta Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="meta_description"
                                                placeholder="Enter Meta Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Publication Status</label>
                                        <div class="col-md-9">
                                            <label><input type="radio" name="status" value="1">
                                                Published</label>
                                            <label><input type="radio" name="status" value="0">
                                                Unpublished</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Create New Product</button>
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