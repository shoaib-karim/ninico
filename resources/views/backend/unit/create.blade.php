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
                        <h1 class="page-title">Add Unit</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Unit</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Category Form -->
                <div class="row row-deck">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Add Unit Form</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">{{session('message')}}</p>
                                <form class="form-horizontal" action="{{route('unit.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Unit Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="name" id="categoryName"
                                                placeholder="Enter Unit Name" type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Unit Code</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="code" id="categoryName"
                                                placeholder="Enter Unit Code" type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-md-3 form-label">Unit
                                            Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="description" id="categoryDescription"
                                                placeholder="Enter Unit Description"></textarea>
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
                                    <button class="btn btn-primary" type="submit">Create New Unit</button>
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