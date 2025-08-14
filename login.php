<?php
//session start
session_start();
require_once 'config.php';

//fetch the input
$email = $_POST["email"];
$password = $_POST["password"];
$msg = "";

//open database and check whether email and password present in database
$conn = getDatabaseConnection();

try {
    // First check manager table
    $stmt = $conn->prepare("select * from manager where email = ?");
    $stmt->bindparam(1, $email);
    $stmt->execute();
    
    $manager = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($manager && password_verify($password, $manager['password'])) {
        $_SESSION["email"] = $email;
        $_SESSION["user_type"] = "manager";
        $_SESSION["user_id"] = $manager['id'];
        $_SESSION["user_name"] = $manager['name'];
        header('location:manager/home.php');
        exit();
    } else {
        // Check admin table
        $stmt = $conn->prepare("select * from admin where email = ?");
        $stmt->bindparam(1, $email);
        $stmt->execute();
        
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION["email"] = $email;
            $_SESSION["user_type"] = "admin";
            $_SESSION["user_id"] = $admin['id'];
            $_SESSION["user_name"] = $admin['name'];
            header('location:admin/home.php');
            exit();
        } else {
            $msg = "Invalid email or password";
        }
    }
} catch(Exception $e) {
    $msg = "Login error: " . $e->getMessage();
}
?>
<html>
    <head>
        <title>OSHR Login</title>
        <?php
            include'header_link.php';
         ?>
</head>
<body>
<?php
            include'h.php';
         ?>

    <?php
         if (!empty($msg)) {
             echo "<div class='alert alert-danger'>" . htmlspecialchars($msg) . "</div>";
         }
    ?>
    <?php
            include'f.php';
         ?>
    </body>
    </html>
