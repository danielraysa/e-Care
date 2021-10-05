<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailKar extends Model
{
    //
    protected $connection = 'oracle';
    protected $table = 'v_email_kar';
    protected $primaryKey = null;
    public $timestamps = false;
}
