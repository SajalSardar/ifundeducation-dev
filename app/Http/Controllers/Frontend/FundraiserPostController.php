<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\FundraiserCategory;
use App\Models\FundraiserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FundraiserPostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = FundraiserPost::with('fundraisercategories')->where('user_id', auth()->user()->id)->with('fundraisercategories')->paginate(30);
        return view('frontend.fundraiser_post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (empty(auth()->user()->personal_profile) || empty(auth()->user()->academic_profile)) {
            return redirect()->route('user.profile.edit');
        }
        $categories = FundraiserCategory::orderBy('id', 'desc')->where('status', true)->get();
        return view('frontend.fundraiser_post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $image = $request->file('image');
        $request->validate([
            'title'            => 'required|max:200',
            'shot_description' => 'required|max:150',
            'goal'             => 'required|integer',
            'end_date'         => 'required|date',
            'image'            => 'nullable|mimes:png,jpg, webp|max:300',
            'category'         => 'required',
            'story'            => 'nullable|max:1500',
            'agree'            => 'required',
        ]);

        if ($image) {

            $image_name = Str::ulid() . '.' . $image->extension();

            $upload = Image::make($image)->resize(250, 250)->save(public_path('storage/fundraiser_post/' . $image_name));
        } else {
            $image_name = null;
        }

        $post = FundraiserPost::create([
            'user_id'          => auth()->user()->id,
            'title'            => $request->title,
            'shot_description' => $request->shot_description,
            'goal'             => $request->goal,
            'end_date'         => $request->end_date,
            'image'            => $image_name,
            'story'            => $request->story,
            'agree'            => $request->agree === 'on' ? true : false,
            'status'           => "pending",
        ]);

        $post->fundraisercategories()->attach($request->category);

        return redirect()->route('fundraiser.post.index')->with('success', 'Fundraiser Post successfully Created!');
    }

    //ck editor image upload
    public function storyPhoto(Request $request) {
        if ($request->hasFile('upload')) {
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName  = Str::ulid() . '.' . $extension;

            $request->file('upload')->storeAs('fundraiser_post', $fileName);

            $url = asset('storage/fundraiser_post/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function show(FundraiserPost $fundraiserpost) {
        $singlePost = $fundraiserpost->load('fundraiserupdatemessage', 'comments', 'donates');
        return view('frontend.fundraiser_post.show_dashboard', compact('singlePost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function edit(FundraiserPost $fundraiserpost) {
        $categories = FundraiserCategory::orderBy('id', 'desc')->where('status', true)->get();
        return view('frontend.fundraiser_post.edit', compact('categories', 'fundraiserpost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundraiserPost $fundraiserpost) {

        $image = $request->file('image');
        $request->validate([
            'title'            => 'required|max:200',
            'shot_description' => 'required|min:100|max:150',
            'goal'             => 'required|integer',
            'end_date'         => 'required|date',
            'image'            => 'nullable|mimes:png,jpg, webp|max:300',
            'category'         => 'required',
            'story'            => 'nullable|max:1500',
        ]);

        if ($image) {

            if (file_exists(public_path('storage/fundraiser_post/' . $fundraiserpost->image))) {
                Storage::delete('fundraiser_post/' . $fundraiserpost->image);
            }

            $image_name = Str::ulid() . '.' . $image->extension();

            $upload = Image::make($image)->resize(250, 250)->save(public_path('storage/fundraiser_post/' . $image_name));
        } else {
            $image_name = $fundraiserpost->image;
        }

        $fundraiserpost->update([
            'title'            => $request->title,
            'shot_description' => $request->shot_description,
            'goal'             => $request->goal,
            'end_date'         => $request->end_date,
            'image'            => $image_name,
            'story'            => $request->story,
        ]);

        $fundraiserpost->fundraisercategories()->sync($request->category);

        return redirect()->route('fundraiser.post.index')->with('success', 'Fundraiser Post successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundraiserPost $fundraiserpost) {
        $fundraiserpost->delete();

        return redirect()->route('fundraiser.post.index')->with('success', 'Fundraiser Post successfully Deleted!');
    }

    public function fundraiserPostShow($slug) {

        $fundRaiserPost = FundraiserPost::with([
            'fundraisercategories',
            'donates'                 => function ($q) {
                $q->select('id', 'donar_name', 'net_balance', 'created_at', 'fundraiser_post_id', 'display_publicly');
            },
            'comments'                => function ($q) {
                $q->with('replies')->where('status', 'approved')->orderBy('created_at', "desc");
            },
            'fundraiserupdatemessage' => function ($q) {
                $q->orderBy('created_at', 'desc');
            }])->where('slug', $slug)->where('status', 'running')->firstOrfail();
        $total_comment = Comment::where('fundraiser_post_id', $fundRaiserPost->id)->where('status', 'approved')->count();

        return view('frontend.fundraiser_post.show', compact('fundRaiserPost', 'total_comment'));
    }

    public function stopRunning(FundraiserPost $fundraiserpost) {

        if ($fundraiserpost->status == 'stop') {
            $fundraiserpost->update([
                'status' => 'running',
            ]);
            return back()->with('success', 'Campaign Running Successfull!');
        } else {
            $fundraiserpost->update([
                'status' => 'stop',
            ]);
            return back()->with('success', 'Campaign Stop Successfull!');
        }
    }

    // Dashboard Campaign

    public function allCampaign() {
        $posts = FundraiserPost::get();
        return view('backend.fundraiser_post.index', compact('posts'));
    }

    public function showCampaign($slug) {
        $fundRaiserPost = FundraiserPost::with([
            'fundraisercategories',
            'donates',
            'comments' => function ($q) {
                $q->with('replies')->orderBy('created_at', "desc");
            }])->where('slug', $slug)->firstOrfail();

        return view('backend.fundraiser_post.show', compact('fundRaiserPost'));
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