<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Saver Trust Bank - Premium Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0a5c5c;
            --primary-light: #138080;
            --primary-dark: #074545;
            --secondary: #2c3e50;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #fd7e14;
            --info: #17a2b8;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #6c757d;
            --white: #ffffff;
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
            --header-height: 70px;
            --card-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Base Styles */
        body {
            font-family: 'Segoe UI', 'Roboto', system-ui, sans-serif;
            background-color: #f5f7fb;
            color: #212529;
            overflow-x: hidden;
            line-height: 1.6;
            padding-bottom: 70px; /* Added for bottom header */
        }

        a {
            text-decoration: none;
            transition: var(--transition);
        }

        /* Sidebar - Premium Version */
        #sidebar {
            width: var(--sidebar-width);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            background: var(--white);
            box-shadow: 0 0 30px rgba(0,0,0,0.05);
            transition: var(--transition);
            z-index: 1050;
            border-right: 1px solid rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px;
            background: var(--primary);
            text-align: center;
            min-height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header img {
            max-width: 180px;
            transition: var(--transition);
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .nav-link {
            color: var(--secondary);
            padding: 14px 25px;
            margin: 4px 15px;
            border-radius: var(--card-radius);
            display: flex;
            align-items: center;
            transition: var(--transition);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(10, 92, 92, 0.08);
            color: var(--primary);
        }

        .nav-link.active {
            font-weight: 600;
            background-color: rgba(10, 92, 92, 0.1);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary);
            border-radius: 0 3px 3px 0;
        }

        .nav-link i {
            font-size: 1.1rem;
            min-width: 25px;
            transition: var(--transition);
        }

        /* Collapsed Sidebar */
        #sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        #sidebar.collapsed .sidebar-header img {
            max-width: 40px;
        }

        #sidebar.collapsed .nav-link span {
            opacity: 0;
            width: 0;
            position: absolute;
            transition: var(--transition);
        }

        #sidebar.collapsed .nav-link i {
            font-size: 1.3rem;
            margin-right: 0;
        }

        #sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 14px 0;
        }

        /* Main Content Area */
        #main-content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
        }

        #sidebar.collapsed + #main-content {
            margin-left: var(--sidebar-collapsed);
        }

        /* Top Navigation Bar */
        .top-navbar {
            height: var(--header-height);
            background: var(--white);
            padding: 0 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.03);
            position: sticky;
            top: 0;
            z-index: 1040;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .toggle-btn {
            border: none;
            background: none;
            font-size: 1.3rem;
            color: var(--primary);
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: var(--transition);
        }

        .toggle-btn:hover {
            background-color: rgba(10, 92, 92, 0.1);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-img-container {
            position: relative;
        }

        .profile-img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-light);
            transition: var(--transition);
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: var(--danger);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Bottom Header */
        .bottom-header {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--white);
            box-shadow: 0 -2px 15px rgba(0,0,0,0.05);
            z-index: 1030;
            padding: 10px 0;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .bottom-header ul {
            display: flex;
            justify-content: space-around;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .bottom-header li {
            flex: 1;
            text-align: center;
        }

        .link-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--secondary);
            padding: 5px 0;
            transition: var(--transition);
        }

        .link-item:hover {
            color: var(--primary);
        }

        .link-item i {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .link-item a {
            color: inherit;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background: var(--white);
            border-radius: var(--card-radius);
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            padding: 25px;
            margin-bottom: 25px;
            border: none;
            transition: var(--transition);
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        .card-title {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        /* Balance Display */
        .balance-container {
            position: relative;
        }

        .balance-display {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
            letter-spacing: 0.5px;
            font-family: 'Roboto', sans-serif;
            transition: var(--transition);
        }

        .balance-hidden {
            letter-spacing: 3px;
        }

        /* Account Status */
        .account-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        /* Quick Actions Grid */
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
        }

        .quick-action {
            background: var(--white);
            border-radius: var(--card-radius);
            padding: 20px 15px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.03);
            cursor: pointer;
            color: inherit;
        }

        .quick-action:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-color: var(--primary-light);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 1.3rem;
            color: white;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            box-shadow: 0 4px 10px rgba(10, 92, 92, 0.2);
        }

        .action-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--secondary);
        }

        /* Transactions List */
        .transaction-list {
            border-radius: var(--card-radius);
            overflow: hidden;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            background: var(--white);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .transaction-item:hover {
            background-color: rgba(10, 92, 92, 0.03);
        }

        .transaction-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            flex-shrink: 0;
        }

        .icon-deposit {
            background: linear-gradient(135deg, var(--success) 0%, #218838 100%);
        }

        .icon-withdrawal {
            background: linear-gradient(135deg, var(--danger) 0%, #c82333 100%);
        }

        .icon-transfer {
            background: linear-gradient(135deg, var(--info) 0%, #138496 100%);
        }

        .icon-crypto {
            background: linear-gradient(135deg, var(--warning) 0%, #e0a800 100%);
        }

        .transaction-details {
            flex: 1;
            min-width: 0;
        }

        .transaction-title {
            font-weight: 500;
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .transaction-meta {
            font-size: 0.8rem;
            color: var(--gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .transaction-amount {
            text-align: right;
            font-weight: 600;
            margin-left: 15px;
            white-space: nowrap;
        }

        .amount-positive {
            color: var(--success);
        }

        .amount-negative {
            color: var(--danger);
        }

        .transaction-status {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 10px;
            margin-top: 5px;
            display: inline-block;
        }

        .status-completed {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .status-pending {
            background-color: rgba(253, 126, 20, 0.1);
            color: var(--warning);
        }

        .status-failed {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        /* Charts and Analytics */
        .chart-container {
            height: 250px;
            background: var(--light);
            border-radius: var(--card-radius);
            position: relative;
            overflow: hidden;
        }

        .chart-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Savings Goals */
        .savings-goal {
            margin-bottom: 20px;
        }

        .goal-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .goal-title {
            font-weight: 500;
            color: var(--secondary);
        }

        .goal-amount {
            font-weight: 600;
            color: var(--dark);
        }

        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: rgba(0,0,0,0.05);
        }

        /* Responsive Adjustments */
        @media (max-width: 1199px) {
            #sidebar {
                transform: translateX(-100%);
                z-index: 1051;
            }
            
            #sidebar.show {
                transform: translateX(0);
            }
            
            #main-content {
                margin-left: 0;
            }
            
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1050;
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
            }
            
            #sidebar.show + .overlay {
                opacity: 1;
                visibility: visible;
            }
        }

        @media (max-width: 991px) {
            .quick-actions-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .balance-display {
                font-size: 1.9rem;
            }
        }

        @media (max-width: 767px) {
            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .top-navbar {
                padding: 0 15px;
            }
            
            .dashboard-card {
                padding: 20px;
            }
        }

        @media (max-width: 575px) {
            .quick-actions-grid {
                grid-template-columns: 1fr;
            }
            
            .transaction-item {
                flex-wrap: wrap;
            }
            
            .transaction-amount {
                width: 100%;
                text-align: left;
                margin-top: 10px;
                margin-left: 57px;
            }
            
            .balance-display {
                font-size: 1.7rem;
            }

            /* Adjust bottom header for mobile */
            .bottom-header {
                padding: 8px 0;
            }

            .link-item i {
                font-size: 1rem;
            }

            .link-item a {
                font-size: 0.7rem;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fadein {
            animation: fadeIn 0.4s ease-out forwards;
            opacity: 0;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <!-- Premium Sidebar -->
    <aside id="sidebar">
        <div class="sidebar-header" style="background-color:white">
            <img src="{{asset('assets/images/logo.png')}}" alt="Bank Logo">
        </div>
        
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('user.home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.deposit.index')}}">
                        <i class="fas fa-credit-card"></i>
                        <span>Deposit</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.transfer.bank')}}">
                        <i class="fas fa-university"></i>
                        <span>Bank Transfers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.withdrawal.crypto')}}">
                        <i class="fab fa-bitcoin"></i>
                        <span>Crypto Withdrawal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.withdrawal.paypal')}}">
                        <i class="fab fa-paypal"></i>
                        <span>PayPal Withdrawals</span>
                    </a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.loans.loan')}}">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Apply for Loan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.profile')}}">
                        <i class="fas fa-user-shield"></i>
                        <span>Account Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.cards.card')}}">
                        <i class="fas fa-id-card"></i>
                        <span>My Card</span>
                    </a>
                </li>
                <li class="nav-item mt-auto">
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="margin: 0; padding: 0;">
        @csrf
        <a class="nav-link" href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
           style="display: flex; align-items: center;">
            <i class="fas fa-sign-out-alt"></i>
            <span style="margin-left: 5px;">Sign Out</span>
        </a>
    </form>
</li>

            </ul>
        </div>
    </aside>

    <!-- Overlay for mobile -->
    <div class="overlay"></div>

<!-- Main Content Area -->
<main id="main-content">
    <!-- Premium Top Navigation -->
    <nav class="top-navbar">
        <button class="toggle-btn">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="d-flex align-items-center gap-3">
            <div class="position-relative">
                <!-- Empty for potential future elements -->
            </div>
            
            <div class="user-profile">
                <div class="text-end d-none d-md-block">
                    <div class="fw-semibold">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</div>
                    <small class="text-muted">Account: {{Auth::user()->a_number}} </small>
                </div>
                <div class="profile-img-container">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" onclick="triggerFileInput()">
                        <img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" class="profile-img" alt="Profile">
                    </a>
                    
                    <form id="uploadForm" action="{{route('user.personal.dp')}}" method="POST" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <input type="file" id="profilePictureInput" name="image" accept="image/*" style="display: none;" onchange="uploadProfilePicture()">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
      <!-- Top Right -->
                       <div class="gtranslate_wrapper"></div> <script>window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script> <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
                    </div>
                    
                 