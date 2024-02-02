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
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeAssignQuestion') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $row['id'] ?? ''}}">

                            <div class="row mb-3 mt-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
                                <div class="col-sm-10">
                                    <select id="category_id" name="category_id" class="form-select">
                                        <option selected>Choose...</option>
                                        @foreach ($categories as $key => $value)
                                        <option value="{{ $value['id'] ?? '' }}" >{{ $value['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <label for="question_id" class="col-sm-2 col-form-label">Choose Question</label>
                                <div class="col-sm-10">
                                    <select id="question_id" class="form-select select2" name="question_id[]" multiple="multiple">>
                                        <option value="all">all</option>
                                        @foreach ($questions as $key => $value)
                                        <option value="{{ $value['id'] ?? '' }}" >{{ $value['title'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="message" class="text-danger"></div>
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
    $(document).ready(function() {
        $('#category_id').on('change', function() {
          $('#message').text('');
            var categoryId = $(this).val();

            // Make AJAX request
            $.ajax({
                url: '{{ route("admin.getAssignQuestion") }}',
                type: 'GET',
                data: {id: categoryId},
                success: function(response) {
                    if (response.status === 'success') {
                        if (response.data.questions.length > 0) {
                            updateQuestionsDropdown(response.data.questions);
                            $('#message').text('');
                        } else {
                            $('#message').text('No questions available for this category.');
                        }
                    } else {
                        console.error('Error:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        function updateQuestionsDropdown(questions) {
            var questionDropdown = $('#question_id');
            questionDropdown.html('<option value="all">all</option>');

            $.each(questions, function(key, value) {
                var option = $('<option>', {value: value.id, text: value.title});
                questionDropdown.append(option);
            });
        }
    });
</script>
@endPushOnce