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

                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeAssignQuestion') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $row['id'] ?? ''}}">

                            <div class="row mb-3 mt-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
                                <div class="col-sm-10">
                                    <select id="category_id" name="category_id" class="form-select">
                                        <option value="" disabled>Choose...</option>
                                        @foreach ($categories as $key => $value)
                                        <option value="{{ $value['id'] ?? '' }}" @selected(session('category_id')==$value['id'])>{{ $value['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="question_id" class="col-sm-2 col-form-label">Choose Question</label>
                                <div class="col-sm-10">
                                    <select id="question_id" class="form-select select2" name="question_id[]">
                                        @foreach ($questions as $key => $value)
                                        <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="message" class="text-danger"></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="question_id" class=" text-center  col-form-label fw-bold btn text-secordary">
                                        Q1. What is you problem here . is my problem?
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label for="question_id" class=" text-center px-5 col-form-label fw-bold btn text-danger">
                                        Option...
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionA" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionA')">
                                                Option A
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionA" class="form-select select2" name="[]">
                                                <option value="">Choose ...</option>
                                                @foreach ($questions as $key => $value)
                                                <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionB" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionB')">
                                                Option B
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionB" class="form-select select2" name="[]">
                                                <option value="">Choose ...</option>
                                                @foreach ($questions as $key => $value)
                                                <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionC" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionC')">
                                                Option C
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionC" class="form-select select2" name="[]">
                                                <option value="">Choose ...</option>
                                                @foreach ($questions as $key => $value)
                                                <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionD" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionD')">
                                                Option D
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionD" class="form-select select2" name="question_id[]">
                                                <option value="">Choose ...</option>
                                                @foreach ($questions as $key => $value)
                                                <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="question">

                            </div>

                            <div class="row my-3">
                                <div class="col-sm-4 mx-auto">
                                    <label for="question_id" id="add_new_question" class=" text-center  col-form-label fw-bold btn btn-outline-success">+ Add New Question</label>
                                </div>
                            </div>
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
        var categoryId = $('#category_id').val();
        if (categoryId) {
            get_questions(categoryId);
        }
        $('#question_id').on('change', function() {
            $('#message').text('');
        });

        $('#category_id').on('change', function() {
            $('#message').text('');
            categoryId = $(this).val();
            get_questions(categoryId)
        });

        function get_questions(categoryId) {
            // Make AJAX request
            $.ajax({
                url: '{{ route("admin.getAssignQuestion") }}',
                type: 'GET',
                data: {
                    id: categoryId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        if (Object.keys(response.questions).length > 0) {
                            updateQuestionsDropdown(response.questions);
                            $('#message').text('');
                        } else {
                            deselectQuestionsDropdown();
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
        }

        function updateQuestionsDropdown(questions) {
            var questionDropdown = $('#question_id');

            // Select the options based on the response
            $.each(questions, function(key, value) {
                questionDropdown.find('option[value="' + key + '"]').prop('selected', true);
            });

            // Trigger change event to update Select2
            questionDropdown.trigger('change');
        }

        function deselectQuestionsDropdown() {
            var questionDropdown = $('#question_id');
            questionDropdown.find('option').prop('selected', false);
            questionDropdown.trigger('change');
        }

        var new_row = `  
        <div class="new-row" >

        <div class="row my-3">
                                <div class="col-sm-4 mx-auto">
                                    <label for="question_id"  class=" text-center remove_row col-form-label fw-bold btn btn-danger"> - Remove Question</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="question_id" class="col-sm-2 col-form-label">Choose Question</label>
                                <div class="col-sm-10">
                                    <select id="question_id" class="form-select select2" name="question_id[]">
                                        @foreach ($questions as $key => $value)
                                        <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="message" class="text-danger"></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label  class=" text-center  col-form-label fw-bold btn text-secordary">
                                        Q2. Yes no question is how for ?
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label  class=" text-center px-5 col-form-label fw-bold btn text-danger">
                                        Option...
                                    </label>
                                </div>
                                <div class="col-md-10">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label  class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="" class="form-select select2" name="[]">
                                                <option value="">Choose ...</option>
                                                @foreach ($questions as $key => $value)
                                                <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label  class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary">
                                                No
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="" class="form-select select2" name="[]">
                                                <option value="">Choose ...</option>
                                                @foreach ($questions as $key => $value)
                                                <option value="{{ $value['id'] ?? '' }}">{{ $value['title'] ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            `;

        $('#add_new_question').on('click', function() {
            $('.question').append(new_row);
        });

        $(document).on('click', '.remove_row', function() {
            $(this).closest('.new-row').fadeOut('slow', function() {
                $(this).remove();
            });


        });

    });

    function focusDropdown(id) {
        var element = document.getElementById(id);
        $(element).select2('open');
    }
</script>
@endPushOnce