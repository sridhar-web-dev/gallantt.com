# Complete Admin Panel Test Cases

## Scope

All admin panel modules:

- Authentication and session management
- Dashboard and navigation
- Home banners and home videos
- Corporate, investor, and financial reports
- HR desk: jobs, applications, and employee welfare
- Content desk: blogs and media gallery
- RCP data and master management
- Resources and business brochures
- Boards of panels
- Subscribers and account utilities

The detailed Investor Reports cases are retained below under the Investor Reports section.

## Test Data

- Valid admin account
- Valid category: `Annual Reports`
- Valid subcategory: `Financial Year 2025`
- Report title: `Test Investor Report`
- Valid PDF file: `test-report.pdf`
- Replacement PDF file: `test-report-updated.pdf`
- Invalid file: `test-report.txt`

## Preconditions

1. Admin user exists and can log in.
2. Database connection is available.
3. The investor report upload directory exists or can be created:
   `uploads/investors-reports/uploads/`
4. Varnish/cache service is available for cache verification.
5. Browser developer tools can be opened to inspect network responses.

## Test Cases

## Common Admin Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| ADM-001 | Open admin without login | Open `/dir/admin/` without an authenticated session. | User is redirected to the admin login page. | Not Run |
| ADM-002 | Valid login | Enter valid admin credentials and submit. | User is authenticated and redirected to the dashboard. | Not Run |
| ADM-003 | Invalid login | Enter an incorrect password. | Persistent error alert appears below the form and shows the remaining attempts. | Not Run |
| ADM-004 | Five failed login attempts | Submit an incorrect password until five failures are reached. | Account is temporarily locked after the fifth failure and lockout message is shown. | Not Run |
| ADM-005 | Locked account login | Try valid credentials while the account is locked. | Login remains blocked until the lockout period ends. | Not Run |
| ADM-006 | Password visibility | Use Show password on the login form. | Password switches between hidden and visible without changing its value. | Not Run |
| ADM-007 | Logout | Log in and click Logout. | Session is destroyed and user is redirected to login. Browser back does not expose protected data. | Not Run |
| ADM-008 | Session timeout | Leave the admin idle until the configured timeout. | User is logged out and redirected to login. | Not Run |
| ADM-009 | Direct endpoint protection | After logout, open a protected CRUD endpoint directly. | Request is rejected or redirected; no data is changed. | Not Run |
| ADM-010 | Dashboard totals | Open the dashboard and compare every displayed total with `SELECT COUNT(*)` for its table. | Totals include all records and are not limited to the current list page. | Not Run |
| ADM-011 | Dashboard links | Click every dashboard list link. | Each link opens the correct module and no link returns a missing page. | Not Run |
| ADM-012 | Navbar links | Open every navbar menu and link. | Menus open correctly and links reach the expected admin pages. | Not Run |
| ADM-013 | Navbar responsive view | Test the navbar at desktop, tablet, and mobile widths. | Toggle, menus, text, and dropdowns remain usable without overlap. | Not Run |
| ADM-014 | Cache purge after successful mutation | Create, edit, or delete a record and inspect the server log or command result. | Tagged cache purge runs only after a successful mutation. | Not Run |
| ADM-015 | No purge after failed mutation | Submit invalid data or force a failed database/upload operation. | Operation fails and cache is not purged. | Not Run |

## Home Banner and Video Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| BAN-001 | Create banner | Enter title, subtitle, valid image, and submit. | Banner record and image are created and shown in the banner list. | Not Run |
| BAN-002 | Edit banner | Change banner text and save. | Existing banner is updated and remains visible. | Not Run |
| BAN-003 | Replace banner image | Edit a banner and upload a new image. | New image is stored, database filename is updated, and old image is removed after success. | Not Run |
| BAN-004 | Reject non-image banner | Upload a non-image file. | Upload is rejected and no invalid banner is saved. | Not Run |
| BAN-005 | Delete banner | Delete a banner and confirm. | Database record and associated image are removed. | Not Run |
| BAN-006 | Reorder banners | Drag banners into a new order and save. | Order persists after refresh and on the public home page. | Not Run |
| BAN-007 | Add home video | Upload a valid video. | Video is saved and displayed by the home video module. | Not Run |
| BAN-008 | Edit and delete video | Rename then delete an existing video. | Rename persists and deletion removes the record/file as intended. | Not Run |

