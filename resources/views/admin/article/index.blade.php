@extends('layouts.master')
<!-- CSS only -->

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.article.create')}}" class="btn btn-success mb-2 mr-2" style="margin-left: 15px !important;"><i class="fa fa-plus" aria-hidden="true"></i>
          Create New Page</a>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Article</h4>
            </div>
            <div class="card-body">
              <!-- filter starts -->
              <form action="{{ route('admin.article.index') }}" id="filterForm" method="GET">
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
                    <a href="{{ route('admin.service.index') }}" class="btn btn-success mb-2 mr-2" style="margin-top: 30px; color: white;">Clear</a>
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
                      <th>Published</th>
                      <th>Date Of Created</th>
                      <th>Page Url</th>
                      <th class="">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($articles) && !empty($articles))

                    @foreach($articles as $article)
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                      </td>
                      <td> {{ $article->meta_title }}</td>
                      {{-- <td> @if($article->status == 1)
                        <div class="badge badge-success">Active</div>
                        @else
                        <div class="badge badge-danger">Inactive</div>
                        @endif
                      </td> --}}
                      <td> @if($article->published == 1)
                        <div class="badge badge-success">Published</div>
                        @elseif($article->published == 2)
                        <div class="badge badge-info">Draft</div>
                        @else
                        <div class="badge badge-danger">Not Published</div>
                        @endif
                      </td>

                      <td> {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</td>
                      <td> <code>{{ $article->page_link ?? '' }} </code></td>
                      <td class="text-center" style="display: flex;">
                        <a href="{{ route('admin.article.publish',$article->id) }}" class="btn btn-primary" style="margin-right: 12px !important;" onclick="if (confirm('Are you sure you want to publish the page?')) { this.closest('form').submit(); } return false;">Publish</a>
                        <a href="{{ route('admin.article.edit',$article->id) }}" class="btn btn-primary" style="margin-right: 12px !important;">Edit</a>
                        @if($article->published)
                        <a href="https://demo1.flatworldsolutions.com{{ $article->page_link }}.php" class="btn btn-primary" target="_blank" style="margin-right: 12px !important;">View</a>

                       @else
                        <a href="{{ url($article->slug) }}" target="_blank" class="btn btn-primary" style="margin-right: 12px !important;">View</a>
                        @endif
                        <form action="{{ route('admin.article.delete',$article->id)}}" method="post">
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