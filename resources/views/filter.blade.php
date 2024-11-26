<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body>
    @include('partials.navbar')

    </style>
    <div class="container" style="margin-top: 16%; margin-bottom: 10%;">

        <!-- Restaurant Section -->
        <div class="restaurant-section d-flex justify-content-between align-items-center mt-4 mb-3" id="items">
            <h5>All Restaurants Nearby</h5>
            <button class="btn btn-outline-white btn-sm text-white">Sort/Filter</button>
        </div>
        <div class="row">
            @foreach ($data as $restaurant)
                <div class="col-12 col-md-6 mb-3">
                    <div class="restaurant-card h-100 shadow-sm border rounded">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="{{ asset($restaurant['itemImage']) }}" class="img-fluid rounded-start h-100"
                                    alt="{{ $restaurant['itemName'] }}" style="object-fit: cover;">
                            </div>
                            <div class="col-8">
                                <div class="card-body p-2">
                                    <h5 class="card-title mb-1">{{ $restaurant['itemName'] }}</h5>
                                    <p class="card-text mb-1 text-muted">{{ $restaurant['category'] }}</p>
                                    <p class="card-text mb-1 text-muted">₹ {{ $restaurant['price'] }}</p>
                                    <p class="card-text mb-2 text-danger">Ingredients</p>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($restaurant['ingredients'] as $ingredient)
                                            <span
                                                class="badge bg-success me-1 mb-1">{{ $ingredient['ingredientName'] }}</span>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary btn-sm" data-id="{{ $restaurant['id'] }}">Order
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('session/session.js') }}"></script>


    @include('partials.bottom-nav')

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    @include('partials.footer')
</body>

</html>
