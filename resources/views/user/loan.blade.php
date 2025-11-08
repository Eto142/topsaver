@include('user.header')
<style>
:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --success: #059669;
    --error: #dc2626;
    --warning: #d97706;
    --background: #f8fafc;
    --surface: #ffffff;
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --border: #e2e8f0;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.content-body {
    background: var(--background);
    min-height: calc(100vh - 80px);
}

.card {
    border-radius: 12px;
    box-shadow: var(--shadow);
    border: none;
    margin-bottom: 24px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.1);
}

.card-header {
    background: var(--primary);
    border-bottom: none;
    padding: 20px;
    color: white;
}

.card-body {
    padding: 24px;
}

.btn-primary {
    background: var(--primary);
    border: none;
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
}

.btn-warning {
    background: var(--warning);
    border: none;
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background: #b45309;
    transform: translateY(-1px);
}

.form-control, .form-select {
    border-radius: 8px;
    padding: 12px 16px;
    border: 1px solid var(--border);
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.pin-grid {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin: 20px 0 10px;
}

.pin-digit {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    border: 2px solid var(--border);
    background: var(--surface);
    transition: all 0.3s ease;
    -moz-appearance: textfield;
}

.pin-digit:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.pin-digit.filled {
    border-color: var(--success);
    background: #f0fdf4;
}

.bank-toast {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 3000;
    display: flex;
    gap: 12px;
    align-items: center;
    min-width: 300px;
    max-width: 400px;
    padding: 12px 16px;
    border-radius: 8px;
    color: white;
    box-shadow: var(--shadow);
    transform: translateX(100%) translateY(-20px);
    opacity: 0;
    transition: all 0.3s ease;
}

.bank-toast.show {
    transform: translateX(0) translateY(0);
    opacity: 1;
}

.bank-toast.success { 
    background: var(--success);
}

.bank-toast.error { 
    background: var(--error);
}

.bank-toast .icon {
    width: 36px;
    height: 36px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 36px;
    background: rgba(255, 255, 255, 0.2);
}

.bank-toast .text { 
    font-size: 14px; 
    line-height: 1.4;
    font-weight: 500;
}

.bank-toast.hide { 
    opacity: 0;
    transform: translateX(100%) translateY(-20px);
}

.modal-content {
    border-radius: 12px;
    border: none;
    box-shadow: var(--shadow);
}

.modal-header {
    background: var(--primary);
    border-bottom: none;
    padding: 16px 20px;
    color: white;
}

.modal-title {
    font-weight: 600;
}

.modal-body {
    padding: 20px;
}

.btn-close-white {
    filter: invert(1) brightness(100%);
}

.table {
    border-radius: 12px;
    overflow: hidden;
}

.table thead th {
    background: var(--primary);
    color: white;
    border: none;
    padding: 16px;
    font-weight: 600;
}

.table tbody td {
    padding: 16px;
    border-color: var(--border);
}

.btn-success {
    background: var(--success);
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 0.875rem;
}

.btn-warning {
    background: var(--warning);
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 0.875rem;
}

.invoice-card {
    padding: 16px;
}

.invoice-card .fs-38 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 8px;
}

.invoice-card .fs-18 {
    font-size: 1.125rem;
    color: var(--text-secondary);
}

@media (max-width: 768px) {
    .pin-digit {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }
    
    .bank-toast {
        left: 16px;
        right: 16px;
        top: 16px;
        min-width: unset;
    }
    
    .invoice-card .fs-38 {
        font-size: 2rem;
    }
}
</style>

