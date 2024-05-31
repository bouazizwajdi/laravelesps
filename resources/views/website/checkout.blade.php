@extends("layouts.template")
@section("title")
Check-out
@endsection

@section("titre")
CHECKOUT
@endsection

@section("content")
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">

                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>

                    @guest
                    <h3>Déjà client?</h3>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Username" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                        <div class="button-box">
                            <button class=" mt-3 btn btn-primary" type="submit"><span>Login</span></button>
                        </div>
                    </form>

                    <hr>
                    <h3>Nouveau client?</h3>
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">

                                <div class="billing-info mb-20">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" required>
                                </div>

                            </div>


                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label for="address">Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name"
                                        type="text" name="address" id="address" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label for="city">Town / City</label>
                                    <input type="text" name="city" id="city" required>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label for="tel">Phone</label>
                                    <input type="number" name="tel" id="tel" required>
                                </div>
                            </div>


                        </div>
                        <div class="checkout-account mb-50">
                            <input class="checkout-toggle2" type="checkbox">
                            <span>Create an account?</span>
                        </div>
                        <div class="checkout-account-toggle open-toggle2 mb-30" style="display: none">
                            <input placeholder="Email address" type="email" id="email" name="email">
                            <input placeholder="Password" type="password" id="password" name="password">
                            <input placeholder="Confirm your password" id="password-confirm" type="password"
                                class="form-control" name="password_confirmation" required=""
                                autocomplete="new-password">
                            <button class="btn-hover checkout-btn" type="submit">register</button>
                        </div>
                    </form>
                    @else
                    Bienvenu M. {{ Auth::user()->name }},
                    <a class="btn btn-danger w-25" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            @php
                                $tot=0;
                            @endphp
                            <div class="your-order-middle">
                                <ul>
                                    @if(Session::has("cart"))
                                    @forelse (Session::get("cart") as $cartItem)
                                    @php
                                        $totitem=$cartItem->price * $cartItem->qty;
                                    $tot+=$totitem;
                                    @endphp
                                    <li>
                                        <span class="order-middle-left">{{ $cartItem->name }} X {{ $cartItem->qty }}</span>
                                        <span class="order-price">TND {{  $totitem }} </span>
                                        </li>

                                    @empty
                                    <li>Panier vide!</li>
                                    @endforelse
                                    @else
                                    <li>Panier vide!</li>
                                    @endif
                                </ul>
                            </div>

                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>TND {{ $tot }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion element-mrg">
                                <div class="panel-group" id="accordion">
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-one">
                                            <h4 class="panel-title">
                                                <a data-bs-toggle="collapse" href="#method1">
                                                    Direct bank transfer
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method1" class="panel-collapse collapse show"
                                            data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-two">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method2">
                                                    Check payments
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method2" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-three">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method3">
                                                    Cash on delivery
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method3" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Session::has("cart"))
                    <div class="Place-order mt-25">
                        <a class="btn-hover" href="{{ route('orders.store') }}">Place Order</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
