<?php

namespace App\Plugins\Wiki\Src\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Dcat\Admin\Traits\HasDateTimeFormatter;

class WikiClass extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'wiki_class';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
