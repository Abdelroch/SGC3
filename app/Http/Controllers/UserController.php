<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Card;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lista todos os usuários
        $users = User::all();
        return view('', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Exibe o formulário para criar um novo usuário
        $accessLevels = \App\Models\AccessLevel::all(); // Assumindo que o modelo é AccessLevel
        return view('admin.register.user', compact('accessLevels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validação dos dados
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'provincia' => 'required|string',
        'municipio' => 'required|string',
        'accessId' => 'required|exists:access_levels,id',
    ]);

    // Criação do usuário
    $user = new \App\Models\User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']);
    $user->accessId = $validatedData['accessId'];
    $user->save();

    // Verificando ou criando a província associada ao usuário
    $provincia = \App\Models\Provincia::firstOrCreate(
        ['name' => $validatedData['provincia']],
        ['userId' => $user->id]  // Associando a província ao usuário
    );

        // Criação do município associado à província
        Municipio::create([
            'name' => $validatedData['municipio'],
            'provinceId' => $provincia->id,
        ]);

        return redirect()->back()->with('success', 'Usuário criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Exibe os detalhes de um usuário específico
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Exibe o formulário para editar um usuário
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida e atualiza os dados de um usuário existente
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Remove um usuário específico
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}
