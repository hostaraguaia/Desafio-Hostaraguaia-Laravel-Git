<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Frentistas → Ver
        </h2>
    </x-slot>

    <x-crud.veiculos.menu :rota="$rotaBase"></x-crud.veiculos.menu>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-crud.show.show :label="'Posto'"
                                      :value="$item->posto->nome_fantasia"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Nome'"
                                      :value="$item->nome"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'E-mail'"
                                      :value="$item->email"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Telefone'"
                                      :value="$item->telefone"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Nome de Usuário'"
                                      :value="$item->user->username"
                    ></x-crud.show.show>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


