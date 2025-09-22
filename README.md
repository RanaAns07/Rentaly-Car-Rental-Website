# 🚗 Car Rental Website

A dynamic car rental website that allows users to explore available cars, manage listings via an admin panel, and make bookings. The website is built using **HTML, CSS, JavaScript, and PHP** with a well-structured backend API and **MySQL** database integration.

---

## 📁 Project Structure

📂 car-website/  
│  
├── 📂 admin/  
│   ├── 📂 api/  
│   │   ├── create.php          # API to add a new car  
│   │   ├── update.php          # API to update car details  
│   │   ├── delete.php          # API to delete a car  
│   │   ├── get.php             # API to fetch all cars  
│   │   ├── get_bookings.php    # API to fetch all booking records  
│   │   ├── update_status.php   # API to update booking status  
│   │   └── config.php          # Database connection settings  
│   │  
│   ├── dashboard.php           # Admin panel dashboard  
│   └── login.php               # Admin login page  
│  
├── 📂 uploads/                 # Folder for storing uploaded car images  
│  
├── index.php                   # Homepage  
├── explore.php                 # Cars listing page (fetches cars via API)  
├── booking.php                 # Car booking form page  
├── styles.css                  # External CSS file for styling  
└── README.md                   # Project documentation 



---

### **💡 Features**

#### **User Features**

-   **Dynamic Data Fetching:** Fetches car data from the `get.php` API endpoint.
-   **Car Listing Page:** Displays cars dynamically on `explore.php`.
-   **Interactive Booking Form:** Users can book a car through a dedicated form on `booking.php`.
-   **Responsive Design:** Mobile-friendly design is handled by the external CSS.

#### **Admin Features**

-   **Secure Login:** A dedicated login page for administrators (`admin/login.php`).
-   **Add Cars:** Admins can upload new cars and their details directly to the database.
-   **Edit & Delete:** Admins can update or remove existing car listings.
-   **Booking Tracking:** The admin dashboard displays all booking requests, allowing for easy tracking and management.

---

### **📦 Prerequisites**

-   **PHP:** A server-side scripting language is required to run the backend APIs.
-   **MySQL Database:** A database is necessary to store car and booking information.
-   **Web Server:** A web server like **Apache** or **Nginx** is needed to serve the website files (e.g., XAMPP, MAMP, WAMP).

---

### **🚀 Getting Started**

#### **Installation**

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/RanaAns07/Rentaly-Car-Rental-Website.git
    ```

2.  **Move into the project directory:**
    ```bash
    cd car-website
    ```

3.  **Database Setup:**
    -   Create a new MySQL database (e.g., `car_rental`).
    -   Import the provided SQL schema file to create the necessary tables for cars and bookings.
    -   Update the database connection details in your PHP files to connect to your database.

4.  **Ensure your web server is running:**
    -   For XAMPP, place the project in the `htdocs` folder.
    -   For the built-in PHP server, run:
    ```bash
    php -S localhost:8000
    ```

5.  **Open your browser and navigate to:**
    ```
    http://localhost/car-website/index.php
    ```

---

### **🔧 Usage**

#### **Accessing the Website**

-   **Homepage:** Visit `index.php` to see the main landing page.
-   **Car Listing:** Navigate to `explore.php` to view the dynamically fetched car list.
-   **Booking Form:** Use `booking.php` to access the interactive booking form.

#### **Admin Panel**

-   Access the admin login page at `admin/login.php`.
-   After logging in, you will be redirected to the dashboard at `admin/dashboard.php`, where you can manage car listings and track bookings.

---

### **📄 API Specification**

#### **Get All Cars**

-   **Endpoint:** `http://localhost/car-website/admin/api/get.php`
-   **Method:** `GET`
-   **Response Format:**
    ```json
    {
        "status": "success",
        "data": [
            {
                "car_id": 1,
                "model": "Toyota",
                "daily_rate": "120000.00"
            },
            ...
        ]
    }
    ```

#### **Add a New Car**

-   **Endpoint:** `http://localhost/car-website/admin/api/create.php`
-   **Method:** `POST`
-   **Request Body:** `application/json` with car details (e.g., `model`, `daily_rate`, `seats`, etc.).

#### **Delete a Car**

-   **Endpoint:** `http://localhost/car-website/admin/api/delete.php`
-   **Method:** `POST`
-   **Request Body:** `application/json` with the `car_id` to be deleted.

---

### **🌟 Future Enhancements**

-   **Filtering & Sorting:** Implement advanced search and filter options for cars.
-   **UI/UX Improvements:** Enhance the user interface with modern design patterns and animations.
-   **Payment Gateway Integration:** Securely process payments for car rentals.
-   **User Reviews:** Allow users to leave reviews and ratings for cars they've rented.

---

### **📸 Website Sample Screenshots**

<img width="1343" height="593" alt="image" src="https://github.com/user-attachments/assets/e278ca95-e802-43af-b96c-924e4dedd7b3" />

<img width="1343" height="756" alt="image" src="https://github.com/user-attachments/assets/b3ac6a53-61de-4ded-b71b-c6989ba5beba" />

<img width="1343" height="628" alt="image" src="https://github.com/user-attachments/assets/f19b1645-04a9-4c27-9052-377f7ebf84fc" />

<img width="1336" height="646" alt="image" src="https://github.com/user-attachments/assets/97af16b3-46c1-4fe6-8a12-ffea222fa69c" />

<img width="1344" height="378" alt="image" src="https://github.com/user-attachments/assets/ca7d4ed9-efd9-4cf4-a0c0-7a97a2a78ca4" />

<img width="1342" height="605" alt="image" src="https://github.com/user-attachments/assets/59e137b8-07e5-46e8-ab1c-8bfe01a331f1" />

### **📸 Booking Sample Screenshots**

<img width="1353" height="600" alt="image" src="https://github.com/user-attachments/assets/f241c95d-dcf7-455b-8be4-9fa11d63b0a9" />

<img width="1360" height="601" alt="image" src="https://github.com/user-attachments/assets/4e6967f8-4f20-4df2-8655-17a27863f9d7" />

### **📸 Admin Sample Screenshots**

<img width="1344" height="495" alt="image" src="https://github.com/user-attachments/assets/a4f20971-812b-4eb1-a6aa-38117bdae3c9" />

<img width="1345" height="598" alt="image" src="https://github.com/user-attachments/assets/643a96da-ee64-4e94-a641-7a9a308c35e4" />

<img width="1359" height="601" alt="image" src="https://github.com/user-attachments/assets/0f543ae1-5ae5-445d-b9d0-e28c99a2d6cb" />

### **📸 Board of Directors**

<img width="1340" height="756" alt="image" src="https://github.com/user-attachments/assets/08ab20df-1a35-4752-8a18-aeb2a3c3d929" />

---

### **📜 License**

This project is licensed under the MIT License. Feel free to modify and use it as you wish.

---

### **🤝 Contributing**

Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

### **📞 Contact**

-   **Name:** ranaans.pk@gmail.com
-   **GitHub:** RanaAns07 https://github.com/RanaAns07
