@extends('layouts.app')

@section('title', 'Voter')
  
@section('contents')
<form action="{{ isset($user) ? route('voters.update', $user->id) : route('voters.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Edit Voter' : 'Add New Voter' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="item_code">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}">
              <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="productname">Email ID</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
              <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="price">Password  </label>
              <input type="password" class="form-control" id="password" name="password" value="{{ isset($user) ? $user->password : '' }}">
              <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select name="level" id="level" class="custom-select">
                <option value="" selected disabled hidden>-- Choose User Type --</option>
                <option value="1">Admin</option>
                <option value="0">User</option>
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm btn-flat">Save <small><i class="fa-solid fa-floppy-disk"></i></small></button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection