<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class member_bonus_model extends Eloquent 
{
    const CREATED_AT = 'TransTime';
    const UPDATED_AT = 'TransTime';
    protected $table = 'MemberBonusTransList';
    protected $fillable = ['MemberNo', 'SectionNo', 'Location', 'Point', 'PointType', 'Behavior', 'Place', 'Expire', 'ExpireDate'];
}
