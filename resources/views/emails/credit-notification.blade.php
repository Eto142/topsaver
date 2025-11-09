<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Account Credited - TopSavers</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 680px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }

        .header {
            background: linear-gradient(90deg, #0052cc, #0066ff);
            padding: 25px 20px;
            text-align: center;
            color: #ffffff;
        }

        .header img {
            width: 140px;
        }

        .content {
            padding: 35px 30px;
            color: #333333;
        }

        .content h2 {
            color: #0052cc;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .txn-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f6f9ff;
            border-left: 5px solid #0052cc;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: inset 0 0 6px rgba(0,80,255,0.03);
        }

        .txn-card .txn-info {
            flex: 1;
        }

        .txn-card .txn-info .title {
            font-weight: 700;
            font-size: 16px;
            color: #0b3a8a;
            margin-bottom: 5px;
        }

        .txn-card .txn-info .desc {
            font-size: 14px;
            color: #54627a;
        }

        .txn-card .txn-amount {
            font-size: 22px;
            font-weight: 700;
            color: #28a745;
            margin-left: 20px;
            white-space: nowrap;
        }

        .details {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            border: 1px dashed #e6eefc;
            font-size: 14px;
            color: #334155;
        }

        .details .row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(14,39,82,0.03);
        }

        .details .row:last-child {
            border-bottom: none;
        }

        .details .label {
            color: #6b7280;
        }

        .details .value {
            font-weight: 600;
            color: #111827;
        }

        .button {
            display: inline-block;
            background-color: #0052cc;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: 600;
        }

        .footer {
            background: #fbfdff;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #6b7280;
            border-top: 1px solid rgba(13,38,77,0.03);
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .container {
                margin: 20px 10px;
            }

            .content h2 {
                font-size: 22px;
            }

            .txn-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .txn-card .txn-amount {
                margin-left: 0;
                margin-top: 10px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
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
            <p>Dear <strong>{{ $user['full_name'] }}</strong>,</p>
            <p>We are pleased to inform you that your <strong>TopSavers</strong> account has been credited successfully.</p>

            <!-- Transaction Card -->
            <div class="txn-card">
                <div class="txn-info">
                    <div class="title">Account Credited</div>
                    <div class="desc">{{ $user['description'] ?? 'Credit to account' }} • Ref: <span class="highlight">{{ $user['ref'] }}</span></div>
                </div>
                <div class="txn-amount">{{ $user['currency'] ?? '₦' }}{{ number_format($user['amount'], 2) }}</div>
            </div>

            <!-- Details -->
            <div class="details">
                <div class="row">
                    <div class="label">Transaction Reference</div>
                    <div class="value">{{ $user['ref'] }}</div>
                </div>
                <div class="row">
                    <div class="label">Amount</div>
                    <div class="value">{{ $user['currency'] ?? '₦' }}{{ number_format($user['amount'], 2) }}</div>
                </div>
                <div class="row">
                    <div class="label">New Balance</div>
                    <div class="value">{{ $user['currency'] ?? '₦' }}{{ number_format($user['balance'], 2) }}</div>
                </div>
                <div class="row">
                    <div class="label">Account Number</div>
                    <div class="value">{{ $user['account_number'] }}</div>
                </div>
                <div class="row">
                    <div class="label">Date</div>
                    <div class="value">{{ \Carbon\Carbon::parse($user['date'])->format('d M Y, h:i A') }}</div>
                </div>
            </div>

            <p>For your security, please review your account regularly. If you did not authorize this transaction, contact us immediately.</p>

            <a href="{{ route('user.home') }}" class="button">View Account</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            This is an automated message from TopSavers. Keep your account details safe. <br>
            © {{ date('Y') }} TopSavers. All rights reserved.
        </div>
    </div>
</body>
</html>
