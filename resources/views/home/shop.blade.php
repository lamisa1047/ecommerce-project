<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Latest Products
      </h2>
    </div>
    <div class="row">

      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box bg-white shadow">

          <div class="img-box">
            <img src="products/{{$products->image}}" alt="">
          </div>
          <div class="detail-box p-3">
            <h6>{{ $products->title }}</h6>
            <h6>
              <span>
                {{ $products->price }}
              </span>
            </h6>
            <h6>
              <a href="{{ url('add_cart', $products->id) }}">
                        <i class="fa fa-shopping-bag" aria-hidden="true"> + </i>
                    </a>
            </h6>

          </div>

        </div>
      </div>
      @endforeach

    </div>
    <div class="btn-box">
      <a href="">
        View All Products
      </a>
    </div>
  </div>
</section>