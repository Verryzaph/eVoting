@extends('layouts.app')

@section('title', 'Candidate')
  
@section('contents')
<form action="{{ isset($candidate) ? route('candidates.update', $candidate->id) : route('candidates.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($candidate) ? 'Edit Candidate' : 'Add New Candidate' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" value="{{ isset($candidate) ? $candidate->firstname : '' }}">
              <span class="text-danger">@error('firstname') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="{{ isset($candidate) ? $candidate->lastname : '' }}">
              <span class="text-danger">@error('lastname') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="position">Position</label>
              <select name="position" id="posiiton" class="custom-select">
                <option value="" selected disabled hidden>--Select--</option>
                  @foreach ($position as $row)
                    <option value="{{ $row->name }}" {{ isset($candidate) ? (($candidate->position == $row->name) ? 'selected' : '') : '' }}>{{ $row->name }}</option>
                  @endforeach
              </select>
              <span class="text-danger">@error('position') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="price">Profile </label><br>
              <input type="file" id="profile" name="profile" value="">
              <span class="text-danger">@error('profile') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="price">Platform </label>
              <input type="text" class="form-control" id="platform" name="platform" value="{{ isset($candidate) ? $candidate->platform : '' }}">
              <span class="text-danger">@error('platform') {{$message}} @enderror</span>
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