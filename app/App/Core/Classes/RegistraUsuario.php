<?php

namespace Crud\App\Core\Classes;

use Crud\Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistraUsuario
{
    public static function registra($request, int $nivelId, string|null $campoNome = null)
    {


        $valida = Validator::make($request->all(), [
            'username' => 'unique:users',
            'email' => 'unique:users',
            'password' => 'min:6'
        ]);

        if ($valida->fails()) {
            //dd($valida->errors()->messages());
            $erroMsg = '';
            foreach ($valida->errors()->messages() as $erro) {
                $erroMsg .= $erro[0] . '<br>';
            }
            return json_decode(json_encode([
                'success' => false,
                'message' => $erroMsg]));
        } else {
            $usuario = User::query()->create([
                'nivel_id' => $nivelId,
                'name' => $request->post(($campoNome) ?: 'nome'),
                'username' => $request->post('username'),
                'email' => $request->post('email'),
                'celular_1' => $request->post('telefone'),
                'password' => Hash::make($request->post('password')),
            ]);

            return json_decode(json_encode([
                'success' => true,
                'id' => $usuario->id]));
        }
    }
}
