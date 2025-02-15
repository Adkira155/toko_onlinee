<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="/products" method="get">
            <div class="row pt-5 justify-content-between">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <select name="category" class="form-select rounded-pill px-3">
                                <option value="">Kategori Produk</option>
                                {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request()->category && request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="sort" class="form-select rounded-pill px-3">
                                <option value="">Urutkan</option>
                                <option value="latest" >Terbaru</option>
                                <option value="cheapest">Termurah</option>
                                <option value="expensive">Termahal</option>
                                <option value="sold">Terjual</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-end-0 rounded-start-pill" placeholder="Cari produk" name="search">
                        <button type="submit" class="input-group-text bg-white border-start-0 rounded-end-pill"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container pb-5 mt-3">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-item border-1 bg-transparent position-relative">
                        <!-- Foto Produk -->
                        <img src="images/logo.jpg" class="card-img-top" alt="">
    
                        <h1>agsahayu</h1>
                        <!-- Tombol Love dan Eye -->
                        <div class="action-buttons position-absolute">
                            <form method="post" action="">
                                {{-- @csrf --}}
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </form>
                        </div>
    
                        <!-- Konten Produk -->
                        <div class="card-body text-center">
                            <h6>deskripsi</h6>
                            <p class="text-danger mb-0">Rp 100</p>
                            <p class="text-warning">★ ★ ★ ★ ☆ <span class="text-muted">(42 reviews)</span></p>
                            <a href="" class="text-decoration-none"> keranjang dayo</a>
                        </div>
                    </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="card product-item border-1 bg-transparent position-relative">
                    <img src="images/logo.jpg" class="card-img-top" alt="">
                  
                    <!-- Konten Produk -->
                    <div class="card-body text-center">
                        <h6>deskripsi</h6>
                        <p class="text-danger mb-0">Rp 100</p>
                        <p class="text-warning">★ ★ ★ ★ ☆ <span class="text-muted">(42 reviews)</span></p>
                        <a href="" class="text-decoration-none"> keranjang dayo</a>
                    </div>
                </div>
        </div>
            {{-- @endforeach --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<!-- product list -->
