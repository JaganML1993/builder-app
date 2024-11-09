@extends('layouts.master')
<!-- CSS only -->
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.sub-service-list.create')}}" class="btn btn-success mb-2 mr-2" style="margin-left: 15px !important;"><i class="fa fa-plus" aria-hidden="true"></i>
          Create New Sub Folder</a>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Sub Folders</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Folder Name</th>
                      <th>Sub Folder Name</th>
                      <th>Status</th>
                      <th>Created at</th>
                      <th class="">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($services as $service)
                    <tr>
                      <td> {{ $i }} </td>
                      <td> {{ $service->service->name }} </td>
                      <td> {{ $service->name }} </td>
                      <td> @if($service->status == 1)
                        <div class="badge badge-success">Active</div>
                        @else
                        <div class="badge badge-danger">Inactive</div>
                        @endif
                      </td>
                      <td> {{ $service->created_at->format('d-m-Y H:i:s') }} </td>
                      <td class="text-center" style="display: flex;">
                        <a href="{{ route('admin.sub-service-list.edit', $service->id) }}" class="btn btn-primary" style="margin-right: 12px !important;">Edit</a>
                        <form action="{{ route('admin.sub-service-list.delete',$service->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="javascript:void(0);" class="btn btn-danger confirmation" title="Delete" data-toggle="tooltip" onclick="if (confirm('Are you sure you want to delete?')) { this.closest('form').submit(); } return false;">Delete</a>
                        </form>
                      </td>

                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
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