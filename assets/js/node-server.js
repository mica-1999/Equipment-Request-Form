// filepath: /c:/xampp/htdocs/web-project-form2/server.js
const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

// Middleware to parse JSON and URL-encoded data
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Serve static files from the "form" directory
app.use(express.static(path.join(__dirname, 'form')));

// Route to handle form submission
app.post('/submit-form', (req, res) => {
    // Handle form data here
    console.log(req.body);
    res.send('Form submitted successfully!');
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});