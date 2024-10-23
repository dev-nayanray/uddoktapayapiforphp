
UddoktaPay PHP Integration
This repository contains PHP scripts for integrating the UddoktaPay payment gateway into your web application. It offers functionalities to generate payment URLs, verify payment statuses, and display transaction details.

Contents
functions.php: Core functions for payment processing.
payment.php: Handles payment form submission and redirects users to the payment page.
success.php: Displays payment confirmation and transaction details.
Setup Instructions
Prerequisites
To successfully set up the UddoktaPay integration, ensure you have the following:

PHP 7.2 or higher: Make sure your server environment supports this version or newer.
Web Server: You need a running web server, such as Apache or Nginx.
UddoktaPay API Access: Obtain your API key from UddoktaPay.
Steps to Setup
Clone the Repository

Clone this repository to your local development environment or server:

 
git clone <repository-url>
cd <repository-directory>


Update API Key

Open the functions.php file and locate the section where the API key is defined. Replace the placeholder with your actual UddoktaPay API key:

 
 
$apiKEY = 'YOUR_API_KEY_HERE';
Configure Redirect URLs

In functions.php, update the following URLs to point to your success and cancel pages:

 
'redirect_url' => 'http://yourdomain.com/success.php',
'cancel_url' => 'http://yourdomain.com/failed.php',
Create Payment Form

Create an HTML form to collect payment information. This form should submit to payment.php. Here’s a basic example:

 
<form method="POST" action="payment.php">
    <input type="text" name="cname" placeholder="Full Name" required>
    <input type="email" name="cemail" placeholder="Email" required>
    <input type="number" name="cpayamount" placeholder="Amount" required>
    <input type="text" name="corderID" placeholder="Order ID" required>
    <input type="hidden" name="cID" value="1"> <!-- Example user ID -->
    <button type="submit" name="paynowbtn">Pay Now</button>
</form>
Testing the Integration

Use the sandbox environment provided by UddoktaPay for testing. Ensure all functionalities work correctly by simulating payments and verifying the results.

Deployment

Once you have tested your integration thoroughly, deploy the code to your production environment. Make sure to update the URLs in functions.php to match your live site.

Function Descriptions
pay_url($full_name, $email, $amount, $order_id, $user_id): This function generates a payment URL based on the provided user information and payment details. It returns the payment URL or an error message.

pay_status($invoice_id): This function checks the status of a payment using the provided invoice ID. It returns the payment status response in JSON format or an error message.

Example Usage
Refer to the provided structure in payment.php and success.php for how to handle payment processing and displaying results. Ensure you follow the same pattern to maintain functionality.

Support
For any questions or further assistance, feel free to reach out on Fiverr.

License
This project is open-source and available under the MIT License. You are free to use, modify, and distribute this code in accordance with the terms of the license.
