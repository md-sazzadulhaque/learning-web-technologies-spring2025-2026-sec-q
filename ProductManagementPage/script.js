let unitPrice = 1000;

let quantityInput = document.getElementById('quantity');
let totalPriceInput = document.getElementById('totalPrice');

let couponShown = false;

function calculateTotal() {
    let quantity = parseInt(quantityInput.value);
    
    if (isNaN(quantity) || quantityInput.value === '') {
        quantity = 0;
    }
    
    if (quantity < 0) {
        quantityInput.value = '';
        quantity = 0;
        alert('Quantity cannot be negative!');
    }
    
    let total = unitPrice * quantity;
    
    totalPriceInput.value = total;
    
    if (total > 1000 && !couponShown) {
        alert('Congratulations! You are eligible for a gift coupon!');
        couponShown = true;
    }
    
    if (total <= 1000) {
        couponShown = false;
    }
}

quantityInput.addEventListener('input', calculateTotal);

