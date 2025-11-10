@include('user.header')
<br>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-black font-w600 mb-0">Fund Account</h2>
        </div>

        <!-- Server Messages (hidden, will be shown as toasts) -->
        <div id="server-message"
             data-status="@if(session('status')){{ session('status') }}@endif"
             data-error="@if(session('error')){{ session('error') }}@endif"
             style="display:none;"></div>

        <div class="row">
            <div class="col-xl-9 col-xxl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card stacked-2" style="border-radius: 20px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); border: none;">
                            <div class="card-header flex-wrap border-0 pb-0 align-items-end" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; border-radius: 20px 20px 0 0 !important;">
                                <div class="d-flex align-items-center mb-3 me-3">
                                    <svg class="me-3" width="68" height="68" viewbox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: brightness(0) invert(1);">
                                        <path d="M59.4999 31.688V19.8333C59.4999 19.0818 59.2014 18.3612 58.6701 17.8298C58.1387 17.2985 57.418 17 56.6666 17H11.3333C10.5818 17 9.86114 16.7014 9.32978 16.1701C8.79843 15.6387 8.49992 14.9181 8.49992 14.1666C8.49992 13.4152 8.79843 12.6945 9.32978 12.1632C9.86114 11.6318 10.5818 11.3333 11.3333 11.3333H56.6666C57.418 11.3333 58.1387 11.0348 58.6701 10.5034C59.2014 9.97208 59.4999 9.25141 59.4999 8.49996C59.4999 7.74851 59.2014 7.02784 58.6701 6.49649C58.1387 5.96514 57.418 5.66663 56.6666 5.66663H11.3333C9.07891 5.66663 6.9169 6.56216 5.32284 8.15622C3.72878 9.75028 2.83325 11.9123 2.83325 14.1666V53.8333C2.83325 56.0876 3.72878 58.2496 5.32284 59.8437C6.9169 61.4378 9.07891 62.3333 11.3333 62.3333H56.6666C57.418 62.3333 58.1387 62.0348 58.6701 61.5034C59.2014 60.9721 59.4999 60.2514 59.4999 59.5V47.6453C61.1561 47.0683 62.5917 45.9902 63.6076 44.5605C64.6235 43.1308 65.1693 41.4205 65.1693 39.6666C65.1693 37.9128 64.6235 36.2024 63.6076 34.7727C62.5917 33.3431 61.1561 32.265 59.4999 31.688ZM53.8333 56.6666H11.3333C10.5818 56.6666 9.86114 56.3681 9.32978 55.8368C8.79843 55.3054 8.49992 54.5847 8.49992 53.8333V22.1453C9.40731 22.4809 10.3658 22.6572 11.3333 22.6666H53.8333V31.1666H45.3333C43.0789 31.1666 40.9169 32.0622 39.3228 33.6562C37.7288 35.2503 36.8333 37.4123 36.8333 39.6666C36.8333 41.921 37.7288 44.083 39.3228 45.677C40.9169 47.2711 43.0789 48.1666 45.3333 48.1666H53.8333V56.6666ZM56.6666 42.5H45.3333C44.5818 42.5 43.8611 42.2015 43.3298 41.6701C42.7984 41.1387 42.4999 40.4181 42.4999 39.6666C42.4999 38.9152 42.7984 38.1945 43.3298 37.6632C43.8611 37.1318 44.5818 36.8333 45.3333 36.8333H56.6666C57.418 36.8333 58.1387 37.1318 58.6701 37.6632C59.2014 38.1945 59.4999 38.9152 59.4999 39.6666C59.4999 40.4181 59.2014 41.1387 58.6701 41.6701C58.1387 42.2015 57.418 42.5 56.6666 42.5Z" fill="#1EAAE7"></path>
                                    </svg>
                                    <div class="me-auto">
                                        <h5 class="fs-20 text-white font-w600">Main Balance</h5>
                                        <span class="text-num text-white font-w600" style="font-size: 1.5rem;">{{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</span>
                                    </div>
                                </div>
                                <div class="me-3 mb-3">
                                    <p class="fs-14 mb-1 text-white-50">ACC TYPE</p>
                                    <span class="text-white">{{Auth::user()->account_type}}</span>
                                </div>
                                <div class="me-3 mb-3">
                                    <p class="fs-14 mb-1 text-white-50">ACCOUNT OWNER</p>
                                    <span class="text-white">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                </div>
                                <span class="fs-20 text-white font-w500 me-3 mb-3">{{Auth::user()->account_number}}</span>
                            </div>

                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 mb-3 col-xxl-12 col-sm-12">
                                        <button class="btn btn-primary rounded d-block btn-lg w-100 py-3" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border: none; border-radius: 12px; font-weight: 600; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);" data-bs-toggle="modal" data-bs-target="#fiat">
                                            Mobile Check Deposit
                                        </button>
                                        <br>
                        
                                        <!-- Check Deposit Modal -->
                                        <div class="modal fade" id="fiat">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);">
                                                    <div class="modal-header" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; border-bottom: none;">
                                                        <h5 class="modal-title">Check Deposit</h5>
                                                        <button type="button" class="close btn-close btn-close-white" data-bs-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); padding: 20px; border-radius: 16px; display: inline-block; margin-bottom: 20px;">
                                                                <img src="{{asset('cheque.png')}}" width="120px" style="filter: hue-rotate(200deg);">
                                                            </div>
                                                        </center>
                                                        
                                                        <form id="depositForm" action="{{route('user.deposit.make.deposit')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" class="form-control" name="email" value=" {{ Auth::user()->email}}"/>
                                                            <div id="content-one">
                                                                <div class="form-group mb-4">
                                                                    <label class="form-label fw-600">Amount</label>
                                                                    <input id="pin_amount" type="number" name="amount" class="form-control" placeholder="Enter Amount" required style="border-radius: 12px; padding: 12px 16px; border: 2px solid #e2e8f0; transition: all 0.3s ease;">
                                                                </div>
                                                                
                                                                <div class="form-group mb-4">
                                                                    <label for="license" class="form-label fw-600">
                                                                        <i class="fa fa-id-card"></i> Upload Check Slip
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <input type="file" id="license" name="front_cheque" class="form-control" accept="image/*" required style="border-radius: 12px; padding: 12px 16px; border: 2px solid #e2e8f0;">
                                                                    </div>
                                                                    <small class="text-muted">Accepted formats: JPG, PNG, PDF (Max: 5MB)</small>
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="button" id="proceedDeposit" class="btn btn-primary w-100 py-3" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border: none; border-radius: 12px; font-weight: 600; margin-top: 16px;">
                                                                Proceed to Verification
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer" style="border-top: 1px solid #e2e8f0;">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border-radius: 12px; padding: 10px 20px;">Close</button>
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
            <div class="col-xl-3 col-xxl-12">
                <div class="row">
                    <div class="col-xl-12 col-xxl-6 col-sm-6 mb-4">
                        <div class="card" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border-radius: 16px; border: none; box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);">
                            <div class="card-body p-4">
                                <a href="{{route('user.transfer.bank')}}" style="text-decoration: none;">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-white rounded-circle p-3 me-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                                            <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.98" clip-path="">
                                                <path d="M9.77812 2.0125C10.1062 2.69062 9.81641 3.51094 9.13828 3.83906C7.25156 4.74688 5.65469 6.15781 4.51719 7.92422C3.35234 9.73437 2.73438 11.8344 2.73438 14C2.73438 20.2125 7.7875 25.2656 14 25.2656C20.2125 25.2656 25.2656 20.2125 25.2656 14C25.2656 11.8344 24.6477 9.73437 23.4883 7.91875C22.3563 6.15234 20.7539 4.74141 18.8672 3.83359C18.1891 3.50547 17.8992 2.69063 18.2273 2.00703C18.5555 1.32891 19.3703 1.03906 20.0539 1.36719C22.4 2.49375 24.3852 4.24375 25.7906 6.44219C27.2344 8.69531 28 11.3094 28 14C28 17.7406 26.5453 21.257 23.8984 23.8984C21.257 26.5453 17.7406 28 14 28C10.2594 28 6.74297 26.5453 4.10156 23.8984C1.45469 21.2516 1.22342e-07 17.7406 1.66948e-07 14C1.99034e-07 11.3094 0.765625 8.69531 2.21484 6.44219C3.62578 4.24922 5.61094 2.49375 7.95156 1.36719C8.63516 1.04453 9.45 1.3289 9.77812 2.0125Z" fill="#2563eb"></path>
                                                <path d="M8.67896 13.2726C8.41099 13.0047 8.27974 12.6547 8.27974 12.3047C8.27974 11.9547 8.41099 11.6047 8.67896 11.3367L12.1188 7.89685C12.6219 7.39373 13.2891 7.12029 13.9946 7.12029C14.7 7.12029 15.3727 7.3992 15.8704 7.89685L19.3102 11.3367C19.8461 11.8726 19.8461 12.7367 19.3102 13.2726C18.7743 13.8086 17.9102 13.8086 17.3743 13.2726L15.3563 11.2547L15.3563 19.0258C15.3563 19.7804 14.7438 20.3929 13.9891 20.3929C13.2344 20.3929 12.6219 19.7804 12.6219 19.0258L12.6219 11.2492L10.604 13.2672C10.079 13.8031 9.21489 13.8031 8.67896 13.2726Z" fill="#2563eb"></path>
                                                </g>
                                                <defs>
                                                <clippath id="clip11">
                                                <rect width="28" height="28" fill="white" transform="matrix(1.19249e-08 -1 -1 -1.19249e-08 28 28)"></rect>
                                                </clippath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <span class="fs-20 text-white fw-600">Transfer</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-xxl-6 col-sm-6 mb-4">
                        <div class="card" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border-radius: 16px; border: none; box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);">
                            <div class="card-body p-4">
                                <a href="{{route('user.transactions')}}" style="text-decoration: none;">
                                    <div class="d-flex align-items-center">
                                    <span class="bg-white rounded-circle p-3 me-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                                        <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.1667 1.16669H5.83342C4.59574 1.16669 3.40875 1.65835 2.53358 2.53352C1.65841 3.40869 1.16675 4.59568 1.16675 5.83335V14C1.16675 14.3094 1.28966 14.6062 1.50846 14.825C1.72725 15.0438 2.024 15.1667 2.33341 15.1667H8.16675V25.6667C8.1662 25.8898 8.22965 26.1085 8.34959 26.2966C8.46952 26.4848 8.6409 26.6346 8.84342 26.7284C9.0464 26.8218 9.27195 26.855 9.49325 26.824C9.71455 26.7929 9.92228 26.699 10.0917 26.5534L13.4167 23.7067L16.7417 26.5534C16.9531 26.7341 17.222 26.8334 17.5001 26.8334C17.7782 26.8334 18.0471 26.7341 18.2584 26.5534L21.5834 23.7067L24.9084 26.5534C25.1197 26.7341 25.3887 26.8334 25.6667 26.8334C25.8355 26.8322 26.0023 26.7964 26.1567 26.7284C26.3593 26.6346 26.5306 26.4848 26.6506 26.2966C26.7705 26.1085 26.834 25.8898 26.8334 25.6667V5.83335C26.8334 4.59568 26.3418 3.40869 25.4666 2.53352C24.5914 1.65835 23.4044 1.16669 22.1667 1.16669ZM3.50008 12.8334V5.83335C3.50008 5.21452 3.74591 4.62102 4.1835 4.18344C4.62108 3.74585 5.21458 3.50002 5.83342 3.50002C6.45225 3.50002 7.04575 3.74585 7.48333 4.18344C7.92092 4.62102 8.16675 5.21452 8.16675 5.83335V12.8334H3.50008ZM24.5001 23.135L22.3417 21.28C22.1304 21.0993 21.8615 20.9999 21.5834 20.9999C21.3053 20.9999 21.0364 21.0993 20.8251 21.28L17.5001 24.1267L14.1751 21.28C13.9638 21.0993 13.6948 20.9999 13.4167 20.9999C13.1387 20.9999 12.8697 21.0993 12.6584 21.28L10.5001 23.135V5.83335C10.4986 5.01375 10.2813 4.20898 9.87008 3.50002H22.1667C22.7856 3.50002 23.3791 3.74585 23.8167 4.18344C24.2542 4.62102 24.5001 5.21452 24.5001 5.83335V23.135ZM22.1667 7.00002C22.1667 7.30944 22.0438 7.60619 21.825 7.82498C21.6062 8.04377 21.3095 8.16669 21.0001 8.16669H14.0001C13.6907 8.16669 13.3939 8.04377 13.1751 7.82498C12.9563 7.60619 12.8334 7.30944 12.8334 7.00002C12.8334 6.6906 12.9563 6.39386 13.1751 6.17506C13.3939 5.95627 13.6907 5.83335 14.0001 5.83335H21.0001C21.3095 5.83335 21.6062 5.95627 21.825 6.17506C22.0438 6.39386 22.1667 6.6906 22.1667 7.00002ZM22.1667 11.6667C22.1667 11.9761 22.0438 12.2729 21.825 12.4916C21.6062 12.7104 21.3095 12.8334 21.0001 12.8334H14.0001C13.6907 12.8334 13.3939 12.7104 13.1751 12.4916C12.9563 12.2729 12.8334 11.9761 12.8334 11.6667C12.8334 11.3573 12.9563 11.0605 13.1751 10.8417C13.3939 10.6229 13.6907 10.5 14.0001 10.5H21.0001C21.3095 10.5 21.6062 10.6229 21.825 10.8417C22.0438 11.0605 22.1667 11.3573 22.1667 11.6667ZM22.1667 16.3334C22.1667 16.6428 22.0438 16.9395 21.825 17.1583C21.6062 17.3771 21.3095 17.5 21.0001 17.5H14.0001C13.6907 17.5 13.3939 17.3771 13.1751 17.1583C12.9563 16.9395 12.8334 16.6428 12.8334 16.3334C12.8334 16.0239 12.9563 15.7272 13.1751 15.5084C13.3939 15.2896 13.6907 15.1667 14.0001 15.1667H21.0001C21.3095 15.1667 21.6062 15.2896 21.825 15.5084C22.0438 15.7272 22.1667 16.0239 22.1667 16.3334Z" fill="#059669"></path>
                                        </svg>
                                    </span>
                                    <span class="fs-20 text-white fw-600">View Transactions</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PIN Modal for Deposit - MOVED OUTSIDE THE DEPOSIT MODAL -->
