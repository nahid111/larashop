<div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#electronics">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Electronics
                        </a>
                    </h4>
                </div>
                <div id="electronics" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @if( count($cats) > 0 )
                                @foreach($cats as $cat)
                                    <li><a href="{{ url('/category-wise/'.$cat->id) }}">{{ $cat->name }} </a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            @if( count($cats) > 0 )
                @foreach($cats as $cat)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{ url('/category-wise/'.$cat->id) }}">{{ $cat->name }}</a></h4>
                        </div>
                    </div>
                @endforeach
            @endif

        </div><!--/category-products-->
        
        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @if( count($brands) > 0 )
                        @foreach($brands as $brand)
                            <?php
                                $brandcount = 0;
                                foreach($brand->products as $product){
                                    $brandcount++;
                                }
                            ?>
                            <li><a href="{{ url('/brand-wise/'.$brand->id) }}"> <span class="pull-right">{{ $brandcount }}</span>{{ $brand->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->
        
    </div>