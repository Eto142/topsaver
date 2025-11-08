@include('user.header')
<div class="content-body">
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-black font-w600 mb-0">Profile</h2>
        </div>
        
        <!-- Alert Messages -->
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Profile Header Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" class="img-fluid rounded-circle" alt="Profile Picture">
                            </div>
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="flex-grow-1">
                                            <h4 class="text-primary mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                                            <p class="mb-0 text-muted">{{ Auth::user()->account_type }} Account</p>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6 col-12">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <p class="text-muted mb-1">📧 Email</p>
                                                <h6 class="mb-0">{{ Auth::user()->email }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <p class="text-muted mb-1">📱 Phone</p>
                                                <h6 class="mb-0">{{ Auth::user()->phone_number ?? 'Not provided' }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <p class="text-muted mb-1">🌍 Nationality</p>
                                                <h6 class="mb-0">{{ Auth::user()->country ?? 'Not specified' }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <p class="text-muted mb-1">🏠 Address</p>
                                                <h6 class="mb-0">{{ Auth::user()->address ?? 'Not provided' }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <p class="text-muted mb-1">🎂 Date of Birth</p>
                                                <h6 class="mb-0">
                                                    {{ Auth::user()->dob ? \Carbon\Carbon::parse(Auth::user()->dob)->format('M d, Y') : 'Not specified' }}
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <p class="text-muted mb-1">⚧ Gender</p>
                                                <h6 class="mb-0">{{ Auth::user()->gender ?? 'Not specified' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KYC Verification Modal -->
        <div class="modal fade" id="kycModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">KYC Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.upload.kyc') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="driver_license" class="form-label">Driver's License</label>
                                <input type="file" class="form-control" id="driver_license" name="driver_license" required>
                                <div class="form-text">Accepted formats: JPG, PNG, PDF. Max size: 5MB</div>
                            </div>
                            <div class="mb-3">
                                <label for="passport" class="form-label">Passport</label>
                                <input type="file" class="form-control" id="passport" name="pass" required>
                                <div class="form-text">Accepted formats: JPG, PNG, PDF. Max size: 5MB</div>
                            </div>
                            <div class="mb-3">
                                <label for="idCard" class="form-label">Residence ID Card</label>
                                <input type="file" class="form-control" id="idCard" name="card" required>
                                <div class="form-text">Accepted formats: JPG, PNG, PDF. Max size: 5MB</div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit for Verification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Tabs Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#my-posts" data-bs-toggle="tab" class="nav-link">Security</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#change-image" data-bs-toggle="tab" class="nav-link">Avatar</a>
                                    </li>
                                    <li class="nav-item ms-auto">
                                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#kycModal">
                                            <i class="fas fa-id-card me-2"></i>KYC Verification
                                        </button>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    <!-- Account Tab -->
                                    <div id="about-me" class="tab-pane fade active show">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Account Description</h4>
                                                <p class="mb-2">Purpose: {{ Auth::user()->account_purpose ?? 'Not specified' }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="profile-lang mb-5 mt-4">
                                            <h4 class="text-primary mb-2">Account Number</h4>
                                            <div class="d-flex align-items-center">
                                                <span class="text-muted pe-3 f-s-16">{{Auth::user()->a_number}}</span>
                                                <button class="btn btn-sm btn-outline-secondary ms-2" onclick="copyToClipboard('{{Auth::user()->a_number}}')">
                                                    <i class="fas fa-copy me-1"></i>Copy
                                                </button>
                                            </div>
                                        </div>

                                        <div class="profile-lang mb-5">
                                            <h4 class="text-primary mb-2">Account Type</h4>
                                            <span class="badge bg-info pe-3 f-s-16">{{Auth::user()->account_type}}</span>
                                        </div>
                                        
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Quick Personal Information</h4>
                                            <div class="row mb-3">
                                                <div class="col-sm-3 col-5">
                                                    <label class="f-w-500">Full Name</label>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3 col-5">
                                                    <label class="f-w-500">Email</label>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <p>{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3 col-5">
                                                    <label class="f-w-500">Phone</label>
                                                </div>
                                                <div class="col-sm-9 col-7">
                                                    <p>{{ Auth::user()->phone_number ?? 'Not provided' }}</p>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <a href="#profile-settings" class="btn btn-primary" data-bs-toggle="tab">Edit Full Profile</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Security Tab -->
                                    <div id="my-posts" class="tab-pane fade">
                                        <div class="my-post-content pt-3">
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h5 class="card-title">Change Password</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form id="user_password" action="{{ route('user.update-password') }}" method="POST">
                                                        @csrf
                                                        <div id="user_password_response"></div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Current Password</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control" name="old_password" id="old_password">
                                                                    <span class="input-group-text toggle-password" data-target="old_password">
                                                                        <i class="fas fa-eye"></i>
                                                                    </span>
                                                                </div>
                                                                @error('old_password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">New Password</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                                                    <span class="input-group-text toggle-password" data-target="new_password">
                                                                        <i class="fas fa-eye"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="password-requirements mt-2">
                                                                    <small class="form-text text-muted">
                                                                        Password must contain at least 8 characters, including uppercase, lowercase, numbers, and special characters.
                                                                    </small>
                                                                </div>
                                                                @error('new_password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
                                                                    <span class="input-group-text toggle-password" data-target="new_password_confirmation">
                                                                        <i class="fas fa-eye"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 w-100">
                                                            <button id="btnPassword" type="submit" class="btn btn-success float-end">Update Password</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Two-Factor Authentication</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h6 class="mb-1">2FA Status</h6>
                                                            <p class="text-muted mb-0">Add an extra layer of security to your account</p>
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="twoFactorSwitch">
                                                            <label class="form-check-label" for="twoFactorSwitch">Disabled</label>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 text-end">
                                                        <button class="btn btn-outline-primary">Configure</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Settings Tab -->
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary mb-4">Account Settings</h4>
                                                <form id="user_info" action="{{route('user.personal.details')}}" method="POST">
                                                    @csrf
                                                    <div id="user_info_response"></div>
                                                    
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}" required>
                                                            @error('first_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}" required>
                                                            @error('last_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="user_address" class="form-control" rows="3">{{Auth::user()->address}}</textarea>
                                                        @error('user_address')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Phone Number</label>
                                                            <input type="tel" name="user_phone" class="form-control" value="{{Auth::user()->phone_number}}">
                                                            @error('user_phone')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Date of Birth</label>
                                                            <input type="date" name="dob" class="form-control" value="{{Auth::user()->dob}}">
                                                            @error('dob')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                                <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                                <option value="Other" {{ Auth::user()->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                                            </select>
                                                            @error('gender')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Country</label>
                                                            <select name="country" class="form-control">
                                                                <option value="">Select Country</option>
                                                                <option value="United States" {{ Auth::user()->country == 'United States' ? 'selected' : '' }}>United States</option>
                                                                <option value="United Kingdom" {{ Auth::user()->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                                                <option value="Canada" {{ Auth::user()->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                                                <!-- Add more countries as needed -->
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Account Purpose</label>
                                                            <select name="account_purpose" class="form-control">
                                                                <option value="">Select Purpose</option>
                                                                <option value="Personal" {{ Auth::user()->account_purpose == 'Personal' ? 'selected' : '' }}>Personal</option>
                                                                <option value="Business" {{ Auth::user()->account_purpose == 'Business' ? 'selected' : '' }}>Business</option>
                                                                <option value="Investment" {{ Auth::user()->account_purpose == 'Investment' ? 'selected' : '' }}>Investment</option>
                                                                <option value="Savings" {{ Auth::user()->account_purpose == 'Savings' ? 'selected' : '' }}>Savings</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mt-4 w-100">
                                                        <button id="btn1" class="btn btn-primary" type="submit">
                                                            <i class="fas fa-save me-2"></i>Save Changes
                                                        </button>
                                                        <button type="reset" class="btn btn-light ms-2">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Change Avatar Tab -->
                                    <div id="change-image" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Current Avatar</h5>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <img class="rounded-circle mb-3" src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.jpg')) }}" width="150" height="150" alt="Current Avatar">
                                                        <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Upload New Avatar</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <form id="update_avatar" action="{{route('user.personal.dp')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div id="avatar_response" class="mb-4"></div>
                                                            
                                                            <div class="mb-3">
                                                                <label for="avatar" class="form-label">Select Image</label>
                                                                <input name="image" type="file" accept="image/*" class="form-control" id="avatarInput" required>
                                                                <div class="form-text">Accepted formats: JPG, PNG, GIF. Max size: 5MB. Recommended: 300x300 pixels</div>
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <div class="image-preview" id="imagePreview">
                                                                    <img src="" alt="Image Preview" class="image-preview__image" style="display: none;">
                                                                    <span class="image-preview__default-text" style="display: none;">Image Preview</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="alert alert-info">
                                                                <i class="fas fa-info-circle me-2"></i>
                                                                For best results, use a square image with a transparent background.
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fas fa-upload me-2"></i>Upload Avatar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Email Verification Modal -->
<div class="modal fade" id="verifyEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verify Email Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>We've sent a verification link to your email address. Please check your inbox and click on the link to verify your email.</p>
                <p>If you didn't receive the email, click the button below to resend.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Resend Verification Email</button>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary JavaScript libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Function to copy text to clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success feedback
        alert('Account number copied to clipboard!');
    }, function() {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Account number copied to clipboard!');
    });
}

// Toggle password visibility
document.querySelectorAll('.toggle-password').forEach(function(element) {
    element.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const passwordInput = document.getElementById(targetId);
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});

// Image preview functionality
const avatarInput = document.getElementById('avatarInput');
const imagePreview = document.getElementById('imagePreview');
const previewImage = imagePreview.querySelector('.image-preview__image');
const defaultText = imagePreview.querySelector('.image-preview__default-text');

avatarInput.addEventListener('change', function() {
    const file = this.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        defaultText.style.display = "none";
        previewImage.style.display = "block";
        
        reader.addEventListener('load', function() {
            previewImage.setAttribute('src', this.result);
        });
        
        reader.readAsDataURL(file);
    } else {
        defaultText.style.display = null;
        previewImage.style.display = null;
    }
});

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            // Basic validation could be added here
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                
                // Re-enable button after 5 seconds in case of error
                setTimeout(() => {
                    submitButton.disabled = false;
                    submitButton.innerHTML = submitButton.getAttribute('data-original-text') || 'Submit';
                }, 5000);
            }
        });
    });
    
    // Store original button text
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        button.setAttribute('data-original-text', button.innerHTML);
    });
});

// Tab navigation helper
function navigateToTab(tabId) {
    const tabLink = document.querySelector(`[data-bs-target="${tabId}"]`);
    if (tabLink) {
        new bootstrap.Tab(tabLink).show();
    }
}
</script>

<style>
.profile-details {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.profile-name, .profile-email, .profile-actions {
    flex: 1;
    min-width: 200px;
}

.toggle-password {
    cursor: pointer;
}

.image-preview {
    width: 200px;
    height: 200px;
    border: 2px dashed #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
}

.image-preview__image {
    max-width: 100%;
    max-height: 100%;
}

.image-preview__default-text {
    color: #6c757d;
}

.password-requirements {
    font-size: 0.85rem;
}

.nav-tabs .nav-link {
    padding: 0.75rem 1.25rem;
    font-weight: 500;
}

.input-group-text {
    cursor: pointer;
}

.card {
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.form-text {
    font-size: 0.8rem;
}

.badge {
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
}

/* Improved responsive design */
@media (max-width: 768px) {
    .profile-info .card-body .row {
        margin: 0 -5px;
    }
    
    .profile-info .card-body .col-md-6 {
        padding: 0 5px;
    }
    
    .nav-tabs .nav-item {
        flex: 1;
        text-align: center;
    }
    
    .nav-tabs .nav-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.85rem;
    }
}
</style>