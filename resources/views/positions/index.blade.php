@extends('layouts.app')

@section('title', 'Position')
  
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Positions</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('positions.add') }}" class="btn btn-primary btn-sm btn-flat mb-3">Add <small><i class="fa-solid fa-plus"></i></small></a>
      <div class="table-responsive">
      @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Description</th>
              <th>Maximum Vote</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->vote }}</td>
                <td>
                  <a href="{{ route('positions.edit', $row->id) }}" class="btn btn-warning btn-sm btn-flat">Edit <small><i class="fa-solid fa-pen-to-square"></i></small></a>
                  <a href="{{ route('positions.delete', $row->id) }}" class="btn btn-danger btn-sm btn-flat">Delete <small><i class="fa-solid fa-trash"></i></small></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection