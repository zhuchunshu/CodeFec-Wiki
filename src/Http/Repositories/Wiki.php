<?php

namespace App\Plugins\Wiki\Src\Http\Repositories;

use App\Plugins\Wiki\Src\Models\Wiki as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Wiki extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
