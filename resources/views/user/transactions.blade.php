@include('user.header')
<style>
    /* Custom Styles for Transaction History */
    .transaction-history-card {
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
    }
    
    .transaction-history-card .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-bottom: none;
        padding: 20px 25px;
        color: white;
    }
    
    .transaction-history-card .card-title {
        margin: 0;
        font-weight: 600;
        font-size: 1.4rem;
    }
    
    .transaction-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }
    
    .transaction-table {
        margin-bottom: 0;
    }
    
    .transaction-table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
        font-weight: 600;
        color: #495057;
        padding: 15px 12px;
        white-space: nowrap;
    }
    
    .transaction-table tbody td {
        padding: 15px 12px;
        vertical-align: middle;
        border-color: #f0f0f0;
    }
    
    .badge-light {
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 20px;
    }
    
    .pagination-circle .page-link {
        border-radius: 50% !important;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 3px;
        border: 1px solid #e0e0e0;
        color: #6c757d;
    }
    
    .pagination-circle .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
    }
    
    /* Mobile-specific styles */
    @media (max-width: 768px) {
        .transaction-table thead {
            display: none;
        }
        
        .transaction-table tbody tr {
            display: block;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .transaction-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border: none;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .transaction-table tbody td:last-child {
            border-bottom: none;
        }
        
        .transaction-table tbody td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #495057;
            margin-right: 15px;
            min-width: 100px;
        }
        
        .transaction-table tbody td .transaction-icon {
            order: 2;
        }
        
        .transaction-table tbody td h6 {
            margin: 0;
        }
        
        .pagination-circle {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .pagination-circle .page-link {
            width: 35px;
            height: 35px;
            margin: 2px;
        }
        
        .show-entries {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .transaction-history-card .card-header {
            padding: 15px 20px;
        }
        
        .transaction-history-card .card-title {
            font-size: 1.2rem;
        }
        
        .dropdown .btn {
            padding: 8px 15px;
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 576px) {
        .transaction-table tbody td {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        
        .transaction-table tbody td::before {
            margin-bottom: 5px;
            min-width: auto;
        }
        
        .transaction-table tbody td .transaction-icon {
            align-self: flex-end;
            margin-top: -40px;
        }
        
        .pagination-circle .page-link {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }
    }
    
    /* Animation for table rows */
    .transaction-table tbody tr {
        transition: all 0.3s ease;
    }
    
    .transaction-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }
    
    /* Status badge colors */
    .badge-success {
        background-color: rgba(40, 199, 111, 0.15);
        color: #28c76f;
    }
    
    .badge-warning {
        background-color: rgba(255, 159, 67, 0.15);
        color: #ff9f43;
    }
    
    .badge-danger {
        background-color: rgba(234, 84, 85, 0.15);
        color: #ea5455;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card transaction-history-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Transaction History</h4>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter Transactions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item filter-option" href="#" data-filter="all">All Transactions</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="deposit">Deposits</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="withdrawal">Withdrawals</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="transfer">Transfers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover transaction-table">
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
                                    <tr class="transaction-row" data-type="{{ 
                                        in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']) ? 'withdrawal' : 
                                        ($details->transaction == 'Loan' ? 'deposit' : 'transfer') 
                                    }}">
                                        <td data-label="Transaction">
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
                                                    @else
                                                    <div class="bg-primary bg-opacity-10 p-2 rounded"><i class="fas fa-exchange-alt text-primary"></i></div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $details->transaction }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                       <td data-label="Details">
    <div class="text-dark">
        <strong>{{ Str::limit($details->transaction_description, 30) }}</strong>

        @if(!empty($details->sender_name) || !empty($details->sender_account))
        <br>

        <small class="text-muted d-block mt-1">
            <strong>Sender:</strong> {{ $details->sender_name ?? '—' }}<br>
            {{-- <strong>Account:</strong> {{ $details->sender_account ?? '—' }} --}}
        </small>
        @endif
    </div>
</td>

                                        <td data-label="Amount">
                                            <span class="font-w600 @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal'])) text-danger @elseif($details->transaction == 'Loan') text-success @else text-primary @endif">
                                                @if(in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']))-@elseif($details->transaction == 'Loan')+@endif
                                                {{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                            </span>
                                        </td>
                                        <td data-label="Status">
                                            @if($details->transaction_status == '1')
                                            <span class="badge light badge-success">Successful</span>
                                            @elseif($details->transaction_status == '0')
                                            <span class="badge light badge-warning">Pending</span>
                                            @else
                                            <span class="badge light badge-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td data-label="Date">
                                            <span class="text-muted">{{ \Carbon\Carbon::parse($details->created_at)->format('M d, Y h:i A') }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                            <div class="show-entries mb-3 mb-md-0">
                                <span class="text-muted">Showing 1 to {{ count($transaction) }} of {{ count($transaction) }} entries</span>
                            </div>
                            <nav>
                                <ul class="pagination pagination-circle pagination-sm">
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
                                        <a class="page-link" href="javascript:void(0)">4</a></li>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterOptions = document.querySelectorAll('.filter-option');
    const transactionRows = document.querySelectorAll('.transaction-row');
    
    filterOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const filterValue = this.getAttribute('data-filter');
            
            // Update dropdown button text
            document.getElementById('filterDropdown').innerHTML = this.textContent + ' <span class="caret"></span>';
            
            // Filter transactions
            transactionRows.forEach(row => {
                if (filterValue === 'all') {
                    row.style.display = '';
                } else {
                    if (row.getAttribute('data-type') === filterValue) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    });
    
    // Add loading animation to table rows
    const tableRows = document.querySelectorAll('.transaction-table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('click', function() {
            // You can add functionality here for row clicks
            // For example, showing transaction details in a modal
        });
    });
});
</script>
@include('user.footer')
