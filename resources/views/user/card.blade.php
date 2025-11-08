<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Dashboard - Top Saver Trust Bank</title>
    <meta name="description" content="Top Saver Trust Bank Mobile Banking">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="{{asset('asset/img/favicon.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('asset/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{asset('asset/panel/css/style.css')}}">
    <link rel="manifest" href="__manifest.json">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        /* Loader Styles */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        
        #loader.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .loading-content {
            text-align: center;
        }
        
        .spinner-grow {
            width: 2rem;
            height: 2rem;
        }
        
        /* Ensure content is hidden until loaded */
        #appCapsule {
            opacity: 0;
            transition: opacity 0.3s ease-in;
        }
        
        #appCapsule.loaded {
            opacity: 1;
        }
    </style>
</head>

<body>

    <!-- Loader -->
    <div id="loader">
        <div class="loading-content">
            <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
            <div>Loading...</div>
        </div>
    </div>

    <!-- App Capsule -->
    <div id="appCapsule">
        <!-- App Header -->
        <div class="appHeader">
            <div class="left">
                <a href="" class="headerButton"></a>
            </div>
            <div class="pageTitle">Top Saver Trust Bank Card</div>
            <div class="right">
                <a onclick="location.reload();" class="headerButton">
                    <ion-icon name="refresh"></ion-icon>
                </a>
            </div>
        </div>
        <!-- * App Header -->

        <!-- App Content -->
        <div class="section mt-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs capsuled" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#ngn" role="tab">
                                TopSavers Trust Bank
                            </a>
                        </li>
                    </ul>
                </div>
            </div><br>

            @if (session('error'))
            <div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
                <b>Error!</b>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session('status'))
            <div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
                <b>Success!</b> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @forelse($details as $detail)
                @if($detail->status == 0)
                    <div class="tab-content mt-1">
                        <div class="tab-pane fade show active" id="ngn" role="tabpanel">
                            <div class="card-block mb-2" style="background-color: #305C89">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <img src="under.png" alt="Under Review" class="image-block imaged w48 lazy animate">
                                    </div>
                                    <div class="balance">
                                        <h1 class="title">Card on Review</h1>
                                        <p>This card is currently under review and cannot be displayed.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-content mt-1">
                        <div class="tab-pane fade show active" id="ngn" role="tabpanel">
                            <div class="card-block mb-2" style="background-color: #305C89">
                                <div class="card-main">
                                    <div class="card-button dropdown">
                                        <img src="mastercard.png" alt="img" class="image-block imaged w48 lazy animate">
                                    </div>
                                    <div class="balance">
                                        <img src="{{asset('assets/images/logo.png')}}" alt="img" class="image-block imaged w48 lazy animate" width="800px">
                                        <h1 class="title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                                    </div>
                                    <div class="in">
                                        <div class="card-number">
                                            <span class="label">Card Number</span>
                                            {{ implode(' ', str_split($detail->card_number, 4)) }}
                                        </div>
                                        <div class="bottom">
                                            <div class="card-expiry">
                                                <span class="label">Expiry</span>
                                                {{ \Carbon\Carbon::parse($detail->card_expiry)->format('m/y') }}
                                            </div>
                                            <div class="card-ccv">
                                                <span class="label">CCV</span>
                                                {{ $detail->card_cvc }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container mt-5">
                        <center>
                            <div class="card-body pb-1">
                                <button type="button" class="btn btn-outline-dark me-1 mb-1" data-toggle="modal" data-target="#requestFormModal">
                                    Request for Card Delivery
                                </button>
                            </div>
                        </center>
                    </div>
                @endif
            @empty
                <p>No Card Yet</p>
            @endforelse
            
            <div class="section mt-2">
                <center>
                    <div class="card-body pb-1">
                        <!--<a href="{{route('user.cards.card_withdrawal')}}" type="button" class="btn btn-outline-dark me-1 mb-1">Card Withdrawal</a>-->
                    </div>
                </center>
            </div><br>
            
            <!-- Request Form Modal -->
            <div class="modal fade" id="requestFormModal" tabindex="-1" role="dialog" aria-labelledby="requestFormModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="requestFormModalLabel">Card Delivery Request Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="requestForm" action="{{route('user.cards.requestcard.delivery')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label for="houseAddress">House Address</label>
                                    <input type="text" class="form-control" id="houseAddress" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailAddress">Email Address</label>
                                    <input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="requestForm">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <ul class="">
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>Instant Access
                                    <div class="text-muted">Apply and activate instantly</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <br>

            <div class="card">
                <ul class="">
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>Safety
                                    <div class="text-muted">No physical handing. No risk of loss</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <br>

            <b>Personal Information</b>
            <div class="card">
                <ul class="listview flush transparent image-listview text">
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>First Name
                                    <div class="text-muted">{{Auth::user()->first_name}}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>Last Name
                                    <div class="text-muted">{{Auth::user()->last_name}}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>Date of Birth
                                    <div class="text-muted">{{Auth::user()->dob}}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="in">
                                <div>Gender
                                    <div class="text-muted">{{Auth::user()->gender}}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="action-sheet-content">
                <div class="form-group basic">
                    <a href="{{route('user.cards.request.card', Auth::user()->id)}}">
                        <button type="button" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal">Get It Now</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-header">
        <ul>
            <li><ion-icon name="document-text-outline"></ion-icon><a href="{{route('user.home')}}"> Overview</a></li>
            <li><ion-icon name="arrow-forward-outline"></ion-icon><a href="{{route('user.bank')}}"> Transfer</a></li>
            <li><ion-icon name="card-outline"></ion-icon><a href="{{route('user.card')}}"> Cards</a></li>
            <li><ion-icon name="list"></ion-icon><a href="{{route('user.transactions')}}">History</a></li>
        </ul>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- App Scripts -->
    <script src="asset/panel/js/lib/bootstrap.bundle.min.js"></script>
    <script src="asset/panel/js/plugins/splide/splide.min.js"></script>
    <script src="asset/panel/js/base.js"></script>
    <script src="asset/panel/js/main.js"></script>

    <script>
        // Proper loader handling
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loader and show content when page is fully loaded
            window.addEventListener('load', function() {
                setTimeout(function() {
                    const loader = document.getElementById('loader');
                    const appCapsule = document.getElementById('appCapsule');
                    
                    if (loader) {
                        loader.classList.add('hidden');
                    }
                    if (appCapsule) {
                        appCapsule.classList.add('loaded');
                    }
                }, 1000); // 1 second delay to ensure everything is loaded
            });

            // Fallback: if load event doesn't fire, hide loader after 3 seconds
            setTimeout(function() {
                const loader = document.getElementById('loader');
                const appCapsule = document.getElementById('appCapsule');
                
                if (loader && !loader.classList.contains('hidden')) {
                    loader.classList.add('hidden');
                }
                if (appCapsule) {
                    appCapsule.classList.add('loaded');
                }
            }, 3000);

            // Handle modal functionality
            $('#requestFormModal').on('show.bs.modal', function (e) {
                // Optional: Pre-fill form fields if needed
                document.getElementById('fullName').value = "{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}";
                document.getElementById('emailAddress').value = "{{ Auth::user()->email }}";
                document.getElementById('phoneNumber').value = "{{ Auth::user()->phone_number }}";
            });
        });

        var data = null;
        console.log(data);

        function crypto_type(id) {
            for (var i = 0; i < data.length; i++) {
                if (id == data[i].id) {
                    $("#wallet_address").val(data[i].wallet_address);
                }
            }
        }
    </script>

    <style>
        /* Bottom header styles */
        .bottom-header {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            border-top: 1px solid #e0e0e0;
            padding: 10px 20px;
            box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .bottom-header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bottom-header li {
            margin-right: 20px;
        }

        .bottom-header a {
            color: #333333;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 12px;
        }

        .bottom-header ion-icon {
            font-size: 20px;
            margin-bottom: 4px;
        }
    </style>
</body>
</html>