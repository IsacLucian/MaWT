CREATE TABLE users(
		id INTEGER primary key auto_increment,
		first_name varchar(32),
		last_name varchar(32),
		email varchar(48),
		password varchar(256),
		admin boolean NULL,
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);