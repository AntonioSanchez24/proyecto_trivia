<?php

namespace App\Http\Livewire;

use App\Models\Calificaciones;
use App\Models\PaquetePregunta;
use App\Models\PeticionAmistad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;


class Dashboard extends Component
{
    public $amigos;
    protected $puntuaciones;
    protected $paquetes;
    protected $solicitudes;
    public $usuarios;
    public $paginator;

    public $suscripciones;


    public function mount()
    {
        $this->usuarios = User::all();
        $usuario = Auth::user();
        $id_usuario = $usuario->id;

        if (Auth::user()->amigos == null) {
            $this->amigos = [];
        } else {
            $this->amigos = json_decode(Auth::user()->amigos, true);
        }

        if (Auth::user()->suscriptiones == null) {
            $this->suscripciones = [];
        } else {
            $this->suscripciones = json_decode(Auth::user()->suscripciones, true);
        }

        foreach ($this->amigos as $amigoIndex => $amigo) {
            if ($amigoIndex == 0) {
                $this->puntuaciones = Calificaciones::where('user_id', $amigo)->get();
            } else {
                $this->puntuaciones = $this->puntuaciones->merge(Calificaciones::where('user_id', $amigo)->get());
            }
        }

        foreach ($this->amigos as $amigoIndex => $amigo) {
            if ($amigoIndex == 0) {
                $this->paquetes = PaquetePregunta::where('user_id', $amigo)->get();
            } else {
                $this->paquetes = $this->paquetes->merge(PaquetePregunta::where('user_id', $amigo)->get());
            }
        }




        $this->solicitudes = Auth::user()->solicitudesAmistadPendientes;

    }
    public function render()
    {

        $page = request('page', 1); // Obtenemos la página actual o por defecto la ponemos como 1.
        $perPage = 7; // Número de ítems por página.
        $offset = ($page * $perPage) - $perPage;

        if ($this->puntuaciones != null) {

            $paginator = new LengthAwarePaginator(
                $this->puntuaciones->slice($offset, $perPage)->values(), // Los elementos para la página actual.
                $this->puntuaciones->count(),
                // El número total de elementos.
                $perPage,
                // El número de ítems por página.
                $page,
                // La página actual.
                ['path' => request()->url(), 'query' => request()->query()] // Opciones.
            );
        } else {
            $paginator = null;
        }

        if ($this->paquetes != null) {
            $paginator2 = new LengthAwarePaginator(
                $this->paquetes->slice($offset, $perPage)->values(), // Los elementos para la página actual.
                $this->paquetes->count(),
                // El número total de elementos.
                $perPage,
                // El número de ítems por página.
                $page,
                // La página actual.
                ['path' => request()->url(), 'query' => request()->query()] // Opciones.
            );
        } else {
            $paginator2 = null;
        }

        return view('livewire.dashboard', ['calificaciones' => $paginator, 'preguntas' => $paginator2, 'solis' => $this->solicitudes]);
    }

    public function acceptFriendRequest($senderId)
    {
        $solicitud = Auth::user()->solicitudesAmistadPendientes()->where('user_id', $senderId)->first();
        $amigo = User::find($senderId);
        $usuarioActual = User::find(Auth::id());

        if ($solicitud) {
            $solicitud->pivot->estado = 'aceptado';
            $solicitud->pivot->save();

            if ($amigo->amigos != null || $amigo->amigos != "") {
                $amigos = json_decode($amigo->amigos, true);
                $amigos[] = Auth::id();
                $amigo->amigos = json_encode($amigos);
                $amigo->save();
            } else {
                $amigo->amigos = json_encode([Auth::id()]);
                $amigo->save();

            }

            if (Auth::user()->amigos != null || Auth::user()->amigos != "") {
                $amigos = json_decode($usuarioActual->amigos, true);
                $amigos[] = $senderId;
                $usuarioActual->amigos = json_encode($amigos);
                $usuarioActual->save();
            } else {
                $usuarioActual->amigos = json_encode([$senderId]);
                $usuarioActual->save();
            }

        }

        $this->solicitudes = $usuarioActual->solicitudesAmistadPendientes;
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
