@extends('admin.layouts.default')
@section('title', 'RoadMap')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roadmap Points</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Roadmap</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- card for roadmap data -->
            <div class="card">
                <div class="card-body">
                    <form id="roadmap_from" class=" fromdata formValidation" method="POST" action="{{route('store.roadmap')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="prin_title">Title</label>
                                    <input type="text" name="title" id="prin_title" class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <span id="error_desc" class="text-danger d-none text-smaller error-msg"> * please wirte description</span>
                                    <textarea name="desc" id="prin_desc" class="form-control summernote" rows="5" placeholder="Enter Description" required>

                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background:none;">
                            <button type="submit" class="btn btn-primary" style="float: right;">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- card for roadmap table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Roadmaps Points data is here</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="roadmap_tbl" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roadmaps ?? [] as $key => $val)
                            <tr>
                                <td class="td-center">{{ ++$key ?? '' }}</td>
                                <td class="td-center">{{ $val['title'] ?? '' }}</td>
                                <td>{!! $val['desc'] ?? '' !!}</td>
                                <td class="td-center">
                                    <span class="{{ ($val['status'] == 'Active' ?? NULL) ? 'btn btn-success' : 'btn btn-warning' }}" style="display: inline-block;">{{ $val['status'] ?? '' }}</span>
                                </td>
                                <td class="td-center">
                                    <input type="submit" class="btn btn-primary m-1" value="Edit">
                                    <input type="submit" class="btn btn-danger m-1" value="Dell">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
@stop

@pushOnce('scripts')
<!-- form validation setting default for all -->
<script>
    
    $('#roadmap_from').submit(function() {
        let summernoteContent = $('.summernote').summernote('code');
        if (summernoteContent.trim() == '') {
            $('#error_desc').removeClass('d-none');
            return false;
        }else{
            $('#error_desc').addClass('d-none');
        }
        return true;
    });

    $(function() {
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert("Form successful submitted!");
        //     }
        // });
        $('.formValidation').validate({
            rules: {
                title: {
                    required: true,
                    minlength: 1,
                    maxlength: 255
                },
                desc: {
                    required: true,
                    minlength: 15,
                    maxlength: 2000
                },
            },
            messages: {
                title: {
                    required:  "* please wirte suitetable title",
                    minlength: "* Please write more ",
                    maxlength: "* please can write more then 225 char"
                },
                title: {
                    required:  "* please wirte description",
                    minlength: "* Please write more ",
                    maxlength: "* please can write more then 2000 char"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endPushOnce