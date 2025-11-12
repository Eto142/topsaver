<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topsavers Trust Bank - Online Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0a5c5c;
            --primary-light: #0d7a7a;
            --primary-dark: #063e3e;
            --secondary-color: #f8f9fa;
            --accent-color: #ff6b35;
            --light-color: #ffffff;
            --dark-color: #333333;
            --gray-light: #f5f5f5;
            --gray-medium: #e0e0e0;
            --gray-dark: #757575;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --error-color: #dc3545;
            --border-radius: 8px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--gray-light);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .bank-header {
            background-color: var(--light-color);
            color: var(--primary-color);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 10;
            border-bottom: 3px solid var(--primary-color);
        }
        
        .bank-logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        
        .bank-logo img {
            height: 40px;
            width: auto;
        }
        
        .login-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            display: flex;
            align-items: center;
            border: 1px solid var(--primary-color);
        }
        
        .login-link:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .login-link i {
            margin-right: 8px;
        }
        
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 2rem;
            position: relative;
        }
        
        .register-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 900px;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.5s ease;
            overflow: hidden;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .register-header {
            background: linear-gradient(to right, var(--primary-color), var(--primary-light));
            color: white;
            padding: 1.5rem 2rem;
            position: relative;
        }
        
        .register-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .register-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }
        
        .register-progress {
            display: flex;
            background-color: var(--gray-light);
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--gray-medium);
        }
        
        .progress-step {
            display: flex;
            align-items: center;
            flex: 1;
            position: relative;
        }
        
        .progress-step:not(:last-child):after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            height: 2px;
            background-color: var(--gray-medium);
            z-index: 1;
        }
        
        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--gray-medium);
            color: var(--gray-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 0.75rem;
            position: relative;
            z-index: 2;
            transition: var(--transition);
        }
        
        .step-label {
            font-weight: 600;
            color: var(--gray-dark);
            transition: var(--transition);
        }
        
        .progress-step.active .step-number {
            background-color: var(--primary-color);
            color: white;
        }
        
        .progress-step.active .step-label {
            color: var(--primary-color);
        }
        
        .progress-step.completed .step-number {
            background-color: var(--success-color);
            color: white;
        }
        
        .progress-step.completed:after {
            background-color: var(--success-color);
        }
        
        .form-content {
            padding: 2rem;
        }
        
        .form-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .form-section.active {
            display: block;
        }
        
        .section-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 0.95rem;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            box-sizing: border-box;
            background-color: var(--light-color);
        }
        
        .file-input {
            padding: 0.75rem 1rem;
            background-color: var(--gray-light);
            border: 1px dashed var(--gray-medium);
            cursor: pointer;
        }
        
        .file-input:hover {
            border-color: var(--primary-color);
            background-color: var(--secondary-color);
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(10, 92, 92, 0.1);
        }
        
        .form-row {
            display: flex;
            gap: 1.5rem;
        }
        
        .form-col {
            flex: 1;
        }
        
        .password-container {
            position: relative;
        }
        
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray-dark);
            transition: var(--transition);
        }
        
        .toggle-password:hover {
            color: var(--primary-color);
        }
        
        .password-strength {
            height: 5px;
            background-color: var(--gray-medium);
            margin-top: 0.5rem;
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }
        
        .password-strength::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0%;
            background-color: var(--error-color);
            transition: width 0.3s, background-color 0.3s;
        }
        
        .password-strength[data-strength="weak"]::before {
            width: 25%;
            background-color: var(--error-color);
        }
        
        .password-strength[data-strength="medium"]::before {
            width: 50%;
            background-color: var(--warning-color);
        }
        
        .password-strength[data-strength="good"]::before {
            width: 75%;
            background-color: #17a2b8;
        }
        
        .password-strength[data-strength="strong"]::before {
            width: 100%;
            background-color: var(--success-color);
        }
        
        .password-strength-text {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            text-align: right;
            font-weight: 500;
        }
        
        .password-strength-text.weak {
            color: var(--error-color);
        }
        
        .password-strength-text.medium {
            color: var(--warning-color);
        }
        
        .password-strength-text.good {
            color: #17a2b8;
        }
        
        .password-strength-text.strong {
            color: var(--success-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            min-height: 1rem;
            font-weight: 500;
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-medium);
        }
        
        .btn {
            padding: 0.85rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(10, 92, 92, 0.3);
        }
        
        .btn-secondary {
            background-color: var(--gray-light);
            color: var(--dark-color);
            border: 1px solid var(--gray-medium);
        }
        
        .btn-secondary:hover {
            background-color: var(--gray-medium);
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .login-prompt {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--gray-dark);
            font-size: 0.95rem;
        }
        
        .login-prompt a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
        }
        
        .login-prompt a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }
        
        .login-prompt a:hover::after {
            width: 100%;
        }
        
        .security-tips {
            margin-top: 2rem;
            padding: 1.25rem;
            background-color: var(--gray-light);
            border-radius: var(--border-radius);
            font-size: 0.85rem;
            border-left: 4px solid var(--accent-color);
        }
        
        .security-tips h3 {
            margin-top: 0;
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        
        .security-tips h3 i {
            margin-right: 8px;
            color: var(--accent-color);
        }
        
        .security-tips ul {
            padding-left: 1.5rem;
            margin-bottom: 0;
        }
        
        .security-tips li {
            margin-bottom: 0.5rem;
            position: relative;
        }
        
        .security-tips li::before {
            content: '•';
            color: var(--accent-color);
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        
        footer {
            background-color: var(--primary-dark);
            color: white;
            text-align: center;
            padding: 1.25rem;
            font-size: 0.85rem;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(to right, var(--accent-color), var(--primary-light));
        }
        
        /* Custom select styling */
        .form-group select {
            appearance: none;
            background: url("data:image/svg+xml;utf8,<svg fill='%230a5c5c' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>") no-repeat right 12px center/16px;
            background-color: var(--light-color);
            padding-right: 36px;
        }
        
        /* Date input styling */
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
        
        /* Profile Picture Step Styling */
        .upload-container {
            text-align: center;
            padding: 2rem;
            border: 2px dashed var(--gray-medium);
            border-radius: var(--border-radius);
            background-color: var(--gray-light);
            margin-bottom: 2rem;
            transition: var(--transition);
        }
        
        .upload-container:hover {
            border-color: var(--primary-color);
            background-color: var(--secondary-color);
        }
        
        .upload-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .upload-text {
            margin-bottom: 1.5rem;
            color: var(--dark-color);
        }
        
        .file-input-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-input-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
        }
        
        .file-input-button:hover {
            background-color: var(--primary-light);
        }
        
        .file-name {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: var(--gray-dark);
        }
        
        .preview-container {
            margin-top: 2rem;
            text-align: center;
        }
        
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 50%;
            border: 3px solid var(--primary-color);
            object-fit: cover;
        }
        
        .preview-placeholder {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: var(--gray-light);
            border: 3px dashed var(--gray-medium);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: var(--gray-dark);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 1rem;
            }
            
            .register-progress {
                flex-direction: column;
                gap: 1rem;
            }
            
            .progress-step:not(:last-child):after {
                display: none;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .register-container {
                padding: 0;
            }
            
            .form-content {
                padding: 1.5rem;
            }
            
            .bank-header {
                padding: 0.75rem 1rem;
            }
            
            .main-container {
                padding: 1rem;
            }
            
            .upload-container {
                padding: 1.5rem;
            }
        }
        
        /* Animation for form elements */
        .form-group {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        
        /* Add delay to form group animations */
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .form-group:nth-child(7) { animation-delay: 0.7s; }
        .form-group:nth-child(8) { animation-delay: 0.8s; }
        .form-group:nth-child(9) { animation-delay: 0.9s; }
        .form-group:nth-child(10) { animation-delay: 1s; }
        
        /* Terms and conditions styling */
        .terms-container {
            max-height: 200px;
            overflow-y: auto;
            padding: 1rem;
            border: 1px solid var(--gray-medium);
            border-radius: var(--border-radius);
            background-color: var(--gray-light);
            margin-bottom: 1rem;
            font-size: 0.85rem;
            line-height: 1.5;
        }
        
        .terms-container h4 {
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }
        
        .terms-container p {
            margin-bottom: 1rem;
        }
        
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .checkbox-group input {
            margin-right: 10px;
            margin-top: 3px;
        }
        
        .checkbox-group label {
            font-weight: normal;
            line-height: 1.4;
        }
        
        /* Next of Kin specific styles */
        .relationship-group {
            display: flex;
            gap: 1rem;
        }
        
        .relationship-group .form-col:first-child {
            flex: 2;
        }
        
        .relationship-group .form-col:last-child {
            flex: 1;
        }
        
        .section-subtitle {
            color: var(--primary-dark);
            font-size: 1.1rem;
            margin: 1.5rem 0 1rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--gray-medium);
        }
    </style>
