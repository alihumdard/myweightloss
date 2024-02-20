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
    {{-- <link rel="stylesheet" href="{{ asset('/assets/web/consultation/css/style.css') }}"> --}}


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
                <form action="/" method="get">
                    @csrf
                    @foreach($questions as $key => $question)
                    <div class="question {{ $loop->first ? 'fade-in' : 'collapse' }} ">
                        <div class=" px-4 mt-5">
                            <h3 class="fw-bold "> <b>{{++$key}}</b>: {{ $question['title'] ?? ''}}?</h3>
                        </div>
                        <div class=" p-4" style="margin:0 !important;">
                            @if($question['anwser_set'] == 'openbox' )
                            <p style="font-family: emoji; color: black;">
                            <pre>
                            {{$question['openbox']}}
                            </pre>
                            </p>
                            <div class="text">
                                <div>
                                    <textarea class="form-control" name="q_{{$question['id']}}" placeholder="Describe" rows="5"></textarea>
                                </div>
                            </div>
                            @elseif($question['anwser_set'] == 'mt_choice' )
                            <div class="text">
                                <div class="form-check mt-2 px-5">
                                    <input class="form-check-input" type="radio" name="q_{{$question['id']}}" value="paris" id="paris">
                                    <label class="form-check-label fw-semibold   w-100" for="paris">{{$question['optA'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input" type="radio" name="q_{{$question['id']}}" value="london" id="london">
                                    <label class="form-check-label fw-semibold w-100" for="london">{{$question['optB'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input" type="radio" name="q_{{$question['id']}}" value="berlin" id="berlin">
                                    <label class="form-check-label fw-semibold w-100" for="berlin">{{$question['optC'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input" type="radio" name="q_{{$question['id']}}" value="berlin" id="berlin">
                                    <label class="form-check-label fw-semibold w-100" for="berlin">{{$question['optD'] ?? ''}}</label>
                                </div>
                            </div>
                            @else
                            <div class="text">
                                <div class="form-check mt-2 px-5">
                                    <input class="form-check-input" type="radio" name="q_{{$question['id']}}" value="paris" id="paris">
                                    <label class="form-check-label fw-semibold   w-100" for="paris">{{$question['yes_lable'] ?? ''}}</label>
                                </div>
                                <div class="form-check px-5">
                                    <input class="form-check-input" type="radio" name="q_{{$question['id']}}" value="london" id="london">
                                    <label class="form-check-label fw-semibold w-100" for="london">{{$question['no_lable'] ?? ''}}</label>
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
                        <div class="d-flex justify-content-between ">
                            <button id="prevButton" type="button" class="btn btn-primary">Previous</button>
                            <button id="nextButton" type="button" class="btn btn-primary">Next</button>
                            <button id="submitButton" type="submit" disabled class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('html, body').animate({ scrollTop: $(document).height() }, 0);

            var currentQuestionIndex = 0;
            var questions = $('.question');
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

            prevButton.hide(); // Hide previous button initially
            submitButton.hide();
            updateProgress(); // Update progress initially

            nextButton.on('click', function() {
                prevButton.show(); // Show previous button

                questions.eq(currentQuestionIndex).fadeOut(400, function() {
                    $(this).removeClass('show').addClass('collapse');
                    currentQuestionIndex++;
                    questions.eq(currentQuestionIndex).fadeIn(600).removeClass('collapse').addClass('slide-in show');
                });

                // Hide next button if at the last question
                if (currentQuestionIndex === totalQuestions - 1) {
                    nextButton.hide();
                    if (questions.eq(currentQuestionIndex).find('input[type="checkbox"]:checked').length > 0) {
                        submitButton.prop('disabled', false).show();
                    }
                }

                updateProgress(); // Update progress
                $('html, body').animate({ scrollTop: $(document).height() }, 0);

            });

            prevButton.on('click', function() {
                submitButton.prop('disabled', false).hide();
                nextButton.show(); // Show next button

                questions.eq(currentQuestionIndex).fadeOut(400, function() {
                    $(this).removeClass('show').addClass('collapse');
                    currentQuestionIndex--;
                    questions.eq(currentQuestionIndex).fadeIn(600).removeClass('collapse').addClass('slide-in show');
                });

                // Hide previous button if at the first question
                if (currentQuestionIndex === 0) {
                    prevButton.hide();
                }

                updateProgress(); // Update progress
                $('html, body').animate({ scrollTop: $(document).height() }, 0);

            });

            // Handle radio button change to enable/disable next button and update progress
            var radios = $('.question input[type="radio"]');
            radios.on('change', function() {
                if (currentQuestionIndex === totalQuestions - 1) {
                    nextButton.hide();
                    submitButton.prop('disabled', false).show();
                } else {
                    nextButton.prop('disabled', false).show();
                }
                updateProgress(); // Update progress
            });

            function updateProgress() {
                var answeredQuestions = 0;
                questions.each(function(index, question) {
                    if ($(question).find('input[type="radio"]:checked').length > 0) {
                        answeredQuestions++;
                    }
                });
                progress = (answeredQuestions / totalQuestions) * 100;
                $('.progress-bar').width(progress + '%').attr('aria-valuenow', progress);
            }
        });
    </script>
</body>

</html>