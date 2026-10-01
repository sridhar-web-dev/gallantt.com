# Gallantt Application Test Cases

Use `Pass` or `Fail` in the Submission column. URLs are relative to the application host.

| Module | Section | URL | Test Case / Scenario | Expected Result | Submission |
|---|---|---|---|---|---|
| Authentication | Login | `/dir/admin/login.php` | Valid administrator login | User is authenticated and redirected to the admin dashboard. | Pass/Fail |
| Authentication | Login | `/dir/admin/login.php` | Invalid email or password | Login is rejected with a generic error message. | Pass/Fail |
| Authentication | Login | `/dir/admin/login.php` | Empty login fields | Validation prevents submission and identifies required fields. | Pass/Fail |
| Authentication | Login | `/dir/admin/login.php` | Login with SQL-injection strings | Input is treated as data; no unauthorized access or database error occurs. | Pass/Fail |
| Authentication | Login | `/dir/admin/login.php` | Login after session expiry | User can authenticate successfully and receives a new valid session. | Pass/Fail |
| Authentication | Logout | `/dir/admin/logout.php` | Successful logout | User is logged out and redirected to the login page. | Pass/Fail |
| Authentication | Logout | `/dir/admin/logout.php` | Session termination on logout | Session data and authentication state are completely invalidated. | Pass/Fail |
| Authentication | Logout | Any protected admin URL | Back button after logout | Previously authenticated pages cannot be accessed from browser history. | Pass/Fail |
| Authentication | Session | Any protected admin URL | Protected page access without login | Direct access redirects to the login page. | Pass/Fail |
| Authentication | Session | Any protected admin URL | Refresh after session expiry | Refreshing does not restore the expired session. | Pass/Fail |
| Authentication | Session | Multiple admin tabs | Multiple-tab logout handling | Logout or expiry is reflected when another tab requests a protected page. | Pass/Fail |
| Authentication | Session Timeout | Any protected admin URL | Automatic logout after 30 minutes of inactivity | User is automatically logged out after 30 minutes without activity. | Pass/Fail |
| Authentication | Session Timeout | Any protected admin URL | Session timer reset on activity | Valid user activity resets the inactivity timer. | Pass/Fail |
| Authentication | Session Timeout | Any protected admin URL | Activity before 30 minutes | User remains logged in when activity occurs before timeout. | Pass/Fail |
| Authentication | Session Timeout | Any protected admin URL | Session expiry message | A clear session-expiry message is displayed. | Pass/Fail |
| Authentication | Password | `/dir/admin/change-password.php` | Change password with valid current password | Password is updated and the user is required to authenticate again if configured. | Pass/Fail |
| Authentication | Password | `/dir/admin/change-password.php` | Incorrect current password | Password is not changed and an appropriate error is shown. | Pass/Fail |
| Authentication | Password | `/dir/admin/change-password.php` | Weak or mismatched new password | Password policy and confirmation validation are enforced. | Pass/Fail |
| Authentication | Authorization | All admin URLs | Access with a non-admin or invalid user session | User cannot access functionality outside the assigned authorization level. | Pass/Fail |
| Home Banner | Create | `/dir/admin/home-banner/` | Add banner with valid image and fields | Banner is saved and appears in the banner list or public home page. | Pass/Fail |
| Home Banner | Create | `/dir/admin/home-banner/` | Submit missing required fields | Submission is rejected with field-level validation. | Pass/Fail |
| Home Banner | Upload | `/dir/admin/home-banner/` | Upload unsupported or oversized image | File is rejected with a clear validation message. | Pass/Fail |
| Home Banner | Manage | `/dir/admin/home-banner/banner-list.php` | Edit an existing banner | Changes are saved and displayed correctly. | Pass/Fail |
| Home Banner | Manage | `/dir/admin/home-banner/delete-banner.php` | Delete a banner | Banner is removed after confirmation and no longer displays publicly. | Pass/Fail |
| Home Banner | Ordering | `/dir/admin/home-banner/` | Change banner display order | New order is persisted and reflected on the public home page. | Pass/Fail |
| Home Banner | Video | `/dir/admin/home-banner/home-video.php` | Add or update home video | Valid video is saved and renders on the home page. | Pass/Fail |
| Home Banner | Video | `/dir/admin/home-banner/home-video.php` | Delete home video | Video is removed without breaking the home page layout. | Pass/Fail |
| Corporate Reports | Create | `/dir/admin/corporate-report/` | Add report with valid metadata and document | Report is saved and becomes available in the corporate reports page. | Pass/Fail |
| Corporate Reports | Create | `/dir/admin/corporate-report/` | Submit incomplete report form | Required fields prevent saving. | Pass/Fail |
| Corporate Reports | Upload | `/dir/admin/corporate-report/` | Upload valid report document | Supported document is stored and downloadable. | Pass/Fail |
| Corporate Reports | Upload | `/dir/admin/corporate-report/` | Upload invalid file type or oversized file | File is rejected and no unsafe file is stored. | Pass/Fail |
| Corporate Reports | Manage | `/dir/admin/corporate-report/report-list.php` | Edit report metadata or file | Updated values are shown to administrators and visitors. | Pass/Fail |
| Corporate Reports | Manage | `/dir/admin/corporate-report/report-delete.php` | Delete a report | Report is removed from the list and public download links. | Pass/Fail |
| Investor Reports | Create | `/dir/admin/investors-reports/create-report.php` | Create report with category and subcategory | Report and its classification are saved correctly. | Pass/Fail |
| Investor Reports | Categories | `/dir/admin/investors-reports/` | Add category and subcategory | New taxonomy values can be created and selected. | Pass/Fail |
| Investor Reports | Validation | `/dir/admin/investors-reports/create-report.php` | Duplicate or incomplete report data | Invalid or duplicate data is rejected without partial records. | Pass/Fail |
| Investor Reports | Manage | `/dir/admin/investors-reports/` | Edit an existing report | Changes persist after reload and are reflected publicly. | Pass/Fail |
| Investor Reports | Delete | `/dir/admin/investors-reports/delete-report.php` | Delete an existing report | Report and its public link are removed safely. | Pass/Fail |
| Financial Reports | Create | `/dir/admin/financial-report/` | Add financial highlight or report | Valid financial content is saved and displayed in the correct section. | Pass/Fail |
| Financial Reports | Manage | `/dir/admin/financial-report/` | Edit existing financial data | Updated values persist and render without formatting errors. | Pass/Fail |
| Financial Reports | Upload | `/dir/admin/financial-report/` | Upload valid financial document | Document uploads successfully and can be downloaded. | Pass/Fail |
| Financial Reports | Validation | `/dir/admin/financial-report/` | Invalid numeric, date, or file values | Invalid values are rejected with useful validation feedback. | Pass/Fail |
| Employee Welfare | Create | `/dir/admin/employee-welfare/` | Add welfare entry | Entry is saved and appears in the employee welfare page. | Pass/Fail |
| Employee Welfare | Edit | `/dir/admin/employee-welfare/edit_welfare.php` | Edit welfare entry | Changes are persisted and displayed correctly. | Pass/Fail |
| Employee Welfare | Delete | `/dir/admin/employee-welfare/delete_welfare.php` | Delete welfare entry | Entry is removed and no stale link remains. | Pass/Fail |
| Employee Welfare | Validation | `/dir/admin/employee-welfare/` | Submit missing or malformed values | Submission is rejected without creating incomplete data. | Pass/Fail |
| Media Gallery | Create | `/dir/admin/media/media-form.php` | Add image or video with valid metadata | Media item is saved and appears in the gallery. | Pass/Fail |
| Media Gallery | Upload | `/dir/admin/media/media-form.php` | Upload valid supported media | File is stored and renders at the expected size and format. | Pass/Fail |
| Media Gallery | Upload | `/dir/admin/media/media-form.php` | Upload executable, invalid, or oversized file | Upload is rejected and executable content cannot be served. | Pass/Fail |
| Media Gallery | Manage | `/dir/admin/media/media-list.php` | Edit media title or description | Updated metadata is displayed in the gallery. | Pass/Fail |
| Media Gallery | Delete | `/dir/admin/media/media-list.php` | Delete media item | Item and its file are removed or made inaccessible. | Pass/Fail |
| RCP | Create | `/dir/admin/rcp/` | Add valid RCP data | Data is saved and displayed in the RCP section. | Pass/Fail |
| RCP | Manage | `/dir/admin/rcp/manage.php` | Edit existing RCP data | Changes persist after reload. | Pass/Fail |
| RCP | Validation | `/dir/admin/rcp/` | Submit missing, malformed, or duplicate data | Invalid data is rejected without partial updates. | Pass/Fail |
| RCP | Authorization | `/dir/admin/rcp/` | Access RCP management without authentication | Request redirects to login and does not expose data. | Pass/Fail |
| Resources | Create | `/dir/admin/resource/` | Add resource with valid title, category, and file | Resource is saved and appears on the public resources page. | Pass/Fail |
| Resources | Upload | `/dir/admin/resource/` | Upload valid PDF or supported video | File uploads and downloads or plays successfully. | Pass/Fail |
| Resources | Upload | `/dir/admin/resource/` | Upload invalid or oversized file | File is rejected and no unsafe content is made public. | Pass/Fail |
| Resources | Manage | `/dir/admin/resource/manage-resources.php` | Edit resource metadata | Changes are saved and visible publicly. | Pass/Fail |
| Resources | Delete | `/dir/admin/resource/manage-resources.php` | Delete a resource | Resource and its public link are removed. | Pass/Fail |
| Jobs | Create | `/dir/admin/job/job-form.php` | Create job with valid details | Job is saved and appears in the careers listing. | Pass/Fail |
| Jobs | Validation | `/dir/admin/job/job-form.php` | Submit incomplete or invalid job details | Required fields and formats are validated. | Pass/Fail |
| Jobs | Manage | `/dir/admin/job/job-list.php` | Edit an existing job | Updated job information is displayed correctly. | Pass/Fail |
| Jobs | Delete | `/dir/admin/job/job-delete.php` | Delete a job | Job is removed from listings and cannot be applied to. | Pass/Fail |
| Jobs | Applications | `/dir/admin/job/job-applications.php` | View applications for a job | Authorized administrator can view the correct applications. | Pass/Fail |
| Jobs | Applications | `/action/job-apply-process.php` | Submit valid job application | Application is stored and confirmation is shown. | Pass/Fail |
| Jobs | Applications | `/action/job-apply-process.php` | Submit incomplete application | Submission is rejected with required-field feedback. | Pass/Fail |
| Jobs | Applications | `/action/job-apply-process.php` | Upload invalid resume | Unsupported, oversized, or unsafe resume is rejected. | Pass/Fail |
| Jobs | Applications | `/action/job-apply-process.php` | Duplicate application submission | Duplicate request is handled according to business rules without duplicate records. | Pass/Fail |
| Blog | Create | `/dir/admin/blog/blog-form.php` | Create blog with valid content and image | Blog is saved and appears in the blog listing when published. | Pass/Fail |
| Blog | Validation | `/dir/admin/blog/blog-form.php` | Submit empty or incomplete blog | Required fields prevent publication. | Pass/Fail |
| Blog | Content | `/dir/admin/blog/blog-form.php` | Enter HTML or script in blog content | Content is sanitized or safely rendered without stored XSS. | Pass/Fail |
| Blog | Manage | `/dir/admin/blog/blog-list.php` | Edit an existing blog | Changes persist and display correctly. | Pass/Fail |
| Blog | Status | `/dir/admin/blog/toggle-blog-status.php` | Publish and unpublish a blog | Public visibility changes correctly and immediately. | Pass/Fail |
| Blog | Delete | `/dir/admin/blog/delete-blog.php` | Delete a blog | Blog is removed and its public URL no longer exposes content. | Pass/Fail |
| Subscribers | Create | `/dir/admin/subscriber.php` | View subscriber list | Authorized administrator can view current subscribers. | Pass/Fail |
| Subscribers | Input | Site newsletter form | Subscribe with valid email | Valid address is stored once and confirmation is shown. | Pass/Fail |
| Subscribers | Validation | Site newsletter form | Subscribe with invalid or empty email | Request is rejected with validation feedback. | Pass/Fail |
| Subscribers | Duplicate | Site newsletter form | Subscribe the same email twice | Duplicate record is prevented or handled with a clear message. | Pass/Fail |
| Subscribers | Security | Site newsletter form | Submit HTML, SQL, or oversized input | Input is safely handled without injection or application errors. | Pass/Fail |
| Contact Us | Form | `/pages/contact-us.php` | Submit valid contact enquiry | Enquiry is accepted, confirmation is shown, and notification is sent or stored. | Pass/Fail |
| Contact Us | Validation | `/pages/contact-us.php` | Submit missing or invalid contact fields | Form blocks submission and identifies invalid fields. | Pass/Fail |
| Contact Us | Security | `/pages/contact-us.php` | Submit script, header-injection, or oversized input | Input is sanitized and cannot execute or manipulate email headers. | Pass/Fail |
| Contact Us | Abuse Prevention | `/pages/contact-us.php` | Repeated rapid submissions | Rate limiting, CAPTCHA, or equivalent abuse protection works as configured. | Pass/Fail |
| Public Pages | Navigation | `/` | Open home page | Home page loads without PHP, JavaScript, or asset errors. | Pass/Fail |
| Public Pages | Navigation | `/pages/about-us.php` | Open each company information page | Page loads with correct content, layout, and navigation. | Pass/Fail |
| Public Pages | Navigation | `/pages/cement.php` | Open business-unit page | Correct business-unit content and media are displayed. | Pass/Fail |
| Public Pages | Navigation | `/pages/steel.php` | Open business-unit page | Correct business-unit content and media are displayed. | Pass/Fail |
| Public Pages | Navigation | `/pages/flour-mill.php` | Open business-unit page | Correct business-unit content and media are displayed. | Pass/Fail |
| Public Pages | Navigation | `/pages/real-estate.php` | Open business-unit page | Correct business-unit content and media are displayed. | Pass/Fail |
| Public Pages | Navigation | `/pages/rcp.php` | Open RCP public page | Public RCP content loads and links work correctly. | Pass/Fail |
| Public Pages | Navigation | `/pages/investors.php` | Open investor page | Investor content, report links, and downloads work. | Pass/Fail |
| Public Pages | Navigation | `/pages/resources.php` | Open resources page | Resource list loads with working files and media. | Pass/Fail |
| Public Pages | Navigation | `/pages/careers.php` | Open careers page | Job listings load and application links work. | Pass/Fail |
| Public Pages | Navigation | `/pages/blogs.php` | Open blog listing | Published blogs load with pagination or filters working as designed. | Pass/Fail |
| Public Pages | Navigation | `/pages/blog-view.php` | Open a valid blog detail URL | Correct blog content is displayed. | Pass/Fail |
| Public Pages | Error Handling | Invalid URL | Open an unknown page | Custom 404 page is shown without revealing server details. | Pass/Fail |
| Public Pages | Error Handling | Any public URL | Trigger an application error | User sees a safe error response; stack traces and credentials are not exposed. | Pass/Fail |
| Public Pages | Legal | `/pages/privacy-policy.php` | Open privacy policy | Policy page loads and is reachable from the site footer. | Pass/Fail |
| Public Pages | Legal | `/pages/terms-of-service.php` | Open terms of service | Terms page loads and is reachable from the site footer. | Pass/Fail |
| Downloads | Access | Public report/resource links | Download a valid published file | Correct file downloads with an appropriate content type. | Pass/Fail |
| Downloads | Access Control | Protected or unpublished file URL | Request an unauthorized or unpublished file | File is not disclosed and an appropriate error or redirect is returned. | Pass/Fail |
| Downloads | Path Security | File download endpoints | Request a path traversal value | Server rejects traversal attempts and does not disclose arbitrary files. | Pass/Fail |
| Application Security | CSRF | All admin create/edit/delete forms | Submit request without a valid CSRF token | State-changing request is rejected. | Pass/Fail |
| Application Security | XSS | All text fields and rendered listings | Store and display HTML or script payloads | Payload is escaped or sanitized and does not execute. | Pass/Fail |
| Application Security | SQL Injection | All search, filter, and form inputs | Submit SQL metacharacters and injection payloads | No unauthorized data, SQL errors, or data modification occurs. | Pass/Fail |
| Application Security | File Upload | All upload forms | Rename unsafe content with an allowed extension | Server validates file content and prevents executable upload. | Pass/Fail |
| Application Security | HTTP Headers | Public and admin pages | Inspect security response headers | HTTPS, secure cookies, and appropriate security headers are configured. | Pass/Fail |
| Application Security | HTTPS | Public and admin URLs | Open application over HTTP | HTTP is redirected to HTTPS where TLS is available. | Pass/Fail |
| Application Security | Error Disclosure | Public and admin URLs | Trigger invalid parameters or server errors | Response does not expose paths, SQL, credentials, or stack traces. | Pass/Fail |
| Application Security | Auditability | Admin create/edit/delete actions | Perform a content change | Change is attributable to the authenticated administrator where audit logging is required. | Pass/Fail |
| Compatibility | Responsive UI | Public pages and admin pages | Test desktop, tablet, and mobile widths | Layout remains usable with no clipped controls or overlapping content. | Pass/Fail |
| Compatibility | Browser | Public pages and admin pages | Test supported browsers | Pages and forms behave consistently in supported browsers. | Pass/Fail |
| Performance | Page Load | Home, listing, and admin dashboard | Load pages with normal data volume | Pages load within the accepted performance target without failed assets. | Pass/Fail |
| Performance | Concurrent Use | Admin and public forms | Submit or browse concurrently with multiple users | Requests remain isolated and no data is overwritten incorrectly. | Pass/Fail |
| Data Integrity | Database | All create/edit/delete modules | Create, edit, delete, then reload data | Database state matches the UI and no orphan records remain. | Pass/Fail |
| Data Integrity | Backup/Recovery | Database and uploaded files | Restore a test backup | Content and files can be restored and remain usable. | Pass/Fail |
