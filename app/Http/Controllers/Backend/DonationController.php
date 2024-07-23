<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donate;

class DonationController extends Controller {

    public function index() {
        $all_donates = Donate::join('fundraiser_posts', 'fundraiser_posts.id', 'donates.fundraiser_post_id')
            ->select('donates.*', 'fundraiser_posts.title', 'fundraiser_posts.slug', 'fundraiser_posts.user_id')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.donation.index', compact('all_donates'));
    }

    public function show($id) {
        $donation = Donate::with('fundraiser:id,title,slug')->find($id);
        if ($donation->admin_view == 0) {
            $donation->update([
                'admin_view' => 1,
            ]);
        }
        return view('backend.donation.show', compact('donation'));
    }

}
