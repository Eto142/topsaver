<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CreditDebitController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ManageCardController;
use App\Http\Controllers\Admin\ManageLoanController;
use App\Http\Controllers\Admin\ManagePaymentController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransferController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\WithdrawalController;
use Illuminate\Support\Facades\Route;











     Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    });
    
  Route::get('/users', [ManageUserController::class, 'ManageUsers'])->name('users'); // becomes 'admin.user'
  Route::get('/show', [ManageUserController::class, 'ShowUsers'])->name('show'); // becomes 'admin.user'
  Route::get('/profile/{id}/', [ManageUserController::class, 'userProfile'])->name('profile');
  Route::delete('/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('delete');


  //manage card
    Route::get('user_cards', [ManageCardController::class, 'UsersCards'])->name('cards');
   




      //loan controller
    Route::get('user_loans', [ManageLoanController::class, 'UsersLoans'])->name('loans');
    Route::post('add.loans', [ManageLoanController::class, 'AddUserLoan'])->name('add.loans');
    Route::post('add.outstandingloan', [ManageLoanController::class, 'AddUserOutstandingBalance'])->name('add.outstandingloan');
    Route::post('add.interestrate', [ManageLoanController::class, 'AddInterestRate'])->name('add.interestrate');
    Route::post('add-monthlypay', [ManageLoanController::class, 'AddMonthlyPay'])->name('add.monthlypay');
  
  Route::prefix('admin/mail')->group(function() {
    Route::get('/compose/{user}', [MailController::class, 'compose'])->name('mail.compose');
    Route::post('/send', [MailController::class, 'send'])->name('users.send-mail');
    Route::get('/history', [MailController::class, 'history'])->name('admin.mail.history');

    Route::match(['get', 'post'], 'credit-user', [CreditDebitController::class, 'creditUser'])->name('credit.user');
 Route::match(['get', 'post'], 'debit-user', [CreditDebitController::class, 'debitUser'])->name('debit.user');


//DepositController 
   Route::post('/approve-deposit/{id}', [DepositController::class, 'ApproveDeposit'])->name('approve-deposit');
  Route::post('/decline-deposit/{id}', [DepositController::class, 'DeclineDeposit'])->name('decline-deposit');

  //transaction controller
   Route::get('user_transactions', [TransactionController::class, 'usersTransaction'])->name('transactions');
  Route::post('admin/approve-transaction/{id}', [TransactionController::class, 'approveTransaction'])->name('transaction.approve');
  Route::post('admin/decline-transaction/{id}', [TransactionController::class, 'declineTransaction'])->name('transaction.decline');
Route::post('update-transaction-date/{id}', [TransactionController::class, 'updateTransactionDate'])
    ->name('transaction.updateDate');


   
   Route::post('add-transaction/{id}', [ManageUserController::class, 'addTransaction'])
    ->name('add.transaction');

     Route::post('withdrawal_tax_code/{id}', [ManageUserController::class, 'WithdrawalTaxCode'])
    ->name('withdrawal.tax.code');

        Route::post('withdrawal_status/{id}', [ManageUserController::class, 'WithdrawalStatus'])
    ->name('withdrawal.status');


//Manage Payment
   Route::get('manage-payment', [ManagePaymentController::class, 'ManagePayment'])->name('manage.payment');

   // Send Mail

Route::get('/send-email', [SendEmailController::class, 'index'])->name('send.email');
Route::post('/send-email', [SendEmailController::class, 'send'])->name('send.email.post');



    //Transfer controller
   Route::get('user_transfers', [TransferController::class, 'usersTransfer'])->name('transfers');
// TransferController
Route::post('/approve-transfer/{id}', [TransferController::class, 'approveTransfer'])->name('approve-transfer');
Route::post('/decline-transfer/{id}', [TransferController::class, 'declineTransfer'])->name('decline-transfer');




    //Deposit controller
   Route::get('user_deposits', [DepositController::class, 'usersDeposit'])->name('deposits');




//wallet update

   Route::get('index', [WalletController::class, 'index'])->name('wallets.index');
   Route::post('/choose-wallet', [WalletController::class, 'chooseWallet'])->name('choose.wallet');
     Route::post('/wallet/store', [WalletController::class, 'store'])->name('wallet.store');
      Route::get('wallet/{id}/edit', [WalletController::class, 'edit'])->name('wallet.edit'); // Edit wallet
    Route::put('wallet/{id}', [WalletController::class, 'update'])->name('wallet.update'); // Update wallet

    Route::delete('wallet/{id}', [WalletController::class, 'destroy'])->name('wallet.destroy'); // Delete wallet




    //withdrawal code update

    Route::post('/updatewithdrawalcode', [WithdrawalController::class, 'updateWithdrawalCode'])->name('updatewithdrawalcode');
});

});



