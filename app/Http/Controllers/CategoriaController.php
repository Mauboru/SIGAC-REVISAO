<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller {
    public function index() {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = Categoria::all();    
        return view('categoria.index', compact('data'));
    }
    

    public function create() {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = Categoria::all();
        return view('categoria.create', compact('data'));
    }

    public function store(Request $request) {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = new Categoria();
        $data->name = $request->nome;
        $data->descricao = $request->descricao;
        $data->save();
        return redirect()->route('categoria.index');
    }

    public function show($id) {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = Categoria::find($id);
        if(isset($data)) {
            return view('categoria.show', compact(['data']));
        }
        return "<h1>ERRO: Jogo NÃO ENCONTRADO!</h1>";
    }

    public function edit($id) {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = Categoria::find($id);

        if(isset($data)) {
            return view('categoria.edit', compact('data'));
        }
        return "<h1>ERRO: CATEGORIA NÃO ENCONTRADA!</h1>";
    }

    public function update(Request $request, $id) {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = Categoria::find($id);
        if(isset($data)) {
            $data->name = $request->nome;
            $data->descricao = $request->descricao;
            $data->save();
            return redirect()->route('categoria.index');
        }
        return "<h1>ERRO: CATEGORIA NÃO ENCONTRADO!</h1>";
    }

    public function destroy($id) {
        $this->authorize('hasFullPermission', Categoria::class);
        $data = Categoria::find($id);
        if(isset($data)) {
            $data->delete();
            return redirect()->route('categoria.index');
        }
        return "<h1>ERRO: CATEGORIA NÃO ENCONTRADO!</h1>";
    }
}