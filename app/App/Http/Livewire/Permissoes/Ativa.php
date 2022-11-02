<?php

namespace Crud\App\Http\Livewire\Permissoes;

use Crud\Domain\NivelGate\Models\NivelGate;
use Livewire\Component;

class Ativa extends Component
{
    public $nivelId;
    public $item;

    public $selectedTypes;
    public $checked;

    public function mount()
    {
        $this->checked =  (NivelGate::query()
                ->where('nivel_id', $this->nivelId)
                ->where('gate_id', $this->item)
                ->count() > 0) ? 'checked="checked"' : '';
    }

    public function render()
    {
        return view('livewire.permissoes.ativa');
    }

    public function mudaStatus()
    {
        $nivelGate = NivelGate::query()
            ->where('nivel_id', $this->nivelId)
            ->where('gate_id', $this->item)->first();

        if ($nivelGate) {
            $nivelGate->delete();
        } else {
            NivelGate::query()->create([
                'nivel_id' => $this->nivelId,
                'gate_id' => $this->item
            ]);
        }

    }
}
