<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Agenda;

class AgendaController extends Controller
{
    
    public function criar() 
    {
        return view('criar')->with([]);
    }

    public function inserir(Request $request)
    {
        $mensagem = [
            'required' => 'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'data' => 'required',
            'compromisso' => 'required',
            'categoria' => 'required',
        ], $mensagem);

        try {
            Agenda::create([
                'data' => $request->get('data'),
                'compromisso' => $request->get('compromisso'),
                'categoria' => $request->get('categoria'),
                'observacao' => $request->get('observacao') ? $request->get('observacao') : null,
                'usuario' => Auth::user()->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('create', 'Uma nova agenda foi criada!');
    }

    public function editar($id)
    {
        $agenda = Agenda::where("id",$id)->get();

        if ($agenda->isEmpty()) {
            return redirect()->route('home')->with('resposta', [
                'status' => 400,
                'mensagem' => 'Acesso indevido!'
            ]);
        }

        return view("editar")->with([
            "agenda"=>$agenda[0]
        ]);
    }

    public function atualizar(Request $request, $id)
    {
        $mensagem = [
            'required' => 'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'data' => 'required',
            'compromisso' => 'required',
            'categoria' => 'required'
        ], $mensagem);

        try {
            Agenda::find($id)->update([
                'data' => $request->get('data'),
                'compromisso' => $request->get('compromisso'),
                'categoria' => $request->get('categoria'),
                'observacao' => $request->get('observacao') ? $request->get('observacao') : null
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('update', 'a agenda foi atualizada com sucesso!');
    }

    public function excluir($id)
    {
        try {
            Agenda::find($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador.'
            ]);
        } 

        return redirect()->route('home')->with('delete', 'A agenda foi excluída com sucesso!');
    }
}
