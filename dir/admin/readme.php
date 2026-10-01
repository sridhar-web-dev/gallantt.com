<?php 

require_once '../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

?>
# 🛠 Admin Panel Access & Navigation Guide

This guide helps administrators access and manage the Gallantt Group Admin Dashboard.

---

## 🔐 How to Access the Admin Panel

### 🔗 Admin URL
```
https://gallantt.com//dir/admin/
```
> Replace `gallantt.com` with your actual hosted domain name or IP address.

### 🧾 Login Credentials
Use the credentials provided by the system administrator:

- Email: `******`
- Password: `******`

Once logged in, the system stores the session with a `user_id`.

> If you change your password, your session will be destroyed and you will be redirected to the login screen for security reasons.

---

## Admin Menu Overview

The admin panel has a top navigation menu with multiple dropdowns. Here's a breakdown of each section:

---

### Home Banner
Manage homepage visuals like banners and intro video.

- Add New Banner: `https://gallantt.com/dir/admin/home-banner/`
- Manage Banner: `https://gallantt.com/dir/admin/home-banner/banner-list.php`
- Home Video: `https://gallantt.com/dir/admin/home-banner/home-video.php`

---

### Corporate Reports
Upload or update documents related to corporate communication.

- Add New Report: `https://gallantt.com/dir/admin/corporate-report/`
- Manage Reports: `https://gallantt.com/dir/admin/corporate-report/report-list.php`

---

### Investors Reports
Post important information and downloadable reports for investors.

- Add New Report: `https://gallantt.com/dir/admin/investors-reports/create-report.php`
- Manage Reports: `https://gallantt.com/dir/admin/investors-reports/`

---

### Financial Reports
Maintain financial data, performance highlights, and downloadable reports.

- Highlights: `https://gallantt.com/dir/admin/financial-report/highlights.php`
- Latest Reports: `https://gallantt.com/dir/admin/financial-report/`

---

### Employee Welfare
Post updates related to employee benefits and welfare schemes.

- Employee Welfare: `https://gallantt.com/dir/admin/employee-welfare/`

---

### Media Gallery
Manage multimedia assets like images and videos.

- Add New Post: `https://gallantt.com/dir/admin/media/media-form.php`
- Manage Gallery: `https://gallantt.com/dir/admin/media/media-list.php`

---

### RCP 
Enter and maintain detailed data for RCP.

- Add & View Data: `https://gallantt.com/dir/admin/rcp/`
- Manage: `https://gallantt.com/dir/admin/rcp/manage.php`

---

### Resources
Upload and categorize PDF documents or videos for public or internal access.

- Resource Page: `https://gallantt.com/dir/admin/resource/`

---

### Jobs Section
Create job postings, manage listings, and view applicants.

- Add New Job Post: `https://gallantt.com/dir/admin/job/job-form.php`
- Manage Jobs: `https://gallantt.com/dir/admin/job/job-list.php`
- View Applications: `https://gallantt.com/dir/admin/job/job-applications.php`

---

### Blog Section
Publish and manage blog articles.

- Add New Post: `https://gallantt.com/dir/admin/blog/blog-form.php`
- Manage Blogs: `https://gallantt.com/dir/admin/blog/blog-list.php`

---

### Account
User-level actions like changing password or logging out.

- Change Password: `https://gallantt.com/dir/admin/change-password.php`
- Logout: `https://gallantt.com/dir/admin/logout.php`

---

## 🔧 Technical Notes

- Built using PHP, PDO, Bootstrap 5, and custom autoloading.
- All sections use AJAX where needed for better UX.
- Media files are uploaded to designated folders and mapped in the database.
- Passwords are stored securely using `password_hash()`.

---

## Security Notes

- Password change destroys the session and forces re-authentication.
- All admin URLs are protected — avoid sharing direct links without login.
- Do not use shared credentials. Each admin should have a unique user login.