<div class="content-body">
    <!-- Server Messages -->
    <div id="server-message"
         data-status="@if(session('status')){{ session('status') }}@endif"
         data-error="@if(session('error')){{ session('error') }}@endif"
         style="display:none;"></div>

    <!-- row -->
    <div class="container-fluid">
        <div class="form-head mb-4"> 
            <h2 class="text-black font-w600 mb-0">Loans</h2>
        </div>
        <div class="my-4">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loanModal">
                Request Loan <span class="btn-icon-end"><i class="fa fa-star"></i></span>
            </button>
        </div>
        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center invoice-card">
                            <div class="media-body">
                                <h2 class="fs-38 text-black font-w600">{{Auth::user()->currency}}{{number_format($outstanding_loan, 2, '.', ',')}}</h2>
                                <span class="fs-18">Outstanding</span>
                            </div>
                            <span class="p-3 border ms-3 rounded-circle">
                                <svg width="34" height="34" viewbox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.9165 1.41669H7.08317C5.58028 1.41669 4.13894 2.01371 3.07623 3.07642C2.01353 4.13912 1.4165 5.58046 1.4165 7.08335V17C1.4165 17.3757 1.56576 17.7361 1.83144 18.0018C2.09711 18.2674 2.45745 18.4167 2.83317 18.4167H9.9165V31.1667C9.91583 31.4376 9.99289 31.7031 10.1385 31.9316C10.2842 32.1601 10.4923 32.342 10.7382 32.4559C10.9847 32.5693 11.2585 32.6096 11.5273 32.5719C11.796 32.5343 12.0482 32.4202 12.254 32.2434L16.2915 28.7867L20.329 32.2434C20.5856 32.4628 20.9122 32.5834 21.2498 32.5834C21.5875 32.5834 21.9141 32.4628 22.1707 32.2434L26.2082 28.7867L30.2457 32.2434C25.1197 32.1199 23.801 19.809 33.9006 18.8926C34.2526 15.7649 33.7213 12.5907 32.3733 9.72855Z" fill="#858585"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center invoice-card">
                            <div class="media-body">
                                <h2 class="fs-38 text-black font-w600">{{Auth::user()->currency}}{{number_format(Auth::user()->eligible_loan, 2, '.', ',')}}</h2>
                                <span class="fs-18">Eligible Amount</span>
                            </div>
                            <span class="p-3 border ms-3 rounded-circle">
                                <svg width="34" height="34" viewbox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32.3668 9.72969C30.9793 6.78884 28.782 4.31932 26.0137 2.58667C22.1634 0.18354 17.6028 -0.579886 13.1815 0.442442C8.7603 1.45813 4.99628 4.14008 2.59315 7.9904C0.183379 11.8407 -0.580047 16.3947 0.44228 20.8226C1.46461 25.2438 4.14656 29.0079 7.99024 31.411C10.6987 33.1038 13.8056 34 16.9854 34H17.1912C20.3577 33.9602 23.438 33.0441 26.1067 31.3579C26.8834 30.8666 27.1091 29.8443 26.6178 29.0676C26.1266 28.2909 25.1043 28.0652 24.3276 28.5564C22.1833 29.9173 19.7005 30.6542 17.1514 30.6874C14.5358 30.7206 11.98 29.997 9.74944 28.6095C6.64927 26.6711 4.49176 23.644 3.67522 20.0857C2.85869 16.5275 3.46943 12.8631 5.40787 9.76288C9.40424 3.37001 17.8617 1.4183 24.2545 5.41467C26.4851 6.80875 28.2509 8.79366 29.3662 11.157C30.4549 13.4605 30.8797 16.0163 30.5943 18.539C30.4947 19.4484 31.1453 20.2716 32.0614 20.3712C32.9709 20.4708 33.794 19.8202 33.8936 18.9041C34.2455 15.7641 33.7144 12.5909 32.3668 9.72969Z" fill="#2BC155"></path>
                                    <path d="M22.4914 11.2377L14.4846 19.2445L11.5169 16.2768C10.8663 15.6262 9.81732 15.6262 9.16669 16.2768C8.51605 16.9274 8.51605 17.9764 9.16669 18.6271L13.3095 22.7699C13.6348 23.0952 14.0597 23.2545 14.4846 23.2545C14.9095 23.2545 15.3345 23.0952 15.6598 22.7699L24.8351 13.588C25.4857 12.9373 25.4857 11.8883 24.8351 11.2377C24.1844 10.5937 23.1354 10.5937 22.4914 11.2377Z" fill="#2BC155"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center invoice-card">
                            <div class="media-body">
                                <h2 class="fs-38 text-black font-w600">{{Auth::user()->currency}}{{number_format($pending_loan, 2, '.', ',')}}</h2>
                                <span class="fs-18">Pending</span>
                            </div>
                            <span class="p-3 border ms-3 rounded-circle">
                                <svg width="34" height="34" viewbox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                    <path d="M32.3733 9.72855C30.9854 6.78675 28.7873 4.31644 26.0182 2.58323C22.1666 0.179327 17.6112 -0.584345 13.1819 0.438311C8.75922 1.45433 4.99399 4.13714 2.59008 7.9887C0.179532 11.8403 -0.58414 16.3957 0.438516 20.825C1.46117 25.2477 4.14399 29.0129 7.98891 31.4168C10.6983 33.1102 13.8061 34.0067 16.987 34.0067H17.1928C20.3604 33.9668 23.4416 33.0504 26.1112 31.3637C26.8881 30.8723 27.1139 29.8496 26.6225 29.0727C26.1311 28.2957 25.1084 28.07 24.3315 28.5614C22.1866 29.9227 19.703 30.6598 17.153 30.693C14.5366 30.7262 11.9799 30.0024 9.74867 28.6145C6.6475 26.6754 4.4893 23.6473 3.6725 20.0879C2.8557 16.5153 3.46664 12.8496 5.4057 9.74847C9.40336 3.35355 17.8635 1.4012 24.2584 5.39886C26.4897 6.79339 28.2561 8.77894 29.3717 11.143C30.4608 13.4473 30.8858 16.0039 30.6002 18.5274C30.5006 19.4371 31.1514 20.2606 32.0678 20.3602C32.9776 20.4598 33.801 19.809 33.9006 18.8926C34.2526 15.7649 33.7213 12.5907 32.3733 9.72855Z" fill="#FF2E2E"></path>
                                    <path d="M22.7647 11.2359C22.114 10.5852 21.0647 10.5852 20.414 11.2359L17.0007 14.6559L13.5874 11.2426C12.9366 10.5918 11.8874 10.5918 11.2366 11.2426C10.5858 11.8934 10.5858 12.9426 11.2366 13.5934L14.6499 17.0066L11.2366 20.4199C10.5858 21.0707 10.5858 22.1199 11.2366 22.7707C11.562 23.0961 11.987 23.2555 12.412 23.2555C12.837 23.2555 13.262 23.0961 13.5874 22.7707L17.0007 19.3574L20.414 22.7707C20.7394 23.0961 21.1644 23.2555 21.5894 23.2555C22.0144 23.2555 22.4394 23.0961 22.7647 22.7707C23.4155 22.1199 23.4155 21.0707 22.7647 20.4199L19.3515 17L22.7647 13.5867C23.4155 12.9359 23.4155 11.8867 22.7647 11.2359Z" fill="#FF2E2E"></path>
                                    </g>
                                    <defs>
                                    <clippath id="clip0">
                                    <rect width="34" height="34" fill="white"></rect>
                                    </clippath>
                                    </defs>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="d-sm-flex d-block align-items-center mb-4">
                    <div class="me-auto">
                        <h4 class="fs-20 text-black">Loan History</h4>
                        <span class="fs-12 text-muted">Loans are only offered to existing and eligible customers</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive table-hover fs-14">
                    <table class="table display mb-4 dataTablesCard" id="example5">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Account Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaction as $details)
                            <tr>
                                <td><span class="text-black">{{$details->transaction_ref}}</span></td>
                                <td><span class="text-black font-w500">{{$details->transaction_amount}}</span></td>
                                <td><span class="text-black text-nowrap">{{ \Carbon\Carbon::parse($details->transaction_created_at)->format('D, M j, Y g:i A') }}</span></td>
                                <td><span class="text-black">{{Auth::user()->a_number}}</span></td>
                                <td class="text-center">
                                    @if($details->transaction_status == '1')
                                    <a href="javascript:void(0)" class="btn btn-success btn-rounded">Completed</a>
                                    @else
                                    <a href="javascript:void(0)" class="btn btn-warning btn-rounded">Pending</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Loan Request Modal -->
