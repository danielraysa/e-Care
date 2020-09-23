<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    //
    protected $table = 'forum_comments';
    protected $guarded = [];

    public function komentar_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
