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
                        <h1 class="page-title">Add Category</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Category Form -->
                <div class="row row-deck">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Edit Category Form</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="post"
                                    Action="{{route('category.update', ['id' => $category->id])}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="categoryName" class="col-md-3 form-label">Category Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="categoryName" name="name"
                                                placeholder="Enter Category Name" type="text"
                                                value="{{$category->name}}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="description" class="col-md-3 form-label">Category
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="categoryDescription" name="description"
                                                placeholder="Enter Category Description">{{$category->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Category Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="image" id="file" type="file">
                                            <img src="{{asset($category->image)}}" alt="image" height="100">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Publication Status</label>
                                        <div class="col-md-9">
                                            <label><input type="radio" name="status"
                                                    {{$category->status==1 ? 'checked' : ''}} value="1">
                                                Published</label>
                                            <label><input type="radio" name="status"
                                                    {{$category->status==0 ? 'checked' : ''}} value="0">
                                                Unpublished</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update New Category</button>
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