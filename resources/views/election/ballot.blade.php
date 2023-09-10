@extends('layouts.app')

@section('title', 'Ballot Preview')
  
@section('contents')
<form action="" method="post" id="form">
<div class="div">
  @foreach ($position as $row)
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="float-end m-0">
        <button type="button" class="btn btn-default btn-sm moveup">
          <i class="fa fa-arrow-up"></i>
        </button>
        <button type="button" class="btn btn-default btn-sm movedown">
          <i class="fa fa-arrow-down"></i>
        </button>
      </div>
      <h6 class="m-0 font-weight-bold text-primary fs-5">{{ $row->name }}</h6>
    </div>
    <div class="card-body">
      <button type="reset" onclick="resetForm()" class="btn btn-danger btn-sm btn-flat mb-3 float-end">Reset <small><i class="fa-solid fa-arrows-rotate"></i></small></button>
      <p class="text-dark fs-6">You may select up to {{ $row->vote }} candidate</p>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="home" role="tabpanel">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    @foreach ($candidate as $data)
                    @if( $row->name == $data->position)
                        <tr class="inner-box">
                          <td class="align-middle">
                              <div class="form-check text-center">
                                  <input type="checkbox" class="form-check-input border-primary" name="" id="">
                              </div>
                          </td>
                          <td>
                              <div class="event-img">
                                  <img src="images/{{ $data->profile }}" class="rounded" alt="" width="100px" height="100px"/>
                              </div>
                          </td>
                          <td>
                              <div class="event-wrap">
                                  <h3 class="text-dark">{{ $data->firstname }} {{ $data->lastname }}</h3>
                                  <div class="meta">
                                    <div class="primary-btn">
                                      <a class="btn btn-info btn-sm btn-flat" href="#"><small><i class="fa-solid fa-magnifying-glass"></i></small> Platform</a>
                                    </div>
                                  </div>
                              </div>
                          </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
@endforeach
</form>
@endsection