# SETUP
- SQL SETUP
``` CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    pgp_key TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Here's an example of how you might structure your PHP files:

`index.html` - Homepage (can be empty for now)
`register.html` - Registration form
`login.html` - Login form
`db_config.php` - Database configuration
`register.php` - Handle user registration
`login.php` - Handle user login
`php-gnupg.php` - PGP encryption/decryption
