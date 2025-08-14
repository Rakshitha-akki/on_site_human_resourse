<?php
/**
 * Password Update Utility
 * Run this script ONCE after deployment to hash existing plain text passwords
 * 
 * IMPORTANT: Delete this file after running it successfully
 */

require_once 'config.php';

echo "<h2>OSHR Password Hash Utility</h2>";
echo "<p><strong>WARNING:</strong> This utility will hash all plain text passwords in the database.</p>";

if (isset($_POST['update_passwords'])) {
    try {
        $conn = getDatabaseConnection();
        
        echo "<h3>Updating Admin Passwords...</h3>";
        
        // Update admin passwords
        $stmt = $conn->prepare("SELECT id, email, password FROM admin");
        $stmt->execute();
        $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($admins as $admin) {
            // Check if password is already hashed (bcrypt starts with $2y$)
            if (!password_get_info($admin['password'])['algo']) {
                $hashed = password_hash($admin['password'], PASSWORD_DEFAULT);
                $update_stmt = $conn->prepare("UPDATE admin SET password = ? WHERE id = ?");
                $update_stmt->execute([$hashed, $admin['id']]);
                echo "✓ Updated password for admin: " . htmlspecialchars($admin['email']) . "<br>";
            } else {
                echo "⚠ Password already hashed for admin: " . htmlspecialchars($admin['email']) . "<br>";
            }
        }
        
        echo "<h3>Updating Manager Passwords...</h3>";
        
        // Update manager passwords
        $stmt = $conn->prepare("SELECT id, email, password FROM manager");
        $stmt->execute();
        $managers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($managers as $manager) {
            // Check if password is already hashed
            if (!password_get_info($manager['password'])['algo']) {
                $hashed = password_hash($manager['password'], PASSWORD_DEFAULT);
                $update_stmt = $conn->prepare("UPDATE manager SET password = ? WHERE id = ?");
                $update_stmt->execute([$hashed, $manager['id']]);
                echo "✓ Updated password for manager: " . htmlspecialchars($manager['email']) . "<br>";
            } else {
                echo "⚠ Password already hashed for manager: " . htmlspecialchars($manager['email']) . "<br>";
            }
        }
        
        echo "<h3>✅ Password update completed!</h3>";
        echo "<p><strong>IMPORTANT:</strong> Please delete this file (update_passwords.php) for security.</p>";
        echo "<p><strong>New Default Passwords:</strong></p>";
        echo "<ul>";
        echo "<li>Admin: SecureAdmin2025!</li>";
        echo "<li>Manager: SecureManager2025!</li>";
        echo "</ul>";
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
?>
    <form method="POST">
        <p>This will update all plain text passwords to secure hashed passwords.</p>
        <p><strong>Make sure you have a backup of your database before proceeding!</strong></p>
        <button type="submit" name="update_passwords" onclick="return confirm('Are you sure? This will update all passwords in the database.')">
            Update All Passwords
        </button>
    </form>
<?php
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OSHR Password Update Utility</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        h2 { color: #333; }
        button { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #005a87; }
        .warning { background: #fff3cd; border: 1px solid #ffeaa7; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>
</body>
</html>
