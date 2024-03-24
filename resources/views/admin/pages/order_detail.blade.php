@extends('admin.layouts.default')
@section('title', 'Order Detail')
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
        <h1>Order Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Order Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-4">
                <div class="card  d-flex flex-column">
                    <div class="card-header mt-2" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="card-body flex-grow-1">
                        <div class="text">
                            <h4 class="fw-bold">Customer Details</h4>
                            <span><b>Name: </b>{{ ($order['shipingdetails']['firstName']) ? $order['shipingdetails']['firstName'].''.$order['shipingdetails']['lastName'] : $order['user']['name'] }}</span><br>
                            <span><b>Order Id: </b><span class="text-primary">#00{{$order['id']}}</span></span>
                        </div>
                        <div class="text">
                            <p class="pr-2">
                                <span><b>Phone #:</b> {{$order['shipingdetails']['phone'] ?? $order['user']['phone'] }}</span>
                            </p>
                            <a href="mailTo:{{$order['user']['email']}}">
                                <p class="fw-bold m-0">Send Mail: </p>
                                <p class="mt-0 text-dark">
                                    <b class="">Email: </b>{{$order['user']['email']}}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card  d-flex flex-column">
                    <div class="card-header mt-2" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="card-body flex-grow-1">
                        <div class="text">
                            <h4 class="fw-bold">Shipping Address</h4>
                            <span><b>City: </b>{{$order['shipingdetails']['city'] ?? $order['user']['city'] }}</span><br>
                            <span><b>Postal Code: </b>{{$order['shipingdetails']['zip_code'] ?? $order['user']['zip_code'] }}</span><br>
                            <span><b>Address 1: </b>{{$order['shipingdetails']['address'] ?? $order['user']['address'] }}</span><br>
                            <span><b>Address 2: </b>{{$order['shipingdetails']['address2'] ?? $order['user']['apartment'] }}</span><br>
                        </div>
                        <div class="text mt-2">
                            <h5 class="fw-bold mb-0 ">Billing Address</h5>
                            <span>Same as shipping address</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card  d-flex flex-column my-auto">
                    <div class="card-header mt-3" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="card-body flex-grow-1">
                        <div class="text">
                            <h4 class="fw-bold">Customer Additional Note</h4>
                        </div>
                        <div class="text">
                            <span>{{$order['note'] ?? 'No notes from customer'}}</span><br>
                        </div>
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
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-12">
                                <div class="text">
                                    <h4 class="fw-bold">Fulfill By</h4>
                                    <p>{{ \Carbon\Carbon::parse($order['created_at'])->format('M, d, Y - H:i') }}</p>

                                </div>
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            @php
                                            $src = ($order['variant'])? $order['variant']['image'] : $order['product']['main_image'];
                                            @endphp
                                            <div class="col-md-1" style="height:150px; width:150px;">
                                                <img class="img-fluid pt-3 h-100 w-100" id="product_img" src="{{ asset('storage/'.$src) }}" loading="lazy" alt="Prodcut Image">
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0"><b>Title: </b> {{$order['product']['title'] ?? '' }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Variant: </b> {{$order['variant']['title'] ?? '' }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Quantity: </b> {{$order['quantity']}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Barcode: </b> {{$order['variant']['barcode'] ?? $order['product']['barcode']}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Price: </b>£ {{$order['variant']['price'] ?? $order['product']['price']}}</p>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                        <div class="row">
                                            <div class="col-md-12 gy-1">
                                                <h5 class="fw-bold underline">User Previous Orders History:</h5>
                                                <div class="button-container" style="display: flex; flex-wrap: wrap;">
                                                    @forelse($userOrders as $index => $val)
                                                    <a target="_blank" href="{{ route('admin.orderDetail',['id'=> base64_encode($val['id'])]) }}" class="btn btn-primary m-1">
                                                        <b>{{ $index + 1 }}.</b> #00{{ $val['id'] }}
                                                    </a>
                                                    @empty
                                                    <p class="px-5">No Previous Orders Of that Customer.</p>
                                                    @endforelse

                                                </div>
                                            </div>
                                        </div>

                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                        <div class="row d-flex ">
                                            <div class="col-lg-12 text-center ">
                                                <a target="_blank" href="{{ route('admin.consultationView', ['uid' => base64_encode($order['user']['id']), 'pid' => base64_encode($order['product']['id']) ,'oid'=>  base64_encode($order['id'])]) }}" class="btn btn-link fw-bold large">
                                                    See Consultations
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold mb-0">Order Status: </p>
                                    <p class="mb-0 fw-bold text-success">{{$order['status']}} </p>
                                </div>
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold mb-0">Subtotal: </p>
                                    <p class="text-muted mb-0">£ {{$order['total_ammount'] - $order['shiping_cost']}}</p>
                                </div>
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold  mb-0">Shipping Charges: </p>
                                    <p class="text-muted mb-0"> £ {{$order['shiping_cost']}}</p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold  mb-0">Total: </p>
                                    <p class="text-muted mb-0">£ {{$order['total_ammount']}}</p>
                                </div>
                                <div class="card-footer border-0 px-4 ">
                                    <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                        paid: <span class="h2 mb-0 ms-2">£ {{$order['total_ammount']}}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comment section   -->
            <style>
                .adiv {
                    background: #06c;
                    border-radius: 15px;
                    border-bottom-right-radius: 0;
                    border-bottom-left-radius: 0;
                    font-size: 1.4rem;
                    height: 46px;
                    font-weight: 700;

                }

                .chat {
                    border: none;
                    background: #E2FFE8;
                    font-size: 1rem;
                    border-radius: 20px;
                }

                .bg-white {
                    border: 1px solid #E7E7E9;
                    font-size: 1rem;
                    border-radius: 20px;
                }

                .myvideo img {
                    border-radius: 20px
                }

                .dot {
                    font-weight: bold;
                }

                .form-control {
                    border-radius: 12px;
                    border: 2px solid #F0F0F0;
                    font-size: 1rem;
                }

                .form-control:focus {
                    font-size: 1rem;
                    border: 1px solid #F0F0F0;
                }

                .form-control::placeholder {
                    font-size: 1rem;
                    color: #C4C4C4;
                }
            </style>
            <div class="col-lg-12">
                <div class="w-100 ">
                    <div class="card mt-3">
                        <div class="d-flex flex-row justify-content-center pt-2 adiv text-white">
                            <span class=" fw-bold ">Comment Here</span>
                        </div>
                        <div class="d-flex flex-row p-3">
                            <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="50" height="50">
                            <div class="chat ml-2 p-3">Hello and thankyou for visiting birdlymind. Please click the video above</div>
                        </div>

                        <div class="d-flex flex-row p-3">
                            <div class="bg-white mr-2 p-3"><span class="text-muted">Hello and thankyou for visiting birdlynind.</span></div>
                            <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="50" height="50">
                        </div>

                        <div class="d-flex flex-row p-3">
                            <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="50" height="50">
                            <div class="myvideo ml-2"><img src="https://imgur.com/GOxU1jx.png" width="200"></div>
                        </div>

                        <div class="d-flex flex-row p-3">
                            <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="50" height="50">
                            <div class="chat ml-2 p-3"><span class="text-muted dot">. . .</span></div>
                        </div>

                        <div class="form-group px-3 mb-2">
                            <textarea class="form-control" rows="4" placeholder="Type your message"></textarea>
                        </div>
                        <div class="form-group  mb-4 d-flex flex-row justify-content-end px-3">
                            <input type="submit" class="btn btn-primary fw-bold" value="Push You'r Comment">
                        </div>
                    </div>
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
                    text: 'Download PDF ',
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