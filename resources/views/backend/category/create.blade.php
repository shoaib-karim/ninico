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
                                <h3 class="card-title">Add Category Form</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-success" id="successMessage">{{ session('message') }}</p>
                                <form class="form-horizontal" method="post" Action="{{ route('category.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="categoryName" class="col-md-3 form-label">Category Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="categoryName" name="name"
                                                placeholder="Enter Category Name" type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="description" class="col-md-3 form-label">Category
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="categoryDescription" name="description"
                                                placeholder="Enter Category Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Category Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="image" id="file" type="file">
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
                                    <button class="btn btn-primary" type="submit">Create New Category</button>
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