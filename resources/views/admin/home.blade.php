@extends('layouts.app')

@include('partials.header')
@include('partials.sidebar')

@section('content')
    <!--start content-->
          {{-- <main class="page-content"> --}}
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Dashboards</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">CMS Dashboard</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Settings</button>
                  <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                  </div>
                </div>
              </div>
            </div>
            <!--end breadcrumb-->

            
            <div class="row">
              <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 g-3">
                      <div class="col">
                        <div class="card radius-10 bg-tiffany mb-0">
                          <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                              <i class="fa-solid fa-user-graduate"></i>
                            </div>
                             <h3 class="text-white">{{ $profile }}</h3>
                             <p class="mb-0 text-white">Alumni</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-danger mb-0">
                          <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                              <i class="fa-solid fa-school"></i>
                            </div>
                            <h3 class="text-white">{{ $profile }}</h3>
                             <p class="mb-0 text-white">School Generation</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-dark mb-0">
                          <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                              <i class="fas fa-book"></i>
                            </div>
                            <h3 class="text-white">{{ $department }}</h3>
                             <p class="mb-0 text-white">Department</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-success mb-0">
                          <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="text-white">{{ $user }}</h3>
                             <p class="mb-0 text-white">Users</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-purple mb-0">
                          <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                              <i class="fas fa-lightbulb"></i>
                            </div>
                            <h3 class="text-white">{{ $topic }}</h3>
                             <p class="mb-0 text-white">Topics</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-orange mb-0">
                          <div class="card-body text-center">
                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                              <i class="bi bi-chat-left-quote-fill"></i>
                            </div>
                             <h3 class="text-white">{{ $discuss }}</h3>
                             <p class="mb-0 text-white">Discussions</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">Alumni</h5>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                          <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="javascript:;">Action</a>
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Another action</a>
                              </li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="chart1"></div>
                  </div>
                </div>
              </div>
            </div><!--end row-->

            <div class="row">
               <div class="col-12 col-lg-12 col-xl-12 col-xxl-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">Activities</h5>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                          <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="javascript:;">Action</a>
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Another action</a>
                              </li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>
                  <div class="card-body">
                    <div class="d-lg-flex align-items-center justify-content-center gap-4">
                      <div id="chart3"></div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-circle-fill text-primary me-1"></i> Bekerja: <span class="me-1">{{ $kerja }}</span></li>
                        <li class="list-group-item"><i class="bi bi-circle-fill text-danger me-1"></i> Kuliah: <span class="me-1">{{ $kuliah }}</span></li>
                        <li class="list-group-item"><i class="bi bi-circle-fill text-success me-1"></i> Wirausaha: <span class="me-1">35</span></li>
                        <li class="list-group-item"><i class="bi bi-circle-fill text-orange me-1"></i> Lainnya: <span class="me-1">{{ $lainnya }}</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col-12 col-lg-12 col-xl-12 col-xxl-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">Site Speed</h5>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                          <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="javascript:;">Action</a>
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Another action</a>
                              </li>
                              <li>
                                <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>
                  <div class="card-body">
                      <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-6 col-xl-6">
                          <div id="chart4"></div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6">
                           <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 g-3">
                              <div class="col">
                                 <div class="card radius-10 mb-0 shadow-none bg-light-purple">
                                   <div class="card-body p-4">
                                      <div class="text-center">
                                        <h5 class="mb-0 text-purple">75</h5>
                                        <p class="mb-0 text-purple">Grade</p>
                                      </div>
                                   </div>
                                 </div>
                              </div>
                              <div class="col">
                                <div class="card radius-10 mb-0 shadow-none bg-light-orange">
                                  <div class="card-body p-4">
                                     <div class="text-center">
                                       <h5 class="mb-0 text-orange">1.9mb</h5>
                                       <p class="mb-0 text-orange">Page Size</p>
                                     </div>
                                  </div>
                                </div>
                             </div>
                             <div class="col">
                              <div class="card radius-10 mb-0 shadow-none bg-light-success">
                                <div class="card-body p-4">
                                   <div class="text-center">
                                     <h5 class="mb-0 text-success">634 mc</h5>
                                     <p class="mb-0 text-success">Load Time</p>
                                   </div>
                                </div>
                              </div>
                           </div>
                           <div class="col">
                            <div class="card radius-10 mb-0 shadow-none bg-light-primary">
                              <div class="card-body p-4">
                                 <div class="text-center">
                                   <h5 class="mb-0 text-primary">48</h5>
                                   <p class="mb-0 text-primary">Requests</p>
                                 </div>
                              </div>
                            </div>
                         </div>

                           </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div><!--end row-->

            <div class="row">
               <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                  <div class="card-header bg-transparent p-3">
                    <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                      <div class="col">
                        <h5 class="mb-0">Posts vs Comments</h5>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                           <div class="font-13"><i class="bi bi-circle-fill text-info"></i><span class="ms-2">Posts</span></div>
                           <div class="font-13"><i class="bi bi-circle-fill text-orange"></i><span class="ms-2">Comments</span></div>
                        </div>
                      </div>
                     </div>
                  </div>
                  <div class="card-body">
                    <div id="chart5"></div>
                  </div>
                </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-6 d-flex">
                  <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                      <div class="row g-3 align-items-center">
                        <div class="col">
                          <h5 class="mb-0">Statistics</h5>
                        </div>
                        <div class="col">
                          <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            <div class="dropdown">
                              <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                  <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                       </div>
                    </div>
                    <div class="card-body">
                       <div id="chart2"></div>
                    </div>
                  </div>
                </div>
            </div><!--end row-->
            


          {{-- </main> --}}
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
@endsection

@push('scripts')
  <script>

      var options = {
    series: [{
        name: "Alumni",
        data: [@foreach($alumni as $g){{ $g->count }},@endforeach]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "bar",
        //width: 130,
        height: 370,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff", "#12bf24"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
	legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: !1
    },
    grid: {
        show: true,
        // borderColor: '#eee',
        // strokeDashArray: 4,
    },
    stroke: {
        show: !0,
        width: 3,
        curve: "smooth"
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#3461ff", "#12bf24"],
          inverseColors: true,
          opacityFrom: 0.8,
          opacityTo: 0.2,
          //stops: [0, 50, 100],
          //colorStops: []
        }
      },
    colors: ["#3461ff", "#12bf24"],
    xaxis: {
        categories: [@foreach($graduated as $g)
                    '{{ $g->name }}',
                @endforeach]
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function (val) {
                return "" + val + ""
            }
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();


  //piew chart untuk activity
      var options = {
    series: [{{ $kerja }}, {{ $kuliah }}, {{ $lainnya }}],
    chart: {
    width: 340,
    type: 'donut',
  },
  labels: ["Bekerja", "Kuliah", "Wirausaha", "Lainnya"],
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "vertical",
      shadeIntensity: 0.5,
      gradientToColors: ["#667eea", "#00c6fb", "#f77062", "#98ec2d"],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      //stops: [0, 50, 100],
      //colorStops: []
    }
  },
  colors: ["#764ba2", "#005bea", "#fe5196", "#12bf24"],
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
    offsetX: -20
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        height: 260
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();
    </script>
@endpush