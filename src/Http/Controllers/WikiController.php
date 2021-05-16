<?php

namespace App\Plugins\Wiki\Src\Http\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use App\Plugins\Wiki\Src\Models\WikiClass;
use App\Plugins\Wiki\Src\Http\Repositories\Wiki;
use Dcat\Admin\Http\Controllers\AdminController;

class WikiController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Wiki(['user','class']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title',"标题");
            $grid->column('message');
            $grid->column('user','创建者')->display(function($user){
                return "<a href='".route("public.user.about",['id' => $user->id])."'>".$user->username."</a>";
            });
            $grid->column('class','所属分类')->display(function($class){
                return "<a href='wiki/class/".$class->id."'>".$class->title."</a>";
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Wiki(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('markdown');
            $show->field('content');
            $show->field('message');
            $show->field('user_id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Wiki(), function (Form $form) {
            $form->display('id');
            $form->text('title', '标题')->required();
            $form->select('class_id', '分类')->options(function () {
                $user = WikiClass::get();
                $data = [];
                if (count($user)) {
                    foreach ($user as $value) {
                        $data[$value->id] = $value->title;
                    }
                }
                return $data;
            })->required();
            $form->markdown('markdown', '内容')->required();
            $form->text('message')->value("Initial Home page")->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title;

    /**
     * Set description for following 4 action pages.
     *
     * @var array
     */
    protected $description = [
        //        'index'  => 'Index',
        //        'show'   => 'Show',
        //        'edit'   => 'Edit',
        //        'create' => 'Create',
    ];

    /**
     * Set translation path.
     *
     * @var string
     */
    protected $translation;

    /**
     * Get content title.
     *
     * @return string
     */
    protected function title()
    {
        return $this->title ?: admin_trans_label();
    }

    /**
     * Get description for following 4 action pages.
     *
     * @return array
     */
    protected function description()
    {
        return $this->description;
    }

    /**
     * Get translation path.
     *
     * @return string
     */
    protected function translation()
    {
        return $this->translation;
    }

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        Admin::script(<<<JS
        $.ajax({
            type: "POST",
            url: "wiki/Sqlmigrate",
            data: {"a":1},
            dataType: "json",
            success: function (response) {
                
            }
        });
JS);
        return $content
            ->translation($this->translation())
            ->title($this->title())
            ->description($this->description()['index'] ?? trans('admin.list'))
            ->body(
                function (Row $row) {
                    $row->column(12, function (Column $column) {
                        $column->row(view('Wiki::admin.index'));
                        $column->row($this->grid());
                    });
                }
            );
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->translation($this->translation())
            ->title($this->title())
            ->description($this->description()['show'] ?? trans('admin.show'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->translation($this->translation())
            ->title($this->title())
            ->description($this->description()['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->translation($this->translation())
            ->title($this->title())
            ->description($this->description()['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $this->form()->update($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store()
    {
        return $this->form()->store();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->form()->destroy($id);
    }
}