## Corporate and Financial Report Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| RPT-001 | Create corporate report | Enter report details and upload a valid document. | Report is saved and appears in the corporate report list. | Not Run |
| RPT-002 | Edit corporate report | Change title, description, and optional document. | Changes persist and the new document opens correctly. | Not Run |
| RPT-003 | Delete corporate report | Delete an existing report. | Record and associated document are removed. | Not Run |
| RPT-004 | Create financial report | Enter report name and upload a document. | Financial report is saved and listed. | Not Run |
| RPT-005 | Edit financial report | Change report name and optionally replace its file. | Metadata and file path update correctly; old file is removed after success. | Not Run |
| RPT-006 | Delete financial report | Delete a financial report. | Record and file are removed and public output no longer shows it. | Not Run |
| RPT-007 | Manage financial highlights | Add, edit, and delete a highlight. | Each successful operation persists and the public highlight output is correct. | Not Run |
| RPT-008 | Report upload validation | Try empty title, missing file, oversized file, and invalid extension. | Invalid submissions are rejected without incomplete records. | Not Run |

## HR Desk Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| HR-001 | Create job | Enter valid job details and submit. | Job is saved and appears in the job list. | Not Run |
| HR-002 | Edit job | Change job details and save. | Changes persist in the list and public careers page. | Not Run |
| HR-003 | Toggle job status | Change a job between active and disabled. | Status persists and public visibility follows the status. | Not Run |
| HR-004 | Delete job | Delete a job and confirm. | Job record is removed. | Not Run |
| HR-005 | View applications | Open job applications. | Applications load with correct job and applicant data. | Not Run |
| HR-006 | Application pagination | Create more applications than one page and navigate pages. | All applications are reachable with correct counts and no duplicates. | Not Run |
| HR-007 | Add employee welfare record | Enter title, description, and valid image. | Welfare record and image are saved. | Not Run |
| HR-008 | Edit employee welfare record | Change details and optionally replace image. | Changes persist and old image is removed after successful replacement. | Not Run |
| HR-009 | Delete employee welfare record | Delete a welfare record. | Record and image are removed. | Not Run |

## Content Desk Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| CNT-001 | Create blog | Enter title, description, and optional image. | Blog is saved and appears in the blog list. | Not Run |
| CNT-002 | Edit blog | Change blog details and optionally replace image. | Changes persist and old image is removed after success. | Not Run |
| CNT-003 | Toggle blog status | Toggle a blog between active and disabled. | Status persists and public visibility changes correctly. | Not Run |
| CNT-004 | Delete blog | Delete a blog and confirm. | Blog record and image are removed. | Not Run |
| CNT-005 | Blog pagination | Create more than one page of blogs and navigate pages. | Counts and pages include every blog without duplicates. | Not Run |
| CNT-006 | Create media item | Enter media details and upload valid image, video, or document. | Media item is saved with correct type and file. | Not Run |
| CNT-007 | Edit media item | Change metadata and optionally replace files. | Metadata and files update correctly; old files are cleaned up after success. | Not Run |
| CNT-008 | Toggle media status | Change media status. | Status persists and public media output follows it. | Not Run |
| CNT-009 | Delete media item | Delete an item and confirm. | Database record and associated files are removed. | Not Run |

## RCP Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| RCP-001 | Add state | Add a valid state. | State is saved and appears in master management. | Not Run |
| RCP-002 | Edit state | Rename an existing state. | New name persists. | Not Run |
| RCP-003 | Delete state | Delete a state. | State is removed according to dependency rules. | Not Run |
| RCP-004 | Add district | Add a district under a state. | District is saved under the selected state. | Not Run |
| RCP-005 | Edit and delete district | Edit then delete a district. | Both operations affect only the selected district. | Not Run |
| RCP-006 | Add and edit product | Add and rename a product. | Product changes persist. | Not Run |
| RCP-007 | Manage sections | Add, edit, and delete an RCP section or price. | Correct section record is changed and response is successful. | Not Run |
| RCP-008 | Submit RCP data | Select state, district, product, and section values and submit. | RCP data is saved and displayed correctly after refresh. | Not Run |
| RCP-009 | RCP dependency validation | Try invalid state/district/product combinations. | Invalid combinations are rejected without corrupting related data. | Not Run |

