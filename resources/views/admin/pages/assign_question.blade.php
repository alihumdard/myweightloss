@extends('admin.layouts.default')
@section('title', 'Assign Question')
@section('content')
    <!-- main stated -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Assign Question</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Assign Question</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card vh-100">
                        <div class="card-body">
                            <form>
                                <div class="row mb-3 mt-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select id="inputState" class="form-select">
                                            <option selected>Choose...</option>
                                            @foreach ($categories as $key => $value)
                                                <option>{{ $value['name'] ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Choose Question</label>
                                    <div class="col-sm-10">
                                        <select id="inputState" class="form-select questions-title" name="states[]"
                                            multiple="multiple">>
                                            <option value="all">all</option>
                                            @foreach ($questions as $key => $value)
                                                <option>{{ $value['title'] ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!--
                                    <fieldset class="row mb-3">
                                      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                                      <div class="col-sm-10">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                          <label class="form-check-label" for="gridRadios1">
                                            First radio
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                          <label class="form-check-label" for="gridRadios2">
                                            Second radio
                                          </label>
                                        </div>
                                        <div class="form-check disabled">
                                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                          <label class="form-check-label" for="gridRadios3">
                                            Third disabled radio
                                          </label>
                                        </div>
                                      </div>
                                    </fieldset>
                                    <div class="row mb-3">
                                      <div class="col-sm-10 offset-sm-2">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="gridCheck1">
                                          <label class="form-check-label" for="gridCheck1">
                                            Example checkbox
                                          </label>
                                        </div>
                                      </div>
                                    </div> -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Horizontal Form -->

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
        $('.questions-title').select2({
            placeholder: 'choose Questions',
            width: '100%',
            border: '1px solid #e4e5e7',
        });

        $('.questions-title').on("select2:select", function(e) {
            var data = e.params.data.text;
            if (data == 'all') {
                $(".questions-title > option").prop("selected", "selected");
                $(".questions-title").trigger("change");
            }
        });
    </script>
@endPushOnce
