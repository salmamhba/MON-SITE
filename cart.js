document.addEventListener('DOMContentLoaded', function() {
    var addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var price = this.getAttribute('data-price');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'addToCart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + encodeURIComponent(id) + '&name=' + encodeURIComponent(name) + '&price=' + encodeURIComponent(price));
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('Product added to cart');
                }
            };
        });
    });
});

