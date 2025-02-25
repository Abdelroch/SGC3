<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use PDF;


class SolicitarController extends Controller
{

    public function index()
    {
        
        $solicitacao = Solicitacao::all();
        return view('admin.pedidos', compact('solicitacao'));

    }


    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'nif' => 'required|string|max:20',
            'pay' => 'required|string|max:12',
            'valor' => 'require|string|max:10',
        ]);

        Solicitacao::create($request->all());

        return redirect()->back()->with('success', 'Solicitação feita com sucesso!');
    }


    public function edit($id)
    {
        $solicitacao = Solicitacao::find($id);

        if (!$solicitacao) {
            return response()->json(['error' => 'solicitacao não encontrado.'], 404);
        }

        return response()->json($solicitacao);
    }





    public function update(Request $request, $id)
    {
        /* add($request->all()); */

        try {
            $solicitacao = Solicitacao::findOrFail($id);
            $solicitacao->update($request->only(['nome', 'email', 'telefone', 'nif']));
            return redirect()->route('solicitacao.list')->with('success', 'Solicitação atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('solicitacao.list')->with('error', 'Erro ao atualizar solicitação: ' . $e->getMessage());
        }
    }





        public function destroy($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->delete();

        return redirect()->back()->with('success', 'A sua solicitação excluída com sucesso!');

    }

    public function gerarPdf(Request $request)
    {
        // Obter o ano do request
        $ano = $request->input('ano');

        // Filtrar os dados da tabela solicitacao pelo ano (supondo que exista um campo 'created_at' ou 'data' na tabela)
        $solicitacoes = Solicitacao::whereYear('created_at', $ano)->get(); // Altere 'created_at' para o campo correto

        // Gerar o PDF com os dados filtrados
        $pdf = PDF::loadView('admin.PDF.solicitacao', compact('solicitacoes', 'ano'));

        // Definir o nome do arquivo baseado no ano selecionado
        $fileName = "solicitacoes_{$ano}.pdf";
        $pdf->save(storage_path($fileName));

        // Retornar o PDF para download e apagar o arquivo após o envio
        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }






}
