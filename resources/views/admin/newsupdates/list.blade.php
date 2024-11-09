@extends('layouts.master')
<!-- CSS only -->

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
              <a href="{{ route('admin.newsupdates.create')}}" class="btn btn-success mb-2 mr-2" style="margin-left: 15px !important;"><i class="fa fa-plus" aria-hidden="true"></i>
                Create Post</a>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Posts</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>
                            <tr>
                              <th >
                                #
                              </th>
                              <th>Title</th>                              
                              <th>Date Of Created</th>
                              <th>Last of Updated</th>
                              <th class="">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $news = \App\Models\NewsUpdates::latest()->get();
                            @endphp
                              @foreach($news as $post)
                                    <tr>
                                    <td>
                                       {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $post->title }}</td>                                   
                                    <td> {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</td>
                                    <td> {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                    <td class="text-center" style="display: flex;"><a href="{{route('admin.newsupdates.edit',$post->id)}}" class="btn btn-primary" style="margin-right: 12px !important;">Edit</a>
                                      <form action="{{route('admin.newsupdates.destroy',$post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                             <a href="#"  class="btn btn-danger confirmation" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                      
                                       Delete</a>
                             </form>
                                    </td>
                                    </tr>
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
  $('.confirmation').on('click', function () {
      return confirm('Are you sure?');
  });
</script>
@endsection
