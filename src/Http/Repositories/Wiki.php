<?php

namespace App\Plugins\Wiki\src\Http\Repositories;

use App\Plugins\Wiki\src\Models\Wiki as Model;
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
