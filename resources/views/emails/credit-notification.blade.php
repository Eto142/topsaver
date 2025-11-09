<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Account Credited - TopSavers </title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 650px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .header {
            background-color: #0052cc;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .header img {
            width: 120px;
        }
        .content {
            padding: 30px;
            color: #333333;
        }
        .content h2 {
            color: #0052cc;
            margin-bottom: 15px;
            font-size: 24px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .details {
            background: #f2f6ff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 15px;
        }
        .details p {
            margin: 8px 0;
        }
        .highlight {
            color: #0052cc;
            font-weight: bold;
        }
        .amount {
            font-size: 20px;
            color: #28a745;
            font-weight: bold;
        }
        .footer {
            background: #f9fafb;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #666666;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            background-color: #0052cc;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="TopSavers Logo">
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2>Account Credited Successfully!</h2>
            <p>Dear <strong>{{ $user['first_name'] }}</strong>,</p>
            <p>We are pleased to inform you that your <strong>TopSavers </strong> account has been credited.</p>

            <div class="details">
                <p><strong>Transaction Reference:</strong> <span class="highlight">{{ $user['ref'] }}</span></p>
                <p><strong>Amount Credited:</strong> <span class="amount">{{ $user['currency'] }}{{ number_format($user['amount'], 2) }}</span></p>
                <p><strong>New Balance:</strong> {{ $user['currency'] }}{{ number_format($user['balance'], 2) }}</p>
                <p><strong>Description:</strong> {{ $user['description'] }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($user['date'])->format('d M Y, h:i A') }}</p>
                <p><strong>Account Number:</strong> {{ $user['account_number'] }}</p>
            </div>

            <p>For your security, please review your account regularly. If you did not authorize this transaction, contact us immediately.</p>

            <a href="{{ route('user.home') }}" class="button">View Account</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} TopSavers . All rights reserved.
        </div>
    </div>
</body>
</html>
