@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
<style>
    .displaynone {
        display: none;
    }
</style>

<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-7">
                <div class="row">

                    <!-- Sales Card -->
                    @if($role == 4)
                    <!-- <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Order <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    <!-- End Sales Card -->


                    <!-- Revenue Card -->
                    <!-- <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Order <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-pound"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <!-- <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Order <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div> -->
                    <!-- End Customers Card -->
                    @endif
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <!-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div> -->

                            @if($role == 4)
                            <div class="card-body">
                                <h5 class="card-title">BMI<span>/History</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <!-- End Line Chart -->

                            </div>
                            @endif

                        </div>
                    </div><!-- End Reports -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-5">
                <!-- order status -->
                @if($role == 4)
                <!-- <div class="card" style="max-height: 350px; overflow-y: auto;">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Order Status <span>| Today</span></h5>
                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <div class="activite-label">32 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                                    </div>
                                </div>
                                <div class="activity-item d-flex">
                                    <div class="activite-label">56 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                    <div class="activity-content">
                                        Voluptatem blanditiis blanditiis eveniet
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 hrs</div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Voluptates corrupti molestias voluptatem
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 day</div>
                                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                    <div class="activity-content">
                                        Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 days</div>
                                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                    <div class="activity-content">
                                        Est sit eum reiciendis exercitationem
                                    </div>
                                </div>

                                <div class="activity-item d-flex">
                                    <div class="activite-label">4 weeks</div>
                                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                    <div class="activity-content">
                                        Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> -->
                <!-- End order status -->
                @endif

                <!-- start  my stats  -->
                @if($role == 4)
                <div class="card">

                    <div class="card-body">
                        <div style="position: relative;">
                            <a href="{{ route('web.bmiForm') }}">
                                <img src="https://i.ibb.co/CmRQbgh/pen-1250615-1.png" class="w-70 h-auto" alt="edit" style="width: 15px; height: 15px; position: absolute; top: 100%; right: 0; margin-top:10px; cursor:pointer;">
                            </a>
                        </div>
                        <div class="link d-flex justify-content-between align-items-center mt-3">
                            <h5 class="card-title mb-0 ">My Stats</h5>
                            <span id="switchToUnit" onclick="toggleUnit()" data-sacale="Metric" style="cursor: pointer; font-weight:700;" class="text-info"><i class="bx bx-transfer"></i><span id="switchText"> Switch to Metric </span></span>

                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="activity-item d-flex  align-items-center flex-column h-100" style="background-color: #1aa9dd;">
                                    <div class="activity-content">

                                        <!-- Height image centered -->
                                        <div class="activite-label mr-auto text-center mt-3">
                                            <img src="https://i.ibb.co/1nGzhKh/height-icon.png" class="w-50 h-auto" alt="height">
                                        </div>
                                        <!-- Content -->
                                        <div class="text-center text-light pt-2">
                                            <h5 class="mb-0">Height</h5>
                                            <span id="heightcm">{{$bodyPorfile->cm ?? ''}}cm</span>
                                            <span id="heightfeetInch" class="d-none">{{$bodyPorfile->feet ?? ''}}' {{$bodyPorfile->inches ?? ''}}" </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add another col-md-6 for the second box -->
                            <div class="col-md-6 mb-4">
                                <div class="activity-item d-flex align-items-center justify-content-center flex-column h-100 " style="background-color: #769ccd;">
                                    <div class="activite-label mr-auto text-center mt-3">
                                        <div class="activity-content d-flex align-items-center justify-content-center">
                                            <img src="https://i.ibb.co/HGkLc5M/weight-icon.png" class="w-50 h-auto" alt="calculate">
                                        </div>
                                        <div class="text-center text-light pt-2">
                                            <h5 class="mb-0">Weight</h5>
                                            <span id="weightkg">{{$bodyPorfile->weight_kg ?? '' }}kg</span>
                                            <span id="weightst" class="d-none">{{$bodyPorfile->weight_st ?? '' }}st</span>
                                            <span id="weightlb" class="d-none">, {{$bodyPorfile->weight_lb ?? ''}}lb</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Edit Height and Weight</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red; color: white; border: none;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mt-3">
                                        <input type="text" id="heightInput" oninput="updateMeasurement('height')" class="form-control" placeholder="Enter height..."> <br />
                                        <input type="text" id="weightInput" oninput="updateMeasurement('weight')" class="form-control" placeholder="Enter weight...">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" id="saveChangesBtn" class="btn btn-primary text-center" onclick="updateMeasurement()">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Add another col-md-6 for the third box -->
                            <div class="col-md-6  py-3 pb-2  mr-md-2">
                                <div class="activity-item d-flex align-items-center justify-content-center flex-column h-100" style="background-color: #769ccd;">
                                    <div class="activite-label mr-auto text-center">
                                        <div class="activity-content d-flex align-items-center justify-content-center">
                                            <img src="https://i.ibb.co/LSDDDfp/noinfo.png" class="w-50 h-auto mt-3" alt="calculate">
                                        </div>
                                        <div class="text-center text-light mb-0 pt-3">
                                            <h5 class="mb-0">BMI</h5>
                                            <span>{{$bodyPorfile->bmi ?? ''}}kg/m<sup>2</sup></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add another col-md-6 for the fourth box -->
                            <div class="col-md-6   py-3 pb-2 ml-md-2 displaynone">
                                <div class="activity-item d-flex align-items-center justify-content-center flex-column h-100" style="background-color: #1aa9dd;">
                                    <div class="activite-label mr-auto text-center">
                                        <div class="activity-content d-flex align-items-center justify-content-center">
                                            <img src="https://i.ibb.co/3zrC2BV/waist.png" class="w-50 h-auto mt-3" alt="calculate">
                                        </div>
                                        <div class="text-center text-light mb-0 pt-3">
                                            <h5 class="mb-0">Waist</h5>
                                            <span>0 cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End my stats -->
                @endif
            </div><!-- End Right side columns -->

            <!-- left side colum  -->
            <!-- start bmi calculator  -->
            @if($role == 4)
            <div class="col-12">
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title fw-bold text-center">Body Mass Index</h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                    </div>
                </div>
            </div>
            @endif
            <!-- End bmi_calculator -->

        </div>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
                name: 'BMI',
                data: [42, 52, 56],
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            markers: {
                size: 4
            },
            colors: ['#2eca6a'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }).render();
    });
    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#trafficChart")).setOption({
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [{
                        value: 18,
                        name: 'Under Weight'
                    },
                    {
                        value: 25,
                        name: 'Normal'
                    },
                    {
                        value: 30,
                        name: 'Pre-Obesity'
                    },
                    {
                        value: 100,
                        name: 'Obese'
                    },
                ]
            }]
        });
    });
    document.addEventListener("DOMContentLoaded", () => {
        var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
            legend: {
                data: ['Allocated Budget', 'Actual Spending']
            },
            radar: {
                // shape: 'circle',
                indicator: [{
                        name: 'Sales',
                        max: 6500
                    },
                    {
                        name: 'Administration',
                        max: 16000
                    },
                    {
                        name: 'Information Technology',
                        max: 30000
                    },
                    {
                        name: 'Customer Support',
                        max: 38000
                    },
                    {
                        name: 'Development',
                        max: 52000
                    },
                    {
                        name: 'Marketing',
                        max: 25000
                    }
                ]
            },
            series: [{
                name: 'Budget vs spending',
                type: 'radar',
                data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Allocated Budget'
                    },
                    {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Actual Spending'
                    }
                ]
            }]
        });
    });

    function toggleUnit() {
        var switchToUnit = document.getElementById("switchToUnit");
        var currentUnit = switchToUnit.getAttribute("data-scale");;

        if (currentUnit === "Imperial") {
            $('#heightcm').removeClass('d-none');
            $('#weightkg').removeClass('d-none');
            $('#heightfeetInch').addClass('d-none')
            $('#weightlb').addClass('d-none')
            $('#weightst').addClass('d-none');
            document.getElementById("switchText").innerText = "Switch to Metric";
            switchToUnit.setAttribute("data-scale", "Metric");
        } else {
            $('#heightcm').addClass('d-none');
            $('#weightkg').addClass('d-none');
            $('#heightfeetInch').removeClass('d-none');
            $('#weightlb').removeClass('d-none');
            $('#weightst').removeClass('d-none');
            document.getElementById("switchText").innerText = "Switch to Imperial";
            switchToUnit.setAttribute("data-scale", "Imperial");
        }
    }
</script>
@endPushOnce