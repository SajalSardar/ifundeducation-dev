<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\Payout;
use App\Models\User;

class PayoutReportController extends Controller {
    public function index() {
        $campaigns = FundraiserPost::whereIn('status', ['running', 'block', 'completed'])
            ->get(['id', 'title', 'user_id']);
        $hasCampaign = $campaigns->pluck('user_id')->toArray();
        $fundraisers = User::whereIn('id', $hasCampaign)->get(['id', 'first_name', 'last_name']);

        $payouts = Payout::with('user:id,first_name,last_name,email')
            ->where('status', 'transfer')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.reports.payout.index', compact('campaigns', 'fundraisers', 'payouts'));
    }
}
