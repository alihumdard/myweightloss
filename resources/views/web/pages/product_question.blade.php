<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>login</title>
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/assets/web/css/modul.css') }}" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
    </link>
    <!-- custome styling -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/web/consultation/css/style.css') }}"> --}}


</head>

<body>



    <main>
        <div class="text-center bg-white p-3">
            <a href="#" style="margin: auto;">
                <img class="align-top" style="width: 10%;"
                    src="http://127.0.0.1:8000/assets/web/consultation/img/Weighloss_final_logo.png">
            </a>
        </div>
        <div class="container">
            <div class="main-sec mt-4 mb-5" style="padding: 40px 30px;">
                <div class="question fade-in">
                    <form id="form1">
                        <div class="text">
                            <label>question 1 </label><br>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="paris" id="paris">
                                <label class="form-check-label w-100" for="paris">Paris</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="london" id="london">
                                <label class="form-check-label w-100" for="london">London</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="berlin" id="berlin">
                                <label class="form-check-label w-100" for="berlin">Berlin</label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="question collapse">
                    <form id="form2">
                        <div class="text">
                            <label>question 2 </label><br>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="pakistan" id="pakistan">
                                <label class="form-check-label w-100" for="pakistan">pakistan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="abc" id="abc">
                                <label class="form-check-label w-100" for="abc">abc</label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="question collapse">
                    <form id="form3">
                        <div class="text">
                            <label>question 3</label><br>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="ab" id="ab">
                                <label class="form-check-label w-100" for="ab">ab</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="asia" id="asia">
                                <label class="form-check-label w-100" for="asia">Asia</label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="question collapse">
                    <form id="form4">
                        <div class="text">
                            <label>question 4</label><br>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="africa" id="africa">
                                <label class="form-check-label w-100" for="africa">Africa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="bb" id="bb">
                                <label class="form-check-label w-100" for="bb">BB</label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="question collapse">
                    <form id="form5">
                        <div class="text">
                            <label>question 5</label><br>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="cd" id="cd">
                                <label class="form-check-label w-100" for="cd">cd</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="aa" id="aa">
                                <label class="form-check-label w-100" for="aa">AA</label>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Progress Indicator -->
                <div class="progress mt-3">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-3">
                    <button id="prevButton" class="btn btn-primary">Previous</button>
                    <button id="nextButton" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>



        </div>
    </main><!-- End #main -->

    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentQuestionIndex = 0;
            var questions = document.querySelectorAll('.question');
            var totalQuestions = questions.length;
            var progress = 0;
            var prevButton = document.getElementById('prevButton');
            var nextButton = document.getElementById('nextButton');

            prevButton.style.display = 'none'; // Hide previous button initially
            updateProgress(); // Update progress initially

            nextButton.addEventListener('click', function() {
                prevButton.style.display = 'block'; // Show previous button

                questions[currentQuestionIndex].classList.remove('show');
                questions[currentQuestionIndex].classList.add('collapse');
                currentQuestionIndex++;
                questions[currentQuestionIndex].classList.remove('collapse');
                questions[currentQuestionIndex].classList.add('slide-in', 'show');

                // Hide next button if at the last question
                if (currentQuestionIndex === totalQuestions - 1) {
                    nextButton.style.display = 'none';
                }

                updateProgress(); // Update progress
            });

            prevButton.addEventListener('click', function() {
                nextButton.style.display = 'block'; // Show next button

                questions[currentQuestionIndex].classList.remove('show');
                questions[currentQuestionIndex].classList.add('collapse');
                currentQuestionIndex--;
                questions[currentQuestionIndex].classList.remove('collapse');
                questions[currentQuestionIndex].classList.add('slide-in', 'show');

                // Hide previous button if at the first question
                if (currentQuestionIndex === 0) {
                    prevButton.style.display = 'none';
                }

                updateProgress(); // Update progress
            });

            // Handle checkbox change to enable/disable next button and update progress
            var checkboxes = document.querySelectorAll('.question input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    nextButton.disabled = false;
                    nextButton.style.display =
                    'block'; // Show next button after checkbox interaction
                    updateProgress(); // Update progress
                    updateBackground(); // Update background color of selected values
                });
            });

            function updateProgress() {
                var answeredQuestions = 0;
                questions.forEach(function(question) {
                    if (question.querySelectorAll('input[type="checkbox"]:checked').length > 0) {
                        answeredQuestions++;
                    }
                });
                progress = (answeredQuestions / totalQuestions) * 100;
                document.querySelector('.progress-bar').style.width = progress + '%';
                document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);
            }

            function updateBackground() {
                var checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                checkedCheckboxes.forEach(function(checkbox) {
                    checkbox.parentElement.classList.add('checked');
                });
            }
        });
    </script>


</body>

</html>
