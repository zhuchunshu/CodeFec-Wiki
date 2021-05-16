<?php

namespace App\Plugins\Wiki\src\Http\Repositories;

use App\Plugins\Wiki\src\Models\WikiClass as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WikiClass extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
