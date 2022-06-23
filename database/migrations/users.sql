CREATE TABLE users(
		id INTEGER primary key auto_increment,
		email varchar(48),
		password varchar(256),
		admin boolean NULL,
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);+-