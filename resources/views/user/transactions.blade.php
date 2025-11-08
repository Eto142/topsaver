@include('user.header')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Transaction History</h4>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter Transactions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item" href="#">All Transactions</a></li>
                                <li><a class="dropdown-item" href="#">Deposits</a></li>
                                <li><a class="dropdown-item" href="#">Withdrawals</a></li>
                                <li><a class="dropdown-item" href="#">Transfers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Transaction</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaction as $details)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="transaction-icon me-3">
                                                    @if($details->transaction == 'Bank Transfer')
                                                    <div class="bg-primary bg-opacity-10 p-2 rounded"><i class="fas fa-exchange-alt text-primary"></i></div>
                                                    @elseif($details->transaction == 'Loan')
                                                    <div class="bg-success bg-opacity-10 p-2 rounded"><i class="fas fa-hand-holding-usd text-success"></i></div>
                                                    @elseif($details->transaction == 'Card')
                                                    <div class="bg-info bg-opacity-10 p-2 rounded"><i class="fas fa-credit-card text-info"></i></div>
                                                    @elseif($details->transaction == 'Crypto Withdrawal')
                                                    <div class="bg-warning bg-opacity-10 p-2 rounded"><i class="fab fa-bitcoin text-warning"></i></div>
                                                    @elseif($details->transaction == 'Paypal Withdrawal')
                                                    <div class="bg-secondary bg-opacity-10 p-2 rounded"><i class="fab fa-paypal text-secondary"></i></div>
                                                    @elseif($details->transaction == 'Skrill Withdrawal')
                                                    <div class="bg-dark bg-opacity-10 p-2 rounded"><i class="fas fa-wallet text-dark"></i></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $details->transaction }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark">{{ Str::limit($details->transaction_description, 30) }}</span>
                                        </td>
                                        <td>
                                            <span class="font-w600 @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal'])) text-danger @elseif($details->transaction == 'Loan') text-success @endif">
                                                @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']))-@elseif($details->transaction == 'Loan')+@endif
                                                {{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($details->transaction_status == '1')
                                            <span class="badge light badge-success">Successful</span>
                                            @elseif($details->transaction_status == '0')
                                            <span class="badge light badge-warning">Pending</span>
                                            @else
                                            <span class="badge light badge-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($details->created_at)->format('M d, Y h:i A') }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="show-entries">
                                <span>Showing 1 to {{ count($transaction) }} of {{ count($transaction) }} entries</span>
                            </div>
                            <nav>
                                <ul class="pagination pagination-circle">
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="fas fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">4</a>
                                    </li>
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

