<?php

namespace Modules\Utils\Abstracts;

use Modules\Utils\ApiReturn\ApiReturn;
use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Repositories\PermissionMapRepository;
use Modules\Utils\Exceptions\Handlers\NotFoundExceptionHandler;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Debug\ExceptionHandler;

use App\Http\Controllers\Controller;

abstract class ControllerAbstract extends Controller
{
    /**
     * This varible controls the ability to return an api response or a model for a view
     */
    public $returnModel = null;

    abstract protected function getService(): ServiceAbstract;

    public function __construct(Request $request)
    {
        if ($request->isJson())
            $this->returnModel = false;

        App::singleton(
            ExceptionHandler::class,
            NotFoundExceptionHandler::class
        );

        $validation = $this->validateRequest($request);
        if(isset($validation['error'])) return $validation->message();
    }

    /** 
     * search
     *
     * @param  array $data
     * @param  string $idenifier
     * @param  string $operator
     * @param  string $orderBy
     * 
     * 
     * @return RepositoryAbstract
     */
    private function search(array $data, $idenifier, $operator, $orderBy): RepositoryAbstract
    {
        if ($orderBy != 'asc' && $orderBy != 'desc')
            $orderBy = 'asc';

        $querry = [];
        $repository_fields = $this->getService()->getRepository()->getModel()->getFillable();
        foreach (array_keys($data) as $field) {
            if (array_key_exists($field, array_flip($repository_fields)))
                $querry[$field] = $data[$field];
        }
        $querry = !empty($querry) ? $querry : null;
        $repository = $this->getService()->getRepository()->orderBy($idenifier, $orderBy);

        switch ($operator) {
            case 'in':
                $repository->whereIn($querry);
                break;
            case 'like':
                $searchBy = request()->get('search_value');
                if (!$searchBy) {
                    if ($this->returnModel)
                        return 'O parametro search_by é requerido em buscas com tipo: LIKE';

                    return ApiReturn::ErrorMessage("O parametro search_by é requerido em buscas com tipo: LIKE", 400);
                }

                $repository->where($idenifier, 'like', '%' . $searchBy . '%');
                break;
            default:
                $repository->where($querry);
        }

        return $repository;
    }

