@extends('layouts.app')

@section('title', 'Voter')
  
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Voters List</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('voters.add') }}" class="btn btn-primary btn-sm btn-flat mb-3">Add <small><i class="fa-solid fa-plus"></i></small></a>
      <div class="table-responsive">
      @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Full Name</th>
              <th>Email ID</th>
              <th>Level</th>                            
              <th>Status</th>                            
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach($data as $row)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    @if( $row->is_admin == 1 )
                     Admin
                    @endif
                    @if( $row->is_admin == 0 )
                     Voter
                    @endif
                </td>
                <td>
                    @if( $row->status == 1 )
                     Voted
                    @endif
                    @if( $row->status == 0 )
                     Not Voted
                    @endif
                </td>
                <td>
                  <a href="{{ route('voters.edit', $row->id) }}" class="btn btn-warning btn-sm btn-flat">Edit <small><i class="fa-solid fa-pen-to-square"></i></small></a>
                  <a href="{{ route('voters.delete', $row->id) }}" class="btn btn-danger btn-sm btn-flat">Delete <small><i class="fa-solid fa-trash"></i></small></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection