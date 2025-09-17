# Project Gemini: School Management System

This document outlines the features, architecture, and workflow for a comprehensive School Management System.

## 1. Project Overview

The School Management System is a complete web-based application designed to automate and manage the academic and administrative activities of a school. It provides a centralized platform for various users, including administrators, teachers, cashiers, and students, each with a dedicated portal tailored to their roles. The system will feature a dynamic public-facing website and a powerful admin panel for management, all powered by a robust backend.

## 2. Technology Stack

The system will be built using a hybrid setup to ensure flexibility, performance, and scalability.
* **[span_0](start_span)Backend:** PHP + MySQL[span_0](end_span)
* **[span_1](start_span)Frontend:** Tailwind CSS and Bootstrap (for styling flexibility)[span_1](end_span)
* **[span_2](start_span)JavaScript:** jQuery + Vanilla JS[span_2](end_span)
* **Data Handling:** AJAX and a RESTful API will be used for seamless data handling without page reloads. [span_3](start_span)[span_4](start_span)[span_5](start_span)This approach ensures that both the web application and potential future mobile apps can consume the same API responses.[span_3](end_span)[span_4](end_span)[span_5](end_span)

## 3. System Architecture & Flowcharts

### 3.1. General Data Flow (AJAX/API)

This flow is central to the application's dynamic nature, from the homepage to the admin panel.
```mermaid
graph TD
    A[User Action e.g., Click Button] --> B{JavaScript/jQuery Event Listener};
    B --> C[AJAX Request to PHP API Endpoint];
    C --> D{PHP Script Processes Request};
    D --> E[Interacts with MySQL Database];
    E --> D;
    D --> F[Returns Data as JSON Response];
    F --> C;
    C --> G[AJAX Success Callback];
    G --> H[JavaScript/jQuery Updates HTML DOM];
    H --> I[UI is Updated without Page Reload];

3.2. User Authentication & Role-Based Redirection Flow
graph TD
    A[User Visits Login Page] --> B(Enters Username/Password);
    B --> C{Submits Form};
    C --> D[AJAX POST Request to Auth API];
    D --> E{PHP Backend};
    E --> F[Verify Credentials against Hashed Password in MySQL];
    subgraph Verification
        F -- Valid --> G[Identify User Role: Admin, Teacher, etc.];
        F -- Invalid --> H[Return Error Message];
    end
    G --> I[Return Success + Role + Token];
    H --> D;
    I --> D;
    D -- Success --> J[JS Redirects to Role-Specific Dashboard, e.g., /admin/dashboard];
    D -- Error --> K[JS Displays Error Message on Login Page];

3.3. Database & File Management
Database: MySQL will be the primary database. [cite_start]Database creation and schema management should be possible via the terminal for real-time setup and also maintained in a .sql file for version control and deployment. [cite: 165]
File Storage: All uploaded files (like student photos, gallery images) will be stored on the web hosting server. The database will only store the file link/path. [cite_start]To avoid conflicts and ensure data integrity, files will be renamed upon upload. [cite: 165]
4. Core Features & Modules
4.1. Academic Year Management
[cite_start]All data within the system will be organized and stored according to the academic year. [cite: 1]
[cite_start]When an academic year is deleted, its associated data will be archived in the database for record-keeping. [cite: 1]
[cite_start]An option for permanent deletion of archived data will be available if necessary. [cite: 1]
4.2. Public-Facing Website
[cite_start]A dynamic homepage will serve as the public face of the school. [cite: 2]
[cite_start]Sections: The homepage will include a Header, Image Carousel, About section, Courses, Events, Achievements, Gallery, Testimonials, a Call-to-Action (CTA), and a Footer. [cite: 3]
[cite_start]Content Management: All content displayed on the homepage must be fully manageable from the Admin Panel. [cite: 4, 5]
[cite_start]Dynamic Loading: Data will be loaded dynamically using PHP APIs and AJAX to ensure the site is fast and up-to-date. [cite: 6, 24]
4.3. Role-Based Access Control (RBAC)
[cite_start]The system is built around four primary user roles, with permissions managed in the MySQL database and editable from the Admin Panel. [cite: 17, 20]
[cite_start]Admin: Has full access to all modules, including user management, settings, and all academic and financial data. [cite: 17]
[cite_start]Teacher: Can manage attendance and marks only for their assigned classes and subjects. [cite: 17]
[cite_start]Cashier: Access is restricted to managing fees, payments, receipts, and financial reports. [cite: 18, 143]
[cite_start]Student: Has read-only access to their personal information, including attendance, results, fee status, and school announcements. [cite: 19]
5. Module Breakdown
5.1. Admin Panel
The central hub for managing the entire school. [cite_start]It will feature a modern, responsive design with a collapsible sidebar menu. [cite: 11, 16]
Dashboard:
[cite_start]Provides a high-level overview of school activities. [cite: 28]
[cite_start]Displays key statistics: total students, teachers, classes. [cite: 29]
[cite_start]Shows financial summaries of collected and pending fees. [cite: 29]
[cite_start]Includes graphs for student attendance, fee collection trends, and exam performance. [cite: 30]
[cite_start]Features notifications for upcoming events, fee payments, and exam schedules. [cite: 31]
[cite_start]Contains quick action buttons to add new students, teachers, or events. [cite: 32]
Student Management:
[cite_start]Allows for complete management of all student records. [cite: 33]
[cite_start]Features a searchable and filterable table of students. [cite: 34]
[cite_start]Add Student Form: A comprehensive form to add new students with fields like Scholar Number, Admission Details, Name, Class, Parent's Info, DOB, Gender, Category, Contact Info, Aadhar, Samagra, Apaar ID, PAN, Previous School, and Photo Upload. [cite: 127] [cite_start]All mandatory fields will be validated. [cite: 128]
[cite_start]Supports editing and deleting student records. [cite: 35]
[cite_start]Each student has a detailed profile page. [cite: 36]
[cite_start]Includes options for bulk data import/export (Excel/CSV) and student ID card generation. [cite: 37]
Teacher Management:
[cite_start]Manages teacher profiles and academic responsibilities. [cite: 38]
[cite_start]Add Teacher Form: Includes fields for Employee ID, Name, Personal Details, Qualifications, Specialization, Joining Date, Experience, Contact Info, Aadhar, PAN, Assigned Classes/Subjects, and Photo Upload. [cite: 129]
[cite_start]Allows assignment of teachers to classes and subjects. [cite: 40]
[cite_start]Each teacher has a profile page showing their schedule and performance. [cite: 41]
Classes & Subjects Management:
[cite_start]Enables the admin to define the academic structure. [cite: 43]
[cite_start]Allows creating classes, adding sections, and assigning subjects to them. [cite: 44]
[cite_start]Links teachers to specific subjects within a class. [cite: 44, 45]
Attendance Management:
[cite_start]Provides tools to record and manage student and teacher attendance. [cite: 47]
[cite_start]Allows marking daily attendance (Present, Absent, Late). [cite: 48]
[cite_start]Supports bulk attendance upload via CSV or Excel. [cite: 49]
[cite_start]Generates detailed attendance reports with graphical summaries. [cite: 50, 51]
[cite_start]Complete Exam Module: [cite: 157]
[cite_start]Exam Setup: Create and manage exams with details like Exam Name, Type (Mid-term, Final), associated Class, Start Date, and End Date. [cite: 53, 158]
Subject Schedule Management: For each exam, the admin can define a schedule. [cite_start]This involves adding subjects with their respective Exam Date, Day, Start Time, and End Time in a table format. [cite: 151, 153, 159] [cite_start]This schedule is saved in MySQL and links directly to the Admit Card Module. [cite: 154]
[cite_start]Admit Card Generation: Admins can generate admit cards in bulk (class-wise) or for individual students. [cite: 145, 161] Each card displays:
[cite_start]School Name & Logo, Exam Name [cite: 146, 161]
[cite_start]Student Details: Photo, Name, Scholar No, Father’s Name, Class, Roll No. [cite: 146, 161]
[cite_start]A table with the subject-wise exam schedule. [cite: 147, 161]
[cite_start]Space for Principal and Exam Controller signatures and the school seal. [cite: 148, 162]
[cite_start]Supports printing multiple cards per A4 page and PDF export. [cite: 149, 162]
[cite_start]Results Management: After teachers enter marks, the system calculates totals, percentages, and grades. [cite: 54] [cite_start]Admins can then generate class-wise or student-wise results, download printable report cards in PDF, and publish them to the student portal. [cite: 55]
Fees & Expenses Management:
Fees:
[cite_start]Define fee structures for different classes. [cite: 56]
[cite_start]Add Fees Form: The cashier/admin can select a Class and Village to filter students, then enter payment details like Fee Type, Amount, Discount, Payment Mode (Cash, Online, Cheque), Transaction ID, and Date. [cite: 133, 134, 135]
[cite_start]Upon submission, the system updates the student's fee status and can generate three receipts per A4 page (School, Student, Accounts copies). [cite: 136]
Expenses:
[cite_start]A dedicated module to record all school expenses. [cite: 138]
[cite_start]Add Expense Form: Includes fields for Receipt Number, Reason, Category (e.g., Diesel, Maintenance, or Custom), Amount, and Payment Date. [cite: 139]
[cite_start]Expense Reports: A page to view, filter, and analyze expenses by category or date range, with options to print or export to PDF/Excel. [cite: 140, 142]
Website Content Management:
[cite_start]Events & Announcements: Post upcoming events and notices with details like title, date, venue, and an optional image. [cite: 60, 61] [cite_start]These can be published to the homepage. [cite: 62]
[cite_start]Gallery Management: Upload and organize images/videos into categories (e.g., Sports, Cultural) for the public website gallery. [cite: 64, 65]
Reports:
[cite_start]A centralized module to generate and export various reports (Attendance, Exam Performance, Financial) in PDF and Excel formats. [cite: 25, 68, 69, 70]
Settings:
[cite_start]Configure core system details like school name, logo, and contact info. [cite: 73]
[cite_start]Manage users and their role-based permissions. [cite: 74]
[cite_start]Customize homepage content. [cite: 75]
[cite_start]Manage API security settings and perform database backups. [cite: 75]
5.2. Teacher Portal
A dedicated portal for teachers to manage their academic responsibilities.
[cite_start]Dashboard: A personalized view of upcoming lessons, pending attendance, exam schedules, and important announcements. [cite: 76, 77]
[cite_start]Class & Subject Management: View assigned classes, see student lists, and upload study materials or assignments for students. [cite: 79, 81]
[cite_start]Attendance: Mark and update daily attendance for their assigned classes. [cite: 82, 83]
[cite_start]Exams & Results: Enter marks for their assigned subjects during exams and review performance summaries. [cite: 86, 87]
[cite_start]Profile & Settings: Manage personal contact information and change their password. [cite: 92]
5.3. Cashier Portal
A secure portal focused solely on financial management.
[cite_start]Dashboard: Highlights daily financial activity, including fees collected and pending dues. [cite: 95]
[cite_start]Fee Management: The primary workspace for recording student fee payments and generating receipts. [cite: 97, 98, 100]
[cite_start]Pending Fees: View lists of students with outstanding balances and generate reports. [cite: 101, 102]
[cite_start]Financial Reports: Generate and export financial summaries (daily, monthly, yearly). [cite: 104, 105] [cite_start]Access is restricted to financial data only. [cite: 106, 108]
[cite_start]Profile & Settings: Manage personal details and change password. [cite: 107]
5.4. Student Portal
A portal for students to track their academic progress and stay informed.
[cite_start]Dashboard: A snapshot of their attendance percentage, recent results, fee status, and school announcements. [cite: 109, 110, 111]
[cite_start]Profile: View-only access to their personal and academic details. [cite: 112, 113, 164]
[cite_start]Attendance: View their detailed attendance history. [cite: 114, 115]
[cite_start]Exams & Results: Access exam schedules, view marks and grades, and download report cards. [cite: 116, 117]
[cite_start]Fees: Check their fee payment history, pending dues, and access receipts. [cite: 119, 121]
[cite_start]Gallery & Events: View school event calendars and photos from school functions. [cite: 122, 123]
[cite_start]Settings: Limited to changing their password for account security. [cite: 125]
