@include('user.header')


    <!-- Dashboard Content -->
   <div class="row animate-fadein">
    <!-- Account Overview - Compact Height -->
 <div class="col-lg-8 mb-3 mb-lg-0">
    <div class="dashboard-card h-100" style="padding: 1rem;">
        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
            <h5 class="card-title mb-0" style="font-size: 1rem;">
                <i class="fas fa-wallet"></i> Account Overview
            </h5>

            <div class="d-flex flex-column align-items-end">
                <div class="form-check form-switch mb-1" style="transform: scale(0.8);">
                    <input class="form-check-input" type="checkbox" id="balanceToggle" checked>
                    <label class="form-check-label" for="balanceToggle">Show Balance</label>
                </div>

                <!-- Enhanced Make Payment Button -->
                <a href="{{ route('user.payments.index') }}" class="make-payment-btn mt-1">
                    <i class="fas fa-bolt"></i> Make Payment
                </a>
            </div>
        </div>

        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="fw-semibold">
                    Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </div>
                <p class="text-muted mb-1" style="font-size: 0.8rem;">Available Balance</p>
                <h2 class="balance-display" style="font-size: 1.5rem;">
                    {{ Auth::user()->currency }}{{ number_format($balance, 2) }}
                </h2>
                <span class="account-status" style="font-size: 0.75rem;">
                    <i class="fas fa-check-circle"></i> Active Account
                </span>
            </div>

            <div class="col-md-6 mt-2 mt-md-0">
                <div class="row">
                    <div class="col-6">
                        <p class="text-muted mb-1" style="font-size: 0.8rem;">Account Number</p>
                        <h6 class="fw-semibold" style="font-size: 0.9rem;">
                            {{ Auth::user()->account_number }}
                        </h6>
                    </div>
                    <div class="col-6">
                        <p class="text-muted mb-1" style="font-size: 0.8rem;">Account Type</p>
                        <h6 class="fw-semibold" style="font-size: 0.9rem;">
                            {{ Auth::user()->account_type }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.make-payment-btn {
    background: linear-gradient(135deg, #007bff, #00c6ff);
    color: white !important;
    font-weight: 700;
    font-size: 0.78rem;
    border-radius: 30px;
    padding: 6px 18px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 0 12px rgba(0, 153, 255, 0.5);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
}

/* Add a glowing animated border */
.make-payment-btn::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 30px;
    padding: 2px;
    background: linear-gradient(90deg, #00e1ff, #007bff, #00c6ff, #00e1ff);
    background-size: 300% 300%;
    z-index: 0;
    animation: glowMove 3s linear infinite;
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
}

.make-payment-btn i {
    font-size: 0.85rem;
}

/* Hover effect */
.make-payment-btn:hover {
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 0 16px rgba(0, 153, 255, 0.65);
    background: linear-gradient(135deg, #0056b3, #0095ff);
}

/* Subtle animation for the glowing border */
@keyframes glowMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .make-payment-btn {
        font-size: 0.75rem;
        padding: 5px 14px;
    }

    .form-check.form-switch {
        transform: scale(0.9);
    }

    .dashboard-card h5 {
        font-size: 0.95rem;
    }
}
</style>


    <!-- Card Section - Compact Height (Will be moved before carousel on mobile) -->
    <div class="col-lg-4 d-lg-block d-none">
        <div class="dashboard-card h-100" style="padding: 1rem;">
            <h5 class="card-title" style="font-size: 1rem; margin-bottom: 0.8rem;">
                <i class="fas fa-credit-card"></i> Card
            </h5>
            
            @forelse($details as $detail)
                @if($detail->status == 0)
                    <!-- Under Review Card - Compact -->
                    <div class="card-block p-3 mb-2" style="background: linear-gradient(135deg, #305C89 0%, #1E3A5F 100%); border-radius: var(--card-radius); color: white; min-height: auto;">
                        <div class="d-flex align-items-center">
                            <div class="me-2 bg-white rounded-circle p-2">
                                <i class="fas fa-hourglass-half text-warning" style="font-size: 1rem;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0" style="font-size: 0.9rem;">Card Under Review</h5>
                                <p class="small mb-0" style="font-size: 0.8rem;">Your card is available</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info mt-2 py-1" style="font-size: 0.8rem;">
                        <i class="fas fa-info-circle me-1"></i>
                        New cards are gotten instantly
                    </div>
                @else
                    <!-- Active Card Display - Compact -->
                    <div class="card-block p-3 mb-2" style="background: linear-gradient(135deg, #305C89 0%, #1E3A5F 100%); border-radius: var(--card-radius); color: white; min-height: auto;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <img src="{{asset('mastercard.png')}}" alt="Mastercard" width="35">
                            <img src="{{asset('assets/images/logo.png')}}" alt="Bank Logo" width="50" class="bg-white p-1 rounded">
                        </div>
                        
                        <div class="mb-2">
                            <div class="d-flex align-items-center mb-1">
                                <i class="fas fa-user me-1" style="font-size: 0.8rem;"></i>
                                <span class="font-w600" style="font-size: 0.8rem;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                            </div>
                            
                            <div class="d-flex align-items-center mb-1">
                                <i class="fas fa-credit-card me-1" style="font-size: 0.8rem;"></i>
                                <span class="font-monospace" style="font-size: 0.8rem;">{{ implode(' ', str_split($detail->card_number, 4)) }}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-1" style="font-size: 0.8rem;"></i>
                                    <div>
                                        <span class="small d-block" style="font-size: 0.7rem;">Expiry</span>
                                        <strong style="font-size: 0.8rem;">{{ \Carbon\Carbon::parse($detail->card_expiry)->format('m/y') }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-lock me-1" style="font-size: 0.8rem;"></i>
                                    <div>
                                        <span class="small d-block" style="font-size: 0.7rem;">CCV</span>
                                        <strong style="font-size: 0.8rem;">{{ $detail->card_cvc }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 <div class="quick-actions-grid d-flex gap-2 mt-2">
    <!-- View Action -->
    <a href="{{ route('user.cards.card') }}" class="quick-action text-center" style="text-decoration: none;">
        <div class="action-icon bg-light rounded-circle d-flex align-items-center justify-content-center mb-1" style="width: 40px; height: 40px; font-size: 1rem;">
            <i class="fas fa-id-card-alt"></i> <!-- More suitable icon for "View Card" -->
        </div>
        <div class="action-label text-muted" style="font-size: 0.75rem;">View Card</div>
    </a>

    <!-- Request for Delivery Action -->
    <a href="#" class="quick-action text-center" data-bs-toggle="modal" data-bs-target="#requestFormModal" style="text-decoration: none;">
        <div class="action-icon bg-light rounded-circle d-flex align-items-center justify-content-center mb-1" style="width: 40px; height: 40px; font-size: 1rem;">
            <i class="fas fa-shipping-fast"></i> <!-- Better icon for "Delivery Request" -->
        </div>
        <div class="action-label text-muted" style="font-size: 0.75rem;">Request Delivery</div>
    </a>
</div>

                @endif
            @empty
                <!-- No Card State - Compact -->
                <div class="text-center py-2">
                    <div class="bg-primary-light rounded-circle p-2 mb-1 d-inline-block">
                        <i class="fas fa-credit-card text-primary" style="font-size: 1.2rem;"></i>
                    </div>
                    <h5 class="mb-1" style="font-size: 0.9rem;">No Card</h5>
                    <p class="text-muted mb-2" style="font-size: 0.8rem;">You haven't requested a card yet</p>
                    <a href="{{route('user.cards.request.card', Auth::user()->id)}}" class="btn btn-primary btn-sm" style="font-size: 0.8rem; padding: 0.25rem 0.5rem;">
                        <i class="fas fa-plus me-1"></i> Request Card
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

        <!-- Quick Actions Row -->
        <div class="row animate-fadein delay-1 mt-3 mt-md-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <h5 class="card-title">
                        <i class="fas fa-bolt"></i> Quick Actions
                    </h5>
                    <div class="quick-actions-scroll">
                        <div class="quick-actions-grid">
                            <a href="{{route('user.deposit.index')}}" class="quick-action">
                                <div class="action-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="action-label">Deposit</div>
                            </a>
                            <a href="{{route('user.transfer.bank')}}" class="quick-action">
                                <div class="action-icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="action-label">Transfer</div>
                            </a>
                            <a href="{{route('user.withdrawal.crypto')}}" class="quick-action">
                                <div class="action-icon">
                                    <i class="fab fa-bitcoin"></i>
                                </div>
                                <div class="action-label">Crypto</div>
                            </a>
                            <a href="{{route('user.loans.loan')}}" class="quick-action">
                                <div class="action-icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div class="action-label">Loan</div>
                            </a>
                            <a href="{{route('user.withdrawal.paypal')}}" class="quick-action">
                                <div class="action-icon">
                                    <i class="fab fa-paypal"></i>
                                </div>
                                <div class="action-label">PayPal</div>
                            </a>
                            <a href="{{route('user.skrill')}}" class="quick-action">
                                <div class="action-icon">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <div class="action-label">Skrill</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Section - Mobile Only (Will appear before carousel) -->
        <div class="row animate-fadein d-lg-none d-block">
            <div class="col-12 mb-3">
                <div class="dashboard-card" style="padding: 1rem;">
                    <h5 class="card-title" style="font-size: 1rem; margin-bottom: 0.8rem;">
                        <i class="fas fa-credit-card"></i> Card
                    </h5>
                    
                    @forelse($details as $detail)
                        @if($detail->status == 0)
                            <!-- Under Review Card - Compact -->
                            <div class="card-block p-3 mb-2" style="background: linear-gradient(135deg, #305C89 0%, #1E3A5F 100%); border-radius: var(--card-radius); color: white; min-height: auto;">
                                <div class="d-flex align-items-center">
                                    <div class="me-2 bg-white rounded-circle p-2">
                                        <i class="fas fa-hourglass-half text-warning" style="font-size: 1rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0" style="font-size: 0.9rem;">Card Under Review</h5>
                                        <p class="small mb-0" style="font-size: 0.8rem;">Your card is available</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-2 py-1" style="font-size: 0.8rem;">
                                <i class="fas fa-info-circle me-1"></i>
                                New cards are gotten instantly
                            </div>
                        @else
                            <!-- Active Card Display - Compact -->
                            <div class="card-block p-3 mb-2" style="background: linear-gradient(135deg, #305C89 0%, #1E3A5F 100%); border-radius: var(--card-radius); color: white; min-height: auto;">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <img src="{{asset('mastercard.png')}}" alt="Mastercard" width="35">
                                    <img src="{{asset('assets/images/logo.png')}}" alt="Bank Logo" width="50" class="bg-white p-1 rounded">
                                </div>
                                
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fas fa-user me-1" style="font-size: 0.8rem;"></i>
                                        <span class="font-w600" style="font-size: 0.8rem;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fas fa-credit-card me-1" style="font-size: 0.8rem;"></i>
                                        <span class="font-monospace" style="font-size: 0.8rem;">{{ implode(' ', str_split($detail->card_number, 4)) }}</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-calendar-alt me-1" style="font-size: 0.8rem;"></i>
                                            <div>
                                                <span class="small d-block" style="font-size: 0.7rem;">Expiry</span>
                                                <strong style="font-size: 0.8rem;">{{ \Carbon\Carbon::parse($detail->card_expiry)->format('m/y') }}</strong>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-lock me-1" style="font-size: 0.8rem;"></i>
                                            <div>
                                                <span class="small d-block" style="font-size: 0.7rem;">CCV</span>
                                                <strong style="font-size: 0.8rem;">{{ $detail->card_cvc }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                         <div class="quick-actions-grid d-flex gap-2 mt-2">
    <!-- View Action -->
    <a href="{{ route('user.cards.card') }}" class="quick-action text-center" style="text-decoration: none;">
        <div class="action-icon bg-light rounded-circle d-flex align-items-center justify-content-center mb-1" style="width: 40px; height: 40px; font-size: 1rem;">
            <i class="fas fa-id-card-alt"></i> <!-- More suitable icon for "View Card" -->
        </div>
        <div class="action-label text-muted" style="font-size: 0.75rem;">View Card</div>
    </a>

    <!-- Request for Delivery Action -->
    <a href="#" class="quick-action text-center" data-bs-toggle="modal" data-bs-target="#requestFormModal" style="text-decoration: none;">
        <div class="action-icon bg-light rounded-circle d-flex align-items-center justify-content-center mb-1" style="width: 40px; height: 40px; font-size: 1rem;">
            <i class="fas fa-shipping-fast"></i> <!-- Better icon for "Delivery Request" -->
        </div>
        <div class="action-label text-muted" style="font-size: 0.75rem;">Request Delivery</div>
    </a>
</div>

                        @endif
                    @empty
                        <!-- No Card State - Compact -->
                        <div class="text-center py-2">
                            <div class="bg-primary-light rounded-circle p-2 mb-1 d-inline-block">
                                <i class="fas fa-credit-card text-primary" style="font-size: 1.2rem;"></i>
                            </div>
                            <h5 class="mb-1" style="font-size: 0.9rem;">No Card</h5>
                            <p class="text-muted mb-2" style="font-size: 0.8rem;">You haven't requested a card yet</p>
                            <a href="#" class="btn btn-primary btn-sm" style="font-size: 0.8rem; padding: 0.25rem 0.5rem;">
                                <i class="fas fa-plus me-1"></i> Request Card
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Transactions & Analytics Row -->
        <div class="row animate-fadein delay-2 mt-3 mt-md-4">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="dashboard-card h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-history"></i> Recent Transactions
                        </h5>
                        <a href="{{route('user.transactions')}}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    
                    <div class="transaction-list">
                        @if($transaction->isEmpty())
                            <div class="text-center text-muted py-4">
                                No transactions yet.
                            </div>
                        @else
                            @foreach($transaction as $details)
                                <div class="transaction-item">
                                    <div class="d-flex align-items-center">
                                        <div class="transaction-icon 
                                            @if($details->transaction == 'Bank Transfer') icon-transfer
                                            @elseif($details->transaction == 'Loan') icon-loan
                                            @elseif($details->transaction == 'Card') icon-card
                                            @elseif($details->transaction == 'Crypto Withdrawal') icon-crypto
                                            @elseif($details->transaction == 'Paypal Withdrawal') icon-paypal
                                            @elseif($details->transaction == 'Skrill Withdrawal') icon-skrill
                                            @else icon-default @endif">
                                            @if($details->transaction == 'Bank Transfer')
                                                <i class="fas fa-exchange-alt"></i>
                                            @elseif($details->transaction == 'Loan')
                                                <i class="fas fa-hand-holding-usd"></i>
                                            @elseif($details->transaction == 'Card')
                                                <i class="fas fa-credit-card"></i>
                                            @elseif($details->transaction == 'Crypto Withdrawal')
                                                <i class="fab fa-bitcoin"></i>
                                            @elseif($details->transaction == 'Paypal Withdrawal')
                                                <i class="fab fa-paypal"></i>
                                            @elseif($details->transaction == 'Skrill Withdrawal')
                                                <i class="fas fa-wallet"></i>
                                            @else
                                                <i class="fas fa-info-circle"></i>
                                            @endif
                                        </div>
                                        <div class="transaction-details">
                                            <h6 class="transaction-title">
                                                {{ Str::limit($details->transaction_description, 25) }}
                                            </h6>
                                            <p class="transaction-meta mb-0">
                                                {{ $details->transaction }}
                                                @if(!str_contains($details->transaction_description, 'From'))
                                                    • From •••{{ substr($details->account_number ?? '0000', -4) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="transaction-amount 
                                        @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal'])) amount-negative
                                        @elseif($details->transaction == 'Loan') amount-positive
                                        @endif">
                                        @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']))
                                            -{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                        @elseif($details->transaction == 'Loan')
                                            +{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                        @endif
                                        <span class="transaction-status 
                                            @if($details->transaction_status == '1') status-completed
                                            @elseif($details->transaction_status == '0') status-pending
                                            @else status-failed @endif">
                                            @if($details->transaction == 'Card' && $details->transaction_status == '1')
                                                Approved
                                            @elseif($details->transaction_status == '1')
                                                Successful
                                            @elseif($details->transaction_status == '0')
                                                Pending
                                            @else
                                                Failed
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
    <div class="dashboard-card h-100">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0">
                <i class="fas fa-exchange-alt me-2"></i> Debit & Credit Summary
            </h5>
            <small class="text-muted">{{ now()->format('M Y') }}</small> <!-- Dynamic month/year -->
        </div>
        
        <!-- Improved Chart Container -->
        <div class="chart-container" style="height: 180px;">
            <canvas id="debitCreditChart"></canvas>
        </div>
        
        <!-- Summary Stats -->
        <div class="mt-4">
            <div class="row">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary me-2" style="width: 12px; height: 12px;"></span>
                        <div>
                            <small class="text-muted d-block">Total Debit</small>
                            <h5 class="mb-0 text-primary">
                                {{ Auth::user()->currency }}{{ number_format($debit_transfers, 2) }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="text-end">
                            <small class="text-muted d-block">Total Credit</small>
                            <h5 class="mb-0 text-success">
                                {{ Auth::user()->currency }}{{ number_format($credit_transfers, 2) }}
                            </h5>
                        </div>
                        <span class="badge bg-success ms-2" style="width: 12px; height: 12px;"></span>
                    </div>
                </div>
            </div>
            
            <!-- Net Balance -->
            <div class="mt-3 pt-2 border-top">
                <small class="text-muted">Net Balance</small>
                @php
                    $net_balance = $credit_transfers - $debit_transfers;
                    $balance_class = $net_balance >= 0 ? 'text-success' : 'text-danger';
                @endphp
                <h4 class="mb-0 {{ $balance_class }}">
                    {{ Auth::user()->currency }}{{ number_format(abs($net_balance), 2) }}
                    <small class="text-muted">{{ $net_balance >= 0 ? '(Surplus)' : '(Deficit)' }}</small>
                </h4>
            </div>
        </div>
    </div>
</div>

<!-- Chart Script (Place this in your scripts section) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('debitCreditChart').getContext('2d');
    const debitCreditChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Debit', 'Credit'],
            datasets: [{
                data: [{{ $debit_transfers }}, {{ $credit_transfers }}],
                backgroundColor: [
                    'rgba(99, 102, 241, 0.7)',  // Indigo for debit
                    'rgba(16, 185, 129, 0.7)'   // Emerald for credit
                ],
                borderColor: [
                    'rgba(99, 102, 241, 1)',
                    'rgba(16, 185, 129, 1)'
                ],
                borderWidth: 1,
                barPercentage: 0.5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return '{{ Auth::user()->currency }}' + context.raw.toLocaleString('en-US', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '{{ Auth::user()->currency }}' + value.toLocaleString();
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>

        <!-- Advert Carousel Row -->
        <div class="row animate-fadein delay-3 mt-3 mt-md-4">
            <div class="col-12">
                <div class="dashboard-card p-0 overflow-hidden">
                    <div id="bankCarousel" class="carousel slide" data-bs-ride="carousel">
                   <div class="carousel-inner">
    <!-- Premium Banking -->
    <div class="carousel-item active">
        <div class="carousel-advert d-flex align-items-center" style="background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);">
            <div class="p-4 p-md-5 text-white">
                <h3>Premium Banking</h3>
                <p>Upgrade to our premium account for exclusive benefits</p>
                <button class="btn btn-light btn-sm">Learn More</button>
            </div>
        </div>
    </div>

    <!-- Card Services -->
    <div class="carousel-item">
        <div class="carousel-advert d-flex align-items-center" style="background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);">
            <div class="p-4 p-md-5 text-white">
                <h3>Card Services</h3>
                <p>Request physical or virtual cards and enjoy secure transactions worldwide</p>
                <button class="btn btn-light btn-sm">Request Now</button>
            </div>
        </div>
    </div>

    <!-- Bank Transfers -->
    <div class="carousel-item">
        <div class="carousel-advert d-flex align-items-center" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
            <div class="p-4 p-md-5 text-white">
                <h3>Bank Transfers</h3>
                <p>Send and receive funds with fast, reliable local and international transfers</p>
                <button class="btn btn-light btn-sm">Transfer</button>
            </div>
        </div>
    </div>
</div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#bankCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bankCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


  <!-- Modal -->
<div class="modal fade" id="requestFormModal" tabindex="-1" aria-labelledby="requestFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title" id="requestFormModalLabel">Card Delivery Request Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="requestForm" action="{{ route('user.cards.requestcard.delivery') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fname" required>
                    </div>

                    <div class="mb-3">
                        <label for="houseAddress" class="form-label">House Address</label>
                        <input type="text" class="form-control" id="houseAddress" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>



@include('user.footer')