<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserUpdateMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UpdateMessageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminAllMessage() {
        $messages = FundraiserUpdateMessage::with('fundraiserpost:id,title,user_id')->get();

        return view('backend.update_message.index', compact('messages'));
    }

    public function adminAllCommentsDataTable(Request $request) {
        $messages = FundraiserUpdateMessage::with('fundraiserpost:id,title,user_id')->where('user_id', auth()->user()->id);

        if ($request->all()) {
            $messages->where(function ($query) use ($request) {
                if ($request->title) {
                    $query->where('fundraiser_post_id', '=', $request->title);
                }
                if ($request->fromdate) {
                    $from_date = date("Y-m-d", strtotime($request->fromdate));
                    $query->where('created_at', '>=', $from_date);
                }
                if ($request->todate) {
                    $to_date = date("Y-m-d", strtotime($request->todate));
                    $query->where('created_at', '<=', $to_date);
                }
            });
        }
        return DataTables::of($messages)

            ->editColumn('message', function ($messages) {
                return Str::limit($messages->message, 50, '...');
            })
            ->editColumn('title', function ($messages) {
                return Str::limit($messages->fundraiserpost->title, 20, '...');
            })
            ->editColumn('created_at', function ($messages) {
                return $messages->created_at->format('M d, Y');
            })
            ->editColumn('updated_at', function ($messages) {
                return $messages->updated_at->format(' M d, Y');
            })
            ->addColumn('action', function ($messages) {
                return '<div class="text-end"><a href="' . route('fundraiser.post.message.edit', $messages->id) . '"
                class="action_icon" title="View">
                <i class="fas fa-eye"></i>
                </a><a href="' . route('fundraiser.post.message.edit', $messages->id) . '"
                        class="action_icon" title="Edit">
                        <i class="fas fa-edit"></i>
                        </a>
                        <form action="' . route('fundraiser.post.message.delete', $messages->id) . '"
                        method="POST" class="d-inline" style="cursor: pointer">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <p class="action_icon delete message_delete" title="Delete">
                            <i class="fas fa-trash"></i>
                        </p>
                        </form></div>';
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function show($id) {
        $message = FundraiserUpdateMessage::with('fundraiserpost:id,title,user_id')->find($id);
        $message->update([
            'admin_view' => 1,
        ]);
        return view('backend.update_message.show', compact('message'));
    }

    /**
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate($id) {

        $message = FundraiserUpdateMessage::find($id);
        if ($message->status == 1) {
            $message->update([
                'status' => 2,
            ]);
        } else {
            $message->update([
                'status' => 1,
            ]);
        }

        return back()->with('success', 'Status Update Successfull!');

    }
}
