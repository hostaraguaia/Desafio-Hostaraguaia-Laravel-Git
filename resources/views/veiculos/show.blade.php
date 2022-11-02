<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Veículos → Ver
        </h2>
    </x-slot>

    <x-crud.veiculos.menu :rota="$rotaBase"></x-crud.veiculos.menu>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-crud.show.show :label="'Tipo do Veículo'"
                                      :value="$item->tipo_veiculo"></x-crud.show.show>

                    <x-crud.show.show :label="'Propriedade'"
                                      :value="$item->propriedade"></x-crud.show.show>

                    <x-crud.show.show :label="'Motorista'"
                                      :value="$item->motorista->nome"></x-crud.show.show>

                    <x-crud.show.show :label="'Tipo do Combustível'"
                                      :value="$item->tipoCombustivel->nome"></x-crud.show.show>

                    <x-crud.show.show :label="'Placa'"
                                      :value="$item->placa"></x-crud.show.show>

                    <x-crud.show.show :label="'Marca'"
                                      :value="$item->marca"></x-crud.show.show>

                    <x-crud.show.show :label="'Modelo'"
                                      :value="$item->modelo"></x-crud.show.show>

                    <x-crud.show.show :label="'Ano de Fabricação'"
                                      :value="$item->ano_fabricacao"></x-crud.show.show>

                    <x-crud.show.show   :label="'Chassi'"
                                        :value="$item->chassi"></x-crud.show.show>

                    <x-crud.show.show :label="'Renavam'"
                                      :value="$item->renavam"></x-crud.show.show>

                    <x-crud.show.show :label="'Cor'"
                                      :value="$item->cor"></x-crud.show.show>

                    <x-crud.show.show :label="'Consumo Médio'"
                                      :value="$item->consumo_medio"
                                      ></x-crud.show.show>

                    <x-crud.show.show :label="'Observações'"
                                      :value="$item->observacoes"></x-crud.show.show>

                    <x-crud.show.show :label="'Capacidade do Tanque'"
                                      :value="$item->tanque_capacidade"
                                      ></x-crud.show.show>

                    <x-crud.show.show :label="'Limite Troca de Óleo'"
                                      :value="$item->limite_troca_oleo"></x-crud.show.show>

                    <x-crud.show.show :label="'Data do Próximo Licenciamento'"
                                      :value="$item->data_proximo_licenciamento"></x-crud.show.show>

                    <x-crud.show.show :label="'Seguradora'"
                                      :value="$item->seguradora"></x-crud.show.show>

                    <x-crud.show.show :label="'Valor Limite Mês'"
                                      :value="$item->valor_limite_mes"></x-crud.show.show>


                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
                integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function () {

            });
        </script>

    @endpush
</x-app-layout>


