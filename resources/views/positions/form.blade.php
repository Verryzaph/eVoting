@extends('layouts.app')

@section('title', 'Position')
  
@section('contents')
<form action="{{ isset($position) ? route('positions.update', $position->id) : route('positions.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($position) ? 'Edit Position' : 'Add New Position' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="item_code">Description</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($position) ? $position->name : '' }}">
              <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <label for="productname">Maximum Vote</label>
              <input type="number" class="form-control" id="vote" name="vote" value="{{ isset($position) ? $position->vote : '' }}">
              <span class="text-danger">@error('vote') {{$message}} @enderror</span>
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