    /**
     * index
     *
     * @param  Request $request
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $idenifier = request()->get('identifier', 'id');
        $operator = request()->get('operator', 'where');
        $orderBy = request()->get('order_by', 'asc');

        $perPage = $request->get('per_page', 6);
        $page = $request->get('page', 1);

        $data = $this->search($request->all(), $idenifier, $operator, $orderBy);

        if ($data->all()->isEmpty()) {
            if ($this->returnModel)
                return 'Não foram encontrados recursos';

            return ApiReturn::ErrorMessage("Não foram encontrados recursos", 404);
        }

        return $this->getService()->datatable($data, ['*'], $perPage, $page);
    }

    /**
     * show id
     * 
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $entity = $this->getService()->entityName;
        $data = $this->getService()->find($id);

        if ($this->returnModel)
            return $data;

        return ApiReturn::SuccessMessage("$entity", 200, $data);
    }

    /**
     * store
     *
     * @param  Request $request
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function store(Request $request)
    {
        $save = $this->getService()->create($request->all());
        if ($this->returnModel)
            return $save;

        return ApiReturn::SuccessMessage("Criado com sucesso", 200, $save);
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function update(Request $request, $id)
    {
        $edit = $this->getService()->update($request, $id);
        if ($this->returnModel)
            return $edit;

        return ApiReturn::SuccessMessage("Informações atualizadas com sucesso", 200, $edit);
    }

    /**
     * destroy
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $destroy = $this->getService()->destroy($id);
        if (is_string($destroy)) {
            if ($this->returnModel)
                return $destroy;

            return ApiReturn::ErrorMessage($destroy);
        }

        if ($this->returnModel)
            return 'Informações excluidas com sucesso';

        return ApiReturn::SuccessMessage("Informações excluidas com sucesso", 200);
    }

    /**
     * recover
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function recover($id)
    {
        $recover = $this->getService()->recover($id);
        if (is_string($recover)) {
            if (!$this->returnModel)
                return ApiReturn::ErrorMessage($recover);

            return $recover;
        }

        if ($recover) {
            if ($this->returnModel)
                return "Informações restauradas com sucesso";

            return ApiReturn::SuccessMessage("Informações restauradas com sucesso", 200);
        }

        if ($this->returnModel)
            return "Informações não puderam ser restauradas";

        return ApiReturn::ErrorMessage("Informações não puderam ser restauradas", 400);
    }

    /**
     * inactivate
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function inactivate($id)
    {
        $recover = $this->getService()->recover($id);
        if (is_string($recover)) {
            if ($this->returnModel)
                return $recover;

            return ApiReturn::ErrorMessage($recover);
        }

        if ($recover) {
            if ($this->returnModel)
                return "Informações desativadas com sucesso";

            return ApiReturn::SuccessMessage("Informações desativadas com sucesso", 200);
        }

        if ($this->returnModel)
            return "Informações não puderam ser desativadas";

        return ApiReturn::ErrorMessage("Informações não puderam ser desativadas", 400);
    }


    /**
     * activate
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function activate($id)
    {
        $activate = $this->getService()->activate($id);
        if ($activate) {
            if ($this->returnModel)
                return $activate;

            return ApiReturn::SuccessMessage("Informações ativadas com sucesso", 200);
        }

        if ($this->returnModel)
            return "Informações não puderam ser ativadas";

        return ApiReturn::ErrorMessage("Informações não puderam ser ativadas", 400);
    }

    /**
     * block
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function block($id)
    {
        $block = $this->getService()->block($id);
        if (is_string($block)) {
            if ($this->returnModel)
                return $block;

            return ApiReturn::ErrorMessage($block);
        }

        if ($this->returnModel)
            return "Informações bloqueadas com sucesso";

        return ApiReturn::SuccessMessage("Informações bloqueadas com sucesso", 200);
    }

    /**
     * unblock
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function unblock($id)
    {
        $updateBlocked = app(PermissionMapRepository::class)
            ->UserhasItem(auth()->user(), 'status.blocked.update', 'item', '', PermissionItemTypeEnum::ITEM);

        if (is_string($updateBlocked)) {
            if ($this->returnModel)
                return $updateBlocked;

            return ApiReturn::ErrorMessage($updateBlocked, 403);
        }

        $unblock = $this->getService()->unblock($id);
        if ($unblock) {
            if ($this->returnModel)
                return $unblock;

            return ApiReturn::SuccessMessage("Informações desbloqueadas com sucesso", 200);
        }

        if ($this->returnModel)
            return "Não foi possivel desbloqueadar as informações";

        return ApiReturn::ErrorMessage("Não foi possivel desbloqueadar as informações", 400);
    }

    /**
     * audit
     *
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function audit($id)
    {
        $audit = app(PermissionMapRepository::class)
            ->UserhasItem(auth()->user(), 'audit', 'item', '', PermissionItemTypeEnum::ITEM);

        if (is_string($audit)) {
            if ($this->returnModel)
                return $audit;

            return ApiReturn::ErrorMessage($audit, 403);
        }

        $entity = $this->getService()->getRepository()->getModel();
        $entity = class_basename($entity);
        $entity = strtolower($entity);

        $timeline = $this->getService()->audit($id);

        if ($this->returnModel)
            $timeline;

        return ApiReturn::SuccessMessage("auditing $entity", 200, $timeline);
    }

    /**
     * validateRequest
     *
     * @param  Request $request
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    protected function validateRequest(Request $request)
    {
        $rules = $this->getService()->getRequest()->rules();
        if (is_null($rules) || empty($rules)) foreach ($request->request->all() as $key => $value) $request->request->remove($key);
        $validate = $this->getService()->getRequest()->validate($rules, $request->all());
        return $validate;
    }

    /**
     * validateRequest
     *
     * @param  Request $request
     * @param  string $id
     * 
     * @return Illuminate\Support\Facades\Response
     */
    protected function checkReturnType()
    {
        if (!is_null($this->returnModel))
            return $this->returnModel;

        return false;
    }
}

