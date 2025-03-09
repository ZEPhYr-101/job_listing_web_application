# CMU Job Recruitment System

## Overview
The **CMU Job Recruitment System** is a web-based platform designed to streamline job postings and applications at CMU. Built with **Laravel, Inertia.js, Vue.js, and Tailwind CSS**, it provides an efficient and user-friendly experience for both job seekers and recruiters.

## Installation Guide

### Step 1: Clone the Repository
Open your terminal and run the following command to clone the project:

```bash
git clone https://github.com/ZEPhYr-101/job_listing_web_application.git
```

### Step 2: Navigate to the Project Directory
```bash
cd job_listing_web_application
```

### Step 3: Install PHP Dependencies
Run the following command to install Laravel dependencies:
```bash
composer update
```

### Step 4: Install JavaScript Dependencies
```bash
npm install
```

### Step 5: Set Up Environment Variables
Copy the example environment file:
```bash
cp .env.example .env
```
Generate the application key:
```bash
php artisan key:generate
```

### Step 6: Set Up the Database
1. Configure your `.env` file with database credentials.
2. Run migrations and seed the database:
```bash
php artisan migrate --seed
```

### Step 7: Run the Development Server
Start the Laravel development server:
```bash
php artisan serve
```

Run Vite for frontend development:
```bash
npm run dev
```

## Technologies Used
- Laravel
- Inertia.js
- Vue.js
- Tailwind CSS

## Contributing
Feel free to contribute by creating pull requests. Make sure to follow best practices and include clear commit messages.

## License
This project is open-source and available under the MIT License.

---
Happy coding! 🚀

