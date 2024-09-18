@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-9">
                @include('backend.inc.message')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Remove</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        @php $grandTotal = 0; @endphp
                        @forelse($ads as $key => $ad)
                            @php 
                                $totalPrice = $ad->sale_price * $ad->quantity;
                                $grandTotal += $totalPrice;
                            @endphp
                            <tr id="ad-{{ $ad->id }}">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td style="width: 250px;height:130px;">
                                    <!-- Carousel for product images -->
                                    <div id="carouselExampleControls{{$ad->id}}" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ Storage::url($ad->feature_image) }}" width="150">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ Storage::url($ad->first_image) }}" width="150">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ Storage::url($ad->second_image) }}" width="150">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls{{$ad->id}}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls{{$ad->id}}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('product.view', [$ad->id, $ad->slug]) }}" target="_blank">{{ $ad->name }}</a>
                                </td>
                                <td>
                                    <input type="number" value="{{ $ad->quantity }}" min="1" class="form-control quantity" data-ad-id="{{ $ad->id }}" data-price="{{ $ad->sale_price }}">
                                </td>
                                <td>
                                    <form action="{{ route('ad.remove') }}" method="post">@csrf
                                        <input type="hidden" name="adId" value="{{ $ad->id }}">
                                        <button class="btn btn-danger" type="submit">Remove</button>
                                    </form>
                                </td>
                                <td id="price-{{ $ad->id }}">
                                    {{ $ad->sale_price }}
                                </td>
                                <td id="total-{{ $ad->id }}">
                                    {{ $totalPrice }}
                                </td>
                            </tr>
                        @empty
                            <td colspan="7">You have no saved ads</td>
                        @endforelse
                    </tbody>
                </table>
                <hr style="height:2px;border-width:0;color:#3c08f8;background-color:rgb(44, 9, 240)">
                
                <!-- Styled Total Amount Section -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h4>Total Amount:</h4>
                    <h4 id="grand-total" class="text-primary font-weight-bold">{{ $grandTotal }}$ / only</h4>
                </div>
                <hr>
                <!-- Save Button -->
                <div class="text-right mt-3">
                    <button id="save-button" class="btn btn-success btn-lg">Order Now</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.quantity').forEach(input => {
            input.addEventListener('input', function () {
                const adId = this.dataset.adId;
                const price = this.dataset.price;
                const quantity = this.value;
                const totalPrice = price * quantity;
                document.getElementById(`total-${adId}`).innerText = totalPrice.toFixed(2);
                updateGrandTotal();
            });
        });
        function updateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('[id^="total-"]').forEach(total => {
                grandTotal += parseFloat(total.innerText);
            });
            document.getElementById('grand-total').innerText = grandTotal.toFixed(2);
        }
        document.getElementById('save-button').addEventListener('click', function() {
            alert('Changes saved successfully!');
        });
    </script>
@endsection
