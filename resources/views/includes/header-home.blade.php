<!-- header -->
<header>
        <div class="nav-area">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                    <img src="{{asset('images/vote (1).png')}}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                    {{__('eVoting')}}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="#home">{{__('Home')}}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#about">{{__('About')}}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#team">{{__('Team')}}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#contact">{{__('Contact')}}</a>
                        </li>
                      </ul>
                      @if (!Session()->has('loginId'))
                      <div class="button">
                        <a href="{{ route('login') }}" class="nav-link btn btn-outline-secondary shadow-sm d-sm d-block">{{__('Vote Now')}}</a>
                      </div>
                      @endif
                      @if (Session()->has('loginId'))
                      <div class="button">
                        <a href="dashboard" class="nav-link btn btn-outline-secondary shadow-sm d-sm d-block">{{__('My Account')}}</a>
                      </div>
                      @endif
                    </div>
                  </div>
                </nav>
            </div>
        </div>
    </header>