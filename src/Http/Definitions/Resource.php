<?php

namespace Vis\Builder\Definitions;

use Vis\Builder\Services\Listing;
use Illuminate\Support\Arr;
use Vis\Builder\Fields\Definition;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Vis\Builder\Services\Actions;

class Resource
{
    protected $orderBy = 'created_at desc';
    protected $isSortable = false;
    protected $perPage = [20, 100, 1000];
    protected $cacheTag;
    protected $updateManyToManyList = [];
    protected $updateHasOneList = [];
    protected $updateMorphOneList = [];
    protected $relations = [];

    public function actions()
    {
        return Actions::make()->insert()->update()->preview()->clone()->delete();
    }

    public function model()
    {
        return new $this->model;
    }

    public function buttons()
    {
        return [];
    }

    public function cards()
    {
        return [];
    }

    public function getTableView()
    {
        return 'admin::new.table';
    }

    public function getTitle() : string
    {
        return __cms($this->title);
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function getIsSortable()
    {
        return $this->isSortable;
    }

    public function getCacheKey()
    {
        return $this->cacheTag ?: $this->getNameDefinition();
    }

    public function clearCache()
    {
        Cache::tags($this->getCacheKey())->flush();
    }

    public function getOrderBy()
    {
        $sessionOrder = session($this->getSessionKeyOrder());

        if ($sessionOrder) {
            return $sessionOrder['field'] . ' ' . $sessionOrder['direction'];
        }

        return $this->orderBy;
    }

    public function getFilter()
    {
        return session($this->getSessionKeyFilter());;
    }

    public function getPerPageThis()
    {
        return session($this->getSessionKeyPerPage()) ? session($this->getSessionKeyPerPage())['per_page'] : $this->perPage[0];
    }

    public function getNameDefinition() : string
    {
        return mb_strtolower(class_basename($this));
    }

    public function getFullPathDefinition() : string
    {
        return get_class($this);
    }

    public function getSessionKeyOrder() : string
    {
        return "table_builder.{$this->getNameDefinition()}.order";
    }

    public function getSessionKeyFilter() : string
    {
        return "table_builder.{$this->getNameDefinition()}.filter";
    }

    public function getSessionKeyPerPage() : string
    {
        return "table_builder.{$this->getNameDefinition()}.per_page";
    }

    public function getUrlAction() : string
    {
        $arraySlugs = explode('/', request()->url());

        return '/admin/actions/' . last($arraySlugs);
    }

    public function getAllFields() : array
    {
        $fields = $this->fields();
        $fields = isset($fields[0]) ? $fields : Arr::flatten($fields);

        $fieldsResults = [];
        foreach ($fields as $field) {
            $fieldsResults[$field->getNameField()] = $field;

            if ($field->getHasOne()) {
                $this->relations[] = $field->getHasOne();
            }

            if ($field->getMorphOne()) {
                $this->relations[] = $field->getMorphOne();
            }
        }

        return $fieldsResults;
    }

    public function remove(int $id) : array
    {
        $this->model()->destroy($id);

        return [
            'status' => 'success'
        ];
    }

    public function clone(int $id) : array
    {
        $model = $this->model()->find($id);
        $newModel = $model->replicate();
        $newModel->push();

        return [
            'status' => 'success',
        ];
    }

    public function changeOrder($requestOrder, $params) : array
    {
        parse_str($requestOrder, $order);
        $pageThisCount = $params ?: 1;
        $perPage = 20;

        $lowest = ($pageThisCount * $perPage) - $perPage;

        foreach ($order['sort'] as $id) {
            $lowest++;

            $this->model()->where('id', $id)->update([
                'priority' => $lowest,
            ]);
        }

        $this->clearCache();

        return [
            'status' => 'success'
        ];
    }

    public function showAddForm()
    {
        $definition = $this;
        $fields = $this->fields();

        return [
            view('admin::new.form.create', compact('definition', 'fields'))->render()
        ];
    }

    public function showEditForm(int $id) : array
    {
        $definition = $this;

        $record = $this->model()->find($id);

        $fields = $this->fields();

        if (isset($fields[0])) {
            foreach ($fields as $field) {
                $field->setValue($record);
            }
        } else {
            foreach ($fields as $fieldBlock) {
                foreach ($fieldBlock as $field) {
                    $field->setValue($record);
                }
            }
        }

        return [
            'html' => view('admin::new.form.edit', compact('definition', 'fields'))->render(),
            'status' => true
        ];
    }

    public function saveAddForm($request) : array
    {
        $record = $this->model();
        $recordNew = $this->saveActive($record, $request);

        return [
            'id' => $recordNew->id,
            'html' => $this->getSingleRow($recordNew)
        ];
    }

    public function saveEditForm($request) : array
    {
        $recordNew = $this->updateForm($request);

        return [
            'id' => $recordNew->id,
            'html' => $this->getSingleRow($recordNew)
        ];
    }

    protected function updateForm($request)
    {
        $record = $this->model()->find($request['id']);
        $recordNew = $this->saveActive($record, $request);

        return $recordNew;
    }

    private function getRules($fields) : array
    {
        $rules = [];
        foreach ($fields as $field) {
            if ($field->getRules()) {
                $rules[$field->getNameField()] = $field->getRules();
            }
        }

        return $rules;
    }

    protected function saveActive($record, $request)
    {
        $fields = $this->getAllFields();
        Validator::make($request, $this->getRules($fields))->validate();

        foreach ($fields as $field) {
            $nameField = $field->getNameField();
            if ($nameField != 'id') {

                if ($field->getLanguage() && !$field->getMorphOne() && !$field->getHasOne()) {
                    $this->saveLanguage($field, $record, $request);
                }

                if ($field->getHasOne()) {
                    $this->updateHasOne($field, $request[$nameField]);
                    continue;
                }

                if ($field->getMorphOne()) {
                    $this->updateMorphOne($field, $request[$nameField]);
                    continue;
                }

                if ($field->isManyToMany()) {
                    $this->updateManyToMany($field, $request[$nameField] ?? '');
                    continue;
                }

                if ($field instanceof Definition) {
                    continue;
                }

                $record->$nameField = $field->prepareSave($request);
            }
        }

        if (isset($request['foreign_attributes'])) {
            $foreignAttributes = json_decode($request['foreign_attributes']);

            if ($foreignAttributes->type_relation == 'morphMany') {
                $record->{$foreignAttributes->morph_type} = $foreignAttributes->model_base;
            }
        }

        $record->save();

        if (count($this->updateManyToManyList)) {
            foreach ($this->updateManyToManyList as $item) {
                if ($item['collectionsIds']) {
                    $item['field']->save($item['collectionsIds'], $record);
                }
            }
        }

        if (count($this->updateHasOneList)) {

            foreach ($this->updateHasOneList as $relationHasOne => $items) {

                unset($data);

                foreach ($items as $item) {

                    if (is_array($item['field']->getLanguage())) {

                        foreach ($item['field']->getLanguage() as $slugLanguage => $language) {

                            $fieldLanguage = $item['field']->getNameField().$language['postfix'];
                            $keyField = $item['field']->getNameFieldInBd().$language['postfix'];

                            $data[$relationHasOne][$keyField] = $request[$fieldLanguage] ? :
                                $this->getTranslate($item['field'], $slugLanguage, $request[$item['field']->getNameField()]);
                        }

                    } else {
                        $data[$relationHasOne][$item['field']->getNameFieldInBd()] = $item['value'];
                    }
                }

                $record->$relationHasOne ?
                    $record->$relationHasOne()->update($data[$relationHasOne]) :
                    $record->$relationHasOne()->create($data[$relationHasOne]);
            }
        }

        if (count($this->updateMorphOneList)) {

            $data = [];

            foreach ($this->updateMorphOneList as $item) {

                $relationMorphOne = $item['field']->getMorphOne();

                if ($item['field']->getLanguage()) {
                    foreach ($item['field']->getLanguage() as $slugLanguage => $language) {

                        $fieldLanguage = $item['field']->getNameField().$language['postfix'];

                        $data[$item['field']->getNameField().$language['postfix']] = $request[$fieldLanguage] ? :
                            $this->getTranslate($item['field'], $slugLanguage, $request[$item['field']->getNameField()]);
                    }

                } else {
                    $data[$item['field']->getNameField()] = $item['value'];
                }
            }

            $record->$relationMorphOne ? $record->$relationMorphOne()->update($data) : $record->$relationMorphOne()->create($data);
        }

        $this->clearCache();

        return $record;
    }

    protected function saveLanguage($field, &$record, $request)
    {
        $nameField = $field->getNameField();

        foreach ($field->getLanguage() as $slugLang => $langPrefix) {
            $langField = $nameField . $langPrefix['postfix'];

            if (isset($request[$langField]) && $request[$langField]) {
                $translate = $request[$langField];
            } else {
                $translate = $this->getTranslate($field, $slugLang, $request[$nameField]);
            }

            $record->$langField = $translate;
        }
    }

    private function getTranslate($field, $slugLang, $phrase)
    {
        try {
            $langDef = $field->getLanguageDefault();

            if ($langDef == $slugLang || !$phrase) {
                return '';
            }

            $translator = new \Yandex\Translate\Translator(config('builder.translations.cms.api_yandex_key'));
            $translation = $translator->translate($phrase, $langDef . '-' . $slugLang);

            if (isset($translation->getResult()[0])) {
                return $translation->getResult()[0];
            }
        } catch (\Yandex\Translate\Exception $e) {
            return $phrase;
        }
    }

    protected function updateManyToMany($field, $collectionsIds)
    {
        $this->updateManyToManyList[] = [
            'field' => $field,
            'collectionsIds' => $collectionsIds
        ];
    }

    protected function updateHasOne($field, $value)
    {
        $this->updateHasOneList[$field->getHasOne()][] = [
            'field' => $field,
            'value' => $value
        ];
    }

    protected function updateMorphOne($field, $value)
    {
        $this->updateMorphOneList[] = [
            'field' => $field,
            'value' => $value
        ];
    }

    protected function getSingleRow($recordNew)
    {
        $list = new Listing($this);
        $head = $list->head();
        $definition = $this;

        $recordNew->fields = clone $head;
        $head->map(function ($item2, $key) use ($recordNew, $definition) {
            $item2->setValue($recordNew);
            $recordNew->fields[$key]->value = $item2->getValueForList($definition);
        });

        return view('admin::new.list.single_row',
            [
                'list' => $list,
                'record' => $recordNew
            ]
        )->render();
    }

    public function getListing()
    {
        $this->checkPermissions();

        $head = $this->head();
        $list = $this->getCollection();
        $definition = $this;

        $list->map(function ($item, $key) use ($head, $definition) {
            $item->fields = clone $head;
            $item->fields->map(function ($item2, $key) use ($item, $definition) {
                $item->fields[$key] = clone $item2;
                $item2->setValue($item);

                $item->fields[$key]->value = $item2->getValueForList($definition);
            });
        });

        return $list;
    }

    protected function checkPermissions()
    {
        if (!app('user')->hasAccess([$this->getNameDefinition(). '.view'])) {
            abort(403);
        }
    }

    public function getCollection()
    {
        $collection = $this->model()->with($this->relations);
        $filter = $this->getFilter();
        $orderBy = $this->getOrderBy();
        $perPage = $this->getPerPageThis();

        if (isset($filter['filter']) && is_array($filter['filter'])) {
            foreach ($filter['filter'] as $field => $value) {
                if (is_null($value) || $value == '') {
                    continue;
                }

                if (is_array($value)) {
                    if ($value['from'] && $value['to']) {
                        $collection = $collection->whereBetween($field, [$value['from'], $value['to']]);
                    }

                    continue;
                }

                $collection = $collection->where($field, '=', $value);
            }
        }

        return $collection->orderByRaw($orderBy)->paginate($perPage);
    }

    public function head()
    {
        $fields = $this->getAllFields();

        return collect($fields)->reject(function ($name) {
            return $name->isOnlyForm() == true;
        });
    }

    public function getList()
    {
        $list = new Listing($this);
        $listingRecords = $list->body();

        return view('admin::new.list.table', compact('list', 'listingRecords'));
    }

    public function cloneTree(int $id): array
    {
        $this->cloneRecursively($id);

        $this->clearCache();

        return [
            'status' => 'success',
        ];
    }

    private function cloneRecursively($id, $parentId = '')
    {
        $model = $this->model();

        $page = $model::where('id', $id)->select('*')->first()->toArray();
        $idClonePage = $page['id'];
        unset($page['id']);
        if ($parentId) {
            $page['parent_id'] = $parentId;
        }

        if ($page['parent_id']) {
            $root = $model::find($page['parent_id']);

            $rec = new $model();
            $countPages = $model::where('parent_id', $page['parent_id'])->where('slug', $page['slug'])->count();

            if ($countPages) {
                $page['slug'] = $parentId ?
                    $page['slug'].'_'.$page['parent_id'] :
                    $page['slug'].'_'.time();
            }

            foreach ($page as $k => $val) {
                $rec->$k = $val;
            }

            $rec->save();
            $lastId = $rec->id;

            $rec->makeChildOf($root);
        }

        $folderCheck = $model::where('parent_id', $idClonePage)->select('*')->orderBy('lft', 'desc')->get()->toArray();
        if (count($folderCheck)) {
            foreach ($folderCheck as $pageChild) {
                $this->cloneRecursively($pageChild['id'], $lastId);
            }
        }
    }
}
