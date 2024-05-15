-- Create the products table with an image path column
CREATE TABLE products (
    product_id SERIAL PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    category VARCHAR(100),
    image_path TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into the products table
INSERT INTO products (product_name, price, quantity, category, image_path)
VALUES
('Apple iPhone 13', 799.99, 50, 'Electronics', '/images/iphone13.jpg'),
('Samsung Galaxy S21', 699.99, 30, 'Electronics', '/images/galaxys21.jpg'),
('Sony WH-1000XM4', 349.99, 20, 'Accessories', '/images/wh1000xm4.jpg'),
('Dell XPS 13', 999.99, 15, 'Computers', '/images/xps13.jpg'),
('Apple MacBook Air', 1199.99, 10, 'Computers', '/images/macbookair.jpg');
