<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class FundraiserPost extends Model {
    use HasFactory, SoftDeletes;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function setTitleAttribute( $value ) {
        $this->attributes['title'] = $value;
        $this->attributes['slug']  = Str::slug( $value ) . '-' . Str::ulid();
    }

    public function fundraisercategories() {
        return $this->belongsToMany( FundraiserCategory::class );
    }

    public function fundraiserupdatemessage() {
        return $this->hasMany( FundraiserUpdateMessage::class );
    }

    public function comments() {
        return $this->hasMany( Comment::class )->whereNull( 'parent_id' );
    }

    public function user() {
        return $this->belongsTo( User::class );
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'end_date' => 'datetime',
    ];

}