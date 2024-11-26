document.addEventListener('DOMContentLoaded', () => {
    // Get all "Order Now" buttons
    const orderButtons = document.querySelectorAll('.btn-primary[data-id]');

    // Add click event listener to each button
    orderButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Get the closest restaurant card to fetch details
            const card = this.closest('.restaurant-card');

            if (!card) return;

            // Extract restaurant details
            const itemId = this.dataset.id;
            const itemName = card.querySelector('.card-title').innerText;
            const category = card.querySelector('.card-text:nth-child(2)').innerText;
            const price = card.querySelector('.card-text:nth-child(3)').innerText;
            const ingredients = Array.from(card.querySelectorAll('.badge')).map(badge =>
                badge.innerText);
            const imageUrl = card.querySelector('img').src;

            // Retrieve existing orders from localStorage
            let orders = JSON.parse(localStorage.getItem('orders')) || [];

            // Check if the item already exists in the orders
            const existingOrder = orders.find(order => order.id === itemId);

            if (existingOrder) {
                // If the item exists, increment its quantity
                existingOrder.quantity += 1;
            } else {
                // If the item doesn't exist, add a new order with quantity 1
                orders.push({
                    id: itemId,
                    itemName,
                    category,
                    price,
                    ingredients,
                    imageUrl,
                    quantity: 1
                });
            }

            // Save the updated orders list back to localStorage
            localStorage.setItem('orders', JSON.stringify(orders));

            // Update the cart badge
            addCart(orders);
        });
    });
});

function addCart(orders) {
    // Calculate the total quantity of items in the cart
    const totalQuantity = orders.reduce((sum, order) => sum + order.quantity, 0);

    // Get the badge element by class name
    const badgeElement = document.querySelector('.badge.rounded-pill.badge-notification');

    if (badgeElement) {
        // Update the badge with the total quantity
        badgeElement.textContent = totalQuantity;
    } else {
        console.error('Badge element not found!');
    }
}
