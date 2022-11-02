<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Motoristas → Ver
        </h2>
    </x-slot>

    <x-crud.veiculos.menu :rota="$rotaBase"></x-crud.veiculos.menu>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-crud.show.show :label="'Nome'"
                                      :value="$item->nome"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'CPF'"
                                      :value="$item->cpf"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Matrícula'"
                                      :value="$item->matricula"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'CNH'"
                                      :value="$item->cnh"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Telefone'"
                                      :value="$item->telefone"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Tipo de Contratação'"
                                      :value="$item->tipo_contratacao"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Celular 1'"
                                      :value="$item->celular_1"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Celular 2'"
                                      :value="$item->celular_2"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'E-mail'"
                                      :value="$item->email"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Ativo'"
                                      :value="$item->ativo_show"
                    ></x-crud.show.show>

                    <x-crud.show.show :label="'Data de Nascimento'"
                                      :value="$item->nascimento"
                    ></x-crud.show.show>


                    <x-crud.show.show :label="'Nome de Usuário'"
                                      :value="$item->user->username"
                    ></x-crud.show.show>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


