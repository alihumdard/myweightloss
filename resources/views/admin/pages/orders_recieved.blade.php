@extends('admin.layouts.default')
@section('title', 'Orders Recieved')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <style>
        .edit i {
            color: #4154F1;
            font-size: 20px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .delete i {
            color: #E34724;
            font-size: 20px;
            margin-left: 10px;
        }

        .card-body table tr {
            background-color: #E34724 !important;
        }

        /* Custom CSS for DataTables buttons */
        .btn-blue {
            background-color: blue !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            margin-right: 5px;
            font-weight: bold;
        }

        .btn-blue:hover {
            background-color: darkblue !important;
        }

        .table-stripe tbody tr:nth-child(odd) {
            background-color: lightblue;
        }

        .table-stripe tbody tr:nth-child(even) {
            background-color: deepskyblue;
        }



        .date {
            font-size: 11px
        }

        .comment-text {
            font-size: 12px
        }

        .fs-12 {
            font-size: 12px
        }

        .shadow-none {
            box-shadow: none
        }

        .name {
            color: #007bff
        }

        .cursor:hover {
            color: blue
        }

        .cursor {
            cursor: pointer
        }

        .textarea {
            resize: none
        }
    </style>

    <div class="pagetitle">
        <h1>Orders Confirmed</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Orders Confirmed</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header mt-2" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                    </div>
                    <div class="card-body">
                        <!-- <div class="col-md-6"> -->
                        <div class="text">
                            <h4>Customer</h4>
                            <span>lorem</span> <br>
                            <span>1 order</span>
                        </div>
                        <div class="text">
                            <h6 class="mt-1">Contact Information</h6>
                            <p class="pr-2">Phone:<span>0000 0000 0000</span></p>
                            <p class="ml-2">Email:<a href="#">info@gmail.com</a></p>
                        </div>
                        <!-- </div> -->
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card">
                    <div class="card-header mt-2" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                    </div>
                    <div class="card-body">
                        <div class="text">
                            <h4>Shipping Adress</h4>
                            <span>United Kindom</span><br>
                            <span>0000 0000 00</span><br>
                            <span>0000 0000 00</span>
                        </div>
                        <div class="text mt-2">
                            <h4>Billing Adress</h4>
                            <span>same as shipping adress</span><br>
                            <span>lorem</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header mt-3" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                    </div>
                    <div class="card-body">
                        <div class="text">
                            <h5>Add Note</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- status -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header mt-3" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                        </div>
                        <div class="card-body">

                            <section class="h-100 ">
                                <div class="container h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-lg-12">
                                            <!-- <div class="card" style="border-radius: 10px;"> -->
                                            <div class="text">
                                                <h4>Fulfill by</h4> <br>
                                                <p>wed, 23 Mar, 48:00</p>

                                            </div>
                                            <!-- <div class="card-body p-4"> -->

                                            <div class="card shadow-0 border mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp" class="img-fluid" alt="Phone">
                                                        </div>
                                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0">Samsung Galaxy</p>
                                                        </div>
                                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0 small">White</p>
                                                        </div>
                                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0 small">Capacity: 64GB</p>
                                                        </div>
                                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0 small">Download</p>
                                                        </div>
                                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0 small">$499</p>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-md-2">
                                                            <p class="text-muted mb-0 small">Track Order</p>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="progress" style="height: 6px; border-radius: 16px;">
                                                                <div class="progress-bar" role="progressbar" style="width: 65%; border-radius: 16px; background-color: #94c6da;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="d-flex justify-content-around mb-1">
                                                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <p class="fw-bold mb-0">Order status </p>
                                                <p class="text-muted mb-0">1 item</p>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <p class="fw-bold mb-0">Subtotal </p>
                                                <p class="text-muted mb-0">1 item</p>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <p class="text-muted mb-0">shipping</p>
                                                <p class="text-muted mb-0"> $19.00</p>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <p class="text-muted mb-0">Total</p>
                                                <p class="text-muted mb-0"> 123</p>
                                            </div>
                                            <div class="card-footer border-0 px-4 ">
                                                <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                                    paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- comment section   -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header mt-3" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                            </div>
                            <div class="card-body">

                                <div class="container mt-5">
                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-8">
                                            <div class="d-flex flex-column comment-section">
                                                <div class="bg-light p-2">
                                                    <div class="d-flex flex-row align-items-start"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                                                    <div class="mt-2 m-1 text-right">
                                                        <button class="btn btn-primary btn-sm shadow-none mr-2" type="button">Post comment</button>
                                                        <button class="btn btn-outline-primary btn-sm ml-2 shadow-none" type="button">Cancel</button>
                                                    </div>

                                                </div>
                                                <div class="bg-white p-2">
                                                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">Hamza sharif</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                                <div class="bg-white">
                                                    <div class="d-flex flex-row fs-12">
                                                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                                        <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                                        <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    $(function() {
        $("#tbl_data").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "info": true,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            "buttons": [{
                    extend: 'pdf',
                    text: 'Donwload PDF ',
                    className: 'btn-blue',
                },
                // {
                //     extend: 'excel',
                //     text: 'Donwload Excel ',
                //     className: 'btn-blue', 
                // },

                {
                    extend: 'print',
                    text: 'Print Out',
                    className: 'btn-blue',
                }
            ]
        }).buttons().container().appendTo('#tbl_buttons');
    });
</script>
@endPushOnce