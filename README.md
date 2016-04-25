# Easy Email Sending Library using templates, for CodeIgniter<br/><br/>
I create this library to make easier sending emails using templates, with CodeIgniter<br/><br/>
1 - Copy files to respective folders (application/config, application/libraries, application/views) <br/><br/>
2 - In application/config/email_sender.php fill the data with your configuration. In the example i use a Zoho Mail configuration.<br/><br/>
2 - Follow the example in application/controllers/Example.php how to use the library<br/><br/>
3 - Edit files in application/views/emails:<br/>
3.1 - Layout.php is the common file to all email templates like header and footer, which will be loaded for all emails templates
3.2 - test_email.php is an template example, which will be loaded inside Layout.php
