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
                <form action="{{ route('submit') }}" method="post">
                  @csrf
                  <input type="hidden" name="voter" value="{{ $data->id }}">
                <div class="col-md-12 mt-5">
                  <h3 class="text-center fs-1 mb-5">{{ $title }}</h3>
                  <span class="text-danger text-center">@error('candidates') {{$message}} @enderror</span>
                  @foreach ($position as $row)
                  <div class="card shadow mb-4 mt-4">
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
                      <button type="reset" class="btn btn-danger btn-sm btn-flat mb-3 float-end">Reset <small><i class="fa-solid fa-arrows-rotate"></i></small></button>
                      <p class="text fs-6">You may select up to {{ $row->vote }} candidate</p>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                      @foreach ($candidate as $cdata)
                                        @if( $row->name == $cdata->position)
                                        <tr class="inner-box">
                                        <td class="align-middle">
                                            <div class="form-check text-center">
                                              <label class="form-check-label" for="candidate">
                                                <input type="checkbox" class="form-check-input border-primary" name="candidates[]" value="{{ $cdata->id }}" id="candidate">
                                              </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-img">
                                                <img src="images/{{ $cdata->profile }}" class="rounded" alt="" width="100px" height="100px" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="event-wrap">
                                                <h3 class="text-dark">{{ $cdata->firstname }} {{ $cdata->lastname }}</h3>
                                                <div class="meta">
                                                  <div class="primary-btn">
                                                    <a type="button" class="btn btn-info btn-sm btn-flat text-white" 
                                                    href="javascript:void(0)" id="show-platform" data-url="{{ route('platform', $cdata->id) }}" 
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                      <small><i class="fa-solid fa-magnifying-glass"></i></small> Platform</a>
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
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-flat m-3">Submit <i class="fa-regular fa-square-check"></i></button>
                </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <span id="firstname"></span>
                            <span id="lastname"></span>
                        </h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <p><span id="platform"></span></p>
                    </div>
                    <div class="modal-footer"><button class="btn btn-secondary btn-sm btn-flat" type="button" data-bs-dismiss="modal"> Close</button></div>
                </div>
            </div>
        </div>

    </div>
 @stop

 @section('script')
 <script>
      $(document).ready(function () {
          // jquery for modal
          $("body").on("click", "#show-platform", function () {
              var platformURL = $(this).data("url");
              $.get(platformURL, function (data) {
                  $("#staticBackdrop").modal("show");
                  $("#firstname").text(data.firstname);
                  $("#lastname").text(data.lastname);
                  $("#platform").text(data.platform);
              });
          });
      });
    </script>
 @endsection