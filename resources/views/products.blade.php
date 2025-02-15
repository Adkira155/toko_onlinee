<div>
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
                    
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control border-end-0 rounded-start-pill" placeholder="Cari produk" name="search" value="{{ request()->search ? request()->search : '' }}">
                    <button type="submit" class="input-group-text bg-white border-start-0 rounded-end-pill"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
                </div>
                
            </div>
        </div>
    </form>
</div>

<div class="container pb-5 mt-3">
    <div class="row">
{{-- card product start here --}}
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-item border-1 bg-transparent position-relative">
                <img src="images/akidol.jpg" class="card-img-top" alt="">
                <!-- Konten Produk -->
                <div class="card-body text-center">
                    <h3>Anomali Oren Jele</h3>
                    <h4 class="text-danger mb-0">Rp.1000</h4>

                    <div class="mt-3">
                        <a href="" class="text-decoration-none"><x-cart-logo/></a>
                        <a href="" class="text-decoration-none btn btn-primary text-white ms-5"> Lihat Detail </a>
                    </div>
                    
                </div>
            </div>
        </div>
{{-- card product end here --}}


   
    </div>
</div>
</div>