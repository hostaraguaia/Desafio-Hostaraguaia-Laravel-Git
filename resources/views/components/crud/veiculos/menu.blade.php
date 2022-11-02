@props([
    'rota'
])
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 relative">
    @can($rota)
        <x-crud.botoes.btn-rota :rota="$rota">
            <i class="bi bi-list mr-2"></i>
            Lista
        </x-crud.botoes.btn-rota>
    @endcan

    @can($rota . '.novo')
        <x-crud.botoes.btn-rota :rota="$rota.'.novo'">
            <i class="bi bi-plus-square-dotted mr-2"></i>
            Novo
        </x-crud.botoes.btn-rota>
    @endcan

    @can($rota . '.lixeira')
        <x-crud.botoes.btn-rota :rota="$rota.'.lixeira'">
            <i class="bi bi-trash mr-2"></i>
            Lixeira
        </x-crud.botoes.btn-rota>
    @endcan

    @can($rota . '.relatorio')
        <x-crud.botoes.btn-rota :rota="$rota.'.relatorio'">
            <i class="bi bi-file-earmark-ruled mr-2"></i>
            Relatório
        </x-crud.botoes.btn-rota>
    @endcan
</div>
