<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visitante;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use PDF;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function lista()
    {

        $users = User::all();
        $cards = Card::all();
        return view('admin.CardList', compact('users', "cards"));
    }
        public function listar()
    {
        // Obtém o usuário autenticado
        $user = auth()->user();

        // Busca os cartões com base no nome do usuário autenticado
        $cards = Card::where('cardHolder', $user->name)->get();

        return view('users.listar', compact('cards'));
    }


    public function index()
    {
        $users = User::all();
        $cards = Card::all();
        return view('admin.cartao', compact('users', "cards"));
    }

    public function create()
    {
        $cards = Card::all();
        $users = User::all(); // Recupera todos os usuários para seleção
        return view('admin.listar', compact('users', 'cards'));
    }

    /**
     * Armazena um novo cartão no banco de dados.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'cardNumber' => 'required|unique:cards',
            'cvv' => 'required|numeric',
            'cardHolder' => 'required|string|max:255',
            'expirationMonth' => 'required|numeric|between:1,12',
            'expirationYear' => 'required|numeric|digits:4',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        Card::create([
            'user_id' => $request->user_id,
            'cardNumber' => $request->cardNumber,
            'cvv' => $request->cvv,
            'cardHolder' => $request->cardHolder,
            'expirationMonth' => $request->expirationMonth,
            'expirationYear' => $request->expirationYear,
            'type' => $request->type,
            'status' => $request->status,

        ]);

        return redirect()->route('dashboard.index')->with('success', 'Cartão criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um cartão específico.
     */
    public function show($id)
    {
        $card = Card::with('user')->findOrFail($id);
        return view('cartao-show', compact('card'));
    }
    public function visa()
    {
        return view('admin.visa');
    }

    /**
     * Exibe o formulário para editar um cartão.
     */
    public function edit($id)
    {
        $cards = Card::find($id);


        if (!$cards) {
            return response()->json(['error' => 'Cartão não encontrado.'], 404);
        }

        return response()->json($cards);
    }

    /**
     * Atualiza um cartão no banco de dados.
     */

     public function update(Request $request, $id)
     {
         /* add($request->all()); */

         try {
             $cards = Card::findOrFail($id);
             $cards->update($request->only(['nome', 'email', 'telefone', 'nif']));
             return redirect()->route('solicitacao.list')->with('success', 'Solicitação atualizada com sucesso!');
         } catch (\Exception $e) {
             return redirect()->route('solicitacao.list')->with('error', 'Erro ao atualizar solicitação: ' . $e->getMessage());
         }
     }
    /**
     * Remove um cartão do banco de dados.
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        $card->delete();

        return redirect()->back()->with('success', 'Cartão deletado com sucesso!');
    }

        //profile
        public function profile()
        {
            $user = Auth::user();
            return view('admin.profile', compact('user'));
        }

        public function home()
    {
        $visitante = Visitante::all();
        $user = Auth::user();
        $usuarios = User::orderBy('created_at', 'desc')->take(3)->get();

        return view('admin.home', compact('user', 'visitante', 'usuarios'));
    }

    public function gerarPdf(Request $request)
    {
        // Obter o ano do request
        $ano = $request->input('ano');

        // Filtrar os dados da tabela solicitacao pelo ano (supondo que exista um campo 'created_at' ou 'data' na tabela)
        $cards = Card::whereYear('created_at', $ano)->get(); // Altere 'created_at' para o campo correto

        // Gerar o PDF com os dados filtrados
        $pdf = PDF::loadView('admin.PDF.cartao', compact('cards', 'ano'));

        // Definir o nome do arquivo baseado no ano selecionado
        $fileName = "cards{$ano}.pdf";
        $pdf->save(storage_path($fileName));

        // Retornar o PDF para download e apagar o arquivo após o envio
        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }

    // Gerar QR Code para um cartão
    public function generateQrCode($id)
    {
        $card = Card::findOrFail($id);
        $cardInfo = "Número do Cartão: {$card->cardNumber}\n";
        $cardInfo .= "Titular: {$card->cardHolder}\n";
        $cardInfo .= "Validade: {$card->expirationMonth}/{$card->expirationYear}\n";
        $cardInfo .= "Tipo: {$card->type}\n";
        $cardInfo .= "Status: {$card->status}\n";

        return \QrCode::size(200)
            ->generate($cardInfo); // Gera o QR Code com as informações
    }

}
