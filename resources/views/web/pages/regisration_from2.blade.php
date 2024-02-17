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
            <a href="#" style="margin: auto; width: 200px">
                <img class="align-top" width="200"
                    src="http://127.0.0.1:8000/assets/web/consultation/img/Weighloss_final_logo.png">
            </a>
        </div>
        <div class="container">
            <div class="itl-container">
                <div class="itl-container__inner px-1">
                    <div class="w-100">
                        {{-- <h4 class="step-text-section w-100 text-center its-font-s--20 pt-3">4 Simple Steps</h4> --}}
                        <div class="steps mt-5 mb-1 is-tablet-medium">
                            <div class="step-item is-active">
                                <div class="step-marker" style="background: #4DC4D8;">
                                    {{-- <span class="step-number-text">1
                                    </span> --}}
                                    <span class="icon-your-details-icon f--white-before">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Your Details</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-marker" style="background: #4DC4D8;"><span
                                        class="step-number-text">2</span><span class="icon-consultation-icon"></span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Consultation</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-marker" style="background: #4DC4D8;">
                                    {{-- <span
                                        class="step-number-text">3
                                    </span> --}}
                                    <span class="icon-your-treatment-icon">
                                        <i class="fa fa-plus text-white"></i>
                                    </span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Your Treatment</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-marker" style="background: #4DC4D8;">
                                    {{-- <span
                                        class="step-number-text">4
                                    </span> --}}
                                    <span class="icon-checkout-icon">
                                        <i class="fa fa-cart-plus text-white"></i>
                                    </span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Checkout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-sec mt-4 mb-5">
                <div class="row">
                    <div class="col-md-5 left-boxs" style=" border-right: 1px solid #e5eef3;">
                        <div class="text-center mt-5">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('/assets/web/images/logo/reviews-title.png') }}">
                            </a>
                        </div>
                        <div class="d-flex flex-column review-description">
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Run by healthcare professionals<br> specialised in weight management</p>
                            </div>
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Fast and free tracked delivery on all treatments</p>
                            </div>
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Genuine UK sourced medical treatments</p>
                            </div>
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>UK regulated pharmacy</p>
                            </div>
                        </div>

                        <div class="user-review-section mt-4">
                            <div class="user-heading">
                                <h4 class="its-font-w--700 mb-2">What do others say about us?</h4>
                            </div>

                        </div>
                        <div class="testimonial-section mt-4">
                            <div class="testimonial-content d-flex">
                                <div class="testimonial-img">
                                    <img class="img-fluid"
                                        src="https://consultation.my-bmi.co.uk/static/version1707364664/frontend/MyBMI/child/en_GB/images/jamesO-new-photo_cutout.png"
                                        alt="info">
                                </div>
                                <div class="testimonial-right-content" style="font-style: italic;">
                                    <p class="has-text-white its-font-w--600 mb-2">"myBMI has access to the market
                                        leading treatments for weight loss which we have been prescribing to our
                                        patients for several years now with excellent clinical outcomes. The clinical
                                        processes and support structures are all designed to give you the opportunity to
                                        achieve your target weight with many exciting new developments on the way.
                                        Congratulations on starting your weight loss journey. Together we can do it."
                                    </p>
                                    <span class="has-text-white its-font-w--400">
                                        James O’Loan - PHARMACEUTICAL LEAD, PRESCRIBING PHARMACIST &amp; WEIGHT
                                        MANAGEMENT EXPERT</span>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-7">
                        <div class="full-form">
                            <div class="user-text mt-2">
                                <button><i class="fa fa-check"></i>I'm new</button> &nbsp; &nbsp;
                                <button class="account-btn">ٰI have an account</button>
                            </div>
                            <div>
                                <label class="label d-md-block mt-3">Email</label>
                                <input class="form-control" type="email" name="user_email" value=""
                                    placeholder="Email">

                                <label class="label d-md-block mt-3">Name</label>
                                <div class="d-flex gap-3">
                                    <input class="form-control" type="text" name="user_first_name" value=""
                                        placeholder="First name">
                                    <input class="form-control" type="text" name="user_last_name" value=""
                                        placeholder="Last name">
                                </div>
                                <label class="label d-md-block mt-3">Password</label>
                                <input class="form-control" type="password" name="user_password" value=""
                                    placeholder="password">
                                <div class="mt-2">
                                    <p style="color: #00e5d2;">Password Strength: No Password</p>
                                </div>
                                <label class="label d-md-block mt-3">Date of Birth</label>
                                <div class="d-flex gap-3">
                                    <select class="calenders" name="day" onchange="setDateValue(this)" class="splitdob-day">
                                        <option value="" data-class="">Day</option>
                                        <option value="01" data-class="">01</option>
                                        <option value="02" data-class="">02</option>
                                        <option value="03" data-class="">03</option>
                                        <option value="04" data-class="">04</option>
                                        <option value="05" data-class="">05</option>
                                        <option value="06" data-class="">06</option>
                                        <option value="07" data-class="">07</option>
                                        <option value="08" data-class="">08</option>
                                        <option value="09" data-class="">09</option>
                                        <option value="10" data-class="">10</option>
                                        <option value="11" data-class="">11</option>
                                        <option value="12" data-class="">12</option>
                                        <option value="13" data-class="">13</option>
                                        <option value="14" data-class="">14</option>
                                        <option value="15" data-class="">15</option>
                                        <option value="16" data-class="">16</option>
                                        <option value="17" data-class="">17</option>
                                        <option value="18" data-class="">18</option>
                                        <option value="19" data-class="">19</option>
                                        <option value="20" data-class="">20</option>
                                        <option value="21" data-class="">21</option>
                                        <option value="22" data-class="">22</option>
                                        <option value="23" data-class="">23</option>
                                        <option value="24" data-class="">24</option>
                                        <option value="25" data-class="">25</option>
                                        <option value="26" data-class="">26</option>
                                        <option value="27" data-class="">27</option>
                                        <option value="28" data-class="">28</option>
                                        <option value="29" data-class=" noleap">29</option>
                                        <option value="30" data-class=" noleap leapd">30</option>
                                        <option value="31" data-class=" noleap leapd is31">31</option>
                                    </select>
                                    <select class="calender-month" name="month" onchange="setDateValue(this)" class="splitdob-month">
                                        <option value="">Month</option>
                                        <option value="01">January</option>
                                        <option value="02">Febuary</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <select class="calenders" name="year" onchange="setDateValue(this)" class="splitdob-year">
                                        <option value="" data-class="">Year</option>
                                        <option value="2006" data-class="">2006</option>
                                        <option value="2005" data-class="">2005</option>
                                        <option value="2004" data-class="leapy">2004</option>
                                        <option value="2003" data-class="">2003</option>
                                        <option value="2002" data-class="">2002</option>
                                        <option value="2001" data-class="">2001</option>
                                        <option value="2000" data-class="leapy">2000</option>
                                        <option value="1999" data-class="">1999</option>
                                        <option value="1998" data-class="">1998</option>
                                        <option value="1997" data-class="">1997</option>
                                        <option value="1996" data-class="leapy">1996</option>
                                        <option value="1995" data-class="">1995</option>
                                        <option value="1994" data-class="">1994</option>
                                        <option value="1993" data-class="">1993</option>
                                        <option value="1992" data-class="leapy">1992</option>
                                        <option value="1991" data-class="">1991</option>
                                        <option value="1990" data-class="">1990</option>
                                        <option value="1989" data-class="">1989</option>
                                        <option value="1988" data-class="leapy">1988</option>
                                        <option value="1987" data-class="">1987</option>
                                        <option value="1986" data-class="">1986</option>
                                        <option value="1985" data-class="">1985</option>
                                        <option value="1984" data-class="leapy">1984</option>
                                        <option value="1983" data-class="">1983</option>
                                        <option value="1982" data-class="">1982</option>
                                        <option value="1981" data-class="">1981</option>
                                        <option value="1980" data-class="leapy">1980</option>
                                        <option value="1979" data-class="">1979</option>
                                        <option value="1978" data-class="">1978</option>
                                        <option value="1977" data-class="">1977</option>
                                        <option value="1976" data-class="leapy">1976</option>
                                        <option value="1975" data-class="">1975</option>
                                        <option value="1974" data-class="">1974</option>
                                        <option value="1973" data-class="">1973</option>
                                        <option value="1972" data-class="leapy">1972</option>
                                        <option value="1971" data-class="">1971</option>
                                        <option value="1970" data-class="">1970</option>
                                        <option value="1969" data-class="">1969</option>
                                        <option value="1968" data-class="leapy">1968</option>
                                        <option value="1967" data-class="">1967</option>
                                        <option value="1966" data-class="">1966</option>
                                        <option value="1965" data-class="">1965</option>
                                        <option value="1964" data-class="leapy">1964</option>
                                        <option value="1963" data-class="">1963</option>
                                        <option value="1962" data-class="">1962</option>
                                        <option value="1961" data-class="">1961</option>
                                        <option value="1960" data-class="leapy">1960</option>
                                        <option value="1959" data-class="">1959</option>
                                        <option value="1958" data-class="">1958</option>
                                        <option value="1957" data-class="">1957</option>
                                        <option value="1956" data-class="leapy">1956</option>
                                        <option value="1955" data-class="">1955</option>
                                        <option value="1954" data-class="">1954</option>
                                        <option value="1953" data-class="">1953</option>
                                        <option value="1952" data-class="leapy">1952</option>
                                        <option value="1951" data-class="">1951</option>
                                        <option value="1950" data-class="">1950</option>
                                        <option value="1949" data-class="">1949</option>
                                        <option value="1948" data-class="leapy">1948</option>
                                        <option value="1947" data-class="">1947</option>
                                        <option value="1946" data-class="">1946</option>
                                        <option value="1945" data-class="">1945</option>
                                        <option value="1944" data-class="leapy">1944</option>
                                        <option value="1943" data-class="">1943</option>
                                        <option value="1942" data-class="">1942</option>
                                        <option value="1941" data-class="">1941</option>
                                        <option value="1940" data-class="leapy">1940</option>
                                        <option value="1939" data-class="">1939</option>
                                        <option value="1938" data-class="">1938</option>
                                        <option value="1937" data-class="">1937</option>
                                        <option value="1936" data-class="leapy">1936</option>
                                        <option value="1935" data-class="">1935</option>
                                        <option value="1934" data-class="">1934</option>
                                        <option value="1933" data-class="">1933</option>
                                        <option value="1932" data-class="leapy">1932</option>
                                        <option value="1931" data-class="">1931</option>
                                        <option value="1930" data-class="">1930</option>
                                        <option value="1929" data-class="">1929</option>
                                        <option value="1928" data-class="leapy">1928</option>
                                        <option value="1927" data-class="">1927</option>
                                        <option value="1926" data-class="">1926</option>
                                        <option value="1925" data-class="">1925</option>
                                        <option value="1924" data-class="leapy">1924</option>
                                        <option value="1923" data-class="">1923</option>
                                        <option value="1922" data-class="">1922</option>
                                        <option value="1921" data-class="">1921</option>
                                        <option value="1920" data-class="leapy">1920</option>
                                        <option value="1919" data-class="">1919</option>
                                        <option value="1918" data-class="">1918</option>
                                        <option value="1917" data-class="">1917</option>
                                        <option value="1916" data-class="leapy">1916</option>
                                        <option value="1915" data-class="">1915</option>
                                        <option value="1914" data-class="">1914</option>
                                        <option value="1913" data-class="">1913</option>
                                        <option value="1912" data-class="leapy">1912</option>
                                        <option value="1911" data-class="">1911</option>
                                        <option value="1910" data-class="">1910</option>
                                        <option value="1909" data-class="">1909</option>
                                        <option value="1908" data-class="leapy">1908</option>
                                        <option value="1907" data-class="">1907</option>
                                    </select>
                                </div>
                                <label class="label d-md-block mt-3">Phone Number</label>
                                <input class="form-control" type="number" name="user_contact_number" value=""
                                    placeholder="Contact number">
                                    <label class="label d-md-block mt-3">Address</label>
                                    <div class="d-flex gap-4">
                                        <input class="form-control" type="number" name="user_Address" value=""
                                            placeholder="Enter your postcode">
                                            <button class="postcodtbtn">Search</button>
                                    </div>
                                    <div class="mt-2">
                                        <a class="text-dark text-decoration-underline" href="#">Enter my address manually</a>
                                    </div>
                                    <div class="form-check py-2 mt-2">
                                        <input class="form-check-input" type="checkbox" id="emailCheckbox" form="consultationForm" name="email_checkbox" data-gtm-form-interact-field-id="1">
                                        <label class="form-checks-label" for="emailCheckbox">Tick to receive news &amp; offers via email</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="smsCheckbox" form="consultationForm" name="sms_checkbox" data-gtm-form-interact-field-id="2">
                                        <label class="form-check-label" for="smsCheckbox">Tick to receive news &amp; offers via text</label>
                                    </div>
                                    <div>
                                        <button class="continue-btn">Continue</button>
                                    </div>


                                {{-- <div class="row">
                                        <div class="col-md-6">
                                            <label class="label d-md-block">Name</label>
                                            <input class="form-control" type="text" name="user_email" value=""
                                                placeholder="First name">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="user_email" value=""
                                                placeholder="Last name">
                                        </div>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </main><!-- End #main -->

    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('/assets/admin/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/dist/js/main.js') }}"></script>


</body>

</html>
