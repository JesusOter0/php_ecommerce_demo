CREATE TABLE products (
    product_id SERIAL PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    category VARCHAR(100),
    image_path TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (product_name, price, quantity, category, image_path)
VALUES
('Apple iPhone 13', 799.99, 50, 'Electronics', '/images/iphone13.jpg'),
('Samsung Galaxy S21', 699.99, 30, 'Electronics', '/images/galaxys21.jpg'),
('Sony WH-1000XM4', 349.99, 20, 'Accessories', '/images/wh1000xm4.jpg'),
('Dell XPS 13', 999.99, 15, 'Computers', '/images/xps13.jpg');


CREATE TABLE comments (
    comment_id SERIAL PRIMARY KEY,
    product_id INT REFERENCES products(product_id),
    user_name VARCHAR(255) NOT NULL,
    comment_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (product_id, user_name, comment_text)
VALUES
(1, 'John Doe', 'Great phone with amazing features!'),
(1, 'Jane Smith', 'Love the camera quality on this iPhone.'),
(2, 'Alice Johnson', 'The Galaxy S21 has an incredible display.'),
(2, 'Bob Brown', 'Battery life could be better, but overall a solid phone.'),
(3, 'Charlie Davis', 'Best noise-canceling headphones I have ever used.'),
(3, 'Dana White', 'Very comfortable and the sound quality is top-notch.');
