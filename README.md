# 📋 Equipment Request System

## 🎯 Objective
The goal of this project is to create an Equipment Request System where employees from different government branches can submit requests for equipment. The request process involves multiple departments, with digital signatures required from the following stakeholders:
- **Requester**: The person requesting the equipment.
- **Department Leader**: The head of the department that the request originates from.
- **Provider**: The person in charge of providing the equipment.

The system ensures that all necessary approvals are received before the equipment is issued.

## ✨ Features

### 1. 📝 Form Handling
The central feature of the project is the BCII form used to request equipment. The form includes several steps:
- **Step 1: General Information** - Collects personal details such as first name, last name, email, VoIP number, direction, and secretariat.
- **Step 2: Equipment Details** - Allows the requester to specify the equipment they need, including item code, item name, quantity, destination, and justification.
- **Step 3: Review and Digital Signature** - Provides a summary of the request for review and allows for digital signatures.

### 2. ✅ Form Validation
- **Client-side validation**: Utilizes native JavaScript to validate form fields before submission, ensuring that required fields are filled out and that input is in the correct format.
- **Server-side validation**: Data is validated on the server to prevent malicious inputs.

### 3. 📄 PDF Generation
- Generates a PDF document with the filled form data when the "Generate PDF" button is clicked.

### 4. ✍️ Digital Signatures (Upcoming Feature)
- **Signature Fields**: The form includes signature fields for the requester and stakeholders to digitally sign.
- **Signature Validation**: Once all parties sign the form, the request is processed, and the equipment is assigned.
- **ID Card Integration**: Users will be able to pass their ID card, and the signature will be added to the PDF file automatically.

### 5. 🔒 Security Features
- **Session Management**: The system includes security measures to handle session management.
- **CSRF Protection**: CSRF tokens are implemented to protect against cross-site request forgery (CSRF) attacks.
- **Data Encryption**: Sensitive data such as user information is handled securely.

## 🗂️ Project Structure

### Files Explained
- **form/**
  - `main-form.php`: The core form for submitting equipment requests.
- **assets/js/**
  - `manipulate-form.js`: JavaScript used for client-side validation and dynamic form interaction.
- **data/**
  - `db-config.php`: Manages the connection to the MySQL database using PDO.
  - `fetch-secretarias.php`: Fetches secretariat options from the database.
  - `fetch-direcoes.php`: Fetches direction options from the database.
- **security/**
  - `CSRF-token.php`: Manages the generation and validation of CSRF tokens.
- **assets/pdf/**
  - `template.pdf`: The template PDF used for generating the filled form.

## 🛠️ Technologies Used
- **HTML5**: For the structure of the form.
- **CSS3**: Used for styling, animations, and form layout.
- **JavaScript (Native)**: Used for client-side validation, dynamic form interaction, and signature functionality.
- **PHP**: Handles the backend logic, including server-side validation and database interaction using PDO (prepared statements).
- **MySQL**: The relational database used to store user and request data.
- **DBeaver**: A database management tool used to interact with the MySQL database.
- **PDF-Lib**: A JavaScript library used to generate and manipulate PDF documents.

## 🚀 Next Steps
- Implement the digital signature feature with ID card integration.
- Complete server-side validation to ensure that form data is correct before submission.
- Improve the user interface for a smoother experience, especially during the signature phase.

## 🧠 Challenges & Learnings
Throughout the development of this project, key backend and frontend skills have been improved:
- Client-side validation using native JavaScript for a smoother user experience.
- PDO for secure database interactions, including parameter binding and prepared statements to prevent SQL injection.
- Session management and CSRF protection to improve the security of the application.
- Digital signatures: Implementing a way for multiple stakeholders to digitally sign the form as part of the equipment request process.

## TL;DR: Technologies & Code
- **JavaScript**: Used to handle client-side form validation, signature functionality, and dynamic form changes.
- **CSS**: Advanced styling and animation to enhance the form's user interface.
- **PHP**: Used for server-side form handling, including PDO for database access and data validation.
- **MySQL**: The database used for storing user and request data.
- **DBeaver**: Used for managing the MySQL database.
