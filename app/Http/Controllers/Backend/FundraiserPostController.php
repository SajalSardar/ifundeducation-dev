<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserCategory;
use App\Models\FundraiserPost;
use App\Models\FundraiserPostUpdate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class FundraiserPostController extends Controller {

    public function allCampaign() {

        return view('backend.fundraiser_post.index');
    }

    public function allCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory');
        // if ($request->all()) {
        //     $posts->where(function ($query) use ($request) {
        //         if ($request->title) {
        //             $query->where('id', '=', $request->title);
        //         }
        //         if ($request->fromdate) {
        //             $from_date = date("Y-m-d", strtotime($request->fromdate));
        //             $query->where('created_at', '>=', $from_date);
        //         }
        //         if ($request->todate) {
        //             $to_date = date("Y-m-d", strtotime($request->todate));
        //             $query->where('end_date', '<=', $to_date);
        //         }
        //     });
        // }
        return DataTables::of($posts)

            ->addColumn('category', function ($posts) {
                return '<span class="badge bg-success">' . $posts->fundraisercategory->name . '</span>';

            })
            ->editColumn('goal', function ($posts) {
                return '$' . number_format($posts->goal, 2);
            })
            ->editColumn('end_date', function ($posts) {
                return $posts->end_date->format('M d, Y');
            })
            ->editColumn('status', function ($posts) {
                $statusui = $posts->status == 'running' ? 'success' : ($posts->status == 'pending' || $posts->status == 'draft' ? 'warning' : 'danger');
                $status   = '<span class="badge bg-' . $statusui . '">' . Str::ucfirst($posts->status) . '</span>';
                return $status;
            })
            ->editColumn('created_at', function ($posts) {
                return $posts->created_at->format('M d, Y');
            })
            ->addColumn('action_column', function ($posts) {
                $links = '';

                $links .= '<a href="' . route('dashboard.fundraiser.campaign.campaign.show', $posts->slug) . '"
                class="btn btn-sm btn-primary" title="View">
                View
            </a>';

                return $links;
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function showCampaign($slug) {
        $fundRaiserPost = FundraiserPost::with([
            'donates',
            'comments' => function ($q) {
                $q->with('replies')->orderBy('created_at', "desc");
            }])->where('slug', $slug)->firstOrfail();

        return view('backend.fundraiser_post.show', compact('fundRaiserPost'));
    }

    public function updateCampaign() {
        return view('backend.fundraiser_post.update');
    }

    public function updateCampaignDatatable() {
        $posts = FundraiserPostUpdate::where('status', 'pending');
        // if ($request->all()) {
        //     $posts->where(function ($query) use ($request) {
        //         if ($request->title) {
        //             $query->where('id', '=', $request->title);
        //         }
        //         if ($request->fromdate) {
        //             $from_date = date("Y-m-d", strtotime($request->fromdate));
        //             $query->where('created_at', '>=', $from_date);
        //         }
        //         if ($request->todate) {
        //             $to_date = date("Y-m-d", strtotime($request->todate));
        //             $query->where('end_date', '<=', $to_date);
        //         }
        //     });
        // }
        return DataTables::of($posts)

            ->addColumn('category', function ($posts) {
                return '<span class="badge bg-success">' . $posts->fundraisercategory->name . '</span>';

            })
            ->editColumn('goal', function ($posts) {
                return '$' . number_format($posts->goal, 2);
            })
            ->editColumn('end_date', function ($posts) {
                return $posts->end_date->format('M d, Y');
            })
            ->editColumn('status', function ($posts) {
                $statusui = $posts->status == 'running' ? 'success' : ($posts->status == 'pending' || $posts->status == 'draft' ? 'warning' : 'danger');
                $status   = '<span class="badge bg-' . $statusui . '">' . Str::ucfirst($posts->status) . '</span>';
                return $status;
            })
            ->editColumn('created_at', function ($posts) {
                return $posts->created_at->format('M d, Y');
            })
            ->addColumn('action_column', function ($posts) {
                $links = '';

                $links .= '<a href="' . route('dashboard.fundraiser.campaign.campaign.update.request.show', $posts->slug) . '"
                class="btn btn-sm btn-primary" title="View">
                View
            </a>';

                return $links;
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function updateCampaignShow($slug) {
        $updatePost  = FundraiserPostUpdate::where('slug', $slug)->orderBy('id', 'desc')->firstOrfail();
        $currentPost = FundraiserPost::where('id', $updatePost->fundraiser_post_id)->firstOrfail();

        if ($updatePost->status != 'pending') {
            abort(404);
        }

        $updateCategories = FundraiserCategory::where('id', 'fundraiser_category_id')->get();

        return view('backend.fundraiser_post.updateshow', compact('updatePost', 'updateCategories', 'currentPost'));
    }

    public function statusChangeCampaign(FundraiserPost $fundraiserpost, $action) {

        if ($action == 1) {
            if ($fundraiserpost->status == 'pending') {
                $fundraiserpost->update([
                    'status' => 'running',
                ]);
            } else if ($fundraiserpost->status == 'running') {
                $fundraiserpost->update([
                    'status' => 'pending',
                ]);
            }

            return back()->with('success', 'Successfully Update!');
        } else if ($action == 2) {
            if ($fundraiserpost->status == 'block') {
                $fundraiserpost->update([
                    'status' => 'running',
                ]);
            } else if ($fundraiserpost->status == 'running' || $fundraiserpost->status == 'pending') {
                $fundraiserpost->update([
                    'status' => 'block',
                ]);
            }

            return back()->with('success', 'Successfully Update!');
        }
    }

}