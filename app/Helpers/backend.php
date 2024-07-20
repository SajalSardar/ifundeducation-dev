<?php

use App\Models\Comment;
use App\Models\FundraiserUpdateMessage;

function commentsCount() {
    $count = Comment::where('admin_view', 0)->count();
    return $count;
}

function get10Comments() {
    $commets = Comment::where('admin_view', 0)->orderBy('id', 'desc')->take(10)->get();
    return $commets;
}
function updateMessageCount() {
    $count = FundraiserUpdateMessage::where('admin_view', 0)->count();
    return $count;
}

function get10updateMessage() {
    $UpdateMessage = FundraiserUpdateMessage::where('admin_view', 0)->orderBy('id', 'desc')->take(10)->get();
    return $UpdateMessage;
}