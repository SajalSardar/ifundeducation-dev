<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserApprovalComments;
use App\Models\FundraiserCategory;
use App\Models\FundraiserPost;
use App\Models\FundraiserPostUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class FundraiserPostController extends Controller {

    public function runningCampaign() {

        return view('backend.fundraiser_post.index');
    }

    public function runningCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory')->where('status', 'running');
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
                $status = '<span class="badge bg-success">' . Str::ucfirst($posts->status) . '</span>';
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

    public function pendingCampaign() {

        return view('backend.fundraiser_post.pending');
    }

    public function pendingCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory')->where('status', 'pending');
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
                $status = '<span class="badge bg-warning">' . Str::ucfirst($posts->status) . '</span>';
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

    public function completedCampaign() {

        return view('backend.fundraiser_post.completed');
    }

    public function completedCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory')->where('status', 'completed');
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
                $status = '<span class="badge bg-success">' . Str::ucfirst($posts->status) . '</span>';
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

    public function blockCampaign() {

        return view('backend.fundraiser_post.block');
    }

    public function blockCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory')->where('status', 'block');
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

                $status = '<span class="badge bg-danger">' . Str::ucfirst($posts->status) . '</span>';
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
    public function stopCampaign() {

        return view('backend.fundraiser_post.stop');
    }

    public function stopCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory')->where('status', 'stop');
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
                $status = '<span class="badge bg-danger">' . Str::ucfirst($posts->status) . '</span>';
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
    public function reviewedCampaign() {

        return view('backend.fundraiser_post.reviewed');
    }

    public function reviewedCampaignDatatable() {
        $posts = FundraiserPost::with('fundraisercategory')->where('status', 'reviewed');
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
                $status = '<span class="badge bg-danger">' . Str::ucfirst($posts->status) . '</span>';
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

        if ($fundRaiserPost->status === "reviewed") {
            $fundRaiserPost->load('reviewedComments');
        }
        if ($fundRaiserPost->status === "block") {
            $fundRaiserPost->load('blockComments');
        }
        // return $fundRaiserPost;
        return view('backend.fundraiser_post.show', compact('fundRaiserPost'));
    }
    public function statusChangeCampaign(Request $request) {

        $fundraiserpost = FundraiserPost::where('id', $request->fundRaiserPost)->first();

        if ($request->status == 'running') {
            $fundraiserpost->update([
                'status' => 'running',
            ]);
        } else if ($request->status == 'block') {
            $fundraiserpost->update([
                'status' => 'block',
            ]);
        } else if ($request->status == 'reviewed') {
            $fundraiserpost->update([
                'status' => 'reviewed',
            ]);
        }

        if ($request->comment) {
            FundraiserApprovalComments::create([
                "fundraiser_post_id" => $fundraiserpost->id,
                "comments"           => $request->comment,
                "status"             => $request->status,
                "admin_id"           => Auth::id(),
            ]);
        }

        return back()->with('success', 'Successfully Update!');

    }

    // update request

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
                $statusui = $posts->status == 'updated' ? 'success' : ($posts->status == 'pending' ? 'warning' : 'danger');
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
    public function fundraiserRequestUpdate(Request $request) {

        $updatePost  = FundraiserPostUpdate::where('id', $request->update_post_id)->firstOrfail();
        $currentPost = FundraiserPost::where('id', $updatePost->fundraiser_post_id)->firstOrfail();

        if ($request->status == 'cancelled') {
            $updatePost->update([
                'status'         => 'cancelled',
                "admin_comments" => $request->comment,
                "cancel_by"      => Auth::id(),
            ]);
        } else if ($request->status == 'updated') {
            $currentPost->update([
                'fundraiser_category_id' => $updatePost->fundraiser_category_id,
                'title'                  => $updatePost->title,
                'shot_description'       => $updatePost->shot_description,
                'goal'                   => $updatePost->goal,
                'end_date'               => $updatePost->end_date,
                'image'                  => $updatePost->image,
                'story'                  => $updatePost->story,
            ]);
            $updatePost->update([
                'status'         => 'updated',
                "admin_comments" => $request->comment,
                "accepted_by"    => Auth::id(),
            ]);
        }

        return redirect()->route('dashboard.fundraiser.campaign.campaign.all')->with('success', 'Successfully Update!');

    }
}