<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body>
    @include('partials.navbar')

    <section class="h-100" style="margin-top: 10%; margin-bottom: 10%;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    <!-- Cart Items -->
                    <div id="cart-items">
                        <!-- Dynamically populated via JavaScript -->
                    </div>

                    <!-- Discount Code -->
                    <div class="card mb-4">
                        <div class="card-body p-4 d-flex flex-row">
                            <div data-mdb-input-init class="form-outline flex-fill">
                                <input type="text" id="discount-code" class="form-control form-control-lg" />
                                <label class="form-label" for="discount-code">Discount code</label>
                            </div>
                            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
                        </div>
                    </div>
                    @include('components.customer')
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning btn-block btn-lg" data-bs-toggle="modal"
                                data-bs-target="#userModal">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('session/cart.js') }}"></script>

    @include('partials.bottom-nav')
    @include('partials.footer')
</body>

</html>
