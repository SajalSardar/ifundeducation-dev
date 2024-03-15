<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\FundraiserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DonorController extends Controller {

    public function donateList() {
        $fundposts = FundraiserPost::join('donates', 'donates.fundraiser_post_id', 'fundraiser_posts.id')
            ->select('fundraiser_posts.id', 'fundraiser_posts.title')
            ->where('donar_id', Auth::id())->groupBy('fundraiser_posts.id')->get();

        return view('frontend.donor.index', compact('fundposts'));
    }

    public function listDataTabel(Request $request) {
        $all_donates = Donate::join('fundraiser_posts', 'fundraiser_posts.id', 'donates.fundraiser_post_id')
            ->select('donates.*', 'fundraiser_posts.title', 'fundraiser_posts.slug', 'fundraiser_posts.user_id')
            ->where('donar_id', Auth::id());

        if ($request->all()) {
            $all_donates->where(function ($query) use ($request) {
                if ($request->title) {
                    $query->where('donates.fundraiser_post_id', '=', $request->title);
                }

                if ($request->fromdate) {
                    $from_date = date("Y-m-d", strtotime($request->fromdate));
                    $query->where('donates.created_at', '>=', $from_date);
                }
                if ($request->todate) {
                    $to_date = date("Y-m-d", strtotime($request->todate));
                    $query->where('donates.created_at', '<=', $to_date);
                }
            });
        }

        return DataTables::of($all_donates)

            ->editColumn('title', function ($all_donates) {
                $title = '<a href="' . route('front.fundraiser.post.show', $all_donates->slug) . '">' . $all_donates->title . '</a>';
                return $title;
            })
            ->editColumn('amount', function ($all_donates) {
                return '$' . number_format($all_donates->amount, 2);
            })
            ->editColumn('created_at', function ($all_donates) {
                return $all_donates->created_at->format('M d, Y');
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }
}
