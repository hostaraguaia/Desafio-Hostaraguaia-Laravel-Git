<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Frentistas
        </h2>
    </x-slot>

    <x-crud.veiculos.menu :rota="$rotaBase"></x-crud.veiculos.menu>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="w-full border-collapse  border-slate-500">
                        <thead>
                        <tr class="bg-gray-700 text-white text-left">
                            <th class="p-2">#</th>
                            <th class="p-2">Nome</th>
                            <th class="p-2">Posto</th>
                            <th class="p-2">Nome de usuário</th>
                            <th class="p-2">E-mail</th>
                            <th class="p-2">Telefone</th>
                            <th class="p-2">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="hover:bg-gray-100 border-t-2 border-gray-700">
                                <td class="p-2">{{$item->id}}</td>
                                <td class="p-2">{{$item->nome}}</td>
                                <td class="p-2">{{$item->posto->nome_fantasia}}</td>
                                <td class="p-2">{{$item->user->username}}</td>
                                <td class="p-2">{{$item->email}}</td>
                                <td class="p-2">{{$item->telefone}}</td>
                                <td class="p-2">
                                    <x-crud.listas.acoes :rotaBase="$rotaBase" :item="$item"></x-crud.listas.acoes>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8 relative border-t py-6">
                        {{$items->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
