@extends('layouts.app')
  
@section('contents')
<!-- Modal -->
  <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reseting...</h5>
                  <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                <h6 class="text-uppercase">reset votes</h6>
                This will delete all votes and counting back to 0.
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary btn-sm btn-flat" type="button" data-bs-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary btn-sm btn-flat" href="{{ route('delete') }}">Reset</a>
              </div>
          </div>
      </div>
  </div>

<!-- Main Content -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Votes</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('delete') }}" class="btn btn-danger btn-sm btn-flat mb-3" data-bs-toggle="modal" data-bs-target="#resetModal">Reset <small><i class="fa-solid fa-arrows-rotate"></i></small></a>
      <div class="table-responsive">
      @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Position</th>
              <th>Candidate</th>
              <th>Voter</th>                            
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($vote as $row)
              <tr>
                <th>{{ $no++ }}</th>
                
                @foreach($candidate as $cdata)
                @if($row->candidate_id == $cdata->id)
                <td>{{ $cdata->position }}</td>
                <td>{{ $cdata->firstname }} {{ $cdata->lastname }}</td>
                @endif
                @endforeach

                @foreach($user as $data)
                @if( $row->voters_id == $data->id )
                <td>{{ $data->name }}</td>
                @endif
                @endforeach

              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection