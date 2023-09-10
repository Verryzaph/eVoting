@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('contents')
  <!-- Content Row -->
  <div class="row">
    
    <!-- No. of Candidates Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            No. of Candidates</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $candidate->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-brands fa-black-tie fa-2x text-gray-300"></i>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('candidates') }}" class="text-center text-primary text-decoration-none">view detail <small><i class="fa-solid fa-arrow-right"></i></small></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Voters Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Voters</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $voter }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('voters') }}" class="text-center text-success text-decoration-none">view detail <small><i class="fa-solid fa-arrow-right"></i></small></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Voters Voted Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Voters Voted
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $voted }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('votes') }}" class="text-center text-info text-decoration-none">view detail <small><i class="fa-solid fa-arrow-right"></i></small></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Position Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            No. of Positions</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $position->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('positions') }}" class="text-center text-warning text-decoration-none">view detail <small><i class="fa-solid fa-arrow-right"></i></small></a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Content Row -->

  <div class="row">
</div>

<h1 class="h3 mb-4 text-gray-800">Votes Tally</h1>

<!-- Content Row -->
<div class="row">

@foreach($position as $row)
<!-- Content Column -->
<div class="col-lg-6 mb-4">

    <!-- Votes Tally Card Example -->
    <div class="card shadow mb-4 h-100">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $row->name }}</h6>
        </div>
        @foreach($candidate as $cdata)
        @if( $row->name == $cdata->position)
        <div class="card-body py-1">
            <h4 class="small font-weight-bold">{{ $cdata->firstname }} {{ $cdata->lastname }}
                @php($count=0)
                @foreach($vote as $votecount)
                    @if($votecount->candidate_id == $cdata->id)
                        @php($count++)
                    @endif
                @endforeach
                <span class="float-right">{{ $count }}</span>
            </h4>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endforeach

@endsection