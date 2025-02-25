<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Card;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CartaolistController extends Controller
{
    public function generatePdf(Request $request)
    {
        // Recebe o ID do cartão
        $cardId = $request->input('card_id');

        // Busca o cartão específico
        $card = Card::find($cardId);

        if (!$card) {
            return redirect()->back()->with('error', 'Cartão não encontrado.');
        }

        // Dados do cartão para o QR Code
        $qrData = "Número: {$card->cardNumber}\n"
                . "Titular: {$card->cardHolder}\n"
                . "CVV: {$card->cvv}\n"
                . "Expira: {$card->expirationMonth}/{$card->expirationYear}\n"
                . "Tipo: {$card->type}\n"
                . "Status: {$card->status}";

        // Gera o QR Code com os novos dados
        $qrcode = base64_encode(QrCode::format('png')->size(150)->generate($qrData));

        // Carrega a view do PDF com os dados do cartão
        $pdf = PDF::loadView('admin.PDF.cartaolist', [
            'cards' => [$card], // Passa o cartão como array para compatibilidade com a view
            'ano' => $card->created_at->year, // Ano de criação do cartão
            'qrcodes' => [$card->id => $qrcode], // QR Code do cartão
        ]);

        // Define o nome do arquivo PDF
        $fileName = "card_{$card->id}.pdf";

        // Salva o PDF temporariamente
        $pdf->save(storage_path($fileName));

        // Faz o download do PDF e exclui o arquivo após o envio
        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }
}
