<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;

class CategoriaApiController extends Controller
{
    protected $model;

    public function __construct(Categoria $categoria)
    {
        $this->model = $categoria;
    }

    public function index()
    {
        $data = $this->model->all();
        return response()->json($data);
     }
}