<div class="modal fade" id="pinModalDeposit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);">
            <div class="modal-header" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white; border-bottom: none;">
                <h6 class="modal-title">Verify Deposit</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <p class="mb-2 text-muted">Enter your 4-digit transaction PIN to authorize this deposit.</p>
                
                <!-- SIMPLIFIED PIN Input Container -->
                <div class="pin-container mb-4">
                    <div id="pinGridDeposit" class="pin-grid d-flex justify-content-center gap-3 my-4">
                        <input type="tel" maxlength="1" class="pin-digit" data-index="0" inputmode="numeric" pattern="[0-9]*"
                               style="width: 72px; height: 72px; border-radius: 16px; font-size: 32px; font-weight: 600; text-align: center; border: 2px solid #e2e8f0; background: #ffffff; box-shadow: 0 6px 18px rgba(12,18,30,0.03); transition: all 0.3s ease;">
                        <input type="tel" maxlength="1" class="pin-digit" data-index="1" inputmode="numeric" pattern="[0-9]*"
                               style="width: 72px; height: 72px; border-radius: 16px; font-size: 32px; font-weight: 600; text-align: center; border: 2px solid #e2e8f0; background: #ffffff; box-shadow: 0 6px 18px rgba(12,18,30,0.03); transition: all 0.3s ease;">
                        <input type="tel" maxlength="1" class="pin-digit" data-index="2" inputmode="numeric" pattern="[0-9]*"
                               style="width: 72px; height: 72px; border-radius: 16px; font-size: 32px; font-weight: 600; text-align: center; border: 2px solid #e2e8f0; background: #ffffff; box-shadow: 0 6px 18px rgba(12,18,30,0.03); transition: all 0.3s ease;">
                        <input type="tel" maxlength="1" class="pin-digit" data-index="3" inputmode="numeric" pattern="[0-9]*"
                               style="width: 72px; height: 72px; border-radius: 16px; font-size: 32px; font-weight: 600; text-align: center; border: 2px solid #e2e8f0; background: #ffffff; box-shadow: 0 6px 18px rgba(12,18,30,0.03); transition: all 0.3s ease;">
                    </div>
                    
                    <!-- Hidden input to store the complete PIN -->
                    <input type="hidden" id="completePin" name="transaction_pin">
                </div>

                <div id="pinErrorDeposit" class="text-danger small mt-2" style="display: none;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="d-inline-block me-1">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    Please enter your 4-digit PIN.
                </div>

                <div class="mt-4 d-grid gap-2">
                    <button id="confirmPinDeposit" class="btn btn-success py-2" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border: none; border-radius: 12px; font-weight: 600;">
                        <span class="btn-text">Confirm & Deposit</span>
                    </button>
                    <button class="btn btn-outline-secondary py-2" data-bs-dismiss="modal" style="border-radius: 12px;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" aria-live="polite" aria-atomic="true"></div>

