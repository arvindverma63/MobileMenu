    // Function to populate cart from localStorage
    function populateCart() {
        const cartItemsContainer = document.getElementById('cart-items');

        // Retrieve orders from localStorage
        const orders = JSON.parse(localStorage.getItem('orders')) || [];

        if (orders.length === 0) {
            cartItemsContainer.innerHTML = `<p>Your cart is empty.</p>`;
            return;
        }

        // Generate HTML for each order
        cartItemsContainer.innerHTML = orders.map(order => {
            const totalPrice = (order.price * order.quantity).toFixed(2); // Calculate total price
            return `
    <div class="card rounded-3 mb-4" id="item-${order.id}">
        <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="${order.imageUrl}" class="img-fluid rounded-3" alt="${order.itemName}">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">${order.itemName}</p>
                    <p><span class="text-muted">Category:</span> ${order.category}</p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <button class="btn btn-link px-2" onclick="updateQuantity(${order.id}, -1)">
                        <i class="fas fa-minus"></i>
                    </button>

                    <input id="quantity-${order.id}" min="0" name="quantity" value="${order.quantity}" type="number"
                        class="form-control form-control-sm" readonly />

                    <button class="btn btn-link px-2" onclick="updateQuantity(${order.id}, 1)">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">₹${totalPrice}</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" onclick="removeItem(${order.id})" class="text-danger"><i
                            class="fas fa-trash fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
`;
        }).join('');
    }

    // Function to update quantity
    function updateQuantity(itemId, change) {
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        const orderIndex = orders.findIndex(order => order.id == itemId);

        if (orderIndex > -1) {
            orders[orderIndex].quantity += change;

            // If quantity is 0 or less, remove the item
            if (orders[orderIndex].quantity <= 0) {
                orders.splice(orderIndex, 1);
            }

            // Update localStorage
            localStorage.setItem('orders', JSON.stringify(orders));

            // Re-render cart
            populateCart();
        }
    }

    // Function to remove an item
    function removeItem(itemId) {
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        orders = orders.filter(order => order.id != itemId);

        // Update localStorage
        localStorage.setItem('orders', JSON.stringify(orders));

        // Re-render cart
        populateCart();
    }

    // Populate cart on page load
    document.addEventListener('DOMContentLoaded', populateCart);

    function makeOrder(){
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;


        fetch('/getData')
        .then(response=>response.json())
        .then(data=>{
            var restaurantId = data.restaurantId;
            var tableNo = data.tableNo;

            fetch('http://localhost:8000/api/addOrder')
        })
    }
