
CREATE TABLE users (
	user_id serial PRIMARY KEY,
	user_name VARCHAR ( 50 ) UNIQUE NOT NULL,
	user_password VARCHAR ( 250 ) NOT NULL,
	user_email VARCHAR ( 255 ) UNIQUE NOT NULL,
	created_on TIMESTAMP(6) NOT NULL,
    last_login TIMESTAMP 
);


