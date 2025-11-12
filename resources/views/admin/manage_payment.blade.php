@include('admin.header')
<style>
    /* ---------- Payment Methods Admin Styles ---------- */
    .payment-methods-admin {
        padding: 20px 0;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .admin-header h1 {
        color: #1e293b;
        margin: 0;
        font-weight: 600;
        font-size: 1.8rem;
    }

    .admin-header p {
        color: #64748b;
        margin: 8px 0 0 0;
        font-size: 1rem;
    }

    .admin-actions {
        display: flex;
        gap: 12px;
    }

    .btn-add {
        background: linear-gradient(135deg, #0c7453 0%, #0c7453 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(12, 116, 83, 0.3);
    }

    .btn-export {
        background: white;
        border: 1px solid #e2e8f0;
        color: #64748b;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-export:hover {
        background: #f8fafc;
        color: #1e293b;
    }

    /* Payment Methods Grid */
    .payment-methods-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }

    .payment-method-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        position: relative;
    }

    .payment-method-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
    }

    .payment-method-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .payment-method-info {
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
    }

    .payment-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }

    .payment-details h4 {
        margin: 0 0 4px 0;
        font-weight: 600;
        color: #1e293b;
    }

    .payment-details p {
        margin: 0;
        color: #64748b;
        font-size: 0.9rem;
    }

    .payment-status {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-active {
        background: rgba(5, 150, 105, 0.1);
        color: #059669;
    }

    .status-inactive {
        background: rgba(220, 38, 38, 0.1);
        color: #dc2626;
    }

    .payment-method-body {
        margin-bottom: 20px;
    }

    .payment-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 15px;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #64748b;
        margin-bottom: 4px;
    }

    .stat-value {
        font-weight: 600;
        color: #1e293b;
    }

    .payment-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .payment-features li {
        display: flex;
        align-items: center;
        margin-bottom: 6px;
        font-size: 0.85rem;
        color: #64748b;
    }

    .payment-features li i {
        margin-right: 8px;
        font-size: 0.8rem;
        width: 16px;
        text-align: center;
    }

    .payment-method-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid #e2e8f0;
    }

    .payment-actions {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e8f0;
        background: white;
        color: #64748b;
        transition: all 0.2s ease;
    }

    .btn-action:hover {
        background: #f8fafc;
        color: #1e293b;
    }

    .btn-edit:hover {
        border-color: #0c7453;
        color: #0c7453;
    }

    .btn-delete:hover {
        border-color: #dc2626;
        color: #dc2626;
    }

    .last-updated {
        font-size: 0.8rem;
        color: #64748b;
    }

    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        padding: 20px;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        width: 100%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        padding: 20px 24px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h3 {
        margin: 0;
        color: #1e293b;
        font-weight: 600;
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        color: #64748b;
        cursor: pointer;
        padding: 5px;
    }

    .modal-close:hover {
        color: #1e293b;
    }

    .modal-body {
        padding: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #1e293b;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #0c7453;
        box-shadow: 0 0 0 3px rgba(12, 116, 83, 0.1);
    }

    .form-select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        background: white;
        cursor: pointer;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
    }

    .form-check-label {
        font-size: 0.9rem;
        color: #1e293b;
    }

    .modal-footer {
        padding: 20px 24px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-cancel {
        background: white;
        border: 1px solid #e2e8f0;
        color: #64748b;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: #f8fafc;
        color: #1e293b;
    }

    .btn-save {
        background: linear-gradient(135deg, #0c7453 0%, #0c7453 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(12, 116, 83, 0.3);
    }

    /* Tabs for Payment Details */
    .payment-details-tabs {
        margin-top: 20px;
    }

    .nav-tabs {
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .nav-tab {
        background: none;
        border: none;
        padding: 10px 16px;
        color: #64748b;
        font-weight: 500;
        border-bottom: 2px solid transparent;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nav-tab.active {
        color: #0c7453;
        border-bottom-color: #0c7453;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .wallet-addresses, .bank-details {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .wallet-item, .bank-item {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 15px;
        background: #f8fafc;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .wallet-item label, .bank-item label {
        font-weight: 500;
        color: #1e293b;
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .payment-methods-grid {
            grid-template-columns: 1fr;
        }
        
        .admin-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .admin-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .payment-stats {
            grid-template-columns: 1fr;
        }
        
        .payment-method-footer {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .payment-actions {
            align-self: flex-end;
        }

        .modal-content {
            max-width: 95%;
        }
    }
</style>

<div class="main-content" id="mainContent">
    <!-- Replace your static cards with dynamic ones -->
<div class="payment-methods-grid">
    @foreach($paymentMethods as $method)
    <div class="payment-method-card">
        <div class="payment-method-header">
            <div class="payment-method-info">
                <div class="payment-icon" style="background: {{ $method->icon_color }};">
                    @switch($method->type)
                        @case('crypto')<i class="fab fa-bitcoin"></i>@break
                        @case('cashapp')<i class="fas fa-dollar-sign"></i>@break
                        @case('bank')<i class="fas fa-university"></i>@break
                        @case('paypal')<i class="fab fa-paypal"></i>@break
                        @case('card')<i class="fas fa-credit-card"></i>@break
                    @endswitch
                </div>
                <div class="payment-details">
                    <h4>{{ $method->name }}</h4>
                    <p>{{ $method->description }}</p>
                </div>
            </div>
            <div class="payment-status">
                <span class="status-badge status-{{ $method->status }}">{{ ucfirst($method->status) }}</span>
            </div>
        </div>
        <div class="payment-method-body">
            <div class="payment-stats">
                <div class="stat-item">
                    <span class="stat-label">Processing Time</span>
                    <span class="stat-value">{{ $method->processing_time }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Minimum Deposit</span>
                    <span class="stat-value">{{ $method->minimum_deposit }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Transaction Fee</span>
                    <span class="stat-value">{{ $method->transaction_fee }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Daily Limit</span>
                    <span class="stat-value">{{ $method->daily_limit }}</span>
                </div>
            </div>
            @if(!empty($method->features))
            <ul class="payment-features">
                @foreach(array_slice($method->features, 0, 3) as $feature)
                <li><i class="fas fa-check text-success"></i> {{ $feature }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="payment-method-footer">
            <div class="last-updated">Updated {{ $method->updated_at->diffForHumans() }}</div>
            <div class="payment-actions">
                <button class="btn-action btn-edit" title="Edit" data-id="{{ $method->id }}">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-action btn-delete" title="Delete" data-id="{{ $method->id }}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

       <!-- Add/Edit Payment Method Modal -->
<div class="modal-overlay" id="paymentModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Add Payment Method</h3>
            <button class="modal-close" id="closeModal">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="paymentMethodForm" method="POST">
                @csrf
                <input type="hidden" id="methodId" name="id">
                <input type="hidden" id="formAction" name="form_action" value="create">
                
                <div class="form-group">
                    <label class="form-label">Payment Method Name *</label>
                    <input type="text" class="form-control" name="name" id="methodName" placeholder="e.g., Cash App, Bank Transfer" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea class="form-control" name="description" id="methodDescription" placeholder="Brief description of the payment method" required maxlength="500"></textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Payment Type *</label>
                    <select class="form-select" name="type" id="methodType" required>
                        <option value="">Select Type</option>
                        <option value="crypto">Cryptocurrency</option>
                        <option value="cashapp">Cash App</option>
                        <option value="bank">Bank Transfer</option>
                        <option value="paypal">PayPal</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Status *</label>
                    <select class="form-select" name="status" id="methodStatus" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Icon Color</label>
                    <input type="color" class="form-control" name="icon_color" id="iconColor" value="#0c7453" style="height: 45px;">
                </div>

                <div class="payment-specs">
                    <h5>Payment Specifications</h5>
                    <div class="form-group">
                        <label class="form-label">Processing Time *</label>
                        <input type="text" class="form-control" name="processing_time" id="processingTime" placeholder="e.g., Instant, 2-3 business days" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Minimum Deposit *</label>
                        <input type="text" class="form-control" name="minimum_deposit" id="minimumDeposit" placeholder="e.g., $10, $25" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Transaction Fee *</label>
                        <input type="text" class="form-control" name="transaction_fee" id="transactionFee" placeholder="e.g., 0%, 1.5%, $25 flat" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Daily Limit *</label>
                        <input type="text" class="form-control" name="daily_limit" id="dailyLimit" placeholder="e.g., $1,000, No limit" required>
                    </div>
                </div>

                <!-- Tabs for different payment details -->
                <div class="payment-details-tabs">
                    <div class="nav-tabs">
                        <button type="button" class="nav-tab active" data-tab="features">Features</button>
                        <button type="button" class="nav-tab" data-tab="instructions">Instructions</button>
                        <button type="button" class="nav-tab" data-tab="details">Payment Details</button>
                    </div>

                    <!-- Features Tab -->
                    <div class="tab-content active" id="featuresTab">
                        <div class="form-group">
                            <label class="form-label">Features</label>
                            <div id="featuresContainer">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input feature-checkbox" value="Instant processing">
                                    <label class="form-check-label">Instant processing</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input feature-checkbox" value="24/7 availability">
                                    <label class="form-check-label">24/7 availability</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input feature-checkbox" value="Multi-currency support">
                                    <label class="form-check-label">Multi-currency support</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input feature-checkbox" value="Full audit trail">
                                    <label class="form-check-label">Full audit trail</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input feature-checkbox" value="No deposit limits">
                                    <label class="form-check-label">No deposit limits</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input feature-checkbox" value="Bank-level security">
                                    <label class="form-check-label">Bank-level security</label>
                                </div>
                            </div>
                            <input type="hidden" name="features" id="featuresInput">
                        </div>
                    </div>

                    <!-- Instructions Tab -->
                    <div class="tab-content" id="instructionsTab">
                        <div class="form-group">
                            <label class="form-label">Deposit Instructions</label>
                            <textarea class="form-control" name="deposit_instructions" id="depositInstructions" rows="5" placeholder="Enter step-by-step instructions for users to make deposits..."></textarea>
                        </div>
                    </div>

                    <!-- Payment Details Tab -->
                    <div class="tab-content" id="detailsTab">
                        <!-- Crypto Wallet Addresses -->
                        <div class="payment-type-details" id="cryptoDetails">
                            <h6>Cryptocurrency Wallet Addresses</h6>
                            <div class="wallet-addresses">
                                <div class="wallet-item">
                                    <label>Bitcoin (BTC) Address</label>
                                    <input type="text" class="form-control crypto-address" data-coin="BTC" placeholder="Enter Bitcoin wallet address">
                                </div>
                                <div class="wallet-item">
                                    <label>Ethereum (ETH) Address</label>
                                    <input type="text" class="form-control crypto-address" data-coin="ETH" placeholder="Enter Ethereum wallet address">
                                </div>
                                <div class="wallet-item">
                                    <label>USDT (ERC20) Address</label>
                                    <input type="text" class="form-control crypto-address" data-coin="USDT" placeholder="Enter USDT wallet address">
                                </div>
                                <div class="wallet-item">
                                    <label>Litecoin (LTC) Address</label>
                                    <input type="text" class="form-control crypto-address" data-coin="LTC" placeholder="Enter Litecoin wallet address">
                                </div>
                            </div>
                            <input type="hidden" name="wallet_addresses" id="walletAddressesInput">
                        </div>

                        <!-- Cash App Details -->
                        <div class="payment-type-details" id="cashappDetails">
                            <h6>Cash App Details</h6>
                            <div class="wallet-item">
                                <label for="cashappTag">Cash App Tag *</label>
                                <input type="text" class="form-control" name="cashapp_tag" id="cashappTag" placeholder="Enter Cash App tag (e.g., $YourTag)">
                            </div>
                        </div>

                        <!-- Bank Transfer Details -->
                        <div class="payment-type-details" id="bankDetails">
                            <h6>Bank Transfer Details</h6>
                            <div class="bank-details">
                                <div class="bank-item">
                                    <label for="bankName">Bank Name *</label>
                                    <input type="text" class="form-control" name="bank_details[bank_name]" id="bankName" placeholder="Enter bank name">
                                </div>
                                <div class="bank-item">
                                    <label for="accountName">Account Name *</label>
                                    <input type="text" class="form-control" name="bank_details[account_name]" id="accountName" placeholder="Enter account holder name">
                                </div>
                                <div class="bank-item">
                                    <label for="accountNumber">Account Number *</label>
                                    <input type="text" class="form-control" name="bank_details[account_number]" id="accountNumber" placeholder="Enter account number">
                                </div>
                                <div class="bank-item">
                                    <label for="routingNumber">Routing Number</label>
                                    <input type="text" class="form-control" name="bank_details[routing_number]" id="routingNumber" placeholder="Enter routing number">
                                </div>
                                <div class="bank-item">
                                    <label for="swiftCode">SWIFT Code</label>
                                    <input type="text" class="form-control" name="bank_details[swift_code]" id="swiftCode" placeholder="Enter SWIFT code">
                                </div>
                                <div class="bank-item">
                                    <label for="iban">IBAN</label>
                                    <input type="text" class="form-control" name="bank_details[iban]" id="iban" placeholder="Enter IBAN">
                                </div>
                            </div>
                        </div>

                        <!-- PayPal Details -->
                        <div class="payment-type-details" id="paypalDetails">
                            <h6>PayPal Details</h6>
                            <div class="wallet-item">
                                <label for="paypalEmail">PayPal Email *</label>
                                <input type="email" class="form-control" name="paypal_email" id="paypalEmail" placeholder="Enter PayPal email address">
                            </div>
                        </div>

                        <!-- Card Details (if needed) -->
                        <div class="payment-type-details" id="cardDetails">
                            <h6>Card Payment Details</h6>
                            <div class="wallet-item">
                                <label>Card payment details are handled by the payment processor.</label>
                                <p class="text-muted">No additional configuration needed for card payments.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <        </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="cancelModal">Cancel</button>
                    <button type="button" class="btn-save" id="savePaymentMethod">Save Payment Method</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    const addPaymentMethodBtn = document.getElementById('addPaymentMethod');
    const paymentModal = document.getElementById('paymentModal');
    const closeModalBtn = document.getElementById('closeModal');
    const cancelModalBtn = document.getElementById('cancelModal');
    const savePaymentMethodBtn = document.getElementById('savePaymentMethod');
    const modalTitle = document.getElementById('modalTitle');
    const paymentMethodForm = document.getElementById('paymentMethodForm');
    const methodTypeSelect = document.getElementById('methodType');
    const formActionInput = document.getElementById('formAction');
    const methodIdInput = document.getElementById('methodId');
    
    const navTabs = document.querySelectorAll('.nav-tab');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Method details containers
    const cryptoDetails = document.getElementById('cryptoDetails');
    const cashappDetails = document.getElementById('cashappDetails');
    const bankDetails = document.getElementById('bankDetails');
    const paypalDetails = document.getElementById('paypalDetails');
    const cardDetails = document.getElementById('cardDetails');
    
    // Hidden inputs for JSON data
    const featuresInput = document.getElementById('featuresInput');
    const walletAddressesInput = document.getElementById('walletAddressesInput');
    
    // Edit buttons
    const editButtons = document.querySelectorAll('.btn-edit');
    
    // Open modal for adding new payment method
    addPaymentMethodBtn.addEventListener('click', function() {
        modalTitle.textContent = 'Add Payment Method';
        formActionInput.value = 'create';
        methodIdInput.value = '';
        resetForm();
        hideAllPaymentDetails();
        paymentModal.classList.add('active');
        
        // Set form action
        paymentMethodForm.action = "{{ route('admin.payment.methods.store') }}";
        paymentMethodForm.method = 'POST';
    });
    
    // Close modal
    function closeModal() {
        paymentModal.classList.remove('active');
    }
    
    closeModalBtn.addEventListener('click', closeModal);
    cancelModalBtn.addEventListener('click', closeModal);
    
    // Tab switching
    navTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Remove active class from all tabs and contents
            navTabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(tabId + 'Tab').classList.add('active');
        });
    });
    
    // Handle payment type change
    methodTypeSelect.addEventListener('change', function() {
        hideAllPaymentDetails();
        const type = this.value;
        
        if (type === 'crypto') {
            cryptoDetails.style.display = 'block';
        } else if (type === 'cashapp') {
            cashappDetails.style.display = 'block';
        } else if (type === 'bank') {
            bankDetails.style.display = 'block';
        } else if (type === 'paypal') {
            paypalDetails.style.display = 'block';
        } else if (type === 'card') {
            cardDetails.style.display = 'block';
        }
    });
    
    // Edit payment method
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const methodId = this.getAttribute('data-id');
            modalTitle.textContent = 'Edit Payment Method';
            formActionInput.value = 'update';
            
            // Fetch payment method details
            fetch(`/admin/payment-methods/${methodId}/details`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateForm(data.data);
                        paymentModal.classList.add('active');
                    } else {
                        alert('Error loading payment method details: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading payment method details. Please try again.');
                });
        });
    });
    
    // Reset form function
    function resetForm() {
        paymentMethodForm.reset();
        document.getElementById('iconColor').value = '#0c7453';
        
        // Uncheck all feature checkboxes
        document.querySelectorAll('.feature-checkbox').forEach(checkbox => {
            checkbox.checked = false;
        });
        
        // Clear wallet addresses
        document.querySelectorAll('.crypto-address').forEach(input => {
            input.value = '';
        });
        
        // Reset hidden inputs
        featuresInput.value = '';
        walletAddressesInput.value = '';
    }
    
    // Hide all payment details
    function hideAllPaymentDetails() {
        const paymentDetails = document.querySelectorAll('.payment-type-details');
        paymentDetails.forEach(detail => {
            detail.style.display = 'none';
        });
    }
    
    // Populate form with existing data
    function populateForm(data) {
        methodIdInput.value = data.id;
        document.getElementById('methodName').value = data.name || '';
        document.getElementById('methodDescription').value = data.description || '';
        document.getElementById('methodType').value = data.type || '';
        document.getElementById('methodStatus').value = data.status || 'active';
        document.getElementById('processingTime').value = data.processing_time || '';
        document.getElementById('minimumDeposit').value = data.minimum_deposit || '';
        document.getElementById('transactionFee').value = data.transaction_fee || '';
        document.getElementById('dailyLimit').value = data.daily_limit || '';
        document.getElementById('depositInstructions').value = data.deposit_instructions || '';
        document.getElementById('iconColor').value = data.icon_color || '#0c7453';
        
        // Populate features
        const features = data.features || [];
        document.querySelectorAll('.feature-checkbox').forEach(checkbox => {
            checkbox.checked = features.includes(checkbox.value);
        });
        updateFeaturesInput();
        
        // Populate payment-specific details
        hideAllPaymentDetails();
        if (data.type === 'crypto') {
            cryptoDetails.style.display = 'block';
            const wallets = data.wallet_addresses || [];
            wallets.forEach(wallet => {
                const input = document.querySelector(`.crypto-address[data-coin="${wallet.coin}"]`);
                if (input) {
                    input.value = wallet.address || '';
                }
            });
            updateWalletAddressesInput();
        } else if (data.type === 'cashapp') {
            cashappDetails.style.display = 'block';
            document.getElementById('cashappTag').value = data.cashapp_tag || '';
        } else if (data.type === 'bank') {
            bankDetails.style.display = 'block';
            const bankDetailsData = data.bank_details || {};
            document.getElementById('bankName').value = bankDetailsData.bank_name || '';
            document.getElementById('accountName').value = bankDetailsData.account_name || '';
            document.getElementById('accountNumber').value = bankDetailsData.account_number || '';
            document.getElementById('routingNumber').value = bankDetailsData.routing_number || '';
            document.getElementById('swiftCode').value = bankDetailsData.swift_code || '';
            document.getElementById('iban').value = bankDetailsData.iban || '';
        } else if (data.type === 'paypal') {
            paypalDetails.style.display = 'block';
            document.getElementById('paypalEmail').value = data.paypal_email || '';
        } else if (data.type === 'card') {
            cardDetails.style.display = 'block';
        }
        
        // Trigger type change to show correct details
        methodTypeSelect.dispatchEvent(new Event('change'));
        
        // Set form action for updating
        paymentMethodForm.action = `/admin/payment-methods/${data.id}/update`;
        paymentMethodForm.method = 'POST';
        
        // Add method spoofing for PUT request
        let methodField = paymentMethodForm.querySelector('input[name="_method"]');
        if (!methodField) {
            methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            paymentMethodForm.appendChild(methodField);
        }
        methodField.value = 'PUT';
    }
    
    // Update features hidden input
    function updateFeaturesInput() {
        const selectedFeatures = [];
        document.querySelectorAll('.feature-checkbox:checked').forEach(checkbox => {
            selectedFeatures.push(checkbox.value);
        });
        featuresInput.value = JSON.stringify(selectedFeatures);
    }
    
    // Update wallet addresses hidden input
    function updateWalletAddressesInput() {
        const walletAddresses = [];
        document.querySelectorAll('.crypto-address').forEach(input => {
            if (input.value.trim()) {
                walletAddresses.push({
                    coin: input.getAttribute('data-coin'),
                    address: input.value.trim()
                });
            }
        });
        walletAddressesInput.value = JSON.stringify(walletAddresses);
    }
    
    // Event listeners for dynamic updates
    document.querySelectorAll('.feature-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateFeaturesInput);
    });
    
    document.querySelectorAll('.crypto-address').forEach(input => {
        input.addEventListener('input', updateWalletAddressesInput);
    });
    
    // Save payment method
    savePaymentMethodBtn.addEventListener('click', function() {
        // Update hidden inputs
        updateFeaturesInput();
        if (methodTypeSelect.value === 'crypto') {
            updateWalletAddressesInput();
        }
        
        // Validate required fields based on type
        if (!validateForm()) {
            return;
        }
        
        // Submit the form
        paymentMethodForm.submit();
    });
    
    // Form validation
    function validateForm() {
        const type = methodTypeSelect.value;
        
        if (type === 'cashapp' && !document.getElementById('cashappTag').value.trim()) {
            alert('Please enter Cash App tag');
            return false;
        }
        
        if (type === 'paypal' && !document.getElementById('paypalEmail').value.trim()) {
            alert('Please enter PayPal email');
            return false;
        }
        
        if (type === 'bank') {
            if (!document.getElementById('bankName').value.trim()) {
                alert('Please enter bank name');
                return false;
            }
            if (!document.getElementById('accountName').value.trim()) {
                alert('Please enter account name');
                return false;
            }
            if (!document.getElementById('accountNumber').value.trim()) {
                alert('Please enter account number');
                return false;
            }
        }
        
        return true;
    }
    
    // Delete payment method
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const methodId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this payment method? This action cannot be undone.')) {
                // Create and submit delete form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/payment-methods/${methodId}/delete`;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
    
    // Close modal when clicking outside
    paymentModal.addEventListener('click', function(e) {
        if (e.target === paymentModal) {
            closeModal();
        }
    });
    
    // Export functionality
    document.querySelector('.btn-export').addEventListener('click', function() {
        window.location.href = "{{ route('admin.payment.methods.export') }}";
    });
});
</script>
@include('admin.footer')