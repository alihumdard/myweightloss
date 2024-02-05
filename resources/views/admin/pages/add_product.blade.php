@extends('admin.layouts.default')
@section('title', 'Add Product')
@section('content')

<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<style>
    html * {
        box-sizing: border-box;
    }

    p {
        margin: 0;
    }

    .upload__box {
        padding: 50px 0;
        min-height: 342px;
        border: 1px dotted;
        position: relative;
        background: white;
    }

    .upload__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        color: #fff;
        text-align: center;
        min-width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 56px;
        line-height: 26px;
        font-size: 35px;
        position: absolute;
        top: 37%;
        font-weight: 900;
        left: 43%;
    }

    .uploaded__btn {
        color: #fff;
        text-align: center;
        min-width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 56px;
        line-height: 26px;
        font-size: 35px;
        position: absolute;
        font-weight: 900;
        bottom: 5%;
        right: 6%;
        bottom: 9%;
    }

    .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all .3s ease;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
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
        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeProduct') }}" novalidate>
            @csrf
            <div class="row gy-4">
                <div class=" col-md-6">
                    <div class="row">
                        <div class="col-sm-12  col-md-12">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <div class="upload__img-wrap">
                                        <label class="upload__btn" id="uploadbtn" for="product_images">
                                            <p>+</p>
                                            <input type="file" multiple data-max_length="5" id="product_images" name="images[]" class="upload__inputfile" required>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please select product image!</div>
                            @error('images')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <input class="form-control me-2" type="text" name="title" id="pro_id" value="{{  $product['title'] ?? old('title') }}" placeholder="product title" aria-label="Search" required>
                    <div class="invalid-feedback">Please write product title!</div>
                    @error('title')
                    <div class="alert-danger text-danger ">{{ $message }}</div>
                    @enderror
                    <div class="form-floating col-12  mt-3">
                        <textarea class="form-control h-50" name="desc" id="pro_desc" cols="10" rows="10" placeholder="product Description" required=''> {{ $product['desc'] ?? old('desc') }} </textarea>
                        <div class="invalid-feedback">Please write product desc!</div>
                        @error('desc')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror
                        <label for="pro_desc">product Description</label>
                    </div>

                    <hr>
                    <!--colors-section start-->
                    <div class="pricing mt-3">
                        <div class="row gy-2">
                            <div class="col-md-2">
                                <label for="price" class="col-form-label">Price</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="price" id="price" value="{{  $product['price'] ?? old('price') }}" class="form-control" required>
                                <div class="invalid-feedback">Enter product price!</div>
                                @error('price')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="qty" class="col-form-label">Qty</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="qty" name="qty" value="{{  $product['qty'] ?? old('qty') }}" class="form-control" required>
                                <div class="invalid-feedback">Enter product Qty!</div>
                                @error('qty')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="stock" class="col-form-label">Stock</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="stock" id="stock" value="{{  $product['stock'] ?? old('stock') }}" class="form-control" required>
                                <div class="invalid-feedback">Enter avialable stock!</div>
                                @error('stock')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="cnn" class="col-form-label">Cnn No</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="cnn" id="cnn" value="{{  $product['cnn'] ?? old('cnn') }}" class="form-control" required>
                                <div class="invalid-feedback">Enter cnn number!</div>
                                @error('cnn')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="ext_tax" class="col-form-label">Ex Tax:</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="ext_tax" id="ext_tax" value="{{  $product['ext_tax'] ?? old('ext_tax') }}" class="form-control" required>
                                <div class="invalid-feedback">Enter extra tax!</div>
                                @error('ext_tax')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="product-btns mt-4">
                        <button>Cancel</button> &nbsp;
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    jQuery(document).ready(function() {
        ImgUpload();
    });

    var imgArray = [];

    function ImgUpload() {
        var imgWrap = $('.upload__img-wrap');
        var maxLength = $('.upload__inputfile').attr('data-max_length');

        $('.upload__inputfile').on('change', function(e) {
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);

            for (var i = 0; i < filesArr.length; i++) {
                if (!filesArr[i].type.match('image.*')) {
                    continue;
                }

                imgArray.push(filesArr[i]);

                var reader = new FileReader();
                reader.onload = function(e) {
                    var html =
                        "<div class='upload__img-box'><div style='background-image: url(" +
                        e.target.result + ")' data-number='" + imgArray.length +
                        "' data-file='" + imgArray[imgArray.length - 1].name +
                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                    $('#uploadbtn').removeClass('upload__btn').addClass('uploaded__btn');
                    imgWrap.prepend(html);
                };

                reader.readAsDataURL(filesArr[i]);
            }
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            imgArray = imgArray.filter(function(img) {
                return img.name !== file;
            });
            $(this).parent().parent().remove();
        });

        $('form').on('submit', function(e) {
            e.preventDefault();

            // Create FormData object
            var formData = new FormData();

            // Append images to the FormData object
            for (var i = 0; i < imgArray.length; i++) {
                formData.append('images[]', imgArray[i]);
            }

            // Append other form data
            $(this).serializeArray().forEach(function(field) {
                formData.append(field.name, field.value);
            });

            // Submit the form with AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('success')
                },
                error: function(error) {
                    // Handle error
                }
            });
        });
    }
</script>
@endPushOnce