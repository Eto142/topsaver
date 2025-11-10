@include('user.header')

<style>
    /* ---------- Modern Design Variables ---------- */
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
        --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-lg: 0 20px 40px -10px rgba(0, 0, 0, 0.15), 0 4px 6px -2px rgba(0, 0, 0, 0.08);
    }

    body {
        background-color: var(--background);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        color: var(--text-primary);
        line-height: 1.6;
    }

    /* ---------- Layout & Container ---------- */
    .container-card {
        max-width: 1200px;
        margin: 32px auto;
        padding: 0 16px;
    }

    .card-pro {
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        border: none;
        overflow: hidden;
        background: var(--surface);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-pro:hover {
        transform: translateY(-2px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .card-pro .card-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-bottom: none;
        padding: 24px 32px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .card-pro .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 0%, rgba(255,255,255,0.1) 100%);
    }

    .card-pro .card-body { 
        padding: 32px; 
    }

    /* ---------- Two Column Layout for Laptop ---------- */
    .withdrawal-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
        align-items: start;
    }

    .support-info {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #bae6fd;
        height: fit-content;
    }

    .withdrawal-form {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    /* ---------- Typography & Text ---------- */
    .card-pro .card-header h5 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 4px;
        position: relative;
        z-index: 1;
    }

    .card-pro .card-header small {
        opacity: 0.9;
        font-weight: 400;
        position: relative;
        z-index: 1;
    }

    .balance-display {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 12px 16px;
        border: 1px solid rgba(255,255,255,0.2);
        position: relative;
        z-index: 1;
    }

    .balance-display .fw-600 {
        font-size: 0.875rem;
        opacity: 0.9;
    }

    .balance-display div:last-child {
        font-size: 1.25rem;
        font-weight: 700;
    }

    .support-info h4 {
        color: var(--primary);
        font-weight: 600;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .support-info p {
        color: var(--text-secondary);
        margin-bottom: 16px;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .support-info .highlight {
        background: rgba(255, 255, 255, 0.7);
        padding: 12px 16px;
        border-radius: 12px;
        margin-top: 16px;
        border-left: 4px solid var(--warning);
    }

    /* ---------- Form Elements ---------- */
    .form-label {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-control {
        border: 2px solid var(--border);
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--surface);
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        transform: translateY(-1px);
    }

    .form-control::placeholder {
        color: #94a3b8;
    }

    /* ---------- Code Input ---------- */
    .code-input-container {
        margin-bottom: 8px;
    }

    .code-input {
        font-size: 1.25rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-align: center;
        padding: 16px;
        height: 60px;
    }

    .code-input::placeholder {
        letter-spacing: normal;
        font-weight: normal;
    }

    .code-requirements {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-top: 8px;
        text-align: center;
    }

    /* ---------- Buttons ---------- */
    .btn {
        border-radius: 12px;
        padding: 14px 24px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
    }

    .btn-success {
        background: linear-gradient(135deg, var(--success) 0%, #047857 100%);
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.4);
    }

    .btn-outline-secondary {
        border: 2px solid var(--border);
        background: transparent;
        color: var(--text-secondary);
    }

    .btn-outline-secondary:hover {
        background: var(--background);
        border-color: var(--text-secondary);
    }

    /* ---------- Toast Notifications ---------- */
    .bank-toast {
        position: fixed;
        top: 24px;
        right: 24px;
        z-index: 3000;
        display: flex;
        gap: 16px;
        align-items: center;
        min-width: 340px;
        max-width: 440px;
        padding: 16px 20px;
        border-radius: 16px;
        color: white;
        box-shadow: var(--shadow-lg);
        transform: translateX(100%) translateY(-20px);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        backdrop-filter: blur(10px);
    }

    .bank-toast.show {
        transform: translateX(0) translateY(0);
        opacity: 1;
    }

    .bank-toast .icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 48px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
    }

    .bank-toast.success { 
        background: linear-gradient(135deg, var(--success) 0%, #047857 100%);
    }

    .bank-toast.error { 
        background: linear-gradient(135deg, var(--error) 0%, #b91c1c 100%);
    }

    .bank-toast.info { 
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    }

    .bank-toast .text { 
        font-size: 15px; 
        line-height: 1.4;
        font-weight: 500;
    }

    /* fade out */
    .bank-toast.hide { 
        opacity: 0;
        transform: translateX(100%) translateY(-20px);
        transition: all 0.3s ease;
    }

    /* ---------- Loading Animation ---------- */
    .btn-loading {
        position: relative;
        color: transparent;
    }

    .btn-loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 2px solid transparent;
        border-top-color: currentColor;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* ---------- Form Validation Styles ---------- */
    .form-control.is-invalid {
        border-color: var(--error);
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: var(--error);
        margin-top: 4px;
        font-weight: 500;
    }

    /* ---------- Responsive Design ---------- */
    @media (max-width: 992px) {
        .withdrawal-layout {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        
        .support-info {
            order: 2;
        }
        
        .withdrawal-form {
            order: 1;
        }
    }

    @media (max-width: 768px) {
        .container-card {
            margin: 16px auto;
            padding: 0 12px;
        }
        
        .card-pro .card-body {
            padding: 24px 20px;
        }
        
        .bank-toast {
            left: 16px;
            right: 16px;
            top: 16px;
            min-width: unset;
            max-width: unset;
        }
    }

    @media (max-width: 480px) {
        .card-pro .card-header {
            padding: 20px 16px;
        }
        
        .balance-display {
            padding: 8px 12px;
        }
        
        .support-info {
            padding: 16px;
        }
    }
</style>

<div class="container container-card">
    <div class="card card-pro">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Withdraw</h5>
                <small>Enter Withdrawal Code</small>
            </div>
            <div class="balance-display text-end">
                <div class="fw-600">Available Balance</div>
                <div>{{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}</div>
            </div>
        </div>

        <div class="card-body">
            <div class="withdrawal-layout">
                <div class="support-info">
                    <h4><i class="fas fa-info-circle"></i> Contact Support</h4>
                    <p>To initiate a withdrawal, you need a valid <strong>Foreign Transaction Code</strong>. Please contact our support team to request your code.</p>
                    
                    <p><i class="fas fa-envelope me-2"></i> Email: <a href="mailto:support@topsavertbc.online">support@topsavertbc.online</a></p>
                    
                    <div class="highlight">
                        <p class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i> <strong>Please note:</strong> A fee is attached to every code activated. Make sure you have sufficient balance to cover both the withdrawal amount and the transaction fee.</p>
                    </div>
                </div>

                <div class="withdrawal-form">
                    <form id="withdrawalForm" novalidate>
                        <div class="code-input-container">
                            <label class="form-label">Enter Withdrawal Code <span class="text-danger">*</span></label>
                            <input name="withdrawal_code" type="text" class="form-control code-input" required placeholder="Enter your 6-digit withdrawal code">
                            <div class="invalid-feedback">Withdrawal Code is required</div>
                            <div class="code-requirements">Enter the 6-digit code you received from support</div>
                        </div>

                        <div class="mt-2">
                            <button id="proceedBtn" type="submit" class="btn btn-primary w-100 py-3">
                                <span class="btn-text">PROCEED WITH WITHDRAWAL</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast container (dynamically filled) -->
<div id="toastContainer" aria-live="polite" aria-atomic="true"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    /* ---------- Enhanced Audio with better tones ---------- */
    function playSuccessSound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const now = ctx.currentTime;

            // Pleasant ascending chime
            const o1 = ctx.createOscillator(); 
            const g1 = ctx.createGain();
            o1.type = 'sine'; 
            o1.frequency.setValueAtTime(523.25, now); // C5
            o1.frequency.exponentialRampToValueAtTime(659.25, now + 0.15); // E5
            g1.gain.setValueAtTime(0, now); 
            g1.gain.linearRampToValueAtTime(0.15, now + 0.05); 
            g1.gain.linearRampToValueAtTime(0, now + 0.3);
            o1.connect(g1); 
            g1.connect(ctx.destination);
            o1.start(now); 
            o1.stop(now + 0.3);

            // Second harmonic
            const o2 = ctx.createOscillator(); 
            const g2 = ctx.createGain();
            o2.type = 'sine'; 
            o2.frequency.setValueAtTime(783.99, now + 0.1); // G5
            g2.gain.setValueAtTime(0, now + 0.1); 
            g2.gain.linearRampToValueAtTime(0.1, now + 0.15); 
            g2.gain.linearRampToValueAtTime(0, now + 0.35);
            o2.connect(g2); 
            g2.connect(ctx.destination);
            o2.start(now + 0.1); 
            o2.stop(now + 0.35);
        } catch (e) { /* ignore */ }
    }

    function playErrorSound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const now = ctx.currentTime;
            
            // Short descending buzz
            const o = ctx.createOscillator(); 
            const g = ctx.createGain();
            o.type = 'sawtooth'; 
            o.frequency.setValueAtTime(349.23, now); // F4
            o.frequency.exponentialRampToValueAtTime(220, now + 0.2); // A3
            g.gain.setValueAtTime(0, now); 
            g.gain.linearRampToValueAtTime(0.12, now + 0.02); 
            g.gain.exponentialRampToValueAtTime(0.001, now + 0.4);
            o.connect(g); 
            g.connect(ctx.destination);
            o.start(now); 
            o.stop(now + 0.4);
        } catch (e) { /* ignore */ }
    }

    /* ---------- Enhanced Toast Helper ---------- */
    function showToast(message, type = 'info', timeout = 5000) {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = `bank-toast ${type}`;
        
        const icon = document.createElement('div'); 
        icon.className = 'icon';
        
        // Enhanced SVG icons
        if (type === 'success') {
            icon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>`;
            playSuccessSound();
        } else if (type === 'error') {
            icon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>`;
            playErrorSound();
        } else {
            icon.innerHTML = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>`;
        }
        
        const text = document.createElement('div'); 
        text.className = 'text'; 
        text.innerText = message;
        
        toast.appendChild(icon); 
        toast.appendChild(text);
        container.appendChild(toast);
        
        // Trigger show animation
        requestAnimationFrame(() => toast.classList.add('show'));
        
        // Auto hide
        setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => { 
                try { container.removeChild(toast); } catch(e){} 
            }, 400);
        }, timeout);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('withdrawalForm');
        const proceedBtn = document.getElementById('proceedBtn');
        const codeInput = document.querySelector('input[name="withdrawal_code"]');

        // Enhanced form validation with visual feedback
        function validateField(field) {
            field.classList.remove('is-invalid');
            
            if (field.required && !field.value.trim()) {
                field.classList.add('is-invalid');
                return false;
            }
            
            return true;
        }

        // Validate all form fields
        function isFormValid() {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!validateField(field)) {
                    isValid = false;
                    if (isValid === false) {
                        // Focus first invalid field
                        field.focus();
                    }
                }
            });
            
            if (!isValid) {
                showToast('Please enter your withdrawal code.', 'error');
            }
            
            return isValid;
        }

        // Real-time field validation
        form.querySelectorAll('input').forEach(input => {
            input.addEventListener('blur', () => validateField(input));
            input.addEventListener('input', () => {
                input.classList.remove('is-invalid');
            });
        });

        // Enhanced button loading state
        function setButtonLoading(button, isLoading) {
            const btnText = button.querySelector('.btn-text');
            if (isLoading) {
                button.disabled = true;
                btnText.textContent = 'Processing...';
                button.classList.add('btn-loading');
            } else {
                button.disabled = false;
                btnText.textContent = 'PROCEED WITH WITHDRAWAL';
                button.classList.remove('btn-loading');
            }
        }

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!isFormValid()) return;
            
            setButtonLoading(proceedBtn, true);
            
            // Simulate API call
            setTimeout(() => {
                setButtonLoading(proceedBtn, false);
                showToast('Withdrawal request submitted successfully! Funds will be processed within 24 hours.', 'success');
                
                // Reset form
                form.reset();
            }, 2000);
        });
    });
</script>

@include('user.footer')