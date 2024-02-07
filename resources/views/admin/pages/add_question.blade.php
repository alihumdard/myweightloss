@extends('admin.layouts.default')
@section('title', 'Add Question')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Add Question</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card vh-100">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeQuestion') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $question['id'] ?? ''}}">

                            <div class="col-md-12">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select id="category_id" name="category_id[]" class="form-select select2" data-placeholder="choose categories ..." multiple="multiple">
                                    <option value="all">all</option>

                                    @foreach ($categories as $key => $value)
                                    <option {{ (in_array($value['id'],$question['assignments'])) ? 'selected' : '' }} value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="name" class="form-label">Question Title</label>
                                <input type="text" name="title" value="{{  $question['title'] ?? old('title') }}" class="form-control" id="title" required>
                                <div class="invalid-feedback">Please enter question title!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 ">
                                <label for="anwser_set" class="form-label">Anwser Set</label>
                                <select class="form-select" name="anwser_set" id="anwser_set" required>
                                    <option value="">choose ..</option>
                                    <option value="yes_no">Yes or No</option>
                                    <option value="openbox">Input Box</option>
                                    <option value="mt_choice">Multiple Choice</option>
                                </select>
                                <div class="invalid-feedback">Please enter anser Set!</div>
                                @error('anwser_set')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt_choice d-none row my-2">
                                <div class="col-md-6">
                                    <label for="optA" class="form-label">Option A</label>
                                    <input type="text" name="optA" value="{{  $question['optA'] ?? old('optA') }}" class="form-control" id="optA" required>
                                    <div class="invalid-feedback">Please enter option A title!</div>
                                    @error('optA')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="optB" class="form-label">Option B</label>
                                    <input type="text" name="optB" value="{{  $question['optB'] ?? old('optB') }}" class="form-control" id="optB" required>
                                    <div class="invalid-feedback">Please enter option B!</div>
                                    @error('optB')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="optC" class="form-label">Option C</label>
                                    <input type="text" name="optC" value="{{  $question['optC'] ?? old('optC') }}" class="form-control" id="optC" required>
                                    <div class="invalid-feedback">Please enter option C!</div>
                                    @error('optC')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="optD" class="form-label">Option D</label>
                                    <input type="text" name="optD" value="{{  $question['optD'] ?? old('optD') }}" class="form-control" id="optD" required>
                                    <div class="invalid-feedback">Please enter option D!</div>
                                    @error('optD')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="yes_no d-none row my-2">
                                <div class="col-md-6">
                                    <label for="yes_lable" class="form-label">Yes Anwser Lable</label>
                                    <input type="text" name="yes_lable" class="form-control" id="yes_lable" required>
                                    <div class="invalid-feedback">Please write Yes lable!</div>
                                    @error('yes_lable')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="no_lable" class="form-label">No Anwser Lable</label>
                                    <input type="text" name="no_lable" class="form-control" id="no_lable" required>
                                    <div class="invalid-feedback">Please write No lable!</div>
                                    @error('no_lable')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="openbox d-none row my-2">
                                <div class="col-md-12">
                                    <label for="yes_lable" class="form-label">Write Placeholder</label>
                                    <textarea name="openbox" class="form-control" cols="10" rows="7" id="openbox"> </textarea>
                                    @error('openbox')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

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
    $(document).ready(function() {

        $('#anwser_set').on('change', function() {
            let anserset = $(this).val();
            if(anserset =='mt_choice'){
                $('.openbox').addClass('d-none');
                $('.yes_no').addClass('d-none');
                $('.mt_choice').removeClass('d-none');
            }
            else if(anserset =='openbox'){
                $('.yes_no').addClass('d-none');
                $('.mt_choice').addClass('d-none');
                $('.openbox').removeClass('d-none');
            }
            else if(anserset == 'yes_no'){
                $('.mt_choice').addClass('d-none');
                $('.openbox').addClass('d-none');
                $('.yes_no').removeClass('d-none');
            }
            else{

                alert('select write anwser set');
            }
        });

    });
</script>
@endPushOnce