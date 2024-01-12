# E-Commerce Management System

Welcome to the E-Commerce Management System repository! This system is designed to help you manage your online store with ease. Whether you're a business owner, developer, or enthusiast, this PHP-based web application provides a solid foundation for handling various aspects of your e-commerce platform.

## Features
- **Admin Management:** Securely manage administrators who have access to the system.
- **Product Management:** Add, edit, and remove products with details such as name, category, price, description, image, and brand.
- **Category Management:** Organize products into categories for easy navigation and user experience.
- **User Management:** Manage user accounts, including their billing details and order history.
- **Shopping Cart:** Users can add products to their shopping cart and proceed to checkout.
- **Order Management:** Keep track of user orders, including the status, items, and billing details.
- **Reviews:** Allow users to leave reviews for products with comments and ratings.

## Requirements

To run this application, you need:

- **PHP:** Ensure that you have PHP installed on your server or local environment.
- **Web Server:** You can use Apache, Nginx, or any other web server of your choice.
- **Database:** This application uses a relational database. MySQL or similar is recommended.

## Installation

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/YourUsername/ECommerce_php.git
    ```

2. Move into the project directory:

    ```bash
    cd ECommerce_php
    ```

3. **Database Setup:**

   - **Create a Database:**
     - Open your preferred database management tool (e.g., MySQL, phpMyAdmin).
     - Create a new database and name it `ecommerce`.

   - **Create Tables:**
     - Run the SQL queries below to create the necessary tables:

       ```sql
       -- Admins Table
       CREATE TABLE admins (
           admin_id INT AUTO_INCREMENT PRIMARY KEY,
           admin_name VARCHAR(150),
           email VARCHAR(150),
           password VARCHAR(150)
       );

       -- Billing Details Table
       CREATE TABLE billing_details (
           billing_id INT AUTO_INCREMENT PRIMARY KEY,
           receiver VARCHAR(150),
           email VARCHAR(150),
           phone VARCHAR(15),
           address VARCHAR(255),
           postal VARCHAR(15),
           user_id INT,
           FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
       );

       -- Cart Table
       CREATE TABLE cart (
           cart_id INT AUTO_INCREMENT PRIMARY KEY,
           product_id INT,
           quantity INT,
           user_id INT,
           FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
           FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
       );

       -- Categories Table
       CREATE TABLE categories (
           category_id INT AUTO_INCREMENT PRIMARY KEY,
           category VARCHAR(150)
       );

       -- Order Info Table
       CREATE TABLE order_info (
           order_id INT AUTO_INCREMENT PRIMARY KEY,
           user_id INT,
           product_id INT,
           quantity INT,
           set_id INT,
           FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
           FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
           FOREIGN KEY (set_id) REFERENCES order_set(set_id) ON DELETE CASCADE
       );

       -- Reviews Table
       CREATE TABLE reviews (
           review_id INT AUTO_INCREMENT PRIMARY KEY,
           user_id INT,
           product_id INT,
           comment TEXT,
           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
           FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
           FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
       );

       -- Order Set Table
       CREATE TABLE order_set (
           set_id INT AUTO_INCREMENT PRIMARY KEY,
           user_id INT,
           billing_id INT,
           status VARCHAR(100),
           ordered_at DATETIME DEFAULT CURRENT_TIMESTAMP,
           method VARCHAR(150),
           FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
           FOREIGN KEY (billing_id) REFERENCES billing_details(billing_id) ON DELETE CASCADE
       );

       -- Products Table
       CREATE TABLE products (
           product_id INT AUTO_INCREMENT PRIMARY KEY,
           product_name VARCHAR(200),
           category VARCHAR(100),
           price FLOAT(8,2),
           description TEXT,
           image_url VARCHAR(200),
           brand VARCHAR(150)
       );

       -- Users Table
       CREATE TABLE users (
           user_id INT AUTO_INCREMENT PRIMARY KEY,
           fullname VARCHAR(255),
           email VARCHAR(255),
           password VARCHAR(255),
           phone VARCHAR(15)
       );
       ```

4. Start your preferred web server, ensuring that it has PHP support.

5. Open the application in your web browser. If you're running it locally, the URL might be something like `http://localhost/ECommerce_php`.

## Usage

1. Register and sign in to create your account.
2. Log in with your credentials.
3. Browse products, add them to your shopping cart.
4. Proceed to checkout, providing necessary billing details.
5. Track your orders and view order history.
6. Leave reviews for products based on your experience.

## Contributing

If you'd like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch.
3. Make your changes and commit them.
4. Push to the branch.
5. Submit a pull request.

## Acknowledgments

Feel free to explore, modify, and enhance the E-Commerce Management System to suit your needs. If you encounter any issues or have suggestions for improvement, don't hesitate to open an issue or submit a pull request. Happy selling!
