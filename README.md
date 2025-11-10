# 🌾 FarmToExport – Agricultural Export Management System

## 📖 Overview

**FarmToExport** is a full-stack web application designed to manage and export agricultural products.  
The project uses **AngularJS (Frontend)**, **PHP (Backend)**, and **MySQL (Database)** to provide a seamless experience for both users and administrators.

This platform helps farmers and exporters manage products, handle stock levels, view sales, and monitor export operations efficiently.

---

## 🚀 Technologies Used

| Layer | Technology |
|--------|-------------|
| Frontend | AngularJS, HTML5, CSS3, JavaScript |
| Backend | PHP (REST APIs) |
| Database | MySQL |
| Tools | Jenkins (CI/CD), GitHub, AWS/Local Server |
| Charts | Chart.js |
| Version Control | Git |

---

## 🏗️ Architecture Diagram

Here’s the system architecture showing how AngularJS, PHP, and MySQL interact:

![Architecture Diagram](/image/ChatGPT%20Image%20Nov%2010,%202025,%2010_36_49%20PM.png)

**Flow Explanation:**
1. The user interacts with the **AngularJS Frontend** (HTML, CSS, JS).
2. AngularJS sends **HTTP requests** to the **PHP Backend APIs** (in `/api` folder).
3. PHP connects with the **MySQL database** to fetch/store data.
4. Responses are sent back as **JSON** to the AngularJS app for display.

---

## 📂 Project Structure
```
FarmToExport/
│
├── index.html
├── app.js
├── css/
│ └── style.css
├── controllers/
│ ├── homeController.js
│ ├── productController.js
│ ├── productDetailController.js
│ ├── loginController.js
│ ├── registerController.js
│ ├── dashboardController.js
│ ├── cartController.js
│ └── adminController.js
├── services/
│ └── apiService.js
├── api/ # PHP Backend APIs
│ ├── register.php
│ ├── login.php
│ ├── get_categories.php
│ ├── get_subcategories.php
│ ├── get_products.php
│ ├── get_product_detail.php
│ ├── add_review.php
│ ├── get_reviews.php
│ ├── admin_add_product.php
│ ├── admin_update_stock.php
│ └── get_notifications.php
├── screenshots/
│ ├── architecture.png
│ ├── home.png
│ ├── products.png
│ ├── product_detail.png
│ ├── dashboard.png
│ ├── admin.png
│ └── login.png
└── README.md

```

---

## 💾 Database Structure (MySQL)

### Tables

1. **users** – stores user login info  
   `(id, name, email, password, role)`

2. **categories** – stores main product categories  
   `(id, name)`

3. **subcategories** – subcategories linked to categories  
   `(id, category_id, name)`

4. **products** – contains product details  
   `(id, subcategory_id, name, description, price, stock, image)`

5. **reviews** – product reviews and ratings  
   `(id, user_id, product_id, rating, comment, created_at)`

6. **notifications** – alerts for low stock  
   `(id, product_id, message, created_at)`

### Sample Data

| Category | Subcategories | Products |
|-----------|----------------|-----------|
| Vegetables | Onion, Tomato | Red Onion, White Onion |
| Fruits | Mango, Apple | Alphonso Mango, Kashmiri Apple |
| Grains | Wheat, Rice | Basmati Rice, Organic Wheat |
| Spices | Turmeric, Chili | Dry Chili, Organic Turmeric |

---

## ⚙️ Backend APIs (PHP)

| API File | Description |
|-----------|--------------|
| `register.php` | User registration |
| `login.php` | Login (role-based) |
| `get_categories.php` | Fetch all categories |
| `get_subcategories.php` | Fetch subcategories by category |
| `get_products.php` | Fetch products (with filters) |
| `get_product_detail.php?id=` | Product details with related products |
| `add_review.php` | Add user review & rating |
| `get_reviews.php` | Fetch product reviews |
| `admin_add_product.php` | Admin add product with image upload |
| `admin_update_stock.php` | Update product stock |
| `get_notifications.php` | Notify when stock is low |

---

