<?php

namespace App\Http\Controllers;

use App\Models\Startup;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    // Retorna todas as startups em JSON
    public function index() {
        $startups = Startup::all();
        return response()->json($startups); // <- JSON
    }
    
    public function store(Request $request) {
        $request->validate([
            'nome_fantasia' => 'required',
            'setor' => 'required',
            'cnpj' => 'required|unique:startups,cnpj'
        ]);
    
        $startup = Startup::create($request->all());
    
        return response()->json($startup); // <- JSON
    }
}