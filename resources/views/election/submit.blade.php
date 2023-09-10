@extends('includes.main-layout')

@section('content')

    <!-- header -->
    @include('includes.header-user')
    
    <!-- main content -->
    <div class="dashboard">
        <div class="container mt-5 mb-5 pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-12">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <h4 class="sub-title">Welcome, {{ $data->name }}.</h4>
                    <p>{{ $data->email }}</p>
                    <hr>
                </div>
                  <input type="hidden" name="voter" value="{{ $data->id }}">
                <div class="col-md-12 mt-5 text-center">
                  <h3 class="fs-1 mb-5">{{ $title }}</h3>
                  <p class="text fs-3">You have already voted for this election.</p>
                  <a href="javascript:void(0)" class="btn btn-primary btn-flat btn-md" type="button"  
                    id="show-platform" data-url="" 
                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">View Ballot</a>
                </div>              
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Your Votes</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        @foreach($candidate as $cdata)
                            @foreach($vote as $row)
                                @if($row->candidate_id == $cdata->id && $row->voters_id == $data->id)
                                    <p>{{ $cdata->position }} : {{ $cdata->firstname }} {{ $cdata->lastname }}</p>
                                @endif
                            @endforeach
                        @endforeach
                </div>
                <div class="modal-footer"><button class="btn btn-secondary btn-sm btn-flat" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>

 @stop