<?php

namespace App\Plugins\Wiki\Src\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Dcat\Admin\Traits\HasDateTimeFormatter;

class Wiki extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'wiki';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function class()
    {
        return $this->belongsTo(WikiClass::class,'class_id');
    }

}
