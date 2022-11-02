<?php

namespace Crud\App\Web\Permissao\Controllers;

use Crud\App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    public function index()
    {
        return view('permissoes.index');
    }
}