<div class="modal fade" id="loanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request Loan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loan_response"></div>
                <form id="loanForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Loan Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Enter loan amount" required>
                        <small class="text-muted">Maximum eligible amount: {{Auth::user()->currency}}{{number_format(Auth::user()->eligible_loan, 2, '.', ',')}}</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reason for Loan</label>
                        <textarea name="reason" class="form-control" placeholder="Please describe the purpose of this loan" rows="3" required></textarea>
                    </div>
                    <button type="button" id="proceedLoan" class="btn btn-primary w-100">Proceed to Verification</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- PIN Modal -->
<div class="modal fade" id="pinModalLoan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verify Loan Request</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3">Enter your 4-digit transaction PIN to authorize this loan request.</p>
                
                <div id="pinGridLoan" class="pin-grid">
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 1" />
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 2" />
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 3" />
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 4" />
                </div>

                <div id="pinErrorLoan" class="text-danger small mt-2" style="display: none;">
                    Please enter your 4-digit PIN.
                </div>

                <div class="mt-3 d-grid gap-2">
                    <button id="confirmPinLoan" class="btn btn-primary">Confirm Loan Request</button>
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" aria-live="polite" aria-atomic="true"></div>

@include('user.footer')

<script>
function showToast(message, type = 'info', timeout = 4000) {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `bank-toast ${type}`;
    
    const icon = document.createElement('div'); 
    icon.className = 'icon';
    
    if (type === 'success') {
        icon.innerHTML = '✓';
    } else if (type === 'error') {
        icon.innerHTML = '✕';
    } else {
        icon.innerHTML = 'ℹ';
    }
    
    const text = document.createElement('div'); 
    text.className = 'text'; 
    text.innerText = message;
    
    toast.appendChild(icon); 
    toast.appendChild(text);
    container.appendChild(toast);
    
    requestAnimationFrame(() => toast.classList.add('show'));
    
    setTimeout(() => {
        toast.classList.add('hide');
        setTimeout(() => { 
            try { container.removeChild(toast); } catch(e){} 
        }, 300);
    }, timeout);
}

