@include('user.header')
<style>
:root {
    --primary: #0c7453ff;
    --primary-dark: #0c7453ff;
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
}

.card-header {
    background: var(--primary);
    border-bottom: none;
    padding: 20px;
    color: white;
}

.card-header h4 {
    margin: 0;
    font-weight: 600;
}

.card-body {
    padding: 24px;
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
}
</style>

<div class="content-body">
    <!-- Server Messages -->
    <div id="server-message"
         data-status="@if(session('status')){{ session('status') }}@endif"
         data-error="@if(session('error')){{ session('error') }}@endif"
         style="display:none;"></div>

    <div class="container-fluid">
        <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">PayPal Withdrawal</h2>
        
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="color:white">Balance: {{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <p>You're about to transfer from your account's available balance. This action cannot be reversed. Be sure to enter correct details.</p>
                                <div id="response_code"></div>
                                
                                <form id="paypalForm" action="{{route('user.withdrawal.paypal.withdrawal')}}" method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
                                    <input type="hidden" id="pin_routing" value="paypal">
                                    
                                    <div id="content-one">
                                        <div class="form-group mb-3">
                                            <label>Amount</label>
                                            <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>PayPal Email</label>
                                            <input type="email" name="paypal_email" class="form-control" placeholder="Enter your PayPal email" required>
                                        </div>

                                        <button type="button" id="proceedPayPal" class="btn btn-primary w-100">Proceed</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PIN Modal -->
<div class="modal fade" id="pinModalPayPal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction PIN</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3">Enter your 4-digit transaction PIN to authorize this PayPal withdrawal.</p>
                
                <div id="pinGridPayPal" class="pin-grid">
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 1" />
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 2" />
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 3" />
                    <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="pin-digit" aria-label="PIN digit 4" />
                </div>

                <div id="pinErrorPayPal" class="text-danger small mt-2" style="display: none;">
                    Please enter your 4-digit PIN.
                </div>

                <div class="mt-3 d-grid gap-2">
                    <button id="confirmPinPayPal" class="btn btn-primary">Confirm Withdrawal</button>
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
    const paypalForm = document.getElementById('paypalForm');
    const proceedBtn = document.getElementById('proceedPayPal');
    const pinModalPayPalEl = document.getElementById('pinModalPayPal');
    const pinModalPayPal = (typeof bootstrap !== 'undefined') ? new bootstrap.Modal(pinModalPayPalEl, {backdrop: 'static', keyboard: true}) : null;
    const pinGridPayPal = document.getElementById('pinGridPayPal');
    const pinDigitsPayPal = Array.from(pinGridPayPal.querySelectorAll('.pin-digit'));
    const pinErrorPayPal = document.getElementById('pinErrorPayPal');
    const confirmBtnPayPal = document.getElementById('confirmPinPayPal');

    function validatePayPalForm() {
        const amount = paypalForm.querySelector('[name="amount"]');
        const paypalEmail = paypalForm.querySelector('[name="paypal_email"]');
        
        if (!amount.value || amount.value <= 0) {
            showToast('Please enter a valid amount greater than zero.', 'error');
            amount.focus();
            return false;
        }
        
        if (parseFloat(amount.value) > parseFloat('{{ $balance }}')) {
            showToast('Insufficient balance for this withdrawal.', 'error');
            amount.focus();
            return false;
        }
        
        if (!paypalEmail.value.trim()) {
            showToast('Please enter your PayPal email address.', 'error');
            paypalEmail.focus();
            return false;
        }
        
        // Basic email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(paypalEmail.value)) {
            showToast('Please enter a valid email address.', 'error');
            paypalEmail.focus();
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
                
                pinErrorPayPal.style.display = 'none';
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

    setupPinInputs(pinDigitsPayPal);

    proceedBtn.addEventListener('click', function () {
        if (!validatePayPalForm()) return;
        
        pinDigitsPayPal.forEach(d => { 
            d.value = ''; 
            d.classList.remove('filled'); 
        });
        pinErrorPayPal.style.display = 'none';
        
        if (pinModalPayPal) {
            pinModalPayPal.show();
            setTimeout(() => pinDigitsPayPal[0].focus(), 200);
        }
    });

    confirmBtnPayPal.addEventListener('click', () => {
        const pin = pinDigitsPayPal.map(d => d.value || '').join('');
        
        if (!/^\d{4}$/.test(pin)) {
            pinErrorPayPal.style.display = 'block';
            showToast('Please enter your 4-digit PIN.', 'error');
            return;
        }
        
        pinErrorPayPal.style.display = 'none';
        
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'transaction_pin';
        hiddenInput.value = pin;
        paypalForm.appendChild(hiddenInput);
        
        confirmBtnPayPal.textContent = 'Processing...';
        confirmBtnPayPal.disabled = true;
        
        paypalForm.submit();
    });

    if (pinModalPayPalEl) {
        pinModalPayPalEl.addEventListener('hidden.bs.modal', function () {
            confirmBtnPayPal.disabled = false;
            confirmBtnPayPal.textContent = 'Confirm Withdrawal';
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
});
</script>