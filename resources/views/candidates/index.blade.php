@extends('layouts.app')

@section('title', 'Candidate')
  
@section('contents')
  <!-- Modal -->
  @include('candidates.show')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Candidates List</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('candidates.add') }}" class="btn btn-primary btn-sm btn-flat mb-3">Add <small><i class="fa-solid fa-plus"></i></small></a>
      <div class="table-responsive">
      @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Position</th>
              <th>Profile</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Platform</th>                            
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach($data as $row)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->position }}</td>
                <td class="text-center"><img src="images/{{ $row->profile }}" width="30px" height="30px" class="rounded-circle" alt=""></td>
                <td>{{ $row->firstname }}</td>
                <td>{{ $row->lastname }}</td>
                <td class="text-center">
                  <!-- Button trigger modal -->
                  <a href="javascript:void(0)" id="show-platform" data-url="{{ route('candidates.show', $row->id) }}" 
                  class="btn btn-info btn-sm btn-flat" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    View <small><i class="fa-solid fa-magnifying-glass"></i></small>
                  </a>
                <td>
                  <a href="{{ route('candidates.edit', $row->id) }}" class="btn btn-warning btn-sm btn-flat">Edit <small><i class="fa-solid fa-pen-to-square"></i></small></a>
                  <a href="{{ route('candidates.delete', $row->id) }}" class="btn btn-danger btn-sm  btn-flat">Delete <small><i class="fa-solid fa-trash"></i></small></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
