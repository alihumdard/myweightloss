@extends('admin.layouts.default')
@section('title', 'Add Product')
@section('content')

<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <style>
.dropzone{
    min-height: 150px;
    border: 2px dotted rgba(0, 0, 0, 0.3) !important;
    background: white;
    padding: 20px 20px;
  width: 100%;
  transition: .2s
  height: 20vh !important;
  background: #ffff !important;
  /* box-shadow: 0px 0px 49px -11px rgba(0.78,0,0,0.43);
-webkit-box-shadow: 0px 0px 49px -11px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 49px -11px rgba(0,0,0,0.62); */
}


.dz-message.needsclick img{
    width: 50px
    display: block
    margin: auto
    opacity: .6
    margin-bottom: 15px
}


span.plus{
    left: 36%;
    top: -2%;
    padding: 33px 50px;
    position: absolute;
    color: white;
    font-weight: 900;
    border-radius: 50%;
    opacity: 0;
    z-index: 999;
    background: #4154F1;
    font-size: 35px;
}

span.plus:hover{
    opacity: 0.6;
    transition: 0.5s
}
.dropzone.dz-started .dz-message{
  display: inline-block !important
  float: right
  border: 1px solid rgba(238, 238, 238, 0.36)
  border-radius: 30px
  height: 120px
  margin: 16px
  transition: .2s
}
  span.text{
        display: block;
  }
    </style>

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
            <div class="row gy-4">
                <div class=" col-md-6">
                    <div class="row">
                        <div class="col-sm-12  col-md-12">
                                <div classs="dropzone">
                                    <form action="/upload" class="dropzone needsclick" id="demo-upload">
                                      <div class="dz-message needsclick" style="position: relative;">
                                        <span class="text">
                                        <img class="img-fluid" style="width: 100px; height: auto;" src="http://www.freeiconspng.com/uploads/------------------------------iconpngm--22.png" alt="Camera" />
                                        </span>
                                       <p class="mt-3 fw-bold"> Upload Image</p>
                                        <span class="plus">+</span>
                                      </div>
                                    </form>
                                  </div>
                        </div>
                        {{-- <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="" >

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="http://127.0.0.1:8000/assets/admin/img/profile-img.jpg" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/download.JPG') }}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="">

                        </div>
                        <div class="col-sm-4 col-md-2">
                            <img class="img-fluid product-image-thumb"
                                src="{{ asset('assets/admin/img/productsssss.jpg') }}" alt="">

                        </div> --}}
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
            {{-- <div class="file-input-container">
                <input class="file-input" type="file" name="user_pic" id="fileInput1">
                <div class="upload-icon" onclick="document.getElementById('fileInput1').click()">
                  <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="18" fill="#233A85"></circle>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1634 23.6195L22.3139 15.6658C22.6482 15.2368 22.767 14.741 22.6556 14.236C22.559 13.777 22.2768 13.3406 21.8534 13.0095L20.8208 12.1893C19.922 11.4744 18.8078 11.5497 18.169 12.3699L17.4782 13.2661C17.3891 13.3782 17.4114 13.5438 17.5228 13.6341C17.5228 13.6341 19.2684 15.0337 19.3055 15.0638C19.4244 15.1766 19.5135 15.3271 19.5358 15.5077C19.5729 15.8614 19.3278 16.1925 18.9638 16.2376C18.793 16.2602 18.6296 16.2075 18.5107 16.1097L16.676 14.6499C16.5868 14.5829 16.4531 14.5972 16.3788 14.6875L12.0185 20.3311C11.7363 20.6848 11.6397 21.1438 11.7363 21.5878L12.2934 24.0032C12.3231 24.1312 12.4345 24.2215 12.5682 24.2215L15.0195 24.1914C15.4652 24.1838 15.8812 23.9807 16.1634 23.6195ZM19.5955 22.8673H23.5925C23.9825 22.8673 24.2997 23.1886 24.2997 23.5837C24.2997 23.9795 23.9825 24.3 23.5925 24.3H19.5955C19.2055 24.3 18.8883 23.9795 18.8883 23.5837C18.8883 23.1886 19.2055 22.8673 19.5955 22.8673Z" fill="white"></path>
                  </svg>
                </div>
              </div> --}}
        </section>

    </main>
    <!-- End #main -->

@stop

@pushOnce('scripts')
    <script>



    </script>
@endPushOnce
