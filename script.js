document.addEventListener('DOMContentLoaded', function() {
    var addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var price = this.getAttribute('data-price');
            var image = this.getAttribute('data-image');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'addToCart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + encodeURIComponent(id) + '&name=' + encodeURIComponent(name) + '&price=' + encodeURIComponent(price) + '&image=' + encodeURIComponent(image));
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Create a div element for the notification
                    var notification = document.createElement('div');
                    notification.style.position = 'fixed';
                    notification.style.bottom = '30px';
                    notification.style.right = '30px';
                    notification.style.padding = '20px'; // Increase padding to make the box bigger
                    notification.style.backgroundColor = '#4CAF50';
                    notification.style.color = 'white';
                    notification.style.borderRadius = '5px'; // Add border radius for a softer look
                    notification.style.boxShadow = '0px 0px 10px rgba(0,0,0,0.25)'; // Add box shadow for depth
                    notification.style.fontFamily = 'Arial, sans-serif'; // Change the font if desired
                    notification.style.fontSize = '30px'; // Increase font size for better readability
                    notification.textContent = 'Produit ajouté au panier';

                    // Append the notification to the body
                    document.body.appendChild(notification);

                    // Remove the notification after 2 seconds
                    setTimeout(function() {
                        document.body.removeChild(notification);
                    }, 2000);
                }
            };
        });
    });
});

