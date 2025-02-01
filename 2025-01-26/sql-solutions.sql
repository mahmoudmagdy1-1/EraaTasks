MySQL Questions for the PMS

--1. Retrieve all product details, including the category title they belong to.

SELECT products.*, categories.title FROM products
JOIN categories ON products.category_id = categories.id
WHERE products.id = 1;

--2. List all orders along with the total amount, user name, and status.

SELECT
--* 
orders.total AS total_amount,
orders.user_name AS user_name,
orders.status AS status
 FROM orders;

-- 3. Display the number of products in each category.

SELECT categories.title, COUNT(products.id) AS product_count
FROM categories
LEFT JOIN products ON categories.id = products.category_id
GROUP BY categories.title;

-- 4. Fetch all reviews along with the product name and user name who reviewed them.

SELECT reviews.*, products.name AS product_name, users.name AS user_name
FROM reviews
JOIN products ON reviews.product_id = products.id
JOIN users ON reviews.user_id = users.id;

-- 5. Show the total quantity of products sold per order.

SELECT orders.id AS order_id, SUM(order_product.qty) AS total_quantity
FROM orders
JOIN order_product ON orders.id = order_product.order_id
GROUP BY orders.id;

-- 6. Find the top 5 most expensive products.
SELECT * 
FROM products
ORDER BY price DESC LIMIT 5;

-- 7. Identify users who have placed more than 5 orders.

SELECT user_id, COUNT(*) AS order_count
FROM orders
GROUP BY user_id
HAVING order_count > 5;

-- 8. Display the average star rating for each product.

SELECT products.id, AVG(reviews.stars_number) AS average_rating
FROM products
LEFT JOIN reviews ON products.id = reviews.product_id
GROUP BY products.id;

-- 9. List products that are low in stock (quantity less than 10).

SELECT *
FROM products
WHERE qty < 10;

-- 10. Find the total revenue generated from all orders.

SELECT SUM(total) AS total_revenue
FROM orders;

-- 11. Fetch the most reviewed product and its total review count.

SELECT products.id, products.name, COUNT(reviews.id) AS review_count
FROM products
LEFT JOIN reviews ON products.id = reviews.product_id
GROUP BY products.id
ORDER BY review_count DESC
LIMIT 1;

-- 12. Retrieve the most purchased product and its total sales.

SELECT products.id, products.name, SUM(order_product.qty) AS total_sales
FROM products
JOIN order_product ON products.id = order_product.product_id
GROUP BY products.id
ORDER BY total_sales DESC
LIMIT 1;

-- 13. Find orders where the total amount exceeds $1000.

SELECT *
FROM orders
WHERE total > 1000;

-- 14. List all products along with their average rating and the total number of reviews.

SELECT products.id, products.name, AVG(reviews.stars_number) AS average_rating, COUNT(reviews.id) AS review_count
FROM products
LEFT JOIN reviews ON products.id = reviews.product_id
GROUP BY products.id;

-- 15. Identify categories with no associated products.

SELECT categories.id, categories.title
FROM categories
LEFT JOIN products ON categories.id = products.category_id
WHERE products.id IS NULL;
