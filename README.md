### **Banking System with Role-Based Access and Transactions** 🏦💰  

## 🌟 Overview  

The **Banking System** is a web-based application that provides secure and efficient banking operations with **role-based access control**. It allows super admins and admins to manage users, while users (account holders) can perform banking transactions seamlessly.  

🔹 **Multi-role access:** Super Admin, Admin, and User (Account Holder)  
🔹 **Transaction management:** View, add, edit, and delete transactions  
🔹 **User-friendly UI:** Built with Bootstrap and jQuery  
🔹 **Secure Authentication & Authorization**  

---

## 🚀 Features  

### **👑 Role 1: Super Admin**  
✔️ Create multiple **admins** 👨‍💼  
✔️ Manage **admin accounts** (add, edit, delete) 🔄  
✔️ Create multiple **users (account holders)** 🏦  
✔️ Manage **user accounts** (add, edit, delete) 🛠️  

### **🛠️ Role 2: Admin**  
✔️ Create multiple **users (account holders)** 👥  
✔️ Manage **user accounts** (add, edit, delete) 🔄  
✔️ View all **user transactions** 📊  
✔️ New users receive an **initial deposit of ₹5,000** for transactions 💸  
✔️ **Deleting a user** removes their entire transaction history ❌  

### **💳 Role 3: User (Account Holder)**  
✔️ View **account details** 📋  
✔️ View **transaction history (statements)** 📜  
✔️ Make **payments** 💰  
📌 **Login Page URL:** [`/user_login`](#)  

---

## 🛠️ Technologies Used  

| Category         | Technologies |
|-----------------|-------------|
| **Frontend**    | HTML, CSS, JavaScript, jQuery, Bootstrap |
| **Backend**     | PHP, Laravel |
| **Database**    | SQL (MySQL) |

---

## 📸 Screenshots  

| Login Page | Dashboard | Transactions |
|------------|------------|------------|
| ![Login](https://source.unsplash.com/300x200/?login,security) | ![Dashboard](https://source.unsplash.com/300x200/?dashboard,finance) | ![Transactions](https://source.unsplash.com/300x200/?banking,transactions) |

---

## 🎯 How to Run This Project  

1️⃣ **Clone the Repository**  
```bash
git clone https://github.com/Haleema-Fahmitha-K-M/Bank-Transactions-Management.git
cd Bank-Transactions-Management
```

2️⃣ **Set Up Database**  
- Create a database in MySQL  
- Import the provided SQL file  

3️⃣ **Configure Environment Variables**  
- Update `.env` file with database credentials  

4️⃣ **Run the Application**  
```bash
php artisan migrate
php artisan serve
```
- Open the app in the browser at `http://127.0.0.1:8000/`  

---

## 🛡️ Security Measures  

✔️ Secure authentication & session handling  
✔️ Role-based access control (RBAC)  
✔️ SQL injection prevention  
✔️ Password hashing  

---

## 💡 Future Enhancements  

🔹 Implement **Two-Factor Authentication (2FA)**  
🔹 Generate **PDF statements** for users  

---

## 📄 License  

This project is **open-source** and available under the [MIT License](LICENSE).  

---

## 🙌 Acknowledgment 

💻 Developed by [Haleema Fahmitha K M](https://github.com/Haleema-Fahmitha-K-M)  

---

