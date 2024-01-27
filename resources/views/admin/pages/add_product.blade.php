@extends('admin.layouts.default')
@section('title', 'Add Product')
@section('content')
    <!-- main stated -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="product-sec">
            <div class="row">
                <div class=" col-md-6">
                    <div class="row gy-3">
                        <div class="col-sm-4  col-md-12">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">
                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid" src="{{asset('assets/admin/img/productsssss.jpg')}}" alt="">

                        </div>
                    </div>
                    <div class="col-lg-12">



                    </div>
                </div>
                <div class="col-md-6">

                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <div class="form-floating mt-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Comments</label>
                        </div>

                    <hr>
                    <!--colors-section start-->
                    {{-- <div class="colors-sec">
                        <h5>Available Colors</h5>
                        <div class="row gy-2 ps-3">
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Green
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-1">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Blue
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-2">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Purple
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-3">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Red
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-4">

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="box">
                                    <div class="color-text">
                                        Orange
                                    </div>
                                    <div class="text-center">
                                        <div class="color-div-5">

                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>

                    </div> --}}


                    {{-- <div class="colors-sec mt-3">
                        <h5>Size please select</h5>
                        <div class="color-box-main d-flex">
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text">
                                        <h4 class="fw-bold">S</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>small</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text">
                                        <h3 class="fw-bold">M</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>Medium</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text ">
                                        <h4 class="fw-bold">L</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>Large</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="text-center">
                                    <div class="color-text">
                                        <h4 class="fw-bold">XL</h4>
                                    </div>
                                    <div class="text-center">
                                        <div>
                                            <span>Xtra-Large</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                    <div class="pricing mt-3">
                          <form>
                    <div class="row gy-2">
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Price</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="inputPassword6" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Price</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="inputPassword6" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Price</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="inputPassword6" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Price</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="inputPassword6" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Ex Tax:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="inputPassword6" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="product-btns mt-4">
                        <button>Cancel</button> &nbsp;
                        <button>Submit</button>
                    </div>
                    </form>
                    </div>











                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->

@stop

@pushOnce('scripts')
    <script></script>
@endPushOnce
