# Buku Tamu BPS HSU (Guest Book Application)

A web-based guest book and appointment management system designed for **Badan Pusat Statistik (BPS) Hulu Sungai Utara**. This application streamlines the process of tracking visitors, managing appointments with staff, and collecting community satisfaction feedback (IKM).

## Features

### 👥 User Roles
-   **Admin**: Full access to manage users, employees, divisions, and system settings.
-   **Petugas (Officer)**: Manages guest entries and front-desk operations.
-   **Tamu (Guest)**: Can register, request appointments, and view their visit history.

### 🚀 Key Functionalities
-   **Guest Management**: Record and track guest visits (both Online and Offline).
-   **Appointment Scheduling**: Guests can request meetings with specific employees or divisions.
-   **Employee & Division Management**: Manage internal staff profiles and organizational structure.
-   **Reporting System**: Generate comprehensive reports on visitor statistics.
-   **IKM (Indeks Kepuasan Masyarakat)**: Integrated survey system to collect feedback from visitors.
-   **Dashboard**: Visual analytics of visitor trends and appointment statuses.

## 🛠 Tech Stack
-   **Backend**: Native PHP
-   **Database**: MySQL
-   **Frontend**: HTML5, CSS3, JavaScript (jQuery)
-   **Styling**: Bootstrap (Admin Template)

## 📦 Installation Guide

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/Buku-Tamu-BPS.git
    cd Buku-Tamu-BPS
    ```

2.  **Setup Database**
    -   Create a new MySQL database named `db_buku_tamu_bps`.
    -   Import the `database/database.sql` file into your database.

3.  **Configure Connection**
    -   Open `database/koneksi.php` and verify the database credentials.
    -   Default configuration:
        ```php
        $mysqli = new mysqli("localhost", "root", "", "db_buku_tamu_bps");
        ```
    -   Update the username and password if your local setup differs.

4.  **Run the Application**
    -   **Option A (XAMPP/WAMP/MAMP)**: Move the project folder to `htdocs` or `www` directory and access via `http://localhost/Buku-Tamu-BPS`.
    -   **Option B (PHP Built-in Server)**:
        ```bash
        php -S localhost:8000
        ```
        Access via `http://localhost:8000` in your browser.

## 🔑 Default Credentials

| Role    | Username | Password |
| :---    | :---     | :---     |
| Admin   | `admin`  | `admin`  |
| Petugas | `andry`  | `andry`  |
| Tamu    | `arya`   | `arya`   |

> **Note**: It is recommended to change these passwords immediately after deployment.

## 📂 Project Structure
-   `index.php`: Main entry point and routing.
-   `beranda.php`: Dashboard/Home page.
-   `database/`: Database SQL schema and connection file.
-   `assets/`: CSS, JS, Images, and other static assets.
-   `halaman_*/`: Directories containing specific feature modules (e.g., `halaman_auth`, `halaman_buku_tamu`).
-   `templates/`: Reusable UI components (Sidebar, Navbar, Footer).