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
                                <label for="name" class="form-label">Question Title</label>
                                <input type="text" name="title" value="{{  $question['title'] ?? old('title') }}" class="form-control" id="title" required>
                                <div class="invalid-feedback">Please enter question title!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

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
                            <div class="col-md-12">
                                <label for="category_id" class="form-label">Select Category</label>
                                    <select id="category_id" name="category_id[]" class="form-select select2" data-placeholder="choose categories ..."  multiple="multiple">
                                        <option value="all">all</option>
                        
                                        @foreach ($categories as $key => $value)
                                        <option {{ (in_array($value['id'],$question['assignments'])) ? 'selected' : '' }} value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="text-center">
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
  
</script>
@endPushOnce