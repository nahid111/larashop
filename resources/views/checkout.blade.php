@extends('layouts.app')

@section('pageStyles')
	<script src="https://js.stripe.com/v3/"></script>

	<style type="text/css">
		.StripeElement {
			background-color: white;
			height: 40px;
			padding: 10px 12px;
			border-radius: 4px;
			border: 1px solid transparent;
			box-shadow: 0 1px 3px 0 #e6ebf1;
			-webkit-transition: box-shadow 150ms ease;
			transition: box-shadow 150ms ease;
		}

		.StripeElement--focus {
			box-shadow: 0 1px 3px 0 #cfd7df;
		}

		.StripeElement--invalid {
			border-color: #fa755a;
		}

		.StripeElement--webkit-autofill {
			background-color: #fefde5 !important;
		}
	</style>
@endsection

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/home">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Please Fillup the form fields</p>
			</div><!--/register-req-->

			<div class="col-sm-3"></div>
			<div class="col-sm-6 register-req">

				{{-- Form start --}}
				<form action="/checkout" method="post" class="" id="payment-form" enctype="multipart/form-data" accept-charset="UTF-8">
					{{ csrf_field() }}

					<h5>Shipping Details</h5> {{-- Shipping address --}}

					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name:" required>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email:" required>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number:" required>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="city" name="city" placeholder="City:" required>
					</div>

					{{--<div class="form-group">--}}
						{{--<textarea class="form-control" rows="5" id="address" name="address" placeholder="Address:" required></textarea>--}}
					{{--</div>--}}

					<div class="form-group">
						<input type="text" class="form-control" id="address" name="address" placeholder="Address:" required>
					</div>

					<h5>Credit or debit card</h5>
					<div class="form-group">
						<input class='form-control' type='text' placeholder="Card holder name" name="name_on_card" id="name_on_card" required>
					</div>

					<div class="form-group">
						<div id="card-element">
							<!-- A Stripe Element will be inserted here. -->
						</div>

						<!-- Used to display form errors. -->
						<div id="card-errors" role="alert" class="text-danger"></div>
					</div>

					<button class="btn btn-success" style="width: 100%" id="payment_submit_btn">
						Submit Payment » <span class='amount'>${{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</span>
					</button>
				</form>
				{{-- Form End --}}

			</div>


		</div>
	</section> <!--/#cart_items-->

@endsection









@section('pageScripts')

	<script type="text/javascript">

        // Create a Stripe client.
		var stripe = Stripe('pk_test_mgwxEgIp2nYZUYCVYEBQdNDi');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style,
            hidePostalCode: true
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });


        // Handle form submission.
		//========================================================================
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // disable the submit button to prevent repeated clicks
			//document.getElementById('payment_submit_btn').disabled = true ;
			$('#payment_submit_btn').prop('disabled', true);

            var options = {
                name : document.getElementById('name').value,
                address_city : document.getElementById('city').value,
                address_line1 : document.getElementById('address').value
			};

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    $('#payment_submit_btn').prop('disabled', false);
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID. // charge
        //==========================================================================
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }


	</script>

@endsection