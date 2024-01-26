@extends('admin.layouts.default')
@section('title', 'Menus')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Menus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row alert alert-light p-2
                     no-radius">
                        <div class="col-md-4">
                            Select menu to edit:
                            <select name="id" class=" form-control ">
                                <option value="2">ali2</option>
                            </select>
                        </div>
                        <div class=" col-md-4 form-group">
                            <form action="http://127.0.0.1:8000/admin-cp/menus/store" method="post">
                                Create new menu:
                                <input type="text" name="name" class="form-control" autocomplete="off" required="" placeholder="Menu name">
                            </form>
                        </div>
                        <div class="col-md-4 pt-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add menu </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ">
                            <h5 class="mb-2 font-weight-bold">Select Pages</h5>
                            <div class="card " id="menu-box-post_type_pages">
                                <div class="card-header card-header-flex bg-light">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="mb-0 text-capitalize">Pages</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="http://127.0.0.1:8000/admin-cp/menus/add-item" method="post" class="form-menu-block">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="box-pages-latest-label" href="#box-pages-latest-tab" data-toggle="tab">Latest</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="box-pages-search-label" href="#box-pages-search-tab" data-toggle="tab">Search</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade p-2 active show" id="box-pages-latest-tab" role="tabpanel" aria-labelledby="box-pages-latest-label">
                                                <div class="form-check mt-1">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input select-all-pages" type="checkbox" name="items[]" value="1">
                                                        ali testing
                                                    </label>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input select-all-checkbox" type="checkbox" data-select="select-all-pages">
                                                                Select all
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade p-2" id="box-pages-search-tab" role="tabpanel" aria-labelledby="box-pages-search-label">
                                                <input class="form-control menu-box-post-type-search" type="text" placeholder="Search" data-post_type="pages" data-key="pages">
                                                <div class="box-tab-search-result mt-2"></div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input select-all-checkbox" type="checkbox" data-select="select-all-search-pages">
                                                                Select all
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="key" value="post_type_pages">
                                        <input type="hidden" name="reload_after_save" value="0">
                                        <button type="submit" class="btn btn-primary btn-sm mt-2 px-3">
                                            <i class="fa fa-plus"></i>
                                            Add to menu
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 h-100">
                            <h5 class="mb-2 font-weight-bold">Menu structure</h5>
                            <form action="http://127.0.0.1:8000/admin" method="post">
                                <input type="hidden" name="id" value="2">
                                <div class="card">
                                    <div class="card-header bg-light ">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3">Menu name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" id="name" class="form-control" value="ali2" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="btn-group float-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-save"></i>
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="form-menu">
                                        <div class="dd" id="jw-menu-builder">
                                            <ol class="dd-list"></ol>
                                            <div class="dd-empty"></div>
                                        </div>
                                        <hr>
                                        <div class="form-check mb-2">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="location[]" type="checkbox" value="primary">
                                                Primary menu
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="text-danger delete-menu" data-id="2">
                                                Delete menu
                                            </a>
                                        </div>
                                        <div class="btn-group float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save"></i>
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
@stop

@pushOnce('scripts')
<!-- data table -->
<script>
   
</script>
@endPushOnce