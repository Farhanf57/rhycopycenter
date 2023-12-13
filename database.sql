CREATE TABLE tb_categories (
	cat_id INT(11) NOT NULL AUTO_INCREMENT,
	cat_name VARCHAR(50) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(cat_id)
);

CREATE TABLE tb_posts (
	post_id INT(11) NOT NULL AUTO_INCREMENT,
	post_id_cat INT(11) NOT NULL,
	post_title VARCHAR(100) NOT NULL,
	post_text TEXT NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(post_id)
);

CREATE TABLE tb_users (
	user_id INT(11) NOT NULL AUTO_INCREMENT,
	user_email VARCHAR(50) NOT NULL,
	user_password VARCHAR(100) NOT NULL,
	user_full_name VARCHAR(100) DEFAULT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(user_id),
	UNIQUE KEY(user_email)
);

CREATE TABLE tb_produks (
	produk_id INT(11) NOT NULL AUTO_INCREMENT,
	produk_nama VARCHAR(255) NOT NULL,
	produk_gambar VARCHAR(255) NOT NULL,
	produk_deskripsi TEXT NOT NULL,
	produk_stok INT(3) NOT NULL,
	produk_harga INT(11) NOT NULL,
	produk_rating FLOAT DEFAULT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY(produk_id)
);

CREATE TABLE tb_customers(
	customer_id INT(7) NOT NULL AUTO_INCREMENT,
	customer_username VARCHAR(50) NOT NULL,
	customer_nama  VARCHAR(100) NOT NULL,
	customer_gambar VARCHAR(255) NOT NULL,
	customer_email  VARCHAR(255) NOT NULL,
	customer_password  VARCHAR(255) NOT NULL,
	customer_phone  VARCHAR(15),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT NULL,
	PRIMARY KEY (customer_id),
    UNIQUE KEY (customer_username),
    UNIQUE KEY (customer_email)
);

INSERT INTO
	tb_users
VALUES
	(
		1,
		'admin@gmail.com',
		'*4ACFE3202A5FF5CF467898FC58AAB1D615029441',
		'Administrator',
		'2023-11-03 03:40:43',
		NULL
	);