</head>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '400579ce64e0abc3d4c0be6882ce7b545d338a5c';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
<body>
    <header class="bank-header">
        <div class="bank-logo">
            <i class="fas fa-university" style="font-size: 2rem; margin-right: 10px;"></i>
             <a class="navbar-brand" href="/">
                            <img class="logo-light" src="home/asset/img/logo.png" alt="logo" width="160">
                           
                        </a>
        </div>
        <a href="{{ route('login') }}" class="login-link">
            <i class="fas fa-sign-in-alt"></i> Sign In
        </a>
    </header>
    
    <div class="main-container">
        <div class="register-container">
            <div class="register-header">
                <h2>Open Your Online Banking Account</h2>
                <p>Secure, fast, and convenient banking at your fingertips</p>
            </div>
            
            <div class="register-progress">
                <div class="progress-step active" data-step="1">
                    <div class="step-number">1</div>
                    <div class="step-label">Personal Info</div>
                </div>
                <div class="progress-step" data-step="2">
                    <div class="step-number">2</div>
                    <div class="step-label">Account Details</div>
                </div>
                <div class="progress-step" data-step="3">
                    <div class="step-number">3</div>
                    <div class="step-label">Next of Kin</div>
                </div>
                <div class="progress-step" data-step="4">
                    <div class="step-number">4</div>
                    <div class="step-label">Security Setup</div>
                </div>
                <div class="progress-step" data-step="5">
                    <div class="step-number">5</div>
                    <div class="step-label">Profile Picture</div>
                </div>
                <div class="progress-step" data-step="6">
                    <div class="step-number">6</div>
                    <div class="step-label">Review & Submit</div>
                </div>
            </div>
            
            <form method="POST" action="{{ route('register') }}" id="registrationForm" enctype="multipart/form-data">
                @csrf
                
                <div class="form-content">
                    <!-- Step 1: Personal Information -->
                    <div class="form-section active" id="step-1">
                        <h3 class="section-title">Personal Information</h3>
                        
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required maxlength="100" id="name" placeholder="Enter First Name">
                            <div class="error-message">
                                @error('first_name') {{ $message }} @enderror
                            </div>
                        </div>


                         <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required maxlength="100" id="name" placeholder="Enter Last Name">
                            <div class="error-message">
                                @error('last_name') {{ $message }} @enderror
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required id="email" placeholder="Your email address">
                                    <div class="error-message">
                                        @error('email') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-col">
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input 
            type="number" 
            name="phone" 
            value="{{ old('phone') }}" 
            required 
            id="phone" 
            placeholder="Enter phone number "
        >
        <div class="error-message">
            @error('phone') {{ $message }} @enderror
        </div>
    </div>
</div>
</div>


                        <div class="form-col">
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
            <option value="" disabled selected>Select gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        <div class="error-message">
            @error('gender') {{ $message }} @enderror
        </div>
    </div>
