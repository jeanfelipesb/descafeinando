<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelsController extends Controller
{
    public function index() {
        return view('usuarios.painel');
    }
}