document.addEventListener('DOMContentLoaded', function () {
    const loanForm = document.getElementById('loanForm');
    const proceedBtn = document.getElementById('proceedLoan');
    const pinModalLoanEl = document.getElementById('pinModalLoan');
    const pinModalLoan = (typeof bootstrap !== 'undefined') ? new bootstrap.Modal(pinModalLoanEl, {backdrop: 'static', keyboard: true}) : null;
    const pinGridLoan = document.getElementById('pinGridLoan');
    const pinDigitsLoan = Array.from(pinGridLoan.querySelectorAll('.pin-digit'));
    const pinErrorLoan = document.getElementById('pinErrorLoan');
    const confirmBtnLoan = document.getElementById('confirmPinLoan');
    const loanModalEl = document.getElementById('loanModal');
    const loanModal = (typeof bootstrap !== 'undefined') ? new bootstrap.Modal(loanModalEl) : null;

    function validateLoanForm() {
        const amount = loanForm.querySelector('[name="amount"]');
        const reason = loanForm.querySelector('[name="reason"]');
        const eligibleAmount = parseFloat('{{ Auth::user()->eligible_loan }}');
        
        if (!amount.value || amount.value <= 0) {
            showToast('Please enter a valid loan amount greater than zero.', 'error');
            amount.focus();
            return false;
        }
        
        if (parseFloat(amount.value) > eligibleAmount) {
            showToast(`Loan amount cannot exceed your eligible amount of {{Auth::user()->currency}}${eligibleAmount.toFixed(2)}.`, 'error');
            amount.focus();
            return false;
        }
        
        if (!reason.value.trim()) {
            showToast('Please provide a reason for your loan request.', 'error');
            reason.focus();
            return false;
        }
        
        return true;
    }

    function setupPinInputs(pinDigits) {
        pinDigits.forEach((input, idx) => {
            input.addEventListener('input', (e) => {
                const val = (e.target.value || '').replace(/\D/g, '').slice(-1);
                e.target.value = val;
                
                if (val) {
                    e.target.classList.add('filled');
                    if (idx < pinDigits.length - 1) {
                        pinDigits[idx + 1].focus();
                    }
                } else {
                    e.target.classList.remove('filled');
                }
                
                pinErrorLoan.style.display = 'none';
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace') {
                    if (!input.value && idx > 0) {
                        pinDigits[idx - 1].focus();
                        pinDigits[idx - 1].value = '';
                        pinDigits[idx - 1].classList.remove('filled');
                    }
                }
            });
        });
    }

    setupPinInputs(pinDigitsLoan);

    proceedBtn.addEventListener('click', function () {
        if (!validateLoanForm()) return;
        
        pinDigitsLoan.forEach(d => { 
            d.value = ''; 
            d.classList.remove('filled'); 
        });
        pinErrorLoan.style.display = 'none';
        
        if (loanModal) {
            loanModal.hide();
        }
        
        if (pinModalLoan) {
            setTimeout(() => {
                pinModalLoan.show();
                setTimeout(() => pinDigitsLoan[0].focus(), 200);
            }, 300);
        }
    });

    confirmBtnLoan.addEventListener('click', () => {
        const pin = pinDigitsLoan.map(d => d.value || '').join('');
        
        if (!/^\d{4}$/.test(pin)) {
            pinErrorLoan.style.display = 'block';
            showToast('Please enter your 4-digit PIN.', 'error');
            return;
        }
        
        pinErrorLoan.style.display = 'none';
        
        // Create the final form and submit
        const finalForm = document.createElement('form');
        finalForm.method = 'POST';
        finalForm.action = '{{ route("user.loans.make.loan") }}';
        finalForm.style.display = 'none';
        
        // Add CSRF token
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        finalForm.appendChild(csrfInput);
        
        // Add form data
        const formData = new FormData(loanForm);
        for (let [name, value] of formData) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            finalForm.appendChild(input);
        }
        
        // Add PIN
        const pinInput = document.createElement('input');
        pinInput.type = 'hidden';
        pinInput.name = 'transaction_pin';
        pinInput.value = pin;
        finalForm.appendChild(pinInput);
        
        document.body.appendChild(finalForm);
        
        confirmBtnLoan.textContent = 'Processing...';
        confirmBtnLoan.disabled = true;
        
        finalForm.submit();
    });

    if (pinModalLoanEl) {
        pinModalLoanEl.addEventListener('hidden.bs.modal', function () {
            confirmBtnLoan.disabled = false;
            confirmBtnLoan.textContent = 'Confirm Loan Request';
            if (loanModal) {
                loanModal.show();
            }
        });
    }

    (function showServerMessage() {
        const server = document.getElementById('server-message');
        if (!server) return;
        
        const s = server.getAttribute('data-status') || '';
        const e = server.getAttribute('data-error') || '';
        
        if (s) {
            showToast(s, 'success');
        } else if (e) {
            showToast(e, 'error');
        }
    })();
    
    // Initialize DataTable
    if (typeof jQuery !== 'undefined' && jQuery.fn.DataTable) {
        jQuery(function($) {
            var table = $('#example5').DataTable({
                searching: false,
                paging: true,
                select: false,
                lengthChange: false
            });
        });
    }
});
</script>