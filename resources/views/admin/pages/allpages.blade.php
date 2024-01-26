@extends('admin.layouts.default')
@section('title', 'All Pages')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Pages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Pages</li>
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
                    <div id="jquery-message"></div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn-group float-right"> <a href="{{ route('admin.addpage') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add new</a> </div>
                        </div>
                    </div>
                    <div class="row" data-select2-id="6">
                        <div class="col-md-2">
                            <form method="post" class="form-inline"> <input type="hidden" name="_token" value="7LOtFGJGTu2qJU8I3cV0oqGdmnea0ZEwfmgGHfvB">
                                <div class="dropdown d-inline-block mb-2 mr-2"><button type="button" class="btn btn-primary dropdown-toggle bulk-actions-button" data-toggle="dropdown" aria-expanded="false" disabled="">Bulk Actions</button>
                                    <div class="dropdown-menu bulk-actions-actions" role="menu" x-placement="bottom-start"> <a class="dropdown-item select-action action-publish " href="javascript:void(0)" data-action="publish">Publish</a> <a class="dropdown-item select-action action-private " href="javascript:void(0)" data-action="private">Private</a> <a class="dropdown-item select-action action-draft " href="javascript:void(0)" data-action="draft">Draft</a> <a class="dropdown-item select-action action-trash " href="javascript:void(0)" data-action="trash">Trash</a> <a class="dropdown-item select-action action-delete  text-danger " href="javascript:void(0)" data-action="delete">Delete</a> </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10" data-select2-id="5">
                            <form method="get" class="form-inline" id="form-search" data-select2-id="form-search">
                                <div class="form-group mb-2 mr-1"><label for="search-keyword" class="sr-only">Keyword</label> <input name="keyword" id="search-keyword" class="form-control" placeholder="Keyword" autocomplete="off"></div>
                                <div class="form-group mb-2 mr-1" data-select2-id="4"><select name="status" id="search-status" class="form-control select2-default select2-hidden-accessible" data-width="100px" data-select2-id="search-status" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="2">All Status</option>
                                        <option value="publish" data-select2-id="9">Publish</option>
                                        <option value="private" data-select2-id="10">Private</option>
                                        <option value="draft" data-select2-id="11">Draft</option>
                                        <option value="trash" data-select2-id="12">Trash</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-search-status-container"><span class="select2-selection__rendered" id="select2-search-status-container" role="textbox" aria-readonly="true" title="All Status">All Status</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div> <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> Search </button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table jw-table table-bordered table-hover" id="allpages_tbl">
                            <thead>
                                <tr>
                                    <th class="bs-checkbox " style="width: 3%; " data-field="0">
                                        <div class="th-inner "><label class="jw__utils__control jw__utils__control__checkbox"><input name="btSelectAll" type="checkbox"><span class="jw__utils__control__indicator"></span></label></div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="text-align: left; width: autopx; " data-field="title">
                                        <div class="th-inner sortable both">Title</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="text-align: left; width: 10%; " data-field="created_at">
                                        <div class="th-inner sortable both">Created at</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="text-align: center; width: 10%; " data-field="status">
                                        <div class="th-inner sortable both">Status</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-index="0">
                                    <td class="bs-checkbox "><label class="jw__utils__control jw__utils__control__checkbox">
                                            <input data-index="0" name="btSelectItem" type="checkbox" value="1">
                                            <span class="jw__utils__control__indicator"></span>
                                        </label></td>
                                    <td style="text-align: left; width: autopx; ">
                                        <div class="font-weight-bold"><a href="/admin-cp/post-type/pages/1/edit">ali testing</a></div>
                                        <ul class="list-inline mb-0 list-actions mt-2 ">
                                            <li class="list-inline-item"><a href="/admin-cp/post-type/pages/1/edit" class="jw-table-row  " data-id="1">Edit</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="jw-table-row text-danger action-item" data-id="1" data-action="delete">Delete</a></li>
                                            <li class="list-inline-item"><a href="http://127.0.0.1:8000/ali-testing" target="_blank" class="jw-table-row  " data-id="1">View</a></li>
                                        </ul>
                                    </td>
                                    <td style="text-align: left; width: 10%; ">December 18, 2023 9:14 am</td>
                                    <td style="text-align: center; width: 10%; "><span class="text-success">Publish</span> </td>
                                </tr>
                                <tr data-index="0">
                                    <td class="bs-checkbox "><label class="jw__utils__control jw__utils__control__checkbox">
                                            <input data-index="0" name="btSelectItem" type="checkbox" value="1">
                                            <span class="jw__utils__control__indicator"></span>
                                        </label></td>
                                    <td style="text-align: left; width: autopx; ">
                                        <div class="font-weight-bold"><a href="/admin-cp/post-type/pages/1/edit">ali testing</a></div>
                                        <ul class="list-inline mb-0 list-actions mt-2 ">
                                            <li class="list-inline-item"><a href="/admin-cp/post-type/pages/1/edit" class="jw-table-row  " data-id="1">Edit</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="jw-table-row text-danger action-item" data-id="1" data-action="delete">Delete</a></li>
                                            <li class="list-inline-item"><a href="http://127.0.0.1:8000/ali-testing" target="_blank" class="jw-table-row  " data-id="1">View</a></li>
                                        </ul>
                                    </td>
                                    <td style="text-align: left; width: 10%; ">December 18, 2023 9:14 am</td>
                                    <td style="text-align: center; width: 10%; "><span class="text-success">Publish</span> </td>
                                </tr>
                                <tr data-index="0">
                                    <td class="bs-checkbox "><label class="jw__utils__control jw__utils__control__checkbox">
                                            <input data-index="0" name="btSelectItem" type="checkbox" value="1">
                                            <span class="jw__utils__control__indicator"></span>
                                        </label></td>
                                    <td style="text-align: left; width: autopx; ">
                                        <div class="font-weight-bold"><a href="/admin-cp/post-type/pages/1/edit">ali testing</a></div>
                                        <ul class="list-inline mb-0 list-actions mt-2 ">
                                            <li class="list-inline-item"><a href="/admin-cp/post-type/pages/1/edit" class="jw-table-row  " data-id="1">Edit</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="jw-table-row text-danger action-item" data-id="1" data-action="delete">Delete</a></li>
                                            <li class="list-inline-item"><a href="http://127.0.0.1:8000/ali-testing" target="_blank" class="jw-table-row  " data-id="1">View</a></li>
                                        </ul>
                                    </td>
                                    <td style="text-align: left; width: 10%; ">December 18, 2023 9:14 am</td>
                                    <td style="text-align: center; width: 10%; "><span class="text-success">Publish</span> </td>
                                </tr>
                                <tr data-index="0">
                                    <td class="bs-checkbox "><label class="jw__utils__control jw__utils__control__checkbox">
                                            <input data-index="0" name="btSelectItem" type="checkbox" value="1">
                                            <span class="jw__utils__control__indicator"></span>
                                        </label></td>
                                    <td style="text-align: left; width: autopx; ">
                                        <div class="font-weight-bold"><a href="/admin-cp/post-type/pages/1/edit">ali testing</a></div>
                                        <ul class="list-inline mb-0 list-actions mt-2 ">
                                            <li class="list-inline-item"><a href="/admin-cp/post-type/pages/1/edit" class="jw-table-row  " data-id="1">Edit</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="jw-table-row text-danger action-item" data-id="1" data-action="delete">Delete</a></li>
                                            <li class="list-inline-item"><a href="http://127.0.0.1:8000/ali-testing" target="_blank" class="jw-table-row  " data-id="1">View</a></li>
                                        </ul>
                                    </td>
                                    <td style="text-align: left; width: 10%; ">December 18, 2023 9:14 am</td>
                                    <td style="text-align: center; width: 10%; "><span class="text-success">Publish</span> </td>
                                </tr>
                                <tr data-index="0">
                                    <td class="bs-checkbox "><label class="jw__utils__control jw__utils__control__checkbox">
                                            <input data-index="0" name="btSelectItem" type="checkbox" value="1">
                                            <span class="jw__utils__control__indicator"></span>
                                        </label></td>
                                    <td style="text-align: left; width: autopx; ">
                                        <div class="font-weight-bold"><a href="/admin-cp/post-type/pages/1/edit">ali testing</a></div>
                                        <ul class="list-inline mb-0 list-actions mt-2 ">
                                            <li class="list-inline-item"><a href="/admin-cp/post-type/pages/1/edit" class="jw-table-row  " data-id="1">Edit</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="jw-table-row text-danger action-item" data-id="1" data-action="delete">Delete</a></li>
                                            <li class="list-inline-item"><a href="http://127.0.0.1:8000/ali-testing" target="_blank" class="jw-table-row  " data-id="1">View</a></li>
                                        </ul>
                                    </td>
                                    <td style="text-align: left; width: 10%; ">December 18, 2023 9:14 am</td>
                                    <td style="text-align: center; width: 10%; "><span class="text-success">Publish</span> </td>
                                </tr>
                            </tbody>
                        </table>
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
    $(function() {
        $('#allpages_tbl').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": false,
        });
    });
</script>
@endPushOnce