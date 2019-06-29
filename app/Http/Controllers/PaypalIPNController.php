<?php

namespace App\Http\Controllers;

use App\ClientPayment;
use App\PaypalInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaypalIPNController extends Controller
{
    public function verifyBillingIPN(Request $request)
    {
        $txnType = $request->get('txn_type');
        if ($txnType == 'recurring_payment') {

            $recurringPaymentId = $request->get('recurring_payment_id');
            $eventId = $request->get('ipn_track_id');

            $event = PaypalInvoice::where('event_id', $eventId)->count();

            if($event == 0)
            {
                $payment =  PaypalInvoice::where('transaction_id', $recurringPaymentId)->first();

                $today = Carbon::now();
                if(company()->package_type == 'annual') {
                    $nextPaymentDate = $today->addMonth();
                } else if(company()->package_type == 'monthly') {
                    $nextPaymentDate = $today->addYear();
                }

                $paypalInvoice = new PaypalInvoice();
                $paypalInvoice->transaction_id = $recurringPaymentId;
                $paypalInvoice->company_id = $payment->company_id;
                $paypalInvoice->currency_id = $payment->currency_id;
                $paypalInvoice->total = $payment->total;
                $paypalInvoice->status = 'paid';
                $paypalInvoice->plan_id = $payment->plan_id;
                $paypalInvoice->billing_frequency = $payment->billing_frequency;
                $paypalInvoice->event_id = $eventId;
                $paypalInvoice->billing_interval = 1;
                $paypalInvoice->paid_on = $today;
                $paypalInvoice->next_pay_date = $nextPaymentDate;
                $paypalInvoice->save();

                return response('IPN Handled', 200);
            }

        }
    }
}
