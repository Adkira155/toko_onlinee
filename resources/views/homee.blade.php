<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- link from booststrap official website, no need to download anything -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container-fluid bg-secondary p-0 m-0">

<style>
  .bekgron 
  {
    background-color: rgb(177, 255, 229);
  }

  .button {
    background-color: transparent
  }
</style>

{{-- navbar --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
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
                <button class="px-4 py-2 mx-3 rounded" style="border-style: none;">Login</button>
                <button class="px-4 py-2 mx-3 rounded" style="border-style: none;">Register</button>
              </div>
    </div>
  </nav>
</div>

<!-- banner -->
<div class="bekgron container-fluid d-flex justify-content-center">
  <div class="isi text-center">
    <h1 class="pt-3">Lorem Ipsum</h1>
    <h2>Ulala</h2>
    <h5 class="pt-2">Solusi Terbaik Belanja Online <br> tanpa pajak PPN 12%</h5>
    <button class="btn btn-success border-0 rounded px-5 py-2 mb-4 mt-3">Lorem</button>
  </div>
</div>



<!-- footer -->
<footer class="d-flex bg-body-tertiary">
<div class="container-fluid justify-content-center p-3 d-sm-flex">

  <div class="col-12 col-sm-5">
    
    <h6 class="d-sm-none fw-normal"><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, quos!</b></h6>
    <br class="d-sm">
    <p class="d-none d-sm-inline"><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br class="d-none d-lg-inline"> Autem, quos!</b></p>
  </div>

  <div class="pb-2 col-sm-2">
    <h5>Part 1</h5>
    <p>Lorem</p>
    <p>Lorem</p>
    <p>Lorem</p>
  </div>

  <div class="pb-2 col-sm-2">
    <h5>Part 2</h5>
    <p>Lorem</p>
    <p>Lorem</p>
    <p>Lorem</p>
  </div>

  <div class="sosmed col-5 col-sm-3">
    <h5>Follow us</h5>
    <div class="sosmed d-flex col-10 col-sm-7 col-lg-5">
    <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="m-1"><path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
    </div>

    
  </div>
</div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>