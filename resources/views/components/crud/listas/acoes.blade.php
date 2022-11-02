<div class="m-1">
    @if(!request()->routeIs($rotaBase . '.lixeira'))
        @can($rotaBase . '.ver')
            <a href="{{route($rotaBase . '.ver', ['id'=>$item->id])}}"
               class="bg-gray-700 text-white p-1 pt-2 pl-2 rounded hover:bg-gray-900 mr-2"
               title="Ver">
                <i class="bi bi-eye"></i>
            </a>
        @endcan

        @can($rotaBase . '.editar')
            <a href="{{route($rotaBase . '.editar', ['id'=>$item->id])}}"
               class="bg-gray-700 text-white p-1 pt-2 pl-2 rounded hover:bg-gray-900 mr-2"
               title="Editar">
                <i class="bi bi-pencil-square"></i>
            </a>
        @endcan

        @can($rotaBase . '.delete')
            <a href="{{route($rotaBase . '.delete', ['id'=>$item->id])}}" onclick="confirma(event)"
               class="delete-confirma bg-gray-700 text-white p-1 pr-2 pt-2 pl-2 rounded hover:bg-gray-900 mr-2"
               title="Excluir">
                <i class="bi bi-trash"></i>
            </a>
        @endcan
    @endif

    @if(request()->routeIs($rotaBase . '.lixeira'))
        @can($rotaBase . '.restaurar')
            <a href="{{route($rotaBase . '.restaurar', ['id'=>$item->id])}}" onclick="restaurar(event)"
               class="delete-confirma bg-gray-700 text-white p-1 pr-2 pt-2 pl-2 rounded hover:bg-gray-900 mr-2"
               title="Excluir">
                <i class="bi bi-recycle"></i>
            </a>
        @endcan
    @endif

</div>
