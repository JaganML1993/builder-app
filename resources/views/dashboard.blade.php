@extends('layouts.master')
@php
$services = \App\Models\Service::latest()->get()->take(10); 
// $services_count = \App\Models\Service::count(); 
// $services_published = \App\Models\Service::where('published',1)->count(); 
// $case_published = \App\Models\CaseStudy::where('published',1)->count(); 
// $articles_published = \App\Models\Article::where('published',1)->count(); 
// $case_studies_count = \App\Models\CaseStudy::count(); 
// $articles_count = \App\Models\Article::count(); 

// $services_pending = \App\Models\Service::where('published', 0)->count(); 
// $services_draft = \App\Models\Service::where('published', 2)->count(); ;

// $published_counts = \App\Models\Service::selectRaw('COUNT(*) as count, MONTHNAME(created_at) as month')
//         ->where('published', 1)
//         ->groupBy('month')
//         ->orderByRaw('MIN(created_at) ASC')
//         ->get();

// $months = $published_counts->pluck('month');
// $counts = $published_counts->pluck('count');



@endphp
@section('content')
<div class="main-content">
    <section class="section">
      <form method="GET" action="{{ route('dashboard') }}">
        <div class="row">
          <div class="col-2">
            <label class="">Start Date</label>
            <input type="date" class="form-control" name="start_date" value="{{ request()->start_date }}">
          </div>
          <div class="col-2">
            <label class="">End Date</label>
            <input type="date" class="form-control" name="end_date" value="{{ request()->end_date }}">
          </div>
         
          <div class="col-2">
            <button type="submit" class="btn btn-success mb-2 mr-2" style="margin-top: 30px;">Filter</button>
            <a href="{{ route('dashboard') }}" class="btn btn-success mb-2 mr-2" style="margin-top: 30px; color: white;">Clear</a>
          </div>
        </div>
      </form>
      <hr>
      <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">Service Pages</h5>
                      <h2 class="mb-3 font-18">{{ $services_count ?? 0 }}</h2>
                      {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15"> Case Studies</h5>
                      <h2 class="mb-3 font-18">{{ $case_studies_count ?? 0 }}</h2>
                      {{-- <p class="mb-0"><span class="col-orange">09%</span> Decrease</p> --}}
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/2.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">Article Pages</h5>
                      <h2 class="mb-3 font-18">{{ $articles_count }}</h2>
                      {{-- <p class="mb-0"><span class="col-green">18%</span>
                        Increase</p> --}}
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                    <div class="card-content">
                      <h5 class="font-15">Total Pages Published</h5>
                      <h2 class="mb-3 font-18">{{ ($services_published + $case_published + $articles_published) }}</h2>
                      {{-- <p class="mb-0"><span class="col-green">42%</span> Increase</p> --}}
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                    <div class="banner-img">
                      <img src="assets/img/banner/4.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-8">
          <div class="card">
            <div class="card-header" style="display:none important">
              <h4>Total Pages</h4></br></br>
              <h4>{{ ($services_count + $case_studies_count + $articles_count) }}</h4>
            </div>
            <div class="card-body">
              <div id="chart4" class="chartsh"></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Chart</h4>
            </div>
            <div class="card-body">
              <div id="dchart" class="chartsh"></div>
            </div>
          </div>
        </div>
        
        {{-- <div class="col-12 col-sm-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Chart</h4>
            </div>
            <div class="card-body">
              <div class="summary">
                <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                  <div id="chart3" class="chartsh"></div>
                </div>
                <div data-tab-group="summary-tab" id="summary-text">
                </div>
              </div>
            </div>
          </div>
        </div>
        --}}
      </div>

      <div class="row">

        <div class="col-12 col-sm-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Recently Added</h4>
            </div>
           
            <div class="table-responsive">
              <table class="table table-striped" id="">
                <thead>
                  <tr>
                    <th >
                      ID
                    </th>
                    <th>Title</th>
                    <th>Date Of Created</th> 
                    <th>Services</th> 
                    <th>Published</th> 
                  </tr>
                </thead>
               
                <tbody>
                @if (isset($services) && !empty($services))
                    
                    @foreach($services as $service)
                          <tr>
                          <td>
                             {{ $loop->iteration }}
                          </td>
                          <td> {{ $service->meta_title }}</td>     
                          <td> {{ \Carbon\Carbon::parse($service->created_at)->format('d/m/Y') }}</td>
                          <td> Software</td>    
                          <td> @if($service->published == 1)
                            <div class="badge badge-success">Published</div>
                            @else 
                            <div class="badge badge-danger">Not Published</div>
                            @endif
                          </td> 
  
                         
                          </tr>
                   @endforeach
                
                   @endif
                  
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
       
      </div>
      </div>
      
    </section>

  </div>

  <script>
  function chart4() {
        var options = {
            chart: {
                height: 250,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            colors: ['#999b9c', '#4CC2B0'], // line color
            fill: {
                colors: ['#999b9c', '#4CC2B0'] // fill color
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            markers: {
                colors: ['#999b9c', '#4CC2B0'] // marker color
            },
            series: [{
                name: 'Published Services',
                data: @json($counts)
            }],
            legend: {
                show: false,
            },
            xaxis: {
                categories: @json($months),
                labels: {
                    style: {
                        colors: "#9aa0ac"
                    }
                },
            },
            yaxis: {
                labels: {
                    style: {
                        color: "#9aa0ac"
                    }
                }
            },
        }

        var chart = new ApexCharts(
            document.querySelector("#chart4"),
            options
        );

        chart.render();
    }
function chart5()
    {
        var options = {
            series: [{{ $services_pending  }}, {{ $services_published }}, {{ $services_draft }}],
            labels: ["Pending", "Published", "Draft"],
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#dchart"), options);
        chart.render();
    }
  </script>

@endsection
