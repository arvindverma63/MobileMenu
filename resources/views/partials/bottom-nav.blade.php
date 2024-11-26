<!-- Bottom Navigation Bar -->
<div class="position-fixed bottom-0 w-100 bg-light border-top shadow-sm">
    <div class="d-flex justify-content-around py-2">
        <a href="{{route('home')}}" class="text-center text-decoration-none text-dark">
            <i class="fas fa-home fa-lg {{Route::is('home')? 'active': ''}}"></i> <!-- Home Icon -->
            <p class="mb-0 small">Home</p>
        </a>
        <a href="#" class="text-center text-decoration-none text-dark">
            <i class="fas fa-search fa-lg"></i> <!-- Search Icon -->
            <p class="mb-0 small">Search</p>
        </a>
        <a href="{{route('cart')}}" class="text-center text-decoration-none text-dark">
            <i class="fas fa-shopping-cart fa-lg {{Route::is('cart')? 'active': ''}}"></i> <!-- Cart Icon -->
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
            <p class="mb-0 small">Cart</p>
        </a>
        <a href="#" class="text-center text-decoration-none text-dark">
            <i class="fas fa-user fa-lg"></i> <!-- Profile Icon -->
            <p class="mb-0 small">Profile</p>
        </a>
    </div>
</div>

<style>
    /* Bottom navigation styles */
    .position-fixed.bottom-0 {
        z-index: 1030;
    }

    .position-fixed.bottom-0 a {
        color: #555;
    }

    .position-fixed.bottom-0 a:hover {
        color: #000;
    }
    .active{
        color: red;
    }
</style>
