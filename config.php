<?php
/**
 * Database Configuration
 * 
 * IMPORTANT: Before deploying to production:
 * 1. Change the database credentials
 * 2. Use environment variables for sensitive data
 * 3. Create a .env file with your actual credentials
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'oshr');
define('DB_USER', 'root');
define('DB_PASS', ''); // Change this for production

// Email Configuration  
// SETUP INSTRUCTIONS:
// 1. Go to Gmail → Manage your Google Account → Security
// 2. Enable 2-Step Verification
// 3. Go to App passwords → Generate new app password for "Mail"
// 4. Use the 16-character password below (remove spaces)
define('MAIL_HOST', $_ENV['MAIL_HOST'] ?? 'smtp.gmail.com');
define('MAIL_PORT', $_ENV['MAIL_PORT'] ?? 465);
define('MAIL_USERNAME', $_ENV['MAIL_USERNAME'] ?? 'your-email@example.com');
define('MAIL_PASSWORD', $_ENV['MAIL_PASSWORD'] ?? 'your-app-password-here');
define('MAIL_ENCRYPTION', $_ENV['MAIL_ENCRYPTION'] ?? 'ssl');

/**
 * Get Database Connection
 * @return PDO
 */
function getDatabaseConnection() {
    try {
        $conn = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, 
            DB_USER, 
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $conn;
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        die("Database connection failed. Please check your configuration.");
    }
}

/**
 * Get Email Configuration for PHPMailer
 * @return array
 */
function getEmailConfig() {
    return [
        'host' => MAIL_HOST,
        'port' => MAIL_PORT,
        'username' => MAIL_USERNAME,
        'password' => MAIL_PASSWORD,
        'encryption' => MAIL_ENCRYPTION
    ];
}
?>
