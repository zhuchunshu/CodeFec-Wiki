<?php

namespace App\Plugins\Wiki\Src\Http\Repositories;

use App\Plugins\Wiki\Src\Models\WikiClass as Model;
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