@include('user.footer')

<style>
/* Toast Styles */
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
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
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
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
}

.bank-toast.error { 
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
}

.bank-toast.info { 
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
}

.bank-toast .text { 
    font-size: 15px; 
    line-height: 1.4;
    font-weight: 500;
}

.bank-toast.hide { 
    opacity: 0;
    transform: translateX(100%) translateY(-20px);
    transition: all 0.3s ease;
}

/* Form Control Focus States */
.form-control:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    transform: translateY(-1px);
}

.pin-digit:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    transform: scale(1.05);
}

.pin-digit.filled {
    border-color: #059669;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
}

/* Remove number input arrows */
.pin-digit::-webkit-outer-spin-button,
.pin-digit::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .pin-digit {
        width: 56px;
        height: 56px;
        font-size: 24px;
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
    .pin-digit {
        width: 48px;
        height: 48px;
        font-size: 20px;
    }
}
</style>

<script>
// Global variables for PIN functionality
let currentPinDigits = ['', '', '', ''];

// SIMPLIFIED PIN Input Handling - Using JavaScript event listeners instead of inline
document.addEventListener('DOMContentLoaded', function () {
    // Initialize PIN functionality
    initializePinInputs();
    
    const depositForm = document.getElementById('depositForm');
    const proceedBtn = document.getElementById('proceedDeposit');
    const pinModalDepositEl = document.getElementById('pinModalDeposit');
    const pinModalDeposit = (typeof bootstrap !== 'undefined') ? new bootstrap.Modal(pinModalDepositEl, {backdrop: 'static', keyboard: true}) : null;
    const pinErrorDeposit = document.getElementById('pinErrorDeposit');
    const confirmBtnDeposit = document.getElementById('confirmPinDeposit');

    function initializePinInputs() {
        const pinInputs = document.querySelectorAll('.pin-digit');
        
        pinInputs.forEach(input => {
            // Clear any existing event listeners
            input.replaceWith(input.cloneNode(true));
        });
        
        // Re-select the inputs after cloning
        const freshInputs = document.querySelectorAll('.pin-digit');
        
        freshInputs.forEach(input => {
            input.addEventListener('input', function(e) {
                const index = parseInt(this.getAttribute('data-index'));
                let value = this.value;
                
                // Only allow numbers
                value = value.replace(/\D/g, '');
                
                // Take only the last character
                if (value.length > 0) {
                    value = value.charAt(value.length - 1);
                }
                
                this.value = value;
                currentPinDigits[index] = value;
                document.getElementById('completePin').value = currentPinDigits.join('');
                
                // Update styling
                updatePinInputStyle(this, value !== '');
                
                // Move to next input if value entered
                if (value !== '' && index < 3) {
                    const nextInput = document.querySelector(`.pin-digit[data-index="${index + 1}"]`);
                    if (nextInput) {
                        nextInput.focus();
                    }
                }
            });
            
            input.addEventListener('keydown', function(e) {
                const index = parseInt(this.getAttribute('data-index'));
                
                // Handle backspace
                if (e.key === 'Backspace') {
                    e.preventDefault();
                    
                    // If current input is empty and we're not on the first input, move to previous
                    if (this.value === '' && index > 0) {
                        const prevInput = document.querySelector(`.pin-digit[data-index="${index - 1}"]`);
                        if (prevInput) {
                            prevInput.focus();
                            prevInput.value = '';
                            currentPinDigits[index - 1] = '';
                            updatePinInputStyle(prevInput, false);
                        }
                    } else {
                        // Clear current input but stay in the same field
                        this.value = '';
                        currentPinDigits[index] = '';
                        updatePinInputStyle(this, false);
                    }
                    document.getElementById('completePin').value = currentPinDigits.join('');
                }
                
                // Handle arrow keys for navigation
                else if (e.key === 'ArrowLeft' && index > 0) {
                    const prevInput = document.querySelector(`.pin-digit[data-index="${index - 1}"]`);
                    if (prevInput) prevInput.focus();
                    e.preventDefault();
                } else if (e.key === 'ArrowRight' && index < 3) {
                    const nextInput = document.querySelector(`.pin-digit[data-index="${index + 1}"]`);
                    if (nextInput) nextInput.focus();
                    e.preventDefault();
                }
            });
            
            // Prevent paste
            input.addEventListener('paste', function(e) {
                e.preventDefault();
            });
        });
    }

    function updatePinInputStyle(input, hasValue) {
        if (hasValue) {
            input.style.borderColor = '#059669';
            input.style.background = 'linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%)';
            input.style.boxShadow = '0 4px 12px rgba(5, 150, 105, 0.15)';
        } else {
            input.style.borderColor = '#e2e8f0';
            input.style.background = '#ffffff';
            input.style.boxShadow = '0 6px 18px rgba(12,18,30,0.03)';
        }
    }

    function resetPinInputs() {
        currentPinDigits = ['', '', '', ''];
        document.getElementById('completePin').value = '';
        
        const inputs = document.querySelectorAll('.pin-digit');
        inputs.forEach(input => {
            input.value = '';
            updatePinInputStyle(input, false);
        });
    }

    function getCurrentPin() {
        return currentPinDigits.join('');
    }

    function isPinComplete() {
        return currentPinDigits.every(digit => digit !== '');
    }

    // Form validation
    function validateDepositForm() {
        const amount = document.getElementById('pin_amount');
        const file = document.getElementById('license');
        
        if (!amount.value || amount.value <= 0) {
            showToast('Please enter a valid amount greater than zero.', 'error');
            amount.focus();
            return false;
        }
        
        if (!file.value) {
            showToast('Please upload a check slip.', 'error');
            return false;
        }
        
        return true;
    }

    // Proceed to PIN modal
    proceedBtn.addEventListener('click', function () {
        if (!validateDepositForm()) return;
        
        // Close the deposit modal first
        const depositModal = bootstrap.Modal.getInstance(document.getElementById('fiat'));
        if (depositModal) {
            depositModal.hide();
        }
        
        // Reset and show PIN modal after a short delay
        setTimeout(() => {
            resetPinInputs();
            pinErrorDeposit.style.display = 'none';
            
            if (pinModalDeposit) {
                pinModalDeposit.show();
                // Focus first pin input after modal is shown
                setTimeout(() => {
                    const firstInput = document.querySelector('.pin-digit[data-index="0"]');
                    if (firstInput) firstInput.focus();
                }, 300);
            }
        }, 300);
    });

    // Confirm PIN and submit
    confirmBtnDeposit.addEventListener('click', () => {
        const pin = getCurrentPin();
        
        if (!isPinComplete()) {
            pinErrorDeposit.style.display = 'block';
            showToast('Please enter your 4-digit PIN.', 'error');
            
            // Focus first empty input
            const emptyIndex = currentPinDigits.findIndex(digit => digit === '');
            const emptyInput = document.querySelector(`.pin-digit[data-index="${emptyIndex}"]`);
            if (emptyInput) emptyInput.focus();
            
            return;
        }
        
        pinErrorDeposit.style.display = 'none';
        
        // Add PIN to form and submit
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'transaction_pin';
        hiddenInput.value = pin;
        depositForm.appendChild(hiddenInput);
        
        // Show loading state
        const originalText = confirmBtnDeposit.querySelector('.btn-text');
        originalText.textContent = 'Processing...';
        confirmBtnDeposit.disabled = true;
        
        // Submit form
        depositForm.submit();
    });

    // Show server messages
    (function showServerMessage() {
        const server = document.getElementById('server-message');
        if (!server) return;
        
        const s = server.getAttribute('data-status') || '';
        const e = server.getAttribute('data-error') || '';
        
        if (s) {
            showToast(s, 'success', 5000);
        } else if (e) {
            showToast(e, 'error', 5000);
        }
    })();

    /* Audio Functions */
    function playSuccessSound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const now = ctx.currentTime;

            const o1 = ctx.createOscillator(); 
            const g1 = ctx.createGain();
            o1.type = 'sine'; 
            o1.frequency.setValueAtTime(523.25, now);
            o1.frequency.exponentialRampToValueAtTime(659.25, now + 0.15);
            g1.gain.setValueAtTime(0, now); 
            g1.gain.linearRampToValueAtTime(0.15, now + 0.05); 
            g1.gain.linearRampToValueAtTime(0, now + 0.3);
            o1.connect(g1); 
            g1.connect(ctx.destination);
            o1.start(now); 
            o1.stop(now + 0.3);

            const o2 = ctx.createOscillator(); 
            const g2 = ctx.createGain();
            o2.type = 'sine'; 
            o2.frequency.setValueAtTime(783.99, now + 0.1);
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
            
            const o = ctx.createOscillator(); 
            const g = ctx.createGain();
            o.type = 'sawtooth'; 
            o.frequency.setValueAtTime(349.23, now);
            o.frequency.exponentialRampToValueAtTime(220, now + 0.2);
            g.gain.setValueAtTime(0, now); 
            g.gain.linearRampToValueAtTime(0.12, now + 0.02); 
            g.gain.exponentialRampToValueAtTime(0.001, now + 0.4);
            o.connect(g); 
            g.connect(ctx.destination);
            o.start(now); 
            o.stop(now + 0.4);
        } catch (e) { /* ignore */ }
    }

    /* Toast Function */
    function showToast(message, type = 'info', timeout = 5000) {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        toast.className = `bank-toast ${type}`;
        
        const icon = document.createElement('div'); 
        icon.className = 'icon';
        
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
        
        requestAnimationFrame(() => toast.classList.add('show'));
        
        setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => { 
                try { container.removeChild(toast); } catch(e){} 
            }, 400);
        }, timeout);
    }
});
</script>