Project#2: Equipment Request System
Objective
The goal of this project is to create an Equipment Request System where employees can submit requests for equipment. The request process involves multiple departments, with digital signatures required from the following stakeholders:

Requester: The person requesting the equipment (must digitally sign the form).
Department Leader: The head of the department that the request originates from (must digitally sign).
Provider: The person in charge of providing the equipment (must digitally sign).
The system ensures that all necessary approvals are received before the equipment is issued.

Features
1. Form Handling
Equipment Request Form: The central feature of the project is the BCII form used to request equipment. The form includes several steps:

Step 1: General information (for the requester).
Step 2: Equipment details (for the requester to specify the equipment they need).
Step 3: Review and digital signature section (for the requester and other stakeholders to sign off on the request).
Form Validation:

Client-side validation: Utilized Native JavaScript to validate form fields before submission (ensuring that required fields are filled out and that input is in the correct format).
Server-side validation: The data is validated on the server to prevent malicious inputs.
2. Database Management
MySQL Database: Data is stored in a MySQL database, including user details, equipment requests, and approval statuses.
DBeaver: Used for database management, allowing easy interaction with the MySQL database to retrieve and store data.
PHP & PDO: PHP handles the server-side logic, with PDO used for secure database interaction (prepared statements, parameter binding).
3. Security Features
Session Management: The system includes security measures to handle session management.
CSRF Protection: CSRF tokens are implemented to protect against cross-site request forgery (CSRF) attacks.
Data Encryption: Sensitive data such as user information is handled securely.
4. Digital Signatures
Signature Fields: The form includes signature fields for the requester and stakeholders to digitally sign.
Signature Validation: Once all parties sign the form, the request is processed, and the equipment is assigned.
Project Structure
Files Explained
forms:
bcii_form.php: The core form for submitting equipment requests.
form_validation.js: JavaScript used for client-side validation of the form.
signature.js: Handles the digital signature functionality.
data:
database_connection.php: Manages the connection to the MySQL database using PDO.
security:
csrf_token.php: Manages the generation and validation of CSRF tokens.
session_management.php: Handles the security features related to session management.
error_log:
error_log.txt: Logs any errors related to the system for debugging purposes.
Technologies Used
HTML5: For the structure of the form.
CSS3: Used for styling, animations, and form layout.
JavaScript (Native): Used for client-side validation, dynamic form interaction, and signature functionality.
PHP: Handles the backend logic, including server-side validation and database interaction using PDO (prepared statements).
MySQL: The relational database used to store user and request data.
DBeaver: A database management tool used to interact with the MySQL database.
Next Steps
Complete Form Validation: Finish server-side validation to ensure that form data is correct before submission.
Implement Equipment Request Signature Flow: Implement the approval flow for multiple stakeholders (department leader, provider).
Improve User Interface: Enhance the user interface for a smoother experience, especially during the signature phase.
Challenges & Learnings
Throughout the development of this project, I have focused on improving key backend and frontend skills:

Client-side validation using Native JavaScript for a smoother user experience.
PDO for secure database interactions, including parameter binding and prepared statements to prevent SQL injection.
Session management and CSRF protection to improve the security of the application.
Digital signatures: Implementing a way for multiple stakeholders to digitally sign the form as part of the equipment request process.
TL;DR: Technologies & Code
JavaScript: Used to handle client-side form validation, signature functionality, and dynamic form changes.
CSS: Advanced styling and animation to enhance the form's user interface.
PHP: Used for server-side form handling, including PDO for database access and data validation.
MySQL: The database used for storing user and request data.
DBeaver: Used for managing the MySQL database.
