# Database Connection Update Guide

## Files that need database connection updates:

### Admin Files (admin/):
- addmanager.php ✅ UPDATED
- addproject.php
- adminchangepassword.php
- deletemanager.php
- editmanager.php
- editproject.php
- updatemanager.php
- updateproject.php
- viewallot.php
- viewallotform.php
- viewattendence.php
- viewattendencedate.php
- viewattendenceproject.php
- viewbalance.php
- viewlabourdetails.php
- viewmanager.php
- viewprojectdetails.php

### Manager Files (manager/):
- addlabour.php ✅ UPDATED
- attendencedate.php
- attendencelabour.php
- attendenceproject.php
- editlabour.php
- editlabourform.php
- editproject.php
- insertallot.php
- insertattendence.php
- insertpayment.php
- managerchangepassword.php
- payment.php
- paymentdate.php
- paymentlabour.php
- selectdate.php
- selectlabour.php
- selectproject.php
- setamount.php
- updatelabour.php
- updateproject.php
- viewallot.php
- viewallotform.php
- viewattendence.php
- viewattendencedate.php
- viewattendenceproject.php
- viewbalance.php
- viewlabourdetails.php
- viewpayment.php
- viewpaymentdate.php
- viewprojectdetails.php

### Root Files:
- login.php ✅ UPDATED
- forgotpwd.php ✅ UPDATED

## Replace Pattern:

### OLD:
```php
$conn = new PDO("mysql:host=localhost;dbname=oshr","root",null);
```

### NEW:
```php
require_once '../config.php'; // or 'config.php' for root files
$conn = getDatabaseConnection();
```

## Password Hashing Updates:

### For registration/user creation:
```php
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// Use $hashed_password in database insert
```

### For login verification:
```php
if (password_verify($password, $hashed_password_from_db)) {
    // Login successful
}
```

## Run the password update utility:
1. Navigate to: http://localhost/oshr/update_passwords.php
2. Click "Update All Passwords"
3. Delete the file after running

## Email Configuration:
Update config.php with your actual Gmail credentials:
- MAIL_USERNAME: Your Gmail address
- MAIL_PASSWORD: Your Gmail App Password (16 characters)
