<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PayoutReportController extends Controller {
    public function index() {
        $campaigns = FundraiserPost::whereIn('status', ['running', 'block', 'completed'])
            ->get(['id', 'title', 'user_id']);
        $hasCampaign = $campaigns->pluck('user_id')->toArray();
        $fundraisers = User::whereIn('id', $hasCampaign)->get(['id', 'first_name', 'last_name']);

        return view('backend.reports.payout.index', compact('campaigns', 'fundraisers'));
    }

    public function listDatatable(Request $request) {

        $payouts = Payout::with('user:id,first_name,last_name,email')
            ->orderBy('id', 'desc');

        if ($request->all()) {
            $payouts->where(function ($query) use ($request) {
                if ($request->user) {
                    $query->where('user_id', '=', $request->user);
                }
                if ($request->status) {
                    $query->where('status', '=', $request->status);
                }
                if ($request->fromdate) {
                    $from_date = date("Y-m-d", strtotime($request->fromdate));
                    $query->where('transaction_time', '>=', $from_date);
                }
                if ($request->todate) {
                    $to_date = date("Y-m-d", strtotime($request->todate));
                    $query->where('transaction_time', '<=', $to_date);
                }
            });
        }

        return DataTables::of($payouts)

            ->addColumn('author', function ($payouts) {
                return $payouts->user->first_name . ' ' . $payouts->user->last_name . "<br>" . $payouts->user->email;

            })
            ->editColumn('created_at', function ($payouts) {
                return $payouts->created_at->format('M d, Y');
            })
            ->editColumn('transaction_time', function ($payouts) {
                return $payouts->transaction_time ? $payouts->transaction_time->format('M d, Y') : '-';
            })
            ->editColumn('amount', function ($payouts) {
                return '$' . number_format($payouts->amount, 2);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }
}
