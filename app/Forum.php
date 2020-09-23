<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    protected $table = 'forums';
    protected $guarded = [];

    public function komentar_forum()
    {
        return $this->hasMany('App\ForumComment', 'forum_id', 'id');
    }

    public function post_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
