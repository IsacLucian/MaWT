CREATE TABLE turbines(
      id INTEGER primary key auto_increment,
      user_id INTEGER,
      name varchar(26),
      status varchar(26),
      lat varchar(26),
      lon varchar(26),
      created_at timestamp DEFAULT CURRENT_TIMESTAMP,
      updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);