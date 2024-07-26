<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CampaignReportController extends Controller {

    public function index() {
        $campaigns = FundraiserPost::whereIn('status', ['running', 'block', 'completed'])
            ->get(['id', 'title', 'user_id']);

        $hasCampaign = $campaigns->pluck('user_id')->toArray();
        $fundraisers = User::whereIn('id', $hasCampaign)->get(['id', 'first_name', 'last_name', 'email']);

        return view('backend.reports.campaign.index', compact('campaigns', 'fundraisers'));
    }

    public function listDatatable(Request $request) {

        $campaignsDetails = FundraiserPost::with('fundraisercategory', 'donates', 'user')
            ->withSum('donates', 'net_balance', )
            ->withSum('donates', 'stripe_fee')
            ->withSum('donates', 'platform_fee')
            ->withSum('donates', 'amount')
            ->orderBy('id', 'desc')
            ->whereIn('status', ['running', 'block', 'completed']);

        if ($request->all()) {
            $campaignsDetails->where(function ($query) use ($request) {
                if ($request->user) {
                    $query->where('user_id', '=', $request->user);
                }
                if ($request->title) {
                    $query->where('id', '=', $request->title);
                }
                if ($request->status) {
                    $query->where('status', '=', $request->status);
                }
                if ($request->fromdate) {
                    $from_date = date("Y-m-d", strtotime($request->fromdate));
                    $query->where('created_at', '>=', $from_date);
                }
                if ($request->todate) {
                    $to_date = date("Y-m-d", strtotime($request->todate));
                    $query->where('end_date', '<=', $to_date);
                }
            });
        }

        return DataTables::of($campaignsDetails)

            ->addColumn('author', function ($campaignsDetails) {
                return $campaignsDetails->user->first_name . ' ' . $campaignsDetails->user->last_name . "<br>" . $campaignsDetails->user->email;

            })
            ->editColumn('campaign', function ($campaignsDetails) {
                return '<a href="' . route('dashboard.fundraiser.campaign.campaign.show', $campaignsDetails->slug) . '" target="_blank" title="' . $campaignsDetails->title . '">' . Str::limit($campaignsDetails->title, 20, '...') . '</a>';
            })
            ->editColumn('gole', function ($campaignsDetails) {
                return number_format($campaignsDetails->goal, 2);
            })
            ->editColumn('end_date', function ($campaignsDetails) {
                return $campaignsDetails->end_date->format('M d, Y');
            })
            ->editColumn('created_at', function ($campaignsDetails) {
                return $campaignsDetails->created_at->format('M d, Y');
            })
            ->editColumn('donates_sum_amount', function ($campaignsDetails) {
                return '$' . number_format($campaignsDetails->donates_sum_amount, 2);
            })
            ->editColumn('donates_sum_stripe_fee', function ($campaignsDetails) {
                return '$' . number_format($campaignsDetails->donates_sum_stripe_fee, 2);
            })
            ->editColumn('donates_sum_platform_fee', function ($campaignsDetails) {
                return '$' . number_format($campaignsDetails->donates_sum_platform_fee, 2);
            })
            ->editColumn('donates_sum_net_balance', function ($campaignsDetails) {
                return '$' . number_format($campaignsDetails->donates_sum_net_balance, 2);
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

}
