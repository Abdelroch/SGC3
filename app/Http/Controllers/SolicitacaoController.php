<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SolicitacaoMail;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Mail;


class SolicitacaoController extends Controller
{
    public function store(Request $request)
{
    /* dd($request->all()); */
    // Validação
    /* $dados= $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email',
        'telefone' => 'required|string',
        'nif' => 'required|string',
        'pay' => 'required|string|max:12',
        'valor' => 'require|string|max:10', 
    ]); */

    // Dados do formulário
    $dados = $request->only(['nome', 'email', 'telefone', 'nif', 'pay', 'valor']);

    // Salvar no banco de dados
    $solicitacao = new Solicitacao();
    $solicitacao->nome = $dados['nome'];
    $solicitacao->email = $dados['email'];
    $solicitacao->telefone = $dados['telefone'];
    $solicitacao->nif = $dados['nif'];
    $solicitacao->pay = $dados['pay'];
    $solicitacao->valor = $dados['valor'];
    $solicitacao->save();


    // Enviar o e-mail
    Mail::to($dados['email'])->send(new SolicitacaoMail($dados));

    // Retornar com mensagem de sucesso
    return back()->with('success', 'Sua solicitação foi enviada e salva com sucesso!');
}

}
