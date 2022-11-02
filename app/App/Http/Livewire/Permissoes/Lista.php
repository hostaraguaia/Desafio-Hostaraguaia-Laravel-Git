<?php

namespace Crud\App\Http\Livewire\Permissoes;

use Crud\Domain\Gate\Models\Gate as Perms;
use Livewire\Component;

class Lista extends Component
{
    public Gate $gate;
    public function render()
    {
        return view('livewire.permissoes.lista',[
            'items' => Perms::all()
        ]);
    }
}
