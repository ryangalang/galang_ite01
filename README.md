I- INTERACTIVE
R- RECRUITMENT
I- INFORMATION
S- SYSTEM


APPLICATION INFORMATION
    -working experience
    -educational attainment
    -medical

JOB OPENING
    -job title
    -job description
    -data needed
    -data expiry
    -status (active, inactive, expired) pag expired di na makikita
    -location

JOB APPLICATION
    -applicant
    -job

Finance
"si ryan nag bayad ng chuchu amount 500" processing 

Manage User

Reports
    -applicant reports
        -filter data range (start date and end date)
        -filter by user 
        -status (Line up: On Process, For Interview, For Medical, Deployed)
    -job report
        -filter date range
        -filter by user
    -audit trail

laravel blade crud  laravel herd table plus dbengine (admin lte or other template)


//ang nagiinsert lang ng data is ung agency 
walang registration, login lang meron admin acc, ang magaadd ng user is admin sa manage user page. //




























🛡️ SYSTEM OVERVIEW (ADMIN-ONLY)
Module	Description
🔐 Login only	No registration. Only admin can log in.
👥 Manage Users	Admin can add other users (if needed).
🧑‍💼 Applicants	CRUD: personal info, work experience, education, medical.
📣 Job Openings	CRUD: title, description, location, dates, status.
📄 Job Applications	Admin assigns applicants to jobs with status.
💰 Finance Logs	Admin records payment info (e.g., “Ryan paid chuchu 500”).
📊 Reports	Filterable reports on applicants, jobs, audit trail.
🧾 Audit Trail	Tracks admin actions (create, update, delete).

✅ PROJECT SETUP (Recommended Flow)
1. Create Laravel project using Laravel Herd
bash
Copy
Edit
cd ~/Sites
laravel new iris-system
cd iris-system
php artisan serve
2. Install Laravel Breeze (login only)
bash
Copy
Edit
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
Now only login works. Remove or block registration in routes:

php
Copy
Edit
// routes/web.php
Route::get('/register', function () {
    abort(403); // block registration
});
🗃️ DATABASE STRUCTURE (All Admin-Only)
users
php
Copy
Edit
id, name, email, password, role ('admin'), created_at
Add default admin manually or via seeder.

applicants
php
Copy
Edit
id, name, email, contact, created_at
experiences, educations, medicals
Linked to applicant_id.

job_openings
php
Copy
Edit
id, title, description, location, date_needed, date_expiry, status (active/inactive/expired)
Expired jobs filtered via controller logic.

job_applications
php
Copy
Edit
id, applicant_id, job_opening_id, status (Line up, On Process, For Interview, For Medical, Deployed)
finance_logs
php
Copy
Edit
id, applicant_id, description, amount, created_at
// e.g., “Si Ryan nagbayad ng chuchu 500”
audit_trails
php
Copy
Edit
id, user_id, action_type (created/updated/deleted), model, model_id, changes, created_at
Use Laravel Observers or spatie/laravel-activitylog.

📁 ADMIN UI STRUCTURE (Blade)
bash
Copy
Edit
resources/views/
├── layouts/
│   └── app.blade.php
├── dashboard.blade.php
├── applicants/
│   └── index/create/edit/show.blade.php
├── job_openings/
├── job_applications/
├── finance/
├── reports/
├── audit_trails/
└── users/
🧩 FEATURES SUMMARY
Module	Actions
Login (admin)	✅ Login only (no register)
Applicants	✅ CRUD + related tables
Job Openings	✅ CRUD, auto-expire logic
Applications	✅ Assign applicants to jobs
Finance Logs	✅ Add payment records
Reports	✅ Filterable reports
Audit Trail	✅ Logged automatically
User Management	✅ Admin adds users manually (optional)



