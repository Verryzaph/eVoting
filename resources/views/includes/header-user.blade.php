<!-- header -->
<header>
        <div class="nav-area">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                    <img src="{{asset('images/vote (1).png')}}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                    <span class="text-secondary">{{__('eVoting')}}</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                          <a class="nav-link text-capitalize" aria-current="page" href="/"><i class="fa-solid fa-house"></i> home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-capitalize" aria-current="page" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> logout</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
        </div>
    </header>