{{-- navbar --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><x-application-logo/></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('produk')}}">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true"></a>
          </li>
        </ul>
        
        <form class="d-flex col-12 col-lg-9" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="rounded col-3 d-lg-none" style="border-style: none;">Search</button>
        </form>

        <div class="d-lg-none mt-2 mb-3 col-12 d-flex text-center justify-content-center">
            <button class="rounded my-2 p-1" style="border-style: none; width: 47%; margin-right: 10px;">Login</button>
            <button class="rounded my-2 p-1" style="border-style: none; width: 47%">Register</button>
        </div>
      </div>
              <!-- button login regis -->
              <div class="px-3 d-none d-lg-inline">
                {{-- <button class="px-4 py-2 mx-3 rounded" style="border-style: none;">Login</button> --}}
                <a onclick="window.location.href='/admin/login';" class="btn-primary btn px-4 py-2 mx-3 rounded" style="border-style: none;">Login</a>
                <a onclick="window.location.href='/admin/registration';" class="btn-primary btn px-4 py-2 mx-3 rounded" style="border-style: none;">Register</a>
              </div>
    </div>
  </nav>