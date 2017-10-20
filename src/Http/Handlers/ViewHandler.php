<?php namespace Vis\Builder\Handlers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Vis\Builder\JarboeController;

class ViewHandler
{
    protected $controller;
    protected $definition;
    protected $definitionName;
    protected $model;

    public function __construct(JarboeController $controller)
    {
        $this->controller = $controller;
        $this->definition = $controller->getDefinition();
        $this->definitionName = $controller->getOption('def_name');
        $this->model = $this->definition['options']['model'];
    }
    
    public function showEditFormPage($id)
    {
        if ($id === false) {
            if (!$this->controller->actions->isAllowed('insert')) {
                throw new \RuntimeException('Insert action is not permitted');
            }
        } else {
            if (!$this->controller->actions->isAllowed('update')) {
                throw new \RuntimeException('Update action is not permitted');
            }
            if (!$this->controller->isAllowedID($id)) {
                throw new \RuntimeException('Not allowed to edit row #'. $id);
            }
        }

        if ($id) {
            $form = View::make('admin::tb.form_edit');
            $js = View::make('admin::tb.form_edit_validation');
        } else {
            $form = View::make('admin::tb.form_create');
            $js   = View::make('admin::tb.form_create_validation');
        }
        
        $form->is_page = true;
        $form->is_tree = false;
        $js->is_tree = false;
        
        $form->def = $this->definition;
        $form->controller = $this->controller;
        $js->def = $this->definition;
        $js->controller = $this->controller;

        $form->is_blank = true;
        $js->is_blank = true;

        if ($id) {
            $row = $this->controller->query->getRow($id);
            
            $form->row = $row;
            $form->is_blank = false;
            $js->row = $row;
            $js->is_blank = false;
        }
        
        $definition = $this->definition;
        $templatePostfix = $id ? 'edit' : 'create';
        
        return View::make('admin::table_page_'. $templatePostfix, compact('form', 'js', 'definition', 'id'))
                ->render();
    }

    public function showList()
    {
        $table = View::make('admin::tb.table_builder');
        
        $table->def  = $this->definition;
        $table->rows = $this->controller->query->getRows();
        $table->controller = $this->controller;
        $table->per_page = Session::get('table_builder.' . $this->definitionName . '.per_page');

        return $table;
    }

    public function showHtmlForeignDefinition()
    {
        $params =  (array) json_decode (request('paramsJson'));
        $result = [];

        foreach ($params['show'] as $field) {
            $arrayDefinitionFields[$field] =
                config('builder.tb-definitions.' . $params['definition']. '.fields.'. $field);
        }

        if (request('id')) {
            $model = config('builder.tb-definitions.' .  $params['definition']. '.options.model');
            $result = $model::where( $params['foreign_field'], request('id'));
            $result = isset($params['sortable'])
                    ? $result->orderBy($params['sortable'], 'asc')->orderBy('id', 'desc')
                    : $result->orderBy('id', 'desc');;

            $result = $result->get();
        }

        $idUpdate = request('id') ? : '';
        $attributes = request('paramsJson');

        return View::make('admin::tb.input_definition_table_data',
                compact ('arrayDefinitionFields', 'result', 'idUpdate', 'attributes'))
                ->render();
    }

    public function deleteForeignDefinition()
    {
        $params =  (array) json_decode (request('paramsJson'));
        $model = config('builder.tb-definitions.' .  $params['definition']. '.options.model');

        $model::find(request('idDelete'))->delete();

        return $this->showHtmlForeignDefinition();
    }

    public function changePositionDefinition()
    {
        $params = (array) json_decode (request('paramsJson'));

        if (!isset($params['sortable'])) throw new \RuntimeException('Не определено поле для сортировки');

        $idsPositionUpdate = (array) json_decode (request('idsPosition'));
        $model = config('builder.tb-definitions.' .  $params['definition']. '.options.model');
        $sortField = $params['sortable'];

        $records = $model::whereIn('id', $idsPositionUpdate)
            ->orderByRaw('FIELD(id, '. implode (',', $idsPositionUpdate) .')')->get();

        foreach ($records as $k=>$record) {
            $record->$sortField = $k;
            $record->save();
        }

        return true;
    }

    public function showEditForm($id = false, $isTree = false)
    {

        $table = $id ? View::make('admin::tb.modal_form_edit') : View::make('admin::tb.modal_form');

        $table->is_tree = $isTree;
        $table->def = $this->definition;
        $table->controller = $this->controller;
        $table->is_blank = true;

        $table->definitionName = $table->controller->getDefinitionName();

        if ($id) {
            $table->row = (array) $this->controller->query->getRow($id);
            $table->is_blank = false;
        }

        return $table->render();
    }

    public function showRevisionForm($id = false, $isTree = false)
    {
        $table = View::make('admin::tb.modal_revision');
        $model = $this->model;
        $objModel = $model::find($id);

        $table->is_tree = $isTree;
        $table->def = $this->definition;
        $table->controller = $this->controller;
        $table->history = $objModel->revisionHistory()->orderBy("created_at", "desc")->get();

        return $table->render();
    }

    public function showViewsStatistic($id = false, $isTree = false)
    {
        $table = View::make('admin::tb.modal_views_statistic');

        $table->is_tree = $isTree;
        $table->def = $this->definition;
        $table->controller = $this->controller;
        $table->id = $id;
        $table->model = $this->model;

        return $table->render();
    }
    
    public function getRowHtml($data)
    {
        $row = View::make('admin::tb.single_row');
        $data['values'] = $this->controller->query->getRow($data['id']);

        $row->controller = $this->controller;
        $row->actions = $this->controller->actions;
        $row->def = $this->definition;
        $row->row = (array) $data['values'];

        return $row->render();
    }
    
    public function fetchActions($row)
    {
        $actions = View::make('admin::tb.single_row_actions');

        $actions->row = $row;
        $actions->def = $this->definition;
        $actions->actions = $this->controller->actions;
        
        return $actions->render();
    }
}