</div>

                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" required id="dob" max="{{ date('Y-m-d', strtotime('-18 years')) }}">
                                    <div class="error-message">
                                        @error('dob') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>

                            
                          <div class="form-col"> 
    <div class="form-group">
        <label for="country">Country of Residence</label>
        <select name="country" id="country" required>
            <option value="" disabled {{ old('country') ? '' : 'selected' }}>Select country</option>
            <option value="Afghanistan" {{ old('country') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
            <option value="Aland Islands" {{ old('country') == 'Aland Islands' ? 'selected' : '' }}>Aland Islands</option>
            <option value="Albania" {{ old('country') == 'Albania' ? 'selected' : '' }}>Albania</option>
            <option value="Algeria" {{ old('country') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
            <option value="American Samoa" {{ old('country') == 'American Samoa' ? 'selected' : '' }}>American Samoa</option>
            <option value="Andorra" {{ old('country') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
            <option value="Angola" {{ old('country') == 'Angola' ? 'selected' : '' }}>Angola</option>
            <option value="Anguilla" {{ old('country') == 'Anguilla' ? 'selected' : '' }}>Anguilla</option>
            <option value="Antarctica" {{ old('country') == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
            <option value="Antigua and Barbuda" {{ old('country') == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
            <option value="Argentina" {{ old('country') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
            <option value="Armenia" {{ old('country') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
            <option value="Aruba" {{ old('country') == 'Aruba' ? 'selected' : '' }}>Aruba</option>
            <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
            <option value="Austria" {{ old('country') == 'Austria' ? 'selected' : '' }}>Austria</option>
            <option value="Azerbaijan" {{ old('country') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
            <option value="Bahamas" {{ old('country') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
            <option value="Bahrain" {{ old('country') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
            <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
            <option value="Barbados" {{ old('country') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
            <option value="Belarus" {{ old('country') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
            <option value="Belgium" {{ old('country') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
            <option value="Belize" {{ old('country') == 'Belize' ? 'selected' : '' }}>Belize</option>
            <option value="Benin" {{ old('country') == 'Benin' ? 'selected' : '' }}>Benin</option>
            <option value="Bermuda" {{ old('country') == 'Bermuda' ? 'selected' : '' }}>Bermuda</option>
            <option value="Bhutan" {{ old('country') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
            <option value="Bolivia" {{ old('country') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
            <option value="Bosnia and Herzegovina" {{ old('country') == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
            <option value="Botswana" {{ old('country') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
            <option value="Brazil" {{ old('country') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
            <option value="Brunei Darussalam" {{ old('country') == 'Brunei Darussalam' ? 'selected' : '' }}>Brunei Darussalam</option>
            <option value="Bulgaria" {{ old('country') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
            <option value="Burkina Faso" {{ old('country') == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
            <option value="Burundi" {{ old('country') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
            <option value="Cabo Verde" {{ old('country') == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
            <option value="Cambodia" {{ old('country') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
            <option value="Cameroon" {{ old('country') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
            <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
            <option value="Central African Republic" {{ old('country') == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
            <option value="Chad" {{ old('country') == 'Chad' ? 'selected' : '' }}>Chad</option>
            <option value="Chile" {{ old('country') == 'Chile' ? 'selected' : '' }}>Chile</option>
            <option value="China" {{ old('country') == 'China' ? 'selected' : '' }}>China</option>
            <option value="Colombia" {{ old('country') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
            <option value="Comoros" {{ old('country') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
            <option value="Congo" {{ old('country') == 'Congo' ? 'selected' : '' }}>Congo</option>
            <option value="Congo, Democratic Republic of the Congo" {{ old('country') == 'Congo, Democratic Republic of the Congo' ? 'selected' : '' }}>Congo, Democratic Republic of the Congo</option>
            <option value="Costa Rica" {{ old('country') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
            <option value="Croatia" {{ old('country') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
            <option value="Cuba" {{ old('country') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
            <option value="Cyprus" {{ old('country') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
            <option value="Czech Republic" {{ old('country') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
            <option value="Denmark" {{ old('country') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
            <option value="Djibouti" {{ old('country') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
            <option value="Dominica" {{ old('country') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
            <option value="Dominican Republic" {{ old('country') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
            <option value="Ecuador" {{ old('country') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
            <option value="Egypt" {{ old('country') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
            <option value="El Salvador" {{ old('country') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
            <option value="Equatorial Guinea" {{ old('country') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
            <option value="Eritrea" {{ old('country') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
            <option value="Estonia" {{ old('country') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
            <option value="Eswatini" {{ old('country') == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
            <option value="Ethiopia" {{ old('country') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
            <option value="Fiji" {{ old('country') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
            <option value="Finland" {{ old('country') == 'Finland' ? 'selected' : '' }}>Finland</option>
            <option value="France" {{ old('country') == 'France' ? 'selected' : '' }}>France</option>
            <option value="Gabon" {{ old('country') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
            <option value="Gambia" {{ old('country') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
            <option value="Georgia" {{ old('country') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
            <option value="Germany" {{ old('country') == 'Germany' ? 'selected' : '' }}>Germany</option>
            <option value="Ghana" {{ old('country') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
            <option value="Greece" {{ old('country') == 'Greece' ? 'selected' : '' }}>Greece</option>
            <option value="Greenland" {{ old('country') == 'Greenland' ? 'selected' : '' }}>Greenland</option>
            <option value="Grenada" {{ old('country') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
            <option value="Guatemala" {{ old('country') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
            <option value="Guinea" {{ old('country') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
            <option value="Guinea-Bissau" {{ old('country') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
            <option value="Guyana" {{ old('country') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
            <option value="Haiti" {{ old('country') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
            <option value="Honduras" {{ old('country') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
            <option value="Hungary" {{ old('country') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
            <option value="Iceland" {{ old('country') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
            <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
            <option value="Indonesia" {{ old('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
            <option value="Iran" {{ old('country') == 'Iran' ? 'selected' : '' }}>Iran</option>
            <option value="Iraq" {{ old('country') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
            <option value="Ireland" {{ old('country') == 'Ireland' ? 'selected' : '' }}>Ireland</option>
            <option value="Israel" {{ old('country') == 'Israel' ? 'selected' : '' }}>Israel</option>
            <option value="Italy" {{ old('country') == 'Italy' ? 'selected' : '' }}>Italy</option>
            <option value="Jamaica" {{ old('country') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
            <option value="Japan" {{ old('country') == 'Japan' ? 'selected' : '' }}>Japan</option>
            <option value="Jordan" {{ old('country') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
            <option value="Kazakhstan" {{ old('country') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
            <option value="Kenya" {{ old('country') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
            <option value="Kiribati" {{ old('country') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
            <option value="Kuwait" {{ old('country') == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
            <option value="Kyrgyzstan" {{ old('country') == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
            <option value="Laos" {{ old('country') == 'Laos' ? 'selected' : '' }}>Laos</option>
            <option value="Latvia" {{ old('country') == 'Latvia' ? 'selected' : '' }}>Latvia</option>
            <option value="Lebanon" {{ old('country') == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
            <option value="Lesotho" {{ old('country') == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
            <option value="Liberia" {{ old('country') == 'Liberia' ? 'selected' : '' }}>Liberia</option>
            <option value="Libya" {{ old('country') == 'Libya' ? 'selected' : '' }}>Libya</option>
            <option value="Liechtenstein" {{ old('country') == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
            <option value="Lithuania" {{ old('country') == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
            <option value="Luxembourg" {{ old('country') == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
            <option value="Madagascar" {{ old('country') == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
            <option value="Malawi" {{ old('country') == 'Malawi' ? 'selected' : '' }}>Malawi</option>
            <option value="Malaysia" {{ old('country') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
            <option value="Maldives" {{ old('country') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
            <option value="Mali" {{ old('country') == 'Mali' ? 'selected' : '' }}>Mali</option>
            <option value="Malta" {{ old('country') == 'Malta' ? 'selected' : '' }}>Malta</option>
            <option value="Marshall Islands" {{ old('country') == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
            <option value="Mauritania" {{ old('country') == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
            <option value="Mauritius" {{ old('country') == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
            <option value="Mexico" {{ old('country') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
            <option value="Micronesia" {{ old('country') == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
            <option value="Moldova" {{ old('country') == 'Moldova' ? 'selected' : '' }}>Moldova</option>
            <option value="Monaco" {{ old('country') == 'Monaco' ? 'selected' : '' }}>Monaco</option>
            <option value="Mongolia" {{ old('country') == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
            <option value="Montenegro" {{ old('country') == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
            <option value="Morocco" {{ old('country') == 'Morocco' ? 'selected' : '' }}>Morocco</option>
            <option value="Mozambique" {{ old('country') == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
            <option value="Myanmar" {{ old('country') == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
            <option value="Namibia" {{ old('country') == 'Namibia' ? 'selected' : '' }}>Namibia</option>
            <option value="Nauru" {{ old('country') == 'Nauru' ? 'selected' : '' }}>Nauru</option>
            <option value="Nepal" {{ old('country') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
            <option value="Netherlands" {{ old('country') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
            <option value="New Zealand" {{ old('country') == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
            <option value="Nicaragua" {{ old('country') == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
            <option value="Niger" {{ old('country') == 'Niger' ? 'selected' : '' }}>Niger</option>
            <option value="Nigeria" {{ old('country') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
            <option value="North Korea" {{ old('country') == 'North Korea' ? 'selected' : '' }}>North Korea</option>
            <option value="North Macedonia" {{ old('country') == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
            <option value="Norway" {{ old('country') == 'Norway' ? 'selected' : '' }}>Norway</option>
            <option value="Oman" {{ old('country') == 'Oman' ? 'selected' : '' }}>Oman</option>
            <option value="Pakistan" {{ old('country') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
            <option value="Palau" {{ old('country') == 'Palau' ? 'selected' : '' }}>Palau</option>
            <option value="Palestine" {{ old('country') == 'Palestine' ? 'selected' : '' }}>Palestine</option>
            <option value="Panama" {{ old('country') == 'Panama' ? 'selected' : '' }}>Panama</option>
            <option value="Papua New Guinea" {{ old('country') == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
            <option value="Paraguay" {{ old('country') == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
            <option value="Peru" {{ old('country') == 'Peru' ? 'selected' : '' }}>Peru</option>
            <option value="Philippines" {{ old('country') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
            <option value="Poland" {{ old('country') == 'Poland' ? 'selected' : '' }}>Poland</option>
            <option value="Portugal" {{ old('country') == 'Portugal' ? 'selected' : '' }}>Portugal</option>
            <option value="Qatar" {{ old('country') == 'Qatar' ? 'selected' : '' }}>Qatar</option>
            <option value="Romania" {{ old('country') == 'Romania' ? 'selected' : '' }}>Romania</option>
            <option value="Russia" {{ old('country') == 'Russia' ? 'selected' : '' }}>Russia</option>
            <option value="Rwanda" {{ old('country') == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
            <option value="Saint Kitts and Nevis" {{ old('country') == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
            <option value="Saint Lucia" {{ old('country') == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
            <option value="Saint Vincent and the Grenadines" {{ old('country') == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
            <option value="Samoa" {{ old('country') == 'Samoa' ? 'selected' : '' }}>Samoa</option>
            <option value="San Marino" {{ old('country') == 'San Marino' ? 'selected' : '' }}>San Marino</option>
            <option value="Sao Tome and Principe" {{ old('country') == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
            <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
            <option value="Senegal" {{ old('country') == 'Senegal' ? 'selected' : '' }}>Senegal</option>
            <option value="Serbia" {{ old('country') == 'Serbia' ? 'selected' : '' }}>Serbia</option>
            <option value="Seychelles" {{ old('country') == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
            <option value="Sierra Leone" {{ old('country') == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
            <option value="Singapore" {{ old('country') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
            <option value="Slovakia" {{ old('country') == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
            <option value="Slovenia" {{ old('country') == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
            <option value="Solomon Islands" {{ old('country') == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
            <option value="Somalia" {{ old('country') == 'Somalia' ? 'selected' : '' }}>Somalia</option>
            <option value="South Africa" {{ old('country') == 'South Africa' ? 'selected' : '' }}>South Africa</option>
            <option value="South Korea" {{ old('country') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
            <option value="South Sudan" {{ old('country') == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
            <option value="Spain" {{ old('country') == 'Spain' ? 'selected' : '' }}>Spain</option>
            <option value="Sri Lanka" {{ old('country') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
            <option value="Sudan" {{ old('country') == 'Sudan' ? 'selected' : '' }}>Sudan</option>
            <option value="Suriname" {{ old('country') == 'Suriname' ? 'selected' : '' }}>Suriname</option>
            <option value="Sweden" {{ old('country') == 'Sweden' ? 'selected' : '' }}>Sweden</option>
            <option value="Switzerland" {{ old('country') == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
            <option value="Syria" {{ old('country') == 'Syria' ? 'selected' : '' }}>Syria</option>
            <option value="Taiwan" {{ old('country') == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
            <option value="Tajikistan" {{ old('country') == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
            <option value="Tanzania" {{ old('country') == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
            <option value="Thailand" {{ old('country') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
            <option value="Timor-Leste" {{ old('country') == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
            <option value="Togo" {{ old('country') == 'Togo' ? 'selected' : '' }}>Togo</option>
            <option value="Tonga" {{ old('country') == 'Tonga' ? 'selected' : '' }}>Tonga</option>
            <option value="Trinidad and Tobago" {{ old('country') == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
            <option value="Tunisia" {{ old('country') == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
            <option value="Turkey" {{ old('country') == 'Turkey' ? 'selected' : '' }}>Turkey</option>
            <option value="Turkmenistan" {{ old('country') == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
            <option value="Tuvalu" {{ old('country') == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
            <option value="Uganda" {{ old('country') == 'Uganda' ? 'selected' : '' }}>Uganda</option>
            <option value="Ukraine" {{ old('country') == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
            <option value="United Arab Emirates" {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
            <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
            <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
            <option value="Uruguay" {{ old('country') == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
            <option value="Uzbekistan" {{ old('country') == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
            <option value="Vanuatu" {{ old('country') == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
            <option value="Vatican City" {{ old('country') == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
            <option value="Venezuela" {{ old('country') == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
            <option value="Vietnam" {{ old('country') == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
            <option value="Yemen" {{ old('country') == 'Yemen' ? 'selected' : '' }}>Yemen</option>
            <option value="Zambia" {{ old('country') == 'Zambia' ? 'selected' : '' }}>Zambia</option>
            <option value="Zimbabwe" {{ old('country') == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
        </select>
        <div class="error-message">
            @error('country') {{ $message }} @enderror
        </div>
    </div>
</div>

                        </div>
                        
                        <div class="form-actions">
                            <div></div> <!-- Empty div for spacing -->
                            <button type="button" class="btn btn-primary next-step" data-next="2">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 2: Account Details -->
                    <div class="form-section" id="step-2">
                        <h3 class="section-title">Account Details</h3>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="account_type">Account Type</label>
                                    <select name="account_type" id="account_type" required>
                                        <option value="">Select Account Type</option>
                                        <option value="savings" {{ old('account_type') == 'savings' ? 'selected' : '' }}>Savings Account</option>
                                         <option value="joint" {{ old('account_type') == 'joint' ? 'selected' : '' }}>Joint Account</option>
                                        <option value="checking" {{ old('account_type') == 'checking' ? 'selected' : '' }}>Checking Account</option>
                                        <option value="business" {{ old('account_type') == 'business' ? 'selected' : '' }}>Business Account</option>
                                    </select>
                                    <div class="error-message">
                                        @error('account_type') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="currency">Preferred Currency</label>
                                    <select name="currency" id="currency" required>
                                       <option value="$" @if(old('currency') == '$') selected @endif>$ (US Dollar)</option>
    <option value="€" @if(old('currency') == '€') selected @endif>€ (Euro)</option>
    <option value="£" @if(old('currency') == '£') selected @endif>£ (British Pound)</option>
    <option value="¥" @if(old('currency') == '¥') selected @endif>¥ (Japanese Yen)</option>
    <option value="₩" @if(old('currency') == '₩') selected @endif>₩ (South Korean Won)</option>
    <option value="₺" @if(old('currency') == '₺') selected @endif>₺ (Turkish Lira)</option>
    <option value="₹" @if(old('currency') == '₹') selected @endif>₹ (Indian Rupee)</option>
    <option value="A$" @if(old('currency') == 'A$') selected @endif>A$ (Australian Dollar)</option>
    <option value="C$" @if(old('currency') == 'C$') selected @endif>C$ (Canadian Dollar)</option>
    <option value="CHF" @if(old('currency') == 'CHF') selected @endif>CHF (Swiss Franc)</option>
    <option value="NZ$" @if(old('currency') == 'NZ$') selected @endif>NZ$ (New Zealand Dollar)</option>
    <option value="SGD" @if(old('currency') == 'SGD') selected @endif>SGD (Singapore Dollar)</option>
    <option value="HK$" @if(old('currency') == 'HK$') selected @endif>HK$ (Hong Kong Dollar)</option>
    <option value="MX$" @if(old('currency') == 'MX$') selected @endif>MX$ (Mexican Peso)</option>
    <option value="R$" @if(old('currency') == 'R$') selected @endif>R$ (Brazilian Real)</option>
    <option value="ZAR" @if(old('currency') == 'ZAR') selected @endif>ZAR (South African Rand)</option>
    <option value="฿" @if(old('currency') == '฿') selected @endif>฿ (Thai Baht)</option>
    <option value="₦" @if(old('currency') == '₦') selected @endif>₦ (Nigerian Naira)</option>
    <option value="₫" @if(old('currency') == '₫') selected @endif>₫ (Vietnamese Dong)</option>
    <option value="₱" @if(old('currency') == '₱') selected @endif>₱ (Philippine Peso)</option>
    <option value="₡" @if(old('currency') == '₡') selected @endif>₡ (Costa Rican Colón)</option>
    <option value="₲" @if(old('currency') == '₲') selected @endif>₲ (Paraguayan Guaraní)</option>
    <option value="₴" @if(old('currency') == '₴') selected @endif>₴ (Ukrainian Hryvnia)</option>
    <option value="₪" @if(old('currency') == '₪') selected @endif>₪ (Israeli Shekel)</option>
    <option value="₸" @if(old('currency') == '₸') selected @endif>₸ (Kazakhstani Tenge)</option>
    <option value="₺" @if(old('currency') == '₺') selected @endif>₺ (Turkish Lira)</option>
    <option value="R" @if(old('currency') == 'R') selected @endif>R (South African Rand)</option>
    <option value="kr" @if(old('currency') == 'kr') selected @endif>kr (Swedish / Norwegian Krona)</option>
    <option value="Kč" @if(old('currency') == 'Kč') selected @endif>Kč (Czech Koruna)</option>
    <option value="₾" @if(old('currency') == '₾') selected @endif>₾ (Georgian Lari)</option>
    <option value="₨" @if(old('currency') == '₨') selected @endif>₨ (Pakistani / Sri Lankan / Nepalese Rupee)</option>
    <option value="₮" @if(old('currency') == '₮') selected @endif>₮ (Mongolian Tögrög)</option>
    <option value="₼" @if(old('currency') == '₼') selected @endif>₼ (Azerbaijani Manat)</option>
    <option value="₤" @if(old('currency') == '₤') selected @endif>₤ (Italian Lira)</option>
    <option value="₳" @if(old('currency') == '₳') selected @endif>₳ (Argentine Austral)</option>
    <option value="₥" @if(old('currency') == '₥') selected @endif>₥ (Mill)</option>
    <option value="₯" @if(old('currency') == '₯') selected @endif>₯ (Greek Drachma)</option>
    <option value="₰" @if(old('currency') == '₰') selected @endif>₰ (German Pfennig)</option>
                                    </select>
                                    <div class="error-message">
                                        @error('currency') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>How did you hear about us?</label>
                            <select name="referral_source" id="referral_source">
                                <option value="">Select an option</option>
                                <option value="friend">Friend or Family</option>
                                <option value="online">Online Search</option>
                                <option value="social">Social Media</option>
                                <option value="advertisement">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="1">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="button" class="btn btn-primary next-step" data-next="3">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 3: Next of Kin Information -->
                    <div class="form-section" id="step-3">
                        <h3 class="section-title">Next of Kin Information</h3>
                        <p style="margin-bottom: 1.5rem; color: var(--gray-dark); font-size: 0.95rem;">
                            Please provide details of your next of kin. This information is required for account security and emergency contact purposes.
                        </p>
                        
                        <div class="form-group">
                            <label for="kin_full_name">Full Name</label>
                            <input type="text" name="kin_full_name" value="{{ old('kin_full_name') }}" required id="kin_full_name" placeholder="Next of kin's full legal name">
                            <div class="error-message">
                                @error('kin_full_name') {{ $message }} @enderror
                            </div>
                        </div>
                        
                        <div class="relationship-group">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="kin_relationship">Relationship</label>
                                    <select name="kin_relationship" id="kin_relationship" required>
                                        <option value="">Select Relationship</option>
                                        <option value="spouse" {{ old('kin_relationship') == 'spouse' ? 'selected' : '' }}>Spouse</option>
                                        <option value="parent" {{ old('kin_relationship') == 'parent' ? 'selected' : '' }}>Parent</option>
                                        <option value="child" {{ old('kin_relationship') == 'child' ? 'selected' : '' }}>Child</option>
                                        <option value="sibling" {{ old('kin_relationship') == 'sibling' ? 'selected' : '' }}>Sibling</option>
                                        <option value="other_relative" {{ old('kin_relationship') == 'other_relative' ? 'selected' : '' }}>Other Relative</option>
                                        <option value="friend" {{ old('kin_relationship') == 'friend' ? 'selected' : '' }}>Friend</option>
                                    </select>
                                    <div class="error-message">
                                        @error('kin_relationship') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="kin_phone">Phone Number</label>
                                    <input type="tel" name="kin_phone" value="{{ old('kin_phone') }}" required id="kin_phone" placeholder="Next of kin's phone number">
                                    <div class="error-message">
                                        @error('kin_phone') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="kin_email">Email Address</label>
                            <input type="email" name="kin_email" value="{{ old('kin_email') }}" id="kin_email" placeholder="Next of kin's email address (optional)">
                            <div class="error-message">
                                @error('kin_email') {{ $message }} @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="kin_address">Residential Address</label>
                            <textarea name="kin_address" id="kin_address" rows="3" placeholder="Next of kin's complete residential address" required>{{ old('kin_address') }}</textarea>
                            <div class="error-message">
                                @error('kin_address') {{ $message }} @enderror
                            </div>
                        </div>
                        
                        <div class="security-tips">
                            <h3><i class="fas fa-info-circle"></i> Important Note</h3>
                            <ul>
                                <li>Your next of kin will be contacted only in emergency situations</li>
                                <li>Ensure the contact information provided is accurate and up-to-date</li>
                                <li>You can update this information anytime through your online banking portal</li>
                            </ul>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="2">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="button" class="btn btn-primary next-step" data-next="4">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 4: Security Setup -->
                    <div class="form-section" id="step-4">
                        <h3 class="section-title">Security Setup</h3>
                        
                        <div class="form-group">
                            <label for="password">Create Password</label>
                            <div class="password-container">
                                <input type="password" name="password" autocomplete="new-password" required id="password" placeholder="Minimum 8 characters with uppercase, lowercase, and number">
                                <span class="toggle-password" data-target="password">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                            <div class="password-strength" id="password-strength" data-strength="weak"></div>
                            <div class="password-strength-text" id="password-strength-text">Password Strength: Weak</div>
                            <div class="error-message">
                                @error('password') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="password-container">
                                <input type="password" name="password_confirmation" required id="password_confirmation" placeholder="Re-enter your password">
                                <span class="toggle-password" data-target="password_confirmation">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                            <div class="error-message">
                                @error('password_confirmation') {{ $message }} @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="transaction_pin">Transaction PIN</label>
                            <div class="password-container">
                                <input 
                                    type="password" 
                                    name="transaction_pin" 
                                    value="{{ old('transaction_pin') }}" 
                                    required 
                                    id="transaction_pin" 
                                    placeholder="Enter 4 digit PIN" 
                                    maxlength="6"
                                    pattern="[0-9]{4,6}"
                                    title="Please enter a 4 digit numeric PIN"
                                    autocomplete="off"
                                >
                                <span class="toggle-password" data-target="transaction_pin">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                            <div class="error-message">
                                @error('transaction_pin') {{ $message }} @enderror
                            </div>
                        </div>
                        
                        <div class="security-tips">
                            <h3><i class="fas fa-shield-alt"></i> Security Tips:</h3>
                            <ul>
                                <li>Never share your password or PIN with anyone, including bank employees</li>
                                <li>Create a strong password with uppercase, lowercase, numbers and special characters</li>
                                <li>Avoid using personal information like birthdays or names in your password</li>
                                <li>Topsavers Trust Bank will never ask for your password via email or phone</li>
                            </ul>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="3">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="button" class="btn btn-primary next-step" data-next="5">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 5: Profile Picture Upload -->
                    <div class="form-section" id="step-5">
                        <h3 class="section-title">Upload Profile Picture</h3>
                        
                        <div class="upload-container">
                            <div class="upload-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <h3 class="upload-text">Upload your profile picture to complete account setup</h3>
                            
                            <div class="file-input-wrapper">
                                <input type="file" name="display_picture" id="display_picture" accept="image/*" class="file-input">
                                <label for="display_picture" class="file-input-button">
                                    <i class="fas fa-cloud-upload-alt"></i> Choose File
                                </label>
                            </div>
                            
                            <div class="file-name" id="file-name">No file chosen</div>
                            
                            <div class="preview-container">
                                <div class="preview-placeholder" id="preview-placeholder">
                                    <i class="fas fa-user" style="font-size: 3rem; color: var(--gray-dark);"></i>
                                </div>
                                <img id="preview-image" class="preview-image" style="display: none;">
                            </div>
                            
                            <div class="error-message">
                                @error('display_picture') {{ $message }} @enderror
                            </div>
                            
                            <p style="margin-top: 1rem; color: var(--gray-dark); font-size: 0.85rem;">
                                Supported formats: JPG, PNG, GIF. Max file size: 2MB.
                            </p>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="4">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="button" class="btn btn-primary next-step" data-next="6">
                                Continue <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 6: Review & Submit -->
                    <div class="form-section" id="step-6">
                        <h3 class="section-title">Review & Submit</h3>
                        
                        <div class="review-summary">
                            <h4>Please review your information:</h4>
                            
                            <div class="review-section">
                                <h5>Personal Information</h5>
                                <div class="review-row">
                                    <span class="review-label">Full Name:</span>
                                    <span class="review-value" id="review-name"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Email:</span>
                                    <span class="review-value" id="review-email"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Phone:</span>
                                    <span class="review-value" id="review-phone"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Date of Birth:</span>
                                    <span class="review-value" id="review-dob"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Country:</span>
                                    <span class="review-value" id="review-country"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Profile Picture:</span>
                                    <span class="review-value" id="review-display-picture">No file chosen</span>
                                </div>
                            </div>
                            
                            <div class="review-section">
                                <h5>Account Details</h5>
                                <div class="review-row">
                                    <span class="review-label">Account Type:</span>
                                    <span class="review-value" id="review-account-type"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Currency:</span>
                                    <span class="review-value" id="review-currency"></span>
                                </div>
                            </div>
                            
                            <div class="review-section">
                                <h5>Next of Kin Information</h5>
                                <div class="review-row">
                                    <span class="review-label">Full Name:</span>
                                    <span class="review-value" id="review-kin-name"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Relationship:</span>
                                    <span class="review-value" id="review-kin-relationship"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Phone:</span>
                                    <span class="review-value" id="review-kin-phone"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Email:</span>
                                    <span class="review-value" id="review-kin-email"></span>
                                </div>
                                <div class="review-row">
                                    <span class="review-label">Address:</span>
                                    <span class="review-value" id="review-kin-address"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="terms-container">
                            <h4>Terms and Conditions</h4>
                            <p>By submitting this application, you agree to the Topsavers Trust Bank Online Banking Agreement, which includes important information about your rights and responsibilities when using our online banking services.</p>
                            <p>You acknowledge that you have received and read the Privacy Policy and agree to its terms. You authorize Topsavers Trust Bank to verify the information provided in this application and to obtain credit reports and other information as necessary.</p>
                            <p>You understand that accounts are subject to approval and that Topsavers Trust Bank may require additional documentation to verify your identity before opening your account.</p>
                        </div>
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="terms_agree" name="terms_agree" required>
                            <label for="terms_agree">I have read and agree to the Terms and Conditions and Privacy Policy</label>
                        </div>
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="marketing_agree" name="marketing_agree">
                            <label for="marketing_agree">I would like to receive marketing communications about Topsavers Trust Bank products and services</label>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="5">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i> Submit Application
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="login-prompt">
                Already have an account? <a href="{{ route('login') }}">Sign in to your account</a>
            </div>
        </div>
    </div>

    <footer>
        <p>Copyright &copy; 2025 Topsavers Trust Bank. All rights reserved. | Member FDIC | Equal Housing Lender</p>
    </footer>

    <script>
        // Multi-step form functionality
        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.form-section').id.split('-')[1];
                const nextStep = this.getAttribute('data-next');
                
                // Validate current step before proceeding
                if (validateStep(currentStep)) {
                    // Update progress steps
                    document.querySelector(`.progress-step[data-step="${currentStep}"]`).classList.remove('active');
                    document.querySelector(`.progress-step[data-step="${currentStep}"]`).classList.add('completed');
                    document.querySelector(`.progress-step[data-step="${nextStep}"]`).classList.add('active');
                    
                    // Show next step
                    document.getElementById(`step-${currentStep}`).classList.remove('active');
                    document.getElementById(`step-${nextStep}`).classList.add('active');
                    
                    // If moving to review step, populate review fields
                    if (nextStep === '6') {
                        populateReviewFields();
                    }
                }
            });
        });
        
        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.form-section').id.split('-')[1];
                const prevStep = this.getAttribute('data-prev');
                
                // Update progress steps
                document.querySelector(`.progress-step[data-step="${currentStep}"]`).classList.remove('active');
                document.querySelector(`.progress-step[data-step="${prevStep}"]`).classList.add('active');
                
                // Show previous step
                document.getElementById(`step-${currentStep}`).classList.remove('active');
                document.getElementById(`step-${prevStep}`).classList.add('active');
            });
        });
        
        // Form validation for each step
        function validateStep(step) {
            let isValid = true;
            const currentStep = document.getElementById(`step-${step}`);
            const inputs = currentStep.querySelectorAll('input[required], select[required], textarea[required]');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = 'var(--error-color)';
                    const errorDiv = input.parentElement.querySelector('.error-message');
                    if (errorDiv) {
                        errorDiv.textContent = 'This field is required';
                    }
                } else {
                    input.style.borderColor = '';
                    const errorDiv = input.parentElement.querySelector('.error-message');
                    if (errorDiv) {
                        errorDiv.textContent = '';
                    }
                }
            });
            
            // Additional validation for specific steps
            if (step === '4') {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('password_confirmation').value;
                
                if (password !== confirmPassword) {
                    isValid = false;
                    document.getElementById('password_confirmation').style.borderColor = 'var(--error-color)';
                    const errorDiv = document.getElementById('password_confirmation').parentElement.querySelector('.error-message');
                    if (errorDiv) {
                        errorDiv.textContent = 'Passwords do not match';
                    }
                }
            }
            
            return isValid;
        }
        
        // Populate review fields
        function populateReviewFields() {
            document.getElementById('review-name').textContent = document.getElementById('name').value;
            document.getElementById('review-email').textContent = document.getElementById('email').value;
            document.getElementById('review-phone').textContent = document.getElementById('phone').value;
            document.getElementById('review-dob').textContent = document.getElementById('dob').value;
            document.getElementById('review-country').textContent = document.getElementById('country').value;
            
            // Profile picture file name
            const displayPictureInput = document.getElementById('display_picture');
            document.getElementById('review-display-picture').textContent = displayPictureInput.files.length > 0 ? displayPictureInput.files[0].name : 'No file chosen';
            
            const accountTypeSelect = document.getElementById('account_type');
            document.getElementById('review-account-type').textContent = accountTypeSelect.options[accountTypeSelect.selectedIndex].text;
            
            const currencySelect = document.getElementById('currency');
            document.getElementById('review-currency').textContent = currencySelect.options[currencySelect.selectedIndex].text;
            
            // Next of kin information
            document.getElementById('review-kin-name').textContent = document.getElementById('kin_full_name').value;
            
            const relationshipSelect = document.getElementById('kin_relationship');
            document.getElementById('review-kin-relationship').textContent = relationshipSelect.options[relationshipSelect.selectedIndex].text;
            
            document.getElementById('review-kin-phone').textContent = document.getElementById('kin_phone').value;
            document.getElementById('review-kin-email').textContent = document.getElementById('kin_email').value || 'Not provided';
            document.getElementById('review-kin-address').textContent = document.getElementById('kin_address').value;
        }
        
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const passwordStrength = document.getElementById('password-strength');
        const passwordStrengthText = document.getElementById('password-strength-text');
        
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let strength = 0;
            
            // Check length
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;
            
            // Check for mixed case
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
            
            // Check for numbers
            if (/\d/.test(password)) strength += 1;
            
            // Check for special chars
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
            
            // Update strength indicator
            let strengthLevel = '';
            let strengthText = '';
            let textClass = '';
            
            if (password.length === 0) {
                strengthLevel = '';
                strengthText = '';
            } else if (strength <= 1) {
                strengthLevel = 'weak';
                strengthText = 'Weak';
                textClass = 'weak';
            } else if (strength <= 3) {
                strengthLevel = 'medium';
                strengthText = 'Medium';
                textClass = 'medium';
            } else if (strength === 4) {
                strengthLevel = 'good';
                strengthText = 'Good';
                textClass = 'good';
            } else {
                strengthLevel = 'strong';
                strengthText = 'Strong';
                textClass = 'strong';
            }
            
            passwordStrength.setAttribute('data-strength', strengthLevel);
            passwordStrengthText.textContent = password.length > 0 ? `Password Strength: ${strengthText}` : '';
            passwordStrengthText.className = `password-strength-text ${textClass}`;
        });
        
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
        
        // Profile picture file handling
        const displayPictureInput = document.getElementById('display_picture');
        const fileName = document.getElementById('file-name');
        const previewImage = document.getElementById('preview-image');
        const previewPlaceholder = document.getElementById('preview-placeholder');
        
        displayPictureInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const errorDiv = this.parentElement.parentElement.querySelector('.error-message');
            
            if (file) {
                // Display file name
                fileName.textContent = file.name;
                
                // Check file type
                const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    errorDiv.textContent = 'Please select a valid image file (JPEG, PNG, GIF).';
                    this.value = '';
                    fileName.textContent = 'No file chosen';
                    return;
                }
                
              // Check file size (15MB)
if (file.size > 15 * 1024 * 1024) {
    errorDiv.textContent = 'File size must be less than 15MB.';
    this.value = '';
    fileName.textContent = 'No file chosen';
    return;
}

                
                errorDiv.textContent = '';
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    previewPlaceholder.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                fileName.textContent = 'No file chosen';
                previewImage.style.display = 'none';
                previewPlaceholder.style.display = 'flex';
            }
        });
        
        // Form validation
        const form = document.getElementById('registrationForm');
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const termsAgree = document.getElementById('terms_agree').checked;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                document.getElementById('password_confirmation').style.borderColor = 'var(--error-color)';
                document.getElementById('password_confirmation').nextElementSibling.textContent = 'Passwords do not match';
                document.getElementById('password_confirmation').focus();
            }
            
            if (!termsAgree) {
                e.preventDefault();
                alert('You must agree to the Terms and Conditions to continue.');
            }
        });
        
        // Date picker max date (18 years ago)
        document.getElementById('dob').max = new Date(new Date().setFullYear(new Date().getFullYear() - 18)).toISOString().split('T')[0];
        
        // Phone number formatting for next of kin
        document.getElementById('kin_phone').addEventListener('input', function(e) {
            const x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>
</body>
</html>