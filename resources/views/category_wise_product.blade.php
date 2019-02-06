@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    <!-- Left Sidebar	 -->
                    @include('inc.left_sidebar')

                </div>

                <div class="col-sm-9 padding-right">

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Category/Brand Wise</h2>

                        @if(count($products)>0)
                            @foreach($products as $product)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('/storage/product_images/'.$product->image) }}" alt="" style="width: 250px; height: 250px;" />
                                                <h2>$ {{ $product->price }}</h2>
                                                <p><a href="{{ url('/product-details/'.$product->id) }}">{{ $product->name }}</a></p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>$ {{ $product->price }}</h2>
                                                    <p>{{ $product->name }}</p>
                                                    <a href="{{ url('/product-details/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                <li><a href="{{ url('/product-details/'.$product->id) }}">View Product</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>



@endsection