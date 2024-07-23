<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\User;

class CampaignReportController extends Controller {

    public function index() {
        $campaigns = FundraiserPost::whereIn('status', ['running', 'block', 'completed'])
            ->get(['id', 'title', 'user_id']);
        $campaignsDetails = FundraiserPost::with('fundraisercategory', 'donates', 'user')
            ->withSum('donates', 'net_balance', )
            ->withSum('donates', 'stripe_fee')
            ->withSum('donates', 'platform_fee')
            ->withSum('donates', 'amount')
            ->orderBy('id', 'desc')
            ->whereIn('status', ['running', 'block', 'completed'])
            ->get();
        // return $campaignsDetails;
        $hasCampaign = $campaigns->pluck('user_id')->toArray();
        $fundraisers = User::whereIn('id', $hasCampaign)->get(['id', 'first_name', 'last_name']);

        // return $fundraisers;

        return view('backend.reports.campaign.index', compact('campaigns', 'campaignsDetails', 'fundraisers'));
    }
}
