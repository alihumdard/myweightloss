<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="STEPS | BMI FORM">
    <meta name="author" content="Ansonika">
    <title>BMI Calculator</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('/assets/web/bmi/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('/assets/web/bmi/img/apple-touch-icon-144x144-precomposed.png')}}">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('/assets/web/bmi/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/icon_fonts/css/all_icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/web/bmi/css/skins/square/grey.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('/assets/web/bmi/css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <style>
        .btn-outline-logo {
            border: #5987c3 2px solid;
            font-weight: 500;

        }

        .btn-logo-active {
            background-color: #5987c3;
            color: #fff;
            font-weight: 600;
        }

        .btn-outline-logo:hover {
            background-color: #5987c3;
            color: #fff;
            font-weight: 600;
        }

        .c-bmi {
            box-sizing: border-box;
            font-family: ui-sans-serif, system-ui, sans-serif;
            padding: 0rem 1rem 0rem 1rem;

            width: 100%;
        }

        .c-bmi fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }

        .c-bmi__group-text {
            display: none;
            font-size: small;
            order: 2;
            padding: 1rem 0;
            text-align: left;
            width: 100%;
        }

        .c-bmi__groups {
            border: 0;
            flex-wrap: wrap;
            font-size: small;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        .c-bmi__groups label {
            display: block;
            padding: .5rem;
            position: relative;
        }

        [for="bmi-g0"] {
            background-color: #4691e2;
        }

        [for="bmi-g1"] {
            background-color: #0cb764;
        }

        [for="bmi-g2"] {
            background-color: #febf18;
        }

        [for="bmi-g3"] {
            background-color: #fc8711;
        }

        [for="bmi-g4"] {
            background-color: #ff6455;
        }

        [for="bmi-g5"] {
            background-color: #cc1100;
            color: #fff;
        }

        .c-bmi__groups input:checked+label::before {
            background-color: #fff;
            clip-path: polygon(0% 0%, 0% 100%, 75.00% 50.00%);
            content: '';
            display: inline-block;
            height: 1rem;
            left: 0.5rem;
            position: absolute;
            top: 0.35rem;
            width: 1rem;
        }

        .c-bmi__groups input:checked+label+div {
            display: block;
            flex: 0 0 100%;
        }

        .c-bmi__label {
            display: block;
            font-size: medium;
            margin: 0 0 1rem 0;
            position: relative;
        }

        .c-bmi__label output {
            position: absolute;
            right: 0;
            top: 0;
        }

        .c-bmi__range {
            -webkit-appearance: none;
            appearance: none;
            background-color: transparent;
            outline: none;
            width: 100%;
        }

        .c-bmi__range::-webkit-slider-runnable-track {
            background-image: linear-gradient(to bottom, transparent 45%, lightslategray 45%, lightslategray 55%, transparent 55%);
        }

        .c-bmi__range::-moz-range-track {
            background-image: linear-gradient(to bottom, transparent 45%, lightslategray 45%, lightslategray 55%, transparent 55%);
        }

        .c-bmi__range::-webkit-slider-thumb {
            margin-top: -12px !important;
            -webkit-appearance: none;
            appearance: none;
            background-color: hsl(225, 100%, 20%);
            border-radius: 50%;
            height: 1.9rem;
            width: 1.9rem;
        }

        .c-bmi__range::-moz-range-thumb {
            appearance: none;
            background-color: hsl(225, 100%, 20%);
            border-radius: 50%;
            height: 1.9rem;
            width: 1.9rem;
        }

        .c-bmi__range:focus::-webkit-slider-thumb {
            background-color: hsl(225, 30%, 60%);
            box-shadow: inset 0 0 0 0.25rem hsl(225, 100%, 20%);
        }

        .c-bmi__range:focus::-moz-range-thumb {
            background-color: hsl(225, 30%, 60%);
            box-shadow: inset 0 0 0 0.25rem hsl(225, 100%, 20%);
        }

        .c-bmi__result {
            display: block;
            font-size: 200%;
            margin: 2.5rem auto;
            text-align: center;
        }

        .c-bmi [type="radio"] {
            display: none;
        }

        /* RWD */
        @media (min-width: 600px) {
            .c-bmi__groups {
                display: flex;
            }

            .c-bmi__groups input:checked+label::before {
                background-color: inherit;
                clip-path: polygon(0% 0%, 100% 0%, 50% 100%);
                left: 50%;
                top: -1rem;
                transform: translateX(-50%);
                width: 1.5rem;
            }

            .c-bmi__groups label {
                flex: 1;
            }

            [for="bmi-g0"] {
                border-radius: .25rem 0 0 .25rem;
            }

            [for="bmi-g5"] {
                border-radius: 0 .25rem .25rem 0;
            }

            .circle {
                padding: 1%;
                background-color: #fb4f4f;
                border-radius: 100%;
                text-align: center;
                font-size: 1em;
                line-height: 1em;
                color: white;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
                margin: 0 auto;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px #F2F2DF dashed;
            }
        }
    </style>
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <h1><a href="/">
                                <img src="{{ asset('/assets/web/bmi/img/Weighloss_final_logo.png') }}" class="bmi-logo" alt="Logo">
                            </a></h1>
                    </div>
                </div>
                <div class="col-9">


                </div>
            </div>
        </div>
        <!-- /container -->
    </header>
    <!-- /Header -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="container py-5">
                        <div class="card">
                            <div class=" btn btn-primary pt-1 question_title">
                                <h5 class="text-white fw-bold">Calculate/Update Your BMI</h5>
                            </div>
                            <div class="col-12 mx-auto">
                                @if(session('status') === 'invalid')
                                <div class="alert alert-danger">
                                    <strong>Error:</strong> {{ session('message') }}
                                </div>
                                @endif
                            </div>
                            <div class="card-body pt-1 px-2">
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <button class="btn btn-outline-logo btn-logo-active mx-2 px-5 metric">Metric</button>
                                    <button class="btn btn-outline-logo px-5  imperial">Imperial</button>
                                </div>
                                <form class="c-bmi" id="bmi_from" method="POST" action="{{ route('web.bmiUpdate') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$bmi_detail['id'] ?? '' }}">
                                    <div class="metricInput">
                                        <label for="cm" class="c-bmi__label"><strong>Height(cm)</strong></label>
                                        <input id="cm" class="c-bmi__range form-range mt-1 form-control cm" type="number" name="cm" min="20" max="254" step="0.1" value="{{$bmi_detail['cm'] ?? old('cm') }}" />
                                        @error('cm')
                                        <div class="alert-danger text-danger ">{{ $message }}</div>
                                        @enderror

                                        <label id="weight_kg" class="c-bmi__label"><strong>Weight(kg)</strong></label>
                                        <input id="weight_kg" class="c-bmi__range form-range mt-1 form-control weight-kg" type="number" name="weight_kg" min="20" max="400" step="0.1" value="{{$bmi_detail['weight_kg'] ?? old('weight_kg') }}" />
                                        @error('weight_kg')
                                        <div class="alert-danger text-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="imperialInput d-none">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="feet" class="c-bmi__label"><strong>Feet</strong></label>
                                                <input id="feet" class="c-bmi__range form-range mt-1 form-control feet" type="number" name="feet" step="0.1" value="{{$bmi_detail['feet'] ?? old('feet') }}" />
                                                @error('feet')
                                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="inches" class="c-bmi__label"><strong>Inches</strong></label>
                                                <input id="inches" class="c-bmi__range form-range mt-1 form-control inches" type="number" name="inches" step="0.1" value="{{$bmi_detail['inches'] ?? old('inches') }}" />
                                                @error('inches')
                                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="weight_lb" class="c-bmi__label"><strong>Weight(lb)</strong></label>
                                                <input id="weight_lb" class="c-bmi__range form-range mt-1 form-control weight-lb" type="number" name="weight_lb" value="{{$bmi_detail['weight_lb'] ?? old('weight_lb') }}" />
                                                @error('weight_lb')
                                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="c-bmi__result">
                                        <span style="font-weight: 900;  "> Your BMI Is:</span>
                                        <div class="circle" style="width: 9rem; height:9rem;">
                                            <output name="bmio" class="bmi_result">{{$bmi_detail['bmi'] ?? 0.0 }}</output>
                                        </div>
                                    </div>

                                    <div class="c-bmi__groups" readonly>
                                        <input type="radio" id="bmi-g0" name="g" />
                                        <label for="bmi-g0">Underweight</label>
                                        <div class="c-bmi__group-text">The WHO regards a BMI of less than 18.5 as underweight and may indicate malnutrition, an eating disorder, or other health problems.</div>
                                        <input type="radio" id="bmi-g1" name="g" checked />
                                        <label for="bmi-g1">Normal</label>
                                        <div class="c-bmi__group-text">A BMI between 18.5 and 25 is considered normal and healthy. </div>
                                        <input type="radio" id="bmi-g2" name="g" />
                                        <label for="bmi-g2">Pre-obesity</label>
                                        <div class="c-bmi__group-text">People who fall into this category may be at risk of developing obesity.<br />This was earlier classified as "overweight".</div>
                                        <input type="radio" id="bmi-g3" name="g" />
                                        <label for="bmi-g3">Obese I</label>
                                        <div class="c-bmi__group-text">People who have BMI equal or over 30 may have obesity, which is defined as an abnormal or excessive accumulation of fat that may harm health.</div>
                                        <input type="radio" id="bmi-g4" name="g" />
                                        <label for="bmi-g4">Obese II</label>
                                        <div class="c-bmi__group-text">People who have BMI equal or over 30 may have obesity, which is defined as an abnormal or excessive accumulation of fat that may harm health.</div>
                                        <input type="radio" id="bmi-g5" name="g" />
                                        <label for="bmi-g5">Obese III</label>
                                        <div class="c-bmi__group-text">People who have BMI equal or over 30 may have obesity, which is defined as an abnormal or excessive accumulation of fat that may harm health.</div>
                                    </div>
                                </form>
                                <div id="bottom-wizard" style="padding: 5px 0 25px 0;">
                                    <button class="submit ">Procceed Next </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <!-- /Container -->


    </main>
    <!-- /main -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->

    <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
    <!-- /cd-nav-trigger -->


    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('/assets/web/bmi/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/web/bmi/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {

            function submitForm() {
                $('.c-bmi__range').removeAttr('required');
                $('#bmi_from').submit();
            }

            $('.submit').click(function() {
                submitForm();
            });

            // Function to handle metric/imperial toggle
            $('.metric').click(function() {
                $(this).addClass('btn-logo-active');
                $('.imperial').removeClass('btn-logo-active');
                $('.imperialInput').addClass('d-none');
                $('.metricInput').removeClass('d-none');
            });

            $('.imperial').click(function() {
                $(this).addClass('btn-logo-active');
                $('.metric').removeClass('btn-logo-active');
                $('.metricInput').addClass('d-none');
                $('.imperialInput').removeClass('d-none');
            });

            // Event listener for metric input change
            $('.cm, .weight-kg').on('input', function() {
                const heightCm = parseFloat($('.cm').val());
                const weightKg = parseFloat($('.weight-kg').val());
                const heightInches = heightCm * 0.393701,
                    feet = Math.floor(heightInches / 12),
                    inches = Math.round(heightInches % 12);

                $('.feet').val(feet);
                $('.inches').val(inches);
                $('.weight-lb').val((weightKg * 2.20462).toFixed(2));

                calulate_bmi(heightCm, weightKg);
            });

            // Event listener for imperial input change
            $('.feet, .inches, .weight-lb').on('input', function() {
                const feet = parseFloat($('.feet').val());
                const inches = parseFloat($('.inches').val());
                const weight_lb = parseFloat($('.weight-lb').val());
                const height_cm = (feet * 12 + inches) * 2.54;
                const weight_kg = weight_lb * 0.453592;
                $('.cm').val(height_cm);
                $('.weight-kg').val((Math.round(weight_kg.toFixed(2))));

                calulate_bmi(height_cm, weight_kg);
            });
        });

        function calulate_bmi(height_cm, weight_kg) {
            const bmi = parseFloat(weight_kg / ((height_cm / 100) ** 2)).toFixed(2);

            // Update BMI circle color based on BMI value
            if (bmi > 0 && bmi <= 18.49) {
                $('.circle').css('background-color', '#0d6efd')
            } else if (bmi > 18.5 && bmi <= 24.49) {
                $('.circle').css('background-color', '#198754')
            } else if (bmi > 25 && bmi <= 29.99) {
                $('.circle').css('background-color', '#198754')
            } else if (bmi > 30 && bmi <= 34.99) {
                $('.circle').css('background-color', '#fd7e14')
            } else if (bmi > 35 && bmi <= 39.99) {
                $('.circle').css('background-color', '#ff6455')
            } else {
                $('.circle').css('background-color', '#dc3545');
            }

            $('.bmi_result').text(isNaN(bmi) || !isFinite(bmi) ? 0 : Math.min(bmi, 100));
        }
    </script>
</body>

</html>