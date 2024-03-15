<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Product Questions</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <script src="{{ asset('/assets/web/js/jquery-3.5.1.min.js') }}"></script>
    {{-- font-Awesome --}}
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/assets/web/css/modul.css') }}" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
    </link>
    <!-- custome styling -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/style.css') }}">


</head>

<body style="background: #FBF9F6">



    <div class="product-logo bg-white p-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="w-50">
                <a href="#">
                    <img class="align-top" src="{{ asset('/assets/web/consultation/img/Weighloss_final_logo.png') }}">
                </a>
            </div>

            <div class="text-end">
                <button class="btn btn-primary"><i class="fa fa-sign-in me-1"></i> Logout</button>
            </div>
        </div>
    </div>

    <div class="container-md px-lg-5 container-fluid ">
        <div class="my-5  mx-lg-5 px-lg-5 ">
            <main class="mx-lg-5 px-lg-5 card pb-2">

                <form action="{{ route('web.transactionStore') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="{{ $product['id']}}" id="product_id">
                    <input type="hidden" name="category_id" value="{{ $category['id']}}" id="category_id">
                    @csrf
                    <div class="alert alert-danger fade show alert-dismissible mt-3" role="alert" style="display:none;">
                        <strong><i class="fa fa-warning" aria-hidden="true"></i></strong> <b>Please</b> Mark the Question Answer.
                    </div>
                    @foreach($questions as $key => $question)
                    <div id="question_{{$question['id']}}" class="question {{ $loop->first ? 'fade-in' : 'collapse' }} " data-dependency="{{$check_dependency[$question['id']]['is_dependent']}}" data-dependency_answer="">
                        <div class=" px-4 mt-5">
                            <h3 class="fw-bold mb-0"> <b>Q</b>. {{ $question['title'] ?? ''}}?</h3>
                            <p style="font-family: emoji; color: black;" class="ps-5">
                                {{$question['openbox']}}
                            </p>
                        </div>
                        <div class=" p-4" style="margin:0 !important;">
                            @if($question['anwser_set'] == 'openbox' )
                            <div class="text">
                                <div>
                                    <textarea class="form-control" data-next_question="question_{{ $next_quest_opt[$question['id']]['openbox'] ?? 'no'}}" name="qid_{{$question['id']}}" placeholder="Describe" rows="5"></textarea>
                                </div>
                            </div>
                            @elseif($question['anwser_set'] == 'mt_choice' )
                            <div class="text">
                                <div class="form-check mt-2 px-5">
                                    <input class="form-check-input optA_{{$category['id'].'_'.$question['id']}}" type="radio" name="qid_{{$question['id']}}" value="{{$question['optA'] ?? ''}}" data-next_question="question_{{ $next_quest_opt[$question['id']]['optA'] ?? 'no'}}" id="optionA">
                                    <label class="form-check-label fw-semibold   w-100" for="optionA">{{$question['optA'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input optB_{{$category['id'].'_'.$question['id']}}" type="radio" name="qid_{{$question['id']}}" value="{{$question['optB'] ?? ''}}" data-next_question="question_{{ $next_quest_opt[$question['id']]['optB'] ?? 'no'}}" id="optionB">
                                    <label class="form-check-label fw-semibold w-100" for="optionB">{{$question['optB'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input optC_{$category['id'].'_'.$question['id']}}" type="radio" name="qid_{{$question['id']}}" value="{{$question['optC'] ?? ''}}" data-next_question="question_{{ $next_quest_opt[$question['id']]['optC'] ?? 'no'}}" id="optionC">
                                    <label class="form-check-label fw-semibold w-100" for="optionC">{{$question['optC'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input optD_{{$category['id'].'_'.$question['id']}}" type="radio" name="qid_{{$question['id']}}" value="{{$question['optD'] ?? ''}}" data-next_question="question_{{ $next_quest_opt[$question['id']]['optD'] ?? 'no'}}" id="optionD">
                                    <label class="form-check-label fw-semibold w-100" for="optionD">{{$question['optD'] ?? ''}}</label>
                                </div>
                            </div>
                            @elseif($question['anwser_set'] == 'file' )
                            <div class="text">
                                <div>
                                    <input type="file" class="form-control" name="qfid_{{$question['id']}}" placeholder="Describe" data-next_question="question_{{ $next_quest_opt[$question['id']]['file'] ?? 'no'}}" />
                                </div>
                            </div>
                            @else
                            <div class="text">
                                <div class="form-check mt-2 px-5">
                                    <input class="form-check-input" type="radio" name="qid_{{$question['id']}}" value="{{$question['yes_lable'] ?? ''}}" data-next_question="question_{{ $next_quest_opt[$question['id']]['yes_lable'] ?? 'no'}}" id="option_yes">
                                    <label class="form-check-label fw-semibold   w-100" for="option_yes">{{$question['yes_lable'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input" type="radio" name="qid_{{$question['id']}}" value="{{$question['no_lable'] ?? ''}}" data-next_question="question_{{ $next_quest_opt[$question['id']]['no_lable'] ?? 'no'}}" id="option_no">
                                    <label class="form-check-label fw-semibold w-100" for="option_no">{{$question['no_lable'] ?? ''}}</label>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class=" px-4 pb-4">
                        <div class=" progress ">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class=" consultion_comp text-center my-4 " style="display: none;">
                            <h2 class="fw-bold">Thank you for completing your consultation , please use the below button to submit this.</h2>
                        </div>

                        <div class="d-flex justify-content-between ">

                            <button id="nextButton" type="button" class="btn btn-primary text-center mx-auto px-5">Next</button>
                            <button id="submitButton" type="submit" disabled class="btn btn-success text-center mx-auto px-5">Submit</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
    <div class="modal fade" id="product_msg_modal" tabindex="-1" data-bs-backdrop="true">
        <div class="modal-dialog model-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #5987c3;">
                    <h5 class="modal-title fw-bold text-white">Unable to Continue</h5>
                    <button type="button" class="btn-close fw-bold text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <h5 class="fw-bold py-3" id="msg_popup"> </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 0);

            var index = 0;
            var questions = $('.question');
            var currentQuestionIndex = questions.eq(0).attr('id');
            var totalQuestions = questions.length;
            var progress = 0;
            var prevButton = $('#prevButton');
            var nextButton = $('#nextButton');
            var submitButton = $('#submitButton');

            if (totalQuestions > 0) {
                nextButton.prop('disabled', false).show();
            } else {
                submitButton.prop('disabled', false).show();
            }

            prevButton.hide();
            submitButton.hide();
            updateProgress();

            nextButton.on('click', function() {
                $('.alert').hide();
                var inputFields = $('#' + currentQuestionIndex).find('input, textarea, select');
                var isValid = true;

                inputFields.each(function(index, field) {
                    if ($(field).is('textarea') && $(field).val() === '') {
                        isValid = false;
                        return false;
                    } else if ($(field).is('input[type="radio"]') && !$('input[name="' + $(field).attr('name') + '"]:checked').length) {
                        isValid = false;
                        return false;
                    } else if ($(field).is('input[type="file"]') && !$(field).val()) {
                        isValid = false;
                        return false;
                    }
                });

                if (isValid) {
                    var nextQuestion;
                    if (inputFields.is('input[type="radio"]')) {
                        nextQuestion = inputFields.filter(':checked').data('next_question');
                    } else if (inputFields.is('textarea') || inputFields.is('input[type="file"]')) {
                        nextQuestion = inputFields.data('next_question');
                    } else {
                        // Adjust this part based on your specific input types and logic
                        nextQuestion = inputFields.data('next_question');
                    }

                    if (nextQuestion === 'question_not_continue') {
                        $('#product_msg_modal').modal('show');
                        let msg = 'Unfortunately, this consultation cannot proceed because you do not meet the necessary eligibility criteria. Please review your responses to ensure accuracy and completeness.';
                        $('#msg_popup').text(msg);
                        return false;
                    }

                    $('#' + currentQuestionIndex).fadeOut(400, function() {
                        $(this).removeClass('show').addClass('collapse');
                        currentQuestionIndex = nextQuestion;
                        $('#' + nextQuestion).fadeIn(600).removeClass('collapse').addClass('slide-in show');
                        index++;

                        updateProgress();

                        if (nextQuestion === 'question_no') {
                            $('.progress').hide();
                            $('.consultion_comp').show();
                            nextButton.hide();
                            submitButton.prop('disabled', false).show();
                        } else {
                            $('.progress').show();
                            $('.consultion_comp').hide();
                            nextButton.prop('disabled', false).show();
                        }

                        $('html, body').animate({
                            scrollTop: $(document).height()
                        }, 0);
                    });
                } else {
                    // alert('Please fill in all required fields.');
                    $('.alert').show();

                }
            });

            function updateProgress() {
                var answeredQuestions = 0;
                questions.each(function(index, question) {
                    var inputFields = $(question).find('input, textarea, select');

                    if (inputFields.is('input[type="radio"]')) {
                        if ($(question).find('input[type="radio"]:checked').length > 0) {
                            answeredQuestions++;
                        }
                    } else if (inputFields.is('textarea') || inputFields.is('input[type="file"]')) {
                        if (inputFields.val() !== '') {
                            answeredQuestions++;
                        }
                    }
                });

                progress = (answeredQuestions / totalQuestions) * 100;
                $('.progress-bar').width(progress + '%').attr('aria-valuenow', progress);
            }
        });
    </script>

</body>

</html>