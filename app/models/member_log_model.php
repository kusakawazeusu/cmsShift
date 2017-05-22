<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class member_log_model extends Eloquent 
{
    const CREATED_AT = 'ModifyTime';
    const UPDATED_AT = 'ModifyTime';
    protected $table = 'MemberTransList';
    protected $fillable = ['MemberNo', 'SectionNo', 'SessionNo', 'Behavior', 'OperatorID', 'MemberName', 'MemberID', 'AffiliationTime', 'Birthday', 'Address', 'CellPhone', 'TelePhone', 'MemberStatus', 'Rank', 'XCEnable', 'RPEnable', 'Password'];
}
