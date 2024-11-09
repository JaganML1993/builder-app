@extends('layouts.master')
<!-- CSS only -->
<style>
  .image-preview,
    #callback-preview {
      height: 100px !important;
  }
</style>

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <a href="{{ route('admin.index') }}" class="btn btn-primary mb-2 mr-2" style="margin-left: 15px !important;"><i class="fas fa-arrow-left"></i>
          Back</a>
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif --}}
        <div class="col-12">
          <div class="card">
            <form method="POST" action="{{ route('update', $user->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-header text-center">
                  <h4>Edit User</h4>
              </div>
              <!-- @include('inc.messages') -->
              <div class="card-body">
                  <div class="form-group row mb-4 color-one">
                      <div class="col-6 mb-4">
                          <label class="">First Name<span class="text-danger">*</span></label>
                          <input type="text" name="firstname" class="form-control col" value="{{ old('firstname', $user->name ?? '') }}">
                          @if ($errors->has('firstname'))
                          <span class="text-danger">{{ $errors->first('firstname') }}</span>
                          @endif
                      </div>
                      <div class="col-6 mb-4">
                          <label class="">Last Name<span class="text-danger">*</span></label>
                          <input type="text" name="lastname" class="form-control col" value="{{ old('lastname', $user->lastname ?? '') }}">
                          @if ($errors->has('lastname'))
                          <span class="text-danger">{{ $errors->first('lastname') }}</span>
                          @endif
                      </div>
                      <div class="col-6 mb-4">
                          <label class="">Username<span class="text-danger">*</span></label>
                          <input type="text" name="username" class="form-control col" value="{{ old('username', $user->account_name ?? '') }}">
                          @if ($errors->has('username'))
                          <span class="text-danger">{{ $errors->first('username') }}</span>
                          @endif
                      </div>
                      <div class="col-6 mb-4">
                          <label class="">Status<span class="text-danger">*</span></label>
                          <select name="status" id="status" class="form-control col">
                              <option value="1" @if(old('status', $user->status ?? '') == 1) selected @endif>Active</option>
                              <option value="0" @if(old('status', $user->status ?? '') == 0) selected @endif>Inactive</option>
                          </select>
                          @if ($errors->has('status'))
                          <span class="text-danger">{{ $errors->first('status') }}</span>
                          @endif
                      </div>
                      <div class="col-6 mb-4">
                          <label class="">Password</label>
                          <input type="password" name="password" class="form-control col">
                          @if ($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
                      </div>
                      <div class="col-6 mb-4">
                          <label class="">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control col">
                          @if ($errors->has('password_confirmation'))
                          <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                          @endif
                      </div>
                      <div class="col-6 mb-4">
                          <label class="">Email Id<span class="text-danger">*</span></label>
                          <input type="email" name="email" class="form-control col" value="{{ old('email', $user->email ?? '') }}">
                          @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                      </div>
                      @php 
                      $roles = \App\Models\Role::get();
                      @endphp
                      <div class="col-6 mb-4">
                          <label class="">Role<span class="text-danger">*</span></label>
                          <select name="role" id="role" class="form-control col">
                              @foreach($roles as $role)
                              <option value="{{ $role->id }}" @if(old('role', $user->role ?? '') == $role->id) selected @endif>{{ $role->name }}</option>
                              @endforeach
                          </select>
                          @if ($errors->has('role'))
                          <span class="text-danger">{{ $errors->first('role') }}</span>
                          @endif
                      </div>
                      <div class="col-12 mb-4 text-center mt-4">
                          <button class="btn btn-primary btn-pub" type="submit">Update Account</button>
                      </div>
                  </div>
              </div>
          </form>
          
        </div>
      </div>
    </div>
</div>
</section>
</div>

@endsection