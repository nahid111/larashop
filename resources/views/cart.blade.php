@extends('layouts.app')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="price">Size</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>

                    <?php $contents = \Gloudemans\Shoppingcart\Facades\Cart::content(); ?>

					<tbody>
					@foreach($contents as $content)
						<tr>

							<td class="cart_product">
								<a href="#">
									<img src="{{ asset('/storage/product_images/'.$content->options->image) }}" alt=""
										 style="max-height: 150px; max-width: 150px">
								</a>
							</td>

							<td class="cart_description">
								<h4><a href="">{{ $content->name }}</a></h4>
								<p>{{ $content->options->description }}</p>
							</td>

							<td class="cart_price">
								<p>${{ $content->price }}</p>
							</td>

							<td class="cart_price">
								<p>{{ $content->options->size }}</p>
							</td>

							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<form action="/update-cart/{{$content->rowId}}" method="POST"  class="form-inline" enctype="multipart/form-data" accept-charset="UTF-8">
										{{ csrf_field() }}
										<input name="_method" type="hidden" value="PUT">
										<div class="form-group">
											<input class="cart_quantity_input" type="text" name="cart_item_quantity"
												   value="{{ $content->qty }}" autocomplete="off" size="2">
										</div>
										<button type="submit" class="btn btn-sm btn-success">
											<i class="fa fa-pencil"></i>
										</button>
									</form>

								</div>
							</td>

							<td class="cart_total">
								<p class="cart_total_price">${{ $content->total }}</p>
							</td>

							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('/remove-from-cart/'.$content->rowId) }}">
									<i class="fa fa-times"></i>
								</a>
							</td>
						</tr>
					@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>

							<li>
								Cart Sub Total <span>${{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span>
							</li>
							<li>Eco Tax <span>${{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</span></li>

						</ul>
							<a class="btn btn-default update" href="#">Update</a>
							<a class="btn btn-default check_out" href="/checkout">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection

