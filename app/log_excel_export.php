<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log_excel_export extends Model
{
    // 
	protected $table='LogEvent';
	protected $fillable = ['*'];
}
