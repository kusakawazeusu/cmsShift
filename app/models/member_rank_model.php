<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class member_rank_model extends Eloquent 
{
    protected $table = 'MemberRank';
    protected $fillable = ['RankNo', 'RankName'];
}