## Resources, Brochures, and Boards Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| RES-001 | Add resource | Select/create a category, enter resource details, and upload a valid file or link. | Resource is saved and viewable. | Not Run |
| RES-002 | Edit resource | Change metadata and optionally replace the file. | Changes persist and old file cleanup occurs after success. | Not Run |
| RES-003 | Delete resource | Delete a resource and confirm. | Record and associated file are removed. | Not Run |
| RES-004 | Add brochure | Add one or more brochures with names and files. | Every brochure is saved with the correct business and file. | Not Run |
| RES-005 | Edit brochure | Change brochure name and optionally replace file. | Updated name/file persists and old file is removed after success. | Not Run |
| RES-006 | Delete brochure | Delete a brochure. | Record and file are removed. | Not Run |
| RES-007 | Create board panel | Add title, designation, description, and picture. | Board panel is saved and displayed in the list. | Not Run |
| RES-008 | Edit board panel | Change board details and optionally replace picture. | Changes persist and old picture cleanup is correct. | Not Run |
| RES-009 | Delete and reorder panels | Delete a panel and change panel order. | Correct panel is deleted and order persists after refresh. | Not Run |

## System and Account Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| SYS-001 | View subscribers | Open Subscribers. | Subscriber list loads with correct records and pagination. | Not Run |
| SYS-002 | Subscriber copy/export action | Use the available copy/export action. | Correct subscriber data is copied/exported and errors are handled. | Not Run |
| SYS-003 | Change password successfully | Enter current password and a valid new password. | Password changes and user is required to log in again. | Not Run |
| SYS-004 | Change password with wrong current password | Enter an incorrect current password. | Password remains unchanged and clear error is shown. | Not Run |
| SYS-005 | Change password validation | Submit weak, mismatched, or empty password values. | Validation prevents unsafe or incomplete changes. | Not Run |
| SYS-006 | Read Me page | Open the admin documentation page. | Documentation loads and links point to current admin routes. | Not Run |
| SYS-007 | XSS input protection | Enter `<script>alert(1)</script>` in text fields across modules. | Text is escaped and never executed in admin or public output. | Not Run |
| SYS-008 | SQL injection protection | Submit SQL-like input in IDs, filters, names, and titles. | Input is treated as data; no unauthorized query or error occurs. | Not Run |
| SYS-009 | File upload protection | Upload executable files, path traversal names, and oversized files. | Files are rejected or safely stored; no executable upload is exposed. | Not Run |
| SYS-010 | Cache result logging | Complete a successful admin mutation and inspect browser/server logs. | Cache purge status is reported without corrupting AJAX or JSON responses. | Not Run |

## Investor Reports Test Cases

