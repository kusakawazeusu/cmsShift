<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class member_card_model extends Eloquent 
{
    const CREATED_AT = 'created_at';
    protected $table = 'MemberCard';
    protected $fillable = ['MemberNo', 'SectionNo', 'CardSeqNo', 'CardStatus'];
}
