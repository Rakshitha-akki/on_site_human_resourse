# Security and Deployment Checklist for OSHR

## 🔒 Security Issues Found and Recommendations

### 1. **CRITICAL: Hardcoded Credentials**
- ❌ **Found**: Hardcoded email password in `forgotpwd.php`
- ✅ **Fixed**: Moved to configuration file
- 🔧 **Action Required**: Update `config.php` with your actual credentials

### 2. **Database Connection Security**
- ❌ **Issue**: Database credentials scattered across multiple files
- ✅ **Recommendation**: Use the new `config.php` file for centralized configuration
- 🔧 **Action Required**: Update all files to use `getDatabaseConnection()` function

### 3. **Missing Input Validation**
- ❌ **Issue**: SQL injection vulnerability in multiple files
- 🔧 **Action Required**: All forms need proper input validation and sanitization

### 4. **Password Storage**
- ❌ **Issue**: Passwords appear to be stored in plain text
- 🔧 **Action Required**: Implement password hashing using `password_hash()` and `password_verify()`

## 📋 Pre-Deployment Checklist

### Environment Setup
- [ ] Copy `.env.example` to `.env`
- [ ] Update database credentials in `.env`
- [ ] Update email credentials in `.env`
- [ ] Test database connection
- [ ] Test email functionality

### Security Hardening
- [ ] Change all default passwords
- [ ] Implement password hashing
- [ ] Add CSRF protection
- [ ] Add input validation to all forms
- [ ] Enable HTTPS
- [ ] Configure proper file permissions

### Files to Update Before Deployment
Update these files to use `config.php`:

1. **Database Connections** (High Priority):
   ```php
   // Replace this pattern:
   $conn = new PDO("mysql:host=localhost;dbname=oshr","root",null);
   
   // With this:
   require_once 'config.php';
   $conn = getDatabaseConnection();
   ```

   Files that need updating:
   - `login.php`
   - `admin/*.php` (all admin files with database connections)
   - `manager/*.php` (all manager files with database connections)

2. **Email Configuration**:
   - Update any other files using PHPMailer to use `getEmailConfig()`

### Git Repository Preparation

1. **Remove Sensitive Files from Git History**:
   ```bash
   # If you accidentally committed sensitive data
   git filter-branch --force --index-filter 'git rm --cached --ignore-unmatch .env' --prune-empty --tag-name-filter cat -- --all
   ```

2. **Add to .gitignore**:
   ```
   .env
   *.log
   config.local.php
   ```

## 🚀 Deployment Steps

### 1. Prepare the Repository
```bash
# Remove the problematic file from git tracking
git rm --cached "admin/template/assets/images/con.png"

# Add all files except ignored ones
git add .

# Commit the changes
git commit -m "Initial commit: OSHR Human Resource Management System

- Added comprehensive README.md
- Added .gitignore for sensitive files
- Created config.php for centralized configuration
- Secured email configuration
- Added deployment documentation"
```

### 2. Create GitHub Repository
```bash
# Create repository on GitHub first, then:
git remote add origin https://github.com/yourusername/oshr.git
git branch -M main
git push -u origin main
```

### 3. Production Deployment
1. Clone repository to production server
2. Copy `.env.example` to `.env`
3. Update `.env` with production credentials
4. Set up database and import schema
5. Configure web server (Apache/Nginx)
6. Set proper file permissions
7. Enable HTTPS

## 🔧 Required Database Schema

Create these tables in your `oshr` database:

```sql
-- Admin table
CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Manager table  
CREATE TABLE manager (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Project table
CREATE TABLE project (
    projectid INT PRIMARY KEY AUTO_INCREMENT,
    projectname VARCHAR(100) NOT NULL,
    location VARCHAR(200),
    startdate DATE,
    enddate DATE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Labour table
CREATE TABLE labour (
    labourid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    balance DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Attendance table
CREATE TABLE attendance (
    id INT PRIMARY KEY AUTO_INCREMENT,
    labourid INT,
    projectid INT,
    workdate DATE NOT NULL,
    status ENUM('present', 'absent') DEFAULT 'present',
    hours_worked DECIMAL(4,2) DEFAULT 8.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (labourid) REFERENCES labour(labourid),
    FOREIGN KEY (projectid) REFERENCES project(projectid)
);

-- Payment table
CREATE TABLE payment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    labourid INT,
    amount DECIMAL(10,2) NOT NULL,
    paiddate DATE NOT NULL,
    payment_method VARCHAR(50) DEFAULT 'cash',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (labourid) REFERENCES labour(labourid)
);

-- Insert default admin user (change password after first login)
INSERT INTO admin (email, password, name) VALUES 
('admin@oshr.com', 'admin123', 'System Administrator');

-- Insert default manager (change password after first login)
INSERT INTO manager (email, password, name, phone) VALUES 
('manager@oshr.com', 'manager123', 'Default Manager', '1234567890');
```

## ⚠️ Security Warnings

1. **Change default passwords immediately after deployment**
2. **The current password storage is insecure** - implement proper hashing
3. **Add input validation** to prevent SQL injection
4. **Implement CSRF protection**
5. **Use HTTPS in production**
6. **Regular security updates** for PHP and dependencies

## 📧 Email Setup Guide

For Gmail SMTP:
1. Enable 2-Factor Authentication on your Gmail account
2. Generate an App Password (not your regular password)
3. Use the 16-character App Password in your configuration

## 🔍 Testing

Before deployment, test:
- [ ] Login functionality for admin and manager
- [ ] Password recovery email
- [ ] CRUD operations for all modules
- [ ] File upload functionality
- [ ] Database connections
- [ ] Error handling

---

**Remember**: This is a basic implementation that needs security hardening before production use.
