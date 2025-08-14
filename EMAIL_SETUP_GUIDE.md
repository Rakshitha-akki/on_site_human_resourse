# Email Configuration Setup Guide

## Step 1: Gmail App Password Setup

### For Gmail SMTP (Recommended):

1. **Enable 2-Factor Authentication** on your Gmail account:
   - Go to Google Account Settings
   - Security → 2-Step Verification
   - Follow the setup process

2. **Generate App Password**:
   - Go to Google Account Settings
   - Security → App passwords
   - Select app: "Mail"
   - Select device: "Other (custom name)" → "OSHR System"
   - Copy the 16-character password (example: `abcd efgh ijkl mnop`)

3. **Update config.php**:
   ```php
   define('MAIL_USERNAME', 'your-email@example.com');     // Your Gmail address
   define('MAIL_PASSWORD', 'your-app-password-here');     // 16-character App Password (no spaces)
   ```

## Step 2: Test Email Configuration

Create this test file (`test_email.php`) in your root directory:

```php
<?php
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$emailConfig = getEmailConfig();

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = $emailConfig['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $emailConfig['username'];
    $mail->Password = $emailConfig['password'];
    $mail->SMTPSecure = $emailConfig['encryption'];
    $mail->Port = $emailConfig['port'];

    $mail->setFrom($emailConfig['username'], 'OSHR System');
    $mail->addAddress($emailConfig['username']); // Send test email to yourself

    $mail->isHTML(true);
    $mail->Subject = 'OSHR Email Test';
    $mail->Body = 'This is a test email from OSHR system. Email configuration is working!';

    $mail->send();
    echo 'Test email sent successfully!';
} catch (Exception $e) {
    echo "Email test failed: {$mail->ErrorInfo}";
}
?>
```

## Step 3: Alternative Email Providers

### For Other Email Providers:

**Yahoo Mail:**
```php
define('MAIL_HOST', 'smtp.mail.yahoo.com');
define('MAIL_PORT', 465);
define('MAIL_ENCRYPTION', 'ssl');
```

**Outlook/Hotmail:**
```php
define('MAIL_HOST', 'smtp-mail.outlook.com');
define('MAIL_PORT', 587);
define('MAIL_ENCRYPTION', 'tls');
```

**Custom SMTP:**
```php
define('MAIL_HOST', 'your-smtp-server.com');
define('MAIL_PORT', 587);
define('MAIL_ENCRYPTION', 'tls');
```

## Step 4: Security Best Practices

1. **Never commit real credentials** to version control
2. **Use environment variables** in production
3. **Regularly rotate App Passwords**
4. **Monitor email usage** for unusual activity
5. **Use HTTPS** in production

## Step 5: Troubleshooting

**Common Issues:**

1. **"Authentication failed"**
   - Verify App Password is correct (no spaces)
   - Ensure 2FA is enabled
   - Check username is complete email address

2. **"Connection failed"**
   - Verify SMTP settings
   - Check firewall/network restrictions
   - Try different port (587 instead of 465)

3. **"From address not verified"**
   - Ensure setFrom() uses the same email as username
   - Verify email ownership with provider

## Step 6: Production Deployment

For production, create a `.env` file:
```
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-app-password-here
MAIL_ENCRYPTION=ssl
```

Then update `config.php` to read from environment variables:
```php
define('MAIL_USERNAME', $_ENV['MAIL_USERNAME'] ?? 'your-email@example.com');
define('MAIL_PASSWORD', $_ENV['MAIL_PASSWORD'] ?? 'your-app-password-here');
```
