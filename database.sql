CREATE DATABASE myscarf;
USE myscarf;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(100)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description, price, image) VALUES
('My scarf beige', 'Fluidité, douceur et légèreté.', 150, '1.jpg'),
('My scarf rose', 'Fluidité, douceur et légèreté.', 200, '2.jpg'),
('My scarf marron', 'Fluidité, douceur et légèreté.', 100, '5.jpg'),
('My scarf vert', 'Fluidité, douceur et légèreté.', 150, '4.jpg'),
('My scarf light rose', 'Fluidité, douceur et légèreté.', 150, '3.jpg'),
('My scarf wild plum light', 'Fluidité, douceur et légèreté.', 300, '6.jpg');

