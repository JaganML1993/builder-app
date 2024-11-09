@extends('layouts.master')
<!-- CSS only -->

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
          @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
            <div class="row">
              <a href="{{ route('register') }}" class="btn btn-success mb-2 mr-2" style="margin-left: 15px !important;"><i class="fa fa-plus" aria-hidden="true"></i>
                Create</a>
               

                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Manage Users</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>
                            <tr>
                              <th >
                                #
                              </th>
                              <th>Account Name</th>                          
                              <th>UserName</th>                          
                              <th>Email</th>  
                              <th>Role</th>  
                              <th>Status</th>  
                              <th>Date Of Created</th>                            
                              <th class="">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                              @foreach($admins as $user)

                                    <tr>
                                    <td>
                                       {{ $loop->iteration }}
                                    </td>
                                    <td> {{ $user->name }} {{ $user->lastname}}</td>                                   
                                    <td> {{ $user->account_name }}</td>                                   
                                    <td> {{ $user->email }}</td> 
                                    <td> {{ $user->roles->name }}</td> 
                                    <td> @if($user->status == 1)
                                        <div class="badge badge-success">Active</div>
                                        @else 
                                        <div class="badge badge-danger">Inactive</div>
                                        @endif
                                    <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                                   
                                    <td class="text-center" style="display: flex;">
                                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" style="margin-right: 12px !important;">Edit</a>
                                      <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger confirmation" title="Delete" data-toggle="tooltip">Delete</button>
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
