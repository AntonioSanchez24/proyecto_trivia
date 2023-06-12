<?php

namespace App\Http\Livewire;

use App\Models\Calificaciones;
use App\Models\PaquetePregunta;
use App\Models\PeticionAmistad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $amigos;
    protected $puntuaciones;
    protected $paquetes;
    protected $solicitudes;
    public $usuarios;

    public function mount()
    {
        $usuario = Auth::user();
        $id_usuario = $usuario->id;

        if (Auth::user()->amigos == null) {
            $this->amigos = [];
        } else {
            $this->amigos == json_decode(Auth::user()->amigos, true);
        }

        $this->amigos = $usuario->amigos()->pluck('amigos.id');

        $this->puntuaciones = DB::table('users')
        ->join('amigos', function ($join) use ($id_usuario) {
            $join->on('users.id', '=', 'amigos.friend_id')
                ->where('amigos.user_id', '=', $id_usuario)
                ->where('amigos.estado', '=', 'aceptado');
        })
        ->join('calificaciones', 'users.id', '=', 'calificaciones.user_id')
        ->select('users.*', 'calificaciones.*')
        ->paginate(10);

        $this->paquetes = DB::table('users')
        ->join('amigos', function ($join) use ($id_usuario) {
            $join->on('users.id', '=', 'amigos.friend_id')
                ->where('amigos.user_id', '=', $id_usuario)
                ->where('amigos.estado', '=', 'aceptado');
        })
        ->join('paquete_preguntas', 'users.id', '=', 'paquete_preguntas.user_id')
        ->select('users.*', 'paquete_preguntas.*')
        ->paginate(10);

        $this->solicitudes = Auth::user()->solicitudesAmistadPendientes;

    }
    public function render()
    {
        return view('livewire.dashboard', ['calificaciones' => $this->puntuaciones, 'preguntas' => $this->paquetes, 'solis' => $this->solicitudes]);
    }

    public function acceptFriendRequest($senderId)
{
    $solicitud = Auth::user()->solicitudesAmistadPendientes()->where('user_id', $senderId)->first();

    if ($solicitud) {
        $solicitud->pivot->estado = 'aceptado';
        $solicitud->pivot->save();
    }

    $this->solicitudes = Auth::user()->solicitudesAmistadPendientes;
}

public function denyFriendRequest($senderId)
{
    $solicitud = Auth::user()->solicitudesAmistadPendientes()->where('user_id', $senderId)->first();

    if ($solicitud) {
        $solicitud->pivot->estado = 'rechazado';
        $solicitud->pivot->save();
    }

    $this->solicitudes = Auth::user()->solicitudesAmistadPendientes;
}

}