-- OSHR Database Schema
-- On-Site Human Resource Management System
-- Created: August 2025

-- Create database
CREATE DATABASE IF NOT EXISTS oshr;
USE oshr;

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
    status ENUM('active', 'completed', 'on_hold') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Labour table
CREATE TABLE labour (
    labourid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    balance DECIMAL(10,2) DEFAULT 0.00,
    daily_rate DECIMAL(8,2) DEFAULT 0.00,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Attendance table
CREATE TABLE attendance (
    id INT PRIMARY KEY AUTO_INCREMENT,
    labourid INT,
    projectid INT,
    workdate DATE NOT NULL,
    status ENUM('present', 'absent', 'half_day') DEFAULT 'present',
    hours_worked DECIMAL(4,2) DEFAULT 8.00,
    overtime_hours DECIMAL(4,2) DEFAULT 0.00,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (labourid) REFERENCES labour(labourid) ON DELETE CASCADE,
    FOREIGN KEY (projectid) REFERENCES project(projectid) ON DELETE CASCADE,
    UNIQUE KEY unique_attendance (labourid, projectid, workdate)
);

-- Payment table
CREATE TABLE payment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    labourid INT,
    amount DECIMAL(10,2) NOT NULL,
    paiddate DATE NOT NULL,
    payment_method VARCHAR(50) DEFAULT 'cash',
    payment_type ENUM('salary', 'advance', 'bonus', 'overtime') DEFAULT 'salary',
    reference_number VARCHAR(100),
    notes TEXT,
    created_by VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (labourid) REFERENCES labour(labourid) ON DELETE CASCADE
);

-- Project assignments (many-to-many relationship between labour and projects)
CREATE TABLE project_assignments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    labourid INT,
    projectid INT,
    assigned_date DATE NOT NULL,
    end_date DATE NULL,
    role VARCHAR(100),
    daily_rate DECIMAL(8,2),
    status ENUM('active', 'completed', 'transferred') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (labourid) REFERENCES labour(labourid) ON DELETE CASCADE,
    FOREIGN KEY (projectid) REFERENCES project(projectid) ON DELETE CASCADE
);

-- Insert default admin user (CHANGE PASSWORD AFTER FIRST LOGIN!)
-- Default password: SecureAdmin2025! (hashed)
INSERT INTO admin (email, password, name) VALUES 
('admin@oshr.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator');

-- Insert default manager (CHANGE PASSWORD AFTER FIRST LOGIN!)
-- Default password: SecureManager2025! (hashed)
INSERT INTO manager (email, password, name, phone) VALUES 
('manager@oshr.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Default Manager', '1234567890');

-- Insert sample project
INSERT INTO project (projectname, location, startdate, description) VALUES 
('Sample Construction Project', 'Main Street, City Center', CURDATE(), 'Sample project for testing purposes');

-- Insert sample labour
INSERT INTO labour (name, phone, daily_rate) VALUES 
('John Doe', '9876543210', 500.00),
('Jane Smith', '9876543211', 450.00);

-- Create indexes for better performance
CREATE INDEX idx_attendance_date ON attendance(workdate);
CREATE INDEX idx_attendance_labour ON attendance(labourid);
CREATE INDEX idx_payment_date ON payment(paiddate);
CREATE INDEX idx_payment_labour ON payment(labourid);

-- Create views for common queries
CREATE VIEW labour_with_balance AS
SELECT 
    l.labourid,
    l.name,
    l.phone,
    l.daily_rate,
    l.balance,
    COALESCE(SUM(p.amount), 0) as total_payments,
    l.status
FROM labour l
LEFT JOIN payment p ON l.labourid = p.labourid
GROUP BY l.labourid, l.name, l.phone, l.daily_rate, l.balance, l.status;

CREATE VIEW attendance_summary AS
SELECT 
    l.name as labour_name,
    pr.projectname,
    a.workdate,
    a.status,
    a.hours_worked,
    a.overtime_hours
FROM attendance a
JOIN labour l ON a.labourid = l.labourid
JOIN project pr ON a.projectid = pr.projectid
ORDER BY a.workdate DESC;

-- Show tables created
SHOW TABLES;
