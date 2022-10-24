<?php

namespace Modules\Users\Http\Controllers;

use Modules\Users\Services\UserService;
use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;
use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Exceptions\NotAllowedException;

use Illuminate\Http\Request;

class UserController extends ControllerAbstract
{
    protected $user;
    protected $userCanViewOthers = false;

    protected function getService(): ServiceAbstract
    {
        return app(UserService::class);
    }

    protected function validatePermission()
    {
        $this->user = auth()->user();
        $this->userCanViewOthers = app(PermissionMapRepository::class)
            ->UserhasItem($this->user, 'users', 'item', '', PermissionItemTypeEnum::ITEM);
    }

    protected function validateId($id = null)
    {
        if (empty($this->user))
            $this->validatePermission();

        if (!$this->userCanViewOthers || is_null($id))
            return $this->user->id;

        return $id;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->validatePermission();

        if (!$this->userCanViewOthers)
            throw new NotAllowedException();

        $index = parent::index($request);
        if ($this->returnModel)
            return view('users::index');

        return $index;
    }

    /**
     * Show the specified resource.
     * @param $id
     * @return Renderable
     */
    public function show($id = null)
    {
        $show = parent::show($this->validateId($id));
        if ($this->returnModel)
            return view('users::show');

        return $show;
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $create = parent::store($request);
        if ($this->returnModel)
            return view('users::store');

        return $create;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('users::edit');
    }

    public function update(Request $request, $id = null)
    {
        return parent::update($request, $this->validateId($id));
    }

    public function destroy($id = null)
    {
        return parent::destroy($this->validateId($id));
    }

    public function recover($id = null)
    {
        return parent::recover($this->validateId($id));
    }

    public function inactivate($id = null)
    {
        return parent::inactivate($this->validateId($id));
    }

    public function activate($id = null)
    {
        return parent::activate($this->validateId($id));
    }

    public function block($id = null)
    {
        return parent::block($this->validateId($id));
    }

    public function unblock($id = null)
    {
        return parent::unblock($this->validateId($id));
    }

    public function audit($id = null)
    {
        return parent::audit($this->validateId($id));
    }

    public function information($id = null)
    {
        return $this->getService()->information($this->validateId($id));
    }

    public function permission($id = null)
    {
        return $this->getService()->permission($this->validateId($id));
    }
}
