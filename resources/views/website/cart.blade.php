@extends("layouts.template")
@section("title")
Votre panier
@endsection

@section("titre")
PANIER
@endsection

@section("content")

<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                       @php
                           $total=0;
                       @endphp
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has("cart"))
                                @forelse (Session::get("cart") as $cartItem)
                                @php
                                    $totItem=$cartItem->price * $cartItem->qty;
                                    $total+=$totItem;
                                @endphp
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img style="height:70px" src="{{ asset('images/products/'.$cartItem->photo) }}" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{ $cartItem->name }}</a></td>
                                    <td class="product-price-cart"><span class="amount">TND {{ $cartItem->price }}</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus" data-rel="{{ $cartItem->id }}" data-price="{{ $cartItem->price }}">
                                            <input class="cart-plus-minus-box" type="number" name="qtybutton" value="{{ $cartItem->qty }}">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">TND <span id="tot{{ $cartItem->id }}">{{ $totItem }}</span></td>
                                    <td class="product-remove">
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Panier vide !</td>
                                </tr>
                                @endforelse
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">Panier vide !</td>
                                </tr>
                                @endif


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{ route('website.products') }}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <a href="{{ route('cart.clearcart') }}">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Region / State
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Zip/Postal Code
                                        </label>
                                        <input type="text">
                                    </div>
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name">
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total products <span>TND {{ $total }}</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input type="checkbox"> Standard <span>$0.00</span></li>
                                    <li><input type="checkbox"> Express <span>$0.00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span>TND {{ $total }}</span></h4>
                            <a href="{{ route('cart.checkout') }}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
