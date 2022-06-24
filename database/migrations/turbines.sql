CREATE TABLE users(
      id INTEGER primary key auto_increment,
      name varchar(26),
      status varchar(26),
      lat varchar(26),
      log varchar(26),
      created_at timestamp DEFAULT CURRENT_TIMESTAMP,
      updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);