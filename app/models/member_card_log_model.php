<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class member_card_log_model extends Eloquent 
{
    const CREATED_AT = 'ModifyTime';
    const UPDATED_AT = 'ModifyTime';
    protected $table = 'MemberCardTransList';
    protected $fillable = ['CardSeqNo', 'MemberNo', 'SectionNo', 'SessionNo', 'Behavior', 'OperatorID'];
}
