<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class member_model extends Eloquent 
{
    const CREATED_AT = 'AffiliationTime';
    protected $table = 'Member';
    protected $fillable = ['MemberName', 'SectionNo', 'MemberID', 'Birthday', 'Address', 'CellPhone', 'TelePhone', 'Memo', 'MemberStatus', 'MemberImage', 'Rank', 'XCEnable', 'RPEnable', 'Password', 'Email'];
}
