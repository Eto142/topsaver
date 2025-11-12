<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Display payment methods for users
     */
    public function paymentMethods()
    {
        $balance = auth()->user()->balance ?? 0;
        $paymentMethods = PaymentMethod::where('status', 'active')->get();
        
        return view('user.payment-methods', compact('balance', 'paymentMethods'));
    }

    /**
     * Display payment methods management for admin
     */
    public function adminPaymentMethods()
    {
        $paymentMethods = PaymentMethod::all();
        
        return view('admin.payment-methods', compact('paymentMethods'));
    }

    /**
     * Store a new payment method
     */
    public function storePaymentMethod(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'type' => 'required|in:crypto,cashapp,bank,paypal,card',
            'status' => 'required|in:active,inactive',
            'processing_time' => 'required|string|max:255',
            'minimum_deposit' => 'required|string|max:255',
            'transaction_fee' => 'required|string|max:255',
            'daily_limit' => 'required|string|max:255',
            'features' => 'nullable|array',
            'deposit_instructions' => 'nullable|string',
            'wallet_addresses' => 'nullable|array',
            'bank_details' => 'nullable|array',
            'cashapp_tag' => 'nullable|string|max:255',
            'paypal_email' => 'nullable|email|max:255',
            'icon_color' => 'nullable|string|max:7',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $paymentMethod = new PaymentMethod();
            $paymentMethod->name = $request->name;
            $paymentMethod->description = $request->description;
            $paymentMethod->type = $request->type;
            $paymentMethod->status = $request->status;
            $paymentMethod->processing_time = $request->processing_time;
            $paymentMethod->minimum_deposit = $request->minimum_deposit;
            $paymentMethod->transaction_fee = $request->transaction_fee;
            $paymentMethod->daily_limit = $request->daily_limit;
            $paymentMethod->features = $request->features ?? [];
            $paymentMethod->deposit_instructions = $request->deposit_instructions;
            $paymentMethod->icon_color = $request->icon_color ?? '#0c7453';

            // Store payment-specific details
            switch ($request->type) {
                case 'crypto':
                    $paymentMethod->wallet_addresses = $request->wallet_addresses ?? [];
                    break;
                case 'cashapp':
                    $paymentMethod->cashapp_tag = $request->cashapp_tag;
                    break;
                case 'bank':
                    $paymentMethod->bank_details = $request->bank_details ?? [];
                    break;
                case 'paypal':
                    $paymentMethod->paypal_email = $request->paypal_email;
                    break;
            }

            $paymentMethod->save();

            return redirect()->route('admin.payment.methods')
                ->with('success', 'Payment method created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error creating payment method: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Update an existing payment method
     */
    public function updatePaymentMethod(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'type' => 'required|in:crypto,cashapp,bank,paypal,card',
            'status' => 'required|in:active,inactive',
            'processing_time' => 'required|string|max:255',
            'minimum_deposit' => 'required|string|max:255',
            'transaction_fee' => 'required|string|max:255',
            'daily_limit' => 'required|string|max:255',
            'features' => 'nullable|array',
            'deposit_instructions' => 'nullable|string',
            'wallet_addresses' => 'nullable|array',
            'bank_details' => 'nullable|array',
            'cashapp_tag' => 'nullable|string|max:255',
            'paypal_email' => 'nullable|email|max:255',
            'icon_color' => 'nullable|string|max:7',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $paymentMethod = PaymentMethod::findOrFail($id);
            $paymentMethod->name = $request->name;
            $paymentMethod->description = $request->description;
            $paymentMethod->type = $request->type;
            $paymentMethod->status = $request->status;
            $paymentMethod->processing_time = $request->processing_time;
            $paymentMethod->minimum_deposit = $request->minimum_deposit;
            $paymentMethod->transaction_fee = $request->transaction_fee;
            $paymentMethod->daily_limit = $request->daily_limit;
            $paymentMethod->features = $request->features ?? [];
            $paymentMethod->deposit_instructions = $request->deposit_instructions;
            $paymentMethod->icon_color = $request->icon_color ?? $paymentMethod->icon_color;

            // Update payment-specific details
            switch ($request->type) {
                case 'crypto':
                    $paymentMethod->wallet_addresses = $request->wallet_addresses ?? [];
                    $paymentMethod->cashapp_tag = null;
                    $paymentMethod->bank_details = null;
                    $paymentMethod->paypal_email = null;
                    break;
                case 'cashapp':
                    $paymentMethod->cashapp_tag = $request->cashapp_tag;
                    $paymentMethod->wallet_addresses = null;
                    $paymentMethod->bank_details = null;
                    $paymentMethod->paypal_email = null;
                    break;
                case 'bank':
                    $paymentMethod->bank_details = $request->bank_details ?? [];
                    $paymentMethod->wallet_addresses = null;
                    $paymentMethod->cashapp_tag = null;
                    $paymentMethod->paypal_email = null;
                    break;
                case 'paypal':
                    $paymentMethod->paypal_email = $request->paypal_email;
                    $paymentMethod->wallet_addresses = null;
                    $paymentMethod->cashapp_tag = null;
                    $paymentMethod->bank_details = null;
                    break;
            }

            $paymentMethod->save();

            return redirect()->route('admin.payment.methods')
                ->with('success', 'Payment method updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating payment method: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete a payment method
     */
    public function deletePaymentMethod($id)
    {
        try {
            $paymentMethod = PaymentMethod::findOrFail($id);
            $paymentMethod->delete();

            return redirect()->route('admin.payment.methods')
                ->with('success', 'Payment method deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting payment method: ' . $e->getMessage());
        }
    }

    /**
     * Toggle payment method status
     */
    public function togglePaymentMethodStatus($id)
    {
        try {
            $paymentMethod = PaymentMethod::findOrFail($id);
            $paymentMethod->status = $paymentMethod->status === 'active' ? 'inactive' : 'active';
            $paymentMethod->save();

            $status = $paymentMethod->status === 'active' ? 'activated' : 'deactivated';

            return redirect()->route('admin.payment.methods')
                ->with('success', "Payment method {$status} successfully!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating payment method status: ' . $e->getMessage());
        }
    }

    /**
     * Get payment method details for AJAX requests
     */
    public function getPaymentMethodDetails($id)
    {
        try {
            $paymentMethod = PaymentMethod::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $paymentMethod
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment method not found'
            ], 404);
        }
    }

    /**
     * Export payment methods
     */
    public function exportPaymentMethods()
    {
        try {
            $paymentMethods = PaymentMethod::all();
            $fileName = 'payment-methods-' . date('Y-m-d') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=$fileName",
            ];
            
            $callback = function() use ($paymentMethods) {
                $file = fopen('php://output', 'w');
                
                // Headers
                fputcsv($file, [
                    'ID', 'Name', 'Type', 'Status', 'Processing Time', 
                    'Minimum Deposit', 'Transaction Fee', 'Daily Limit', 
                    'Created At', 'Updated At'
                ]);
                
                // Data
                foreach ($paymentMethods as $method) {
                    fputcsv($file, [
                        $method->id,
                        $method->name,
                        $method->type,
                        $method->status,
                        $method->processing_time,
                        $method->minimum_deposit,
                        $method->transaction_fee,
                        $method->daily_limit,
                        $method->created_at,
                        $method->updated_at
                    ]);
                }
                
                fclose($file);
            };
            
            return response()->stream($callback, 200, $headers);
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error exporting payment methods: ' . $e->getMessage());
        }
    }


    // public function index(){
    // return view('admin.manage_payment');
    // }



    public function index()
{
    $paymentMethods = PaymentMethod::all();
    return view('admin.manage_payment', compact('paymentMethods'));
}

}