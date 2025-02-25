<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Card;
use App\Models\AccessLevel;
use Illuminate\Support\Facades\Auth;
use PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Busca usuários com accessId igual a 2
            /* $users = User::where('accessId', 2)->get(); */
          
        $users = User::all();

 // Retorna a view com os dados
        return view('admin.ClienteList', compact('users'));
    }

    public function profile()
    {
        $user = Auth::user();
        $accessLevels = AccessLevel::all();
        return view('users.profile', compact('user', 'accessLevels'));
    }

    public function solicitar()
    {
        return view('users.solicitacao');
    }

    public function contas()
    {
        // Sua lógica aqui
        return view('users.contas');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_cliente'); // Crie uma view para o formulário de criação de clientes
    }

    public function gerarPdf(Request $request)
    {
        // Obter o ano do request
        $ano = $request->input('ano');

        // Filtrar os dados da tabela solicitacao pelo ano (supondo que exista um campo 'created_at' ou 'data' na tabela)
        $users = User::whereYear('created_at', $ano)->get(); // Altere 'created_at' para o campo correto
        $provincia = Provincia::whereYear('created_at', $ano)->get();
        $municipio = Municipio::whereYear('created_at', $ano)->get();

        // Gerar o PDF com os dados filtrados
        $pdf = PDF::loadView('admin.PDF.clientes', compact('users', 'provincia', 'municipio', 'ano'));

        // Definir o nome do arquivo baseado no ano selecionado
        $fileName = "solicitacoes_{$ano}.pdf";
        $pdf->save(storage_path($fileName));

        // Retornar o PDF para download e apagar o arquivo após o envio
        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         /* dd($request->all());  */

        try {
            $users = User::findOrFail($id);
            $users->update($request->only(['name', 'email', 'accessId']));
            return redirect()->route('dashboard.listar.cliente')->with('success', 'Usuario atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.listar.cliente')->with('error', 'Erro ao atualizar usuario: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User ->delete();

        return redirect()->back()->with('success', 'Usuário excluída com sucesso!');

    }
}
