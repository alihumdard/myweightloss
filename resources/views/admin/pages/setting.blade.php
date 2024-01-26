@extends('admin.layouts.default')
@section('title', 'settings')
@section('content')
<style>
  .profile-header-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: auto;
  }

  .profile-header-img {}

  .profile-header-img>img.img-circle {
    width: 120px;
    height: 120px;
    border: 2px solid #51D2B7;
  }

  .profile-header {
    margin-top: 43px;
  }

  .img-circle {
    cursor: pointer;
  }

  .img-circle:hover {
    cursor: pointer;
    z-index: 1
  }

  #fileInput1 {
    display: none;
  }

  #fileInput2 {
    display: none;
  }

  #fileInput3 {
    display: none;
  }

  #overlay1:hover {
    opacity: 0;
    z-index: -1
  }

  .avatar {
    vertical-align: middle;
    width: 21px;
    height: 21px;
    border-radius: 50%;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Setting</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                Logo
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="text-align: center;">
              <div class="">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="profile-header-container">
                      <div class="profile-header-img">
                        <form action="{{ route('upload.largelogo') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div>
                            <div onclick="triggerFileInput(1)" style=" position: absolute; right:0;">
                              <i class="fas fa-edit"></i>
                            </div>
                            @if (isset($largeLogoImageUrl))
                            <img class="img-circle" id="uploadTrigger1" src="{{ asset($largeLogoImageUrl) }}" alt="Large Logo" height="220" width="220" alt="Your Image Alt Text">
                            @else
                            <img class="img-circle" id="uploadTrigger1" src="{{ asset('assets/web/images/logo.png') }}" height="220" width="220" alt="Your Image Alt Text">
                            @endif
                            <!-- Hidden file input 1 -->
                            <input type="file" class="file-input" id="fileInput1" name="file1" accept=".jpg, .jpeg, .png" onchange="displaySelectedFile(1)">

                            <div></div>
                          </div>
                          <span>220 x 220</span>
                          <br />
                          <button type="submit" class="btn btn-primary">Update Large Logo</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4" style="display: flex; justify-content: center; align-self: end; margin-top:10px;">
                    <div class="profile-header-container">
                      <div class="profile-header-img">
                        <form action="{{ route('upload.mediumlogo') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div>
                            <div onclick="triggerFileInput(2)" style=" position: absolute; right:0;">
                              <i class="fas fa-edit"></i>
                            </div>
                            @if (isset($mediumLogoImageUrl))
                            <img class="img-circle" id="uploadTrigger2" src="{{ asset($mediumLogoImageUrl) }}" height="140" width="140">
                            @else
                            <img class="img-circle" id="uploadTrigger1" src="{{ asset('assets/web/images/logo.png') }}" height="140" width="140" alt="Your Image Alt Text">
                            @endif
                            <!-- Hidden file input 1 -->
                            <input type="file" class="file-input" id="fileInput2" name="file2" accept=".jpg, .jpeg, .png" onchange="displaySelectedFile(2)">

                            <div></div>
                          </div>
                          <span>140 x 140</span>
                          <br />
                          <button type="submit" class="btn btn-primary">Update Medium Logo</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4" style="    display: flex; justify-content: center; align-self: end;margin-top:10px;">
                    <div class="profile-header-container">
                      <div class="profile-header-img">
                        <form action="{{ route('upload.smalllogo') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div>
                            <div onclick="triggerFileInput(3)" style=" position: absolute; right:0;">
                              <i class="fas fa-edit"></i>
                            </div>
                            @if (isset($smallLogoImageUrl))
                            <img class="img-circle" id="uploadTrigger3" src="{{ asset($smallLogoImageUrl) }}" height="110" width="110">
                            @else
                            <img class="img-circle" id="uploadTrigger1" src="{{ asset('assets/web/images/logo.png') }}" height="110" width="110" alt="Your Image Alt Text">

                            @endif
                            <!-- Hidden file input 1 -->
                            <input type="file" class="file-input" id="fileInput3" name="file3" accept=".jpg, .jpeg, .png" onchange="displaySelectedFile(3)">

                            <div></div>
                          </div>
                          <span>110 x 110</span>
                          <br />
                          <button type="submit" class="btn btn-primary">Update Small Logo</button>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                Social Icons
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <!-- Facebook -->
                <div>
                  @foreach ($sociallinks ?? [] as $link)
                  <a href="{{ $link['link'] }}">
                    {{-- <i class="{{ $link['icon_class'] }} fa-2x" style="color: {{ $link['icon_color'] }}; margin-right:5px"></i> --}}
                    <img class="img-circle" src="{{ Storage::url($link['img_url']) }}" alt="{{ $link['type'] }}" height="50" width="50" alt="Your Image Alt Text">
                  </a>
                  @endforeach

                </div>
                <hr>
                <form action="{{ route('upload.socialmedia')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="section" value="social_links">
                  <div class="form-group">
                    <label>Select Icon name</label>
                    <select name="type" class="form-control">
                      <option>facebook</option>
                      <option>twitter</option>
                      <option>skype</option>
                      <option>Instagram</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Icon URL</label>
                    <input name="link" type="text" class="form-control" id="exampleInputPassword1" placeholder="Social URL" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Icon</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img_url" class="form-control" id="exampleInputFile" required style=" padding-left: 3px; padding-top: 3px; ">
                        <label class="form-label" for="exampleInputFile"></label>
                      </div>
                      <div class="input-group-append" style="margin: auto; padding-left: 5px;">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="avatar">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add to Menu</button>
                  </div>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  @stop

  @pushOnce('scripts')
  <script>
    function triggerFileInput(index) {
      document.getElementById('fileInput' + index).click();
    }

    function displaySelectedFile(index) {
      const imageElement = document.getElementById('uploadTrigger' + index);
      const fileInput = document.getElementById('fileInput' + index);

      if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {

          imageElement.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  </script>
  @endPushOnce