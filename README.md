# EasySendMail #
The personalized SendMail Script

![ScriptVersion](https://img.shields.io/badge/Script_Version-v1.0-green.svg)
![PHPMailerVersion](https://img.shields.io/badge/PHPMailer_Version-v5.2.16-yellow.svg)
![ScriptLicense](https://img.shields.io/badge/Script_License-MIT-blue.svg)
![PHPMailerLicense](https://img.shields.io/badge/PHPMailer_License-LGPL--2.1-lightgrey.svg)

## About ##

EasySendMail is a personalized script to sending emails directly from your webpage's form. Script uses [PHPMailer](https://github.com/PHPMailer/PHPMailer) library and

## Usage ##

### Personalizing Web Form and JS Script ###
First, you nedd to change a `UserForm Variables` in `sendmail.js` file:

``` javascript
var scriptPath      = 'assets/SendMail/';		  // Path to SendMail Script
var form 	        = $('#contact-form');		  // Contact Form ID
var formMessages    = $('#form-messages');	      // Response containder ID
var formMsgTxt	    = $('#form-messages p');      // Response text containder ID
var clear_button    = $('#clear');				  // Clear Button ID
var inputClass	    = $('.form-control');		  // Input Fields Class
var submitButton    = $('button');				  // Submit Button ID
var loaderContainer = $('#loader');				  // Loader Icon containder ID
```
Then, include a `sendmail.js` file on your webpage, before `body` closing mark.

### Editing PHP Script ###
Next, you need to change a form variables and your SMTP authorize data in `sendmail.php` file. That's all.
## Resources

 * [PHPMailer](https://github.com/PHPMailer/PHPMailer)

## License

The credit comments in the JavaScript file should be kept intact (even after combination or minification )

(The MIT License)

Copyright (c) 2016 Mateusz Kiliński <<mateusz.kilinski@gmail.com>>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## Created by

<p align="center">
<img src="http://c0degeek.pl/Shield.svg" width="200px"/>
</p>
