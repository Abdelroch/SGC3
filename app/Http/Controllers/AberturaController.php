<?php

namespace App\Http\Controllers;

use App\Models\Abertura;
use Illuminate\Http\Request;

class AberturaController extends Controller
{
    // Exibe todos os registros de Abertura
    public function index()
    {
        $aberturas = Abertura::all();
        return view('admin.aberturalist', compact('aberturas'));
    }

    // Exibe o formulário para criar uma nova Abertura
    public function create()
    {
        return view('admin.abertura');
    }

    // Salva uma nova Abertura no banco de dados
    public function store(Request $request)
    {
         /* dd($request->all());  */
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'nif' => 'required|string|max:20',
            'provincia' => 'required|string|max:255',
            // outros campos
        ]);

        Abertura::create($request->all());

        return redirect()->route('aberturas.index')->with('success', 'Abertura de conta realizada com sucesso!');
    }

    // Exibe os detalhes de uma Abertura específica
    public function show($id)
    {
        $abertura = Abertura::find($id);
        return view('aberturas.show', compact('abertura'));
    }

    // Exibe o formulário para editar uma Abertura existente
    public function edit($id)
    {
        $abertura = Abertura::find($id);

        if (!$abertura) {
            return response()->json(['error' => 'abertura não encontrado.'], 404);
        }

        return response()->json($solicitacao);
    }

    // Atualiza uma Abertura existente no banco de dados
    public function update(Request $request, $id)
    {
        /* add($request->all()); */

        try {

            $abertura = Abertura::findOrFail($id);
            $abertura->update($request->only(['id', 'name', 'email', 'nif','provincia', 'telefone']));
            return redirect()->route('aberturas.index')->with('success', 'pedido de abertura atualizada com sucesso!');
        } catch (\Exception $e) {

            return redirect()->route('aberturas.index', compact(''))->with('error', 'Erro ao atualizar o seu pedido de abertura de conta: ' . $e->getMessage());
        }
    }


    public function gerarPdf(Request $request)
    {
        // Obter o ano do request
        $ano = $request->input('ano');

        // Filtrar os dados da tabela solicitacao pelo ano (supondo que exista um campo 'created_at' ou 'data' na tabela)
        $abertura = Abertura::whereYear('created_at', $ano)->get(); // Altere 'created_at' para o campo correto

        // Gerar o PDF com os dados filtrados
        $pdf = PDF::loadView('admin.PDF.abertura', compact('abertura', 'ano'));

        // Definir o nome do arquivo baseado no ano selecionado
        $fileName = "aberturas_{$ano}.pdf";
        $pdf->save(storage_path($fileName));

        // Retornar o PDF para download e apagar o arquivo após o envio
        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }


    // Exclui uma Abertura
    public function destroy($id)
    {
        $abertura = Abertura::findOrFail($id);
        $abertura->delete();

        return redirect()->route('aberturas.index')->with('success', 'Abertura excluída com sucesso!');
    }
}
