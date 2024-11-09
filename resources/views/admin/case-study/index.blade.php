@extends('layouts.master')
<!-- CSS only -->

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.case-study.create')}}" class="btn btn-success mb-2 mr-2" style="margin-left: 15px !important;"><i class="fa fa-plus" aria-hidden="true"></i>
          Create New Page</a>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Case Study</h4>
            </div>
            <div class="card-body">
              <!-- filter starts -->
              <form action="{{ route('admin.case-study.index') }}" id="filterForm" method="GET">
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
                    <label class="">Services</label>
                    <select class="form-control" name="service_id">
                      <option value="">All Services</option>
                      @foreach($allServices as $service)
                      <option value="{{ $service->id }}" {{ request()->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-2">
                    <button type="submit" class="btn btn-success mb-2 mr-2" style="margin-top: 30px;">Filter</button>
                    <a href="{{ route('admin.case-study.index') }}" class="btn btn-success mb-2 mr-2" style="margin-top: 30px; color: white;">Clear</a>
                  </div>
                </div>
              </form>
              <hr>
              <!-- filter ends -->
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>Page Title</th>
                      {{-- <th>Status</th> --}}
                      <th>Services</th>
                      <th>Published</th>
                      <th>Date Of Created</th>
                      <th>Page Url</th>
                      <th class="">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($studies) && !empty($studies))

                    @foreach($studies as $service)
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td> {{ $service->meta_title }}</td>
                      {{-- <td> @if($service->status == 1)
                        <div class="badge badge-success">Active</div>
                        @else
                        <div class="badge badge-danger">Inactive</div>
                        @endif
                      </td> --}}
                      <td> {{ $service->serviceList ? $service->serviceList->name : '' }}</td>
                      <td> @if($service->published == 1)
                        <div class="badge badge-success">Published</div>
                        @elseif($service->published == 2)
                        <div class="badge badge-info">Draft</div>
                        @else
                        <div class="badge badge-danger">Not Published</div>
                        @endif
                      </td>

                      <td> {{ \Carbon\Carbon::parse($service->created_at)->format('d/m/Y') }}</td>
                      <td> <code>{{ $service->page_link ?? '' }} </code></td>
                      <td class="text-center" style="display: flex;">
                        <a href="{{ route('admin.case-study.publish',$service->id) }}" class="btn btn-primary" style="margin-right: 12px !important;" onclick="if (confirm('Are you sure you want to publish the page?')) { this.closest('form').submit(); } return false;">Publish</a>
                        <a href="{{ route('admin.case-study.edit',$service->id) }}" class="btn btn-primary" style="margin-right: 12px !important;">Edit</a>
                        @if($service->published)
                        <a href="https://demo1.flatworldsolutions.com{{ $service->page_link }}.php" class="btn btn-primary" target="_blank" style="margin-right: 12px !important;">View</a>

                       @else
                        <a href="{{ url($service->slug) }}" target="_blank" class="btn btn-primary" style="margin-right: 12px !important;">View</a>
                        @endif
                        <form action="{{ route('admin.case-study.delete',$service->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="#" class="btn btn-danger confirmation" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">

                            Delete</a>
                        </form>
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
<script type="text/javascript">
  $('.confirmation').on('click', function() {
    return confirm('Are you sure?');
  });
</script>
@endsection