# On-Site Human Resource Management System (OSHR)

A comprehensive web-based human resource management system designed for on-site labor management, built with PHP and MySQL.

## 🏗️ Project Overview

OSHR is a multi-role management system that helps organizations manage their on-site human resources efficiently. The system supports three main user roles: Admin, Manager, and provides functionality for labor management, attendance tracking, payment processing, and project management.

## ✨ Features

### Admin Features
- **Manager Management**: Add, edit, delete, and view manager details
- **Project Management**: Create and manage projects
- **Labor Oversight**: View all labor details and balances
- **Attendance Monitoring**: Track attendance across all projects
- **Payment Tracking**: Monitor payment history and balances
- **Reporting**: Generate various reports for analysis

### Manager Features
- **Labor Management**: Add, edit, and manage labor details
- **Attendance Management**: Record and track daily attendance by project and date
- **Payment Processing**: Process payments and maintain balance records
- **Project Assignment**: Assign labor to different projects
- **Reporting**: View labor details, project status, and payment history

### General Features
- **User Authentication**: Secure login system for different user roles
- **Password Recovery**: Email-based password recovery system
- **Responsive Design**: Mobile-friendly interface
- **Dashboard**: Role-based dashboards with relevant information
- **Email Integration**: PHPMailer integration for notifications

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework**: Bootstrap 4/5
- **Email**: PHPMailer
- **Server**: Apache (WAMP/XAMPP compatible)

## 📁 Project Structure

```
oshr/
├── admin/                  # Admin module
│   ├── template/          # Admin UI templates
│   ├── *.php             # Admin functionality files
├── manager/               # Manager module
│   ├── template/          # Manager UI templates
│   ├── *.php             # Manager functionality files
├── login/                 # Login page assets
│   ├── css/              # Login page styles
│   ├── js/               # Login page scripts
│   └── images/           # Login page images
├── PHPMailer/            # Email functionality
├── template/             # Main website templates
│   └── assets/           # CSS, JS, images, fonts
├── *.php                 # Main application files
└── README.md             # This file
```

## 🚀 Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server
- WAMP/XAMPP (for local development)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/Rakshitha-akki/on_site_human_resourse.git
   cd oshr
   ```

2. **Database Setup**
   - Create a MySQL database named `oshr`
   - Import the database schema: `database/oshr_schema.sql`
   - Update database connection settings in `config.php`

3. **Configuration**
   - Copy `.env.example` to `.env` and update your database credentials
   - Update database credentials using the centralized `config.php`:
     ```php
     require_once 'config.php';
     $conn = getDatabaseConnection();
     ```

4. **Email Configuration**
   - Update SMTP settings in `config.php`:
     ```php
     define('SMTP_HOST', 'your-smtp-host');
     define('SMTP_USERNAME', 'your-email@domain.com');
     define('SMTP_PASSWORD', 'your-app-password');
     ```

5. **File Permissions**
   - Ensure proper file permissions for upload directories
   - Set appropriate permissions for log files

6. **Web Server Configuration**
   - Point your web server document root to the project folder
   - Ensure mod_rewrite is enabled (if using .htaccess)

## 📊 Database Schema

The system uses the following main tables:
- `admin` - Administrator accounts
- `manager` - Manager accounts
- `labour` - Labor/worker information
- `project` - Project details
- `attendance` - Daily attendance records
- `payment` - Payment transaction records

## 🔐 Default Access

**Admin Login:**
- Email: admin@oshr.com
- Password: admin123

**Manager Login:**
- Email: manager@oshr.com
- Password: manager123

*Note: Change these default credentials immediately using the `update_passwords.php` script*

## 🔧 Configuration

### Environment Variables (Recommended)
Create a `.env` file for sensitive configurations:
```
DB_HOST=localhost
DB_NAME=oshr
DB_USER=your_username
DB_PASS=your_password
MAIL_HOST=smtp.gmail.com
MAIL_USER=your_email@gmail.com
MAIL_PASS=your_app_password
```

### Security Considerations
- Change default passwords immediately
- Use environment variables for sensitive data
- Implement HTTPS in production
- Regular database backups
- Update PHPMailer to the latest version

## 📱 Usage

### For Administrators
1. Login with admin credentials
2. Navigate to admin dashboard
3. Manage managers, projects, and view reports
4. Monitor overall system activity

### For Managers
1. Login with manager credentials
2. Access manager dashboard
3. Add/manage labor records
4. Track attendance and process payments
5. Generate reports for assigned projects

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Create a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🐛 Known Issues

- Email passwords are hardcoded (should use environment variables)
- Database credentials are embedded in files (should be centralized)
- Missing input validation in some forms
- No CSRF protection implemented

## 🔮 Future Enhancements

- [ ] Implement REST API
- [ ] Add mobile application
- [ ] Enhanced reporting with charts
- [ ] Multi-language support
- [ ] Advanced user permissions
- [ ] Integration with HR systems
- [ ] Automated backup system
- [ ] Real-time notifications

## 📞 Support

For support and questions:
- Create an issue in the repository
- Contact: [your-email@domain.com]

## 📊 System Requirements

**Minimum Requirements:**
- PHP 7.4+
- MySQL 5.7+
- Apache 2.4+
- 512MB RAM
- 100MB disk space

**Recommended:**
- PHP 8.0+
- MySQL 8.0+
- Apache 2.4+
- 1GB RAM
- 500MB disk space

---

**Last Updated:** January 2025
**Version:** 1.0.0