| ID | Test case | Steps | Expected result | Status |
|---|---|---|---|---|
| IR-001 | Open page without login | Open `investors-reports/` in a new browser session without logging in. | User is redirected to the admin login page. | Not Run |
| IR-002 | Open create report page | Log in and open `create-report.php`. | Create Report page loads with category, subcategory, title, and file controls. | Not Run |
| IR-003 | Load subcategories | Select a category. | Subcategory list loads through `get_subcategory.php` and shows only subcategories for the selected category. | Not Run |
| IR-004 | Add a new category | Use the Add Category control, enter a valid name, and submit. | Category is saved once and appears in the category list. | Not Run |
| IR-005 | Add a new subcategory | Select a category, use Add Subcategory, enter a valid name, and submit. | Subcategory is saved under the selected category and appears in the subcategory list. | Not Run |
| IR-006 | Create one report | Select category and subcategory, enter a title, upload `test-report.pdf`, and submit. | Report is saved, file is stored in the investor upload directory, and the report appears in the list. | Not Run |
| IR-007 | Create multiple reports | Add multiple title/file rows, fill each row, and submit. | Every valid title/file pair creates one report and each file is accessible. | Not Run |
| IR-008 | Create report without title | Leave the title empty and submit. | Browser/server validation prevents submission and no incomplete record is created. | Not Run |
| IR-009 | Create report without file | Enter a title but do not select a file. | Required validation prevents submission and no incomplete record is created. | Not Run |
| IR-010 | Upload invalid file type | Try uploading `test-report.txt` or another disallowed type. | Invalid file is rejected according to the application upload policy and no invalid report is created. | Not Run |
| IR-011 | Open report list | Open `index.php` after creating a report. | New report displays with correct category, subcategory, title, date, and file link. | Not Run |
| IR-012 | Filter by category | Select a category filter. | Only reports belonging to that category are displayed and the total/page count is correct. | Not Run |
| IR-013 | Filter by subcategory | Select a category and subcategory filter. | Only reports belonging to both selections are displayed. | Not Run |
| IR-014 | Paginate reports | Create more than 10 reports and navigate through each page. | Each page shows the correct records, page numbers work, and no records are skipped or duplicated. | Not Run |
| IR-015 | Open edit page | Click Edit for an existing report. | Edit page loads with the existing category, subcategory, title, and current file name. | Not Run |
| IR-016 | Edit metadata only | Change category, subcategory, or title without selecting a new file, then save. | Metadata is updated, the existing document remains available, and the list shows the new values. | Not Run |
| IR-017 | Replace document | Open Edit, select `test-report-updated.pdf`, change the title, and save. | New document is uploaded to `uploads/investors-reports/uploads/`, database `file_path` contains the new filename, and the old document is removed only after success. | Not Run |
| IR-018 | Verify replacement document link | Open the file link after IR-017. | Link opens/downloads `test-report-updated.pdf`, not the previous document. | Not Run |
| IR-019 | Save edit with same values | Open Edit and save without changing fields or file. | Existing record remains valid and no unrelated file is deleted. | Not Run |
| IR-020 | Edit nonexistent report | Open `edit-report.php?id=999999` or another nonexistent ID. | Application handles the missing record safely and does not update another record. | Not Run |
| IR-021 | Delete report | Delete an existing report and confirm the prompt. | Database record and associated file are removed; report no longer appears in the list. | Not Run |
| IR-022 | Cancel delete | Click Delete and cancel the confirmation. | No database record or file is removed. | Not Run |
| IR-023 | Delete nonexistent report | Open the delete endpoint with an invalid ID. | Request fails safely without deleting another record. | Not Run |
| IR-024 | Cache purge after create | Create a report and inspect the server log/command result. | Cache purge runs only after a successful create and reports success or failure. | Not Run |
| IR-025 | Cache purge after edit | Edit metadata or replace a document and inspect the server log/command result. | Cache purge runs only after a successful update. | Not Run |
| IR-026 | Cache purge after delete | Delete a report and inspect the server log/command result. | Cache purge runs only after a successful delete. | Not Run |
| IR-027 | No cache purge after failed operation | Submit invalid data or force an upload/database failure. | Operation fails and cache is not purged. | Not Run |
| IR-028 | Prevent SQL injection in filters | Submit text or SQL-like input in category, subcategory, ID, and title fields. | Input is treated as data; no SQL error or unauthorized data access occurs. | Not Run |
| IR-029 | Escape report title output | Create a title containing HTML-like text such as `<script>alert(1)</script>`. | Text is displayed as text and is not executed in the report list or edit form. | Not Run |
| IR-030 | Session timeout/permission check | Log out or expire the session, then submit an edit/delete request directly. | Request is rejected or redirected; no record is changed. | Not Run |
| IR-031 | Refresh after successful edit | Complete an edit, follow the redirect, and refresh the list. | Updated values persist after refresh and are not only changed in the browser view. | Not Run |
| IR-032 | Public website verification | After create, edit, and delete, open the investor reports section on the public site. | Public page reflects the latest database data after cache purge. | Not Run |

## Defect Recording Template

For each failed test, record:

- Test case ID
- Environment and browser
- Steps to reproduce
- Expected result
- Actual result
- Screenshot or network response
- Database row ID, if applicable
- PHP/server error log entry
- Severity

## Exit Criteria

Testing is complete when all critical cases pass:

- IR-001
- IR-006
- IR-011
- IR-015
- IR-017
- IR-018
- IR-021
- IR-024
- IR-025
- IR-026
- IR-030
- IR-032
