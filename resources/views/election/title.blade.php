@extends('layouts.app')

@section('title', 'Election Title')
  
@section('contents')
  <form action="{{ route('updateTitle') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Configure</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $title }}">
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