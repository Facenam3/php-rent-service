🚗 Rent-a-Car Project (Pure PHP)

📌 Overview:

This is a Rent-a-Car system built with pure PHP, following PSR-4 autoloading and a custom MVC structure.
The project reinforces backend fundamentals before transitioning to a Laravel version.
It includes:
- ✅ Google OAuth login & registration
- ✅ Email notifications for user registration & reservations
- ✅ Multi-step reservation flow with Alpine.js
- ✅ Admin panel with reporting & analytics

🎯 Goals :
- ✅ Learn and apply PSR-4 with a custom PHP architecture.
- ✅ Build full CRUD with routing, SQLite, and authentication.
- ✅ Integrate third-party services: Google OAuth & email notifications.
- ✅ Style UI with Tailwind CSS.
- ✅ Use Alpine.js for a multi-step reservation wizard.
- ✅ Practice Git workflows: branching, merging, pull requests.

✨ Features 

🔐 User Authentication :

- Register/login with email & password
- Google OAuth login & registration
- Profile settings (update info, manage credentials)
  
🚘 Car Management :

- List available cars with details & pricing
- Each car includes an image
- Admin panel to manage cars (CRUD)
  
📅 Reservation System :

- Multi-step reservation wizard (pickup/drop-off, car selection, user info, payment method)
- Email confirmation with reservation details
- Only available cars can be reserved (no past dates allowed)
- User dashboard with reservation history
- Admin dashboard with reservation management
  
📧 Email Notifications :

- Welcome email on registration
- Sends a reservation confirmation email
- Stripe card payments (test mode) with success/cancel flows
- Notification emails on user sign-in/register

📊 Admin Panel & Dashboard Analytics:

- Manage cars, users, reservations, and payments
- Reporting system with basic analytics
- Reservation tracking

💳 Payments :
- Stripe test mode integration with success/cancel flows
  
⚙️ Routing & MVC :

- Custom lightweight MVC framework
- PSR-4 autoloading with Composer
  
🎨 Frontend :

- Tailwind CSS for styling
- Alpine.js and JavaScript for reactive UI
- Mobile-friendly user dashboard

💡 Learning Approach
This project was developed while following various online learning resources (Udemy, YouTube, GeeksforGeeks, etc.).
The codebase is customized and authored to fit my own understanding and architecture preferences.
New integrations such as Google OAuth and mailing services were added to explore working with external APIs and improve user experience.

🛠️ Tech Stack :
- PHP 8+
- SQLite (lightweight DB)
- Tailwind CSS
- Alpine.js
- Composer (PSR-4 autoloading)
- PHPMailer (Gmail SMTP for sending emails)
- Google API PHP Client (OAuth authentication)
- Stripe (test mode payments)
- Git + GitHub for version control
- JavaScript / jQuery