## 👤 User Features

✅ Browse all agricultural products  
✅ Filter and search by category, price, or name  
✅ View product details (image, description, stock, price, ratings)  
✅ Add products to cart  
✅ Submit reviews and ratings  
✅ See related products  
✅ Register and log in to manage profile  

---

## 🧑‍💼 Admin Features

✅ Login as admin  
✅ Add/Edit/Delete categories, subcategories, and products  
✅ Manage users and orders  
✅ View low-stock notifications  
✅ Update stock and product details  
✅ Manage reviews and feedback  

---

## 📊 Frontend (AngularJS)

Key components in `controllers/` and `services/` folders manage:
- Routing and views (`ngRoute`)
- REST API calls (`$http`)
- Chart rendering for analytics (`Chart.js`)
- Dynamic UI binding (`ng-model`, `ng-repeat`, etc.)

---

## 🔐 Authentication Flow

1. User registers → `register.php`
2. Login via `login.php` (returns JWT/session)
3. Role-based access:
   - **User:** can browse & review
   - **Admin:** can manage all data

---

## 🔄 CI/CD Integration (Jenkins)

- Code hosted on **GitHub**
- Jenkins pipeline automates:
  - Code checkout
  - Deployment to EC2 or local server
  - Restart Apache/PHP backend
- Jenkinsfile example is included for automatic deployment

---

## 🖼️ Screenshots

| Page | Screenshot |
|------|-------------|
| 🏠 Home Page | ![Home Screenshot](/image/Screenshot%20(44).png) |
| 🛒 Products Page | ![Products Screenshot](/image/Screenshot%20(50)%20-%20Copy.png) |
| 📦 Product Details | ![Product Details Screenshot](/image/Screenshot%20(52).png) |
| 👤 Dashboard | ![Dashboard Screenshot](/image/Screenshot%20(39).png) | |
| 🔐 Login / Register | ![Login Screenshot](/image/Screenshot%20(41).png) |

---

## ⚡ How to Run the Project

### 🔹 Prerequisites
- Install **XAMPP** or **WAMP**
- Start **Apache** and **MySQL**
- Import the provided SQL file into MySQL
- Place the project folder inside `htdocs/`

### 🔹 Steps
```bash
# 1. Clone the project
git clone https://github.com/vaibhavbhuse42/Angular-Farm-ToExport.git

# 2. Move project to XAMPP's htdocs folder
cd /xampp/htdocs/

# 3. Start Apache and MySQL

# 4. Open browser and run
http://localhost/FarmToExport/

```
## 🧩 Jenkins Deployment Example
pipeline {
    agent any

    environment {
        SSH_CRED = 'farm-export-key'
        SERVER_IP = '13.234.56.78'
        REMOTE_USER = 'ubuntu'
        APP_DIR = '/var/www/html/FarmToExport'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git url: 'https://github.com/vaibhavbhuse42/Angular-Farm-ToExport.git', branch: 'main'
            }
        }

        stage('Deploy to Server') {
            steps {
                sshPublisher(publishers: [
                    sshPublisherDesc(
                        configName: SSH_CRED,
                        transfers: [sshTransfer(
                            sourceFiles: '**',
                            removePrefix: '',
                            remoteDirectory: APP_DIR
                        )]
                    )
                ])
            }
        }

        stage('Restart Apache') {
            steps {
                sshCommand remote: [name: SSH_CRED, host: SERVER_IP, user: REMOTE_USER], command: 'sudo systemctl restart apache2'
            }
        }
    }
}


## 🧾 Conclusion

The FarmToExport system provides an efficient, scalable, and user-friendly solution for managing agricultural exports.
By integrating AngularJS, PHP, and MySQL, the system ensures smooth interaction between users, admins, and the database.
With CI/CD via Jenkins, deployment becomes automated and reliable — making it suitable for both educational and real-world agricultural export use cases.

## 👨‍💻 Developed By

Vaibhav Navnath Bhuse

📧 GitHub Profile

🎓 MCA Student | Full Stack Developer | CI/CD Enthusiast


---
