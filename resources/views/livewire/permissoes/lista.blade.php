<div>
    <table class="w-full border-collapse  border-slate-500">
        <thead>
        <tr class="bg-gray-700 text-white text-left">
            <th class="p-2">#</th>
            <th class="p-2">Permissão</th>
            <th class="p-2 text-center">Admin</th>
            <th class="p-2 text-center">Padrão</th>
            <th class="p-2 text-center">Posto</th>
            <th class="p-2 text-center">Frentista</th>
            <th class="p-2 text-center">Motorista</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr class="hover:bg-gray-100 border-t-2 border-gray-700">
                <td class="p-2">{{$item->id}}</td>
                <td class="p-2">{{$item->nome}}</td>
                <td class="text-center">
                    <livewire:permissoes.ativa :nivelId="1" :item="$item->id" wire:key="" />
                </td>
                <td class="text-center">
                    <livewire:permissoes.ativa :nivelId="2" :item="$item->id" wire:key="" />
                </td>
                <td class="text-center">
                    <livewire:permissoes.ativa :nivelId="3" :item="$item->id" wire:key="" />
                </td>
                <td class="text-center">
                    <livewire:permissoes.ativa :nivelId="4" :item="$item->id" wire:key="" />
                </td>
                <td class="text-center">
                    <livewire:permissoes.ativa :nivelId="5" :item="$item->id" wire:key="" />
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
