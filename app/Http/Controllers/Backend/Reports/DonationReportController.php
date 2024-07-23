<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\FundraiserPost;
use App\Models\User;

class DonationReportController extends Controller {
    public function index() {

        $campaigns = FundraiserPost::whereIn('status', ['running', 'block', 'completed'])
            ->get(['id', 'title', 'user_id']);

        $hasCampaign = $campaigns->pluck('user_id')->toArray();
        $fundraisers = User::whereIn('id', $hasCampaign)->get(['id', 'first_name', 'last_name']);

        $donations = Donate::with(['fundraiser:id,title,slug,user_id', 'fundraiser.user:id,first_name,last_name,email'])->get();
        // return $donations;

        return view('backend.reports.donation.index', compact('campaigns', 'fundraisers', 'donations'));
    }
}
