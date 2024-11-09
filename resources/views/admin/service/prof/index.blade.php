@extends('layouts.master')
<!-- CSS only -->

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
              <a href="{{ route('admin.service.professional.create',$id )}}" class="btn btn-success mb-2 mr-2" style="margin-left: 15px !important;"><i class="fa fa-plus" aria-hidden="true"></i>
                Create</a>
                <a href="{{ route('admin.service.index')}}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="
                  fas fa-arrow-left"></i>
                Back To Main</a>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Professional Services</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>
                            <tr>
                              <th >
                                #
                              </th>
                              <th>Image</th>
                              <th>Title</th>                          
                              <th>Description</th> 
                              <th class="">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if (isset($services) && !empty($services))
                              
                              @foreach($services as $service)
                                    <tr>
                                    <td>
                                       {{ $loop->iteration }}
                                    </td>
                                    <td>
                                      <img style="width:50px;height:50px" src="{{ asset('storage/professional_service_images/' . $service->image) }}" alt="Service Image">
                                  </td>
                                                                      <td> {{ $service->title }}</td>     
                                    <td> {{ $service->description }}</td>     
                                    
                                    <td class="text-center" style="display: flex;">
                                      {{-- <a href="" class="btn btn-primary" style="margin-right: 12px !important;">Edit</a> --}}
                                      <form action="{{ route('admin.service.professional.delete',$service->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="service_id" value="{{$id}}">

                             <a href="#"  class="btn btn-danger confirmation" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                      
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
  $('.confirmation').on('click', function () {
      return confirm('Are you sure?');
  });
</script>
@endsection
