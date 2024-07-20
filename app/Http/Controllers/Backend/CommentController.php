<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminAllComments(Request $request) {

        $comments = Comment::with('fundraiserpost')->get();

        return view('backend.comments.index', compact('comments'));
    }

    public function adminAllCommentsDataTable(Request $request) {

        $comments = Comment::with('fundraiserpost');

        // if ($request->all()) {
        //     $all_donars->where(function ($query) use ($request) {
        //         if ($request->title) {
        //             $query->where('donates.fundraiser_post_id', '=', $request->title);
        //         }
        //         if ($request->donorname) {
        //             if (Str::lower($request->donorname) === 'guest') {
        //                 $query->where('donates.display_publicly', 'no');
        //             } else {
        //                 $query->where('donates.donar_name', 'like', "%$request->donorname%");
        //             }
        //         }
        //         if ($request->fromdate) {
        //             $from_date = date("Y-m-d", strtotime($request->fromdate));
        //             $query->where('donates.created_at', '>=', $from_date);
        //         }
        //         if ($request->todate) {
        //             $to_date = date("Y-m-d", strtotime($request->todate));
        //             $query->where('donates.created_at', '<=', $to_date);
        //         }
        //     });
        // }

        return DataTables::of($comments)

            ->editColumn('comment', function ($comments) {
                return Str::limit($comments->comment, 20, '...');
            })
            ->editColumn('created_at', function ($comments) {
                return $comments->created_at->format('M d, Y');
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function show(Comment $comment) {
        $comment->update([
            'admin_view' => 1,
        ]);
        return view('backend.comments.show', compact('comment'));
    }

    /**
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Comment $comment) {

        if ($comment->status == 'blocked') {
            $comment->update([
                'status' => 'unapproved',
            ]);
        } else {
            $comment->update([
                'status' => 'blocked',
            ]);
        }

        return back()->with('success', 'Status Update Successfull!');

    }
}
