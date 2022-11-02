<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Veículos → Novo
        </h2>
    </x-slot>

    <x-crud.veiculos.menu :rota="$rotaBase"></x-crud.veiculos.menu>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form action="" method="post" enctype="multipart/form-data">

                        @csrf
                        @isset($action)
                            @if($action==='edit')
                                @method('PUT')
                            @endif
                        @endisset



                        <x-crud.forms.select :name="'tipo_veiculo'"
                                             :label="'Tipo do Veículo'"
                                             :value="$item"
                                             :required="true"
                                             :options="$opcoesTipoVeiculo"></x-crud.forms.select>

                        <x-crud.forms.select :name="'propriedade'"
                                             :label="'Propriedade'"
                                             :value="$item"
                                             :required="true"
                                             :options="$opcoesPropriedade"></x-crud.forms.select>

                        <x-crud.forms.select :name="'motorista_id'"
                                             :label="'Motorista'"
                                             :required="true"
                                             :value="$item"
                                             :options="$opcoesMotorista"></x-crud.forms.select>

                        <x-crud.forms.select :name="'tipo_combustivel_id'"
                                             :label="'Tipo do Combustível'"
                                             :required="true"
                                             :value="$item"
                                             :options="$opcoesTipoCombustivel"></x-crud.forms.select>

                        <x-crud.forms.input-text :name="'placa'"
                                                 :value="$item"
                                                 :required="true"
                                                 :label="'Placa'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'marca'"
                                                 :value="$item"
                                                 :label="'Marca'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'modelo'"
                                                 :value="$item"
                                                 :label="'Modelo'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'ano_fabricacao'"
                                                 :value="$item"
                                                 :mask="'0000'"
                                                 :required="true"
                                                 :label="'Ano de Fabricação'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'chassi'"
                                                 :value="$item"
                                                 :mask="'00000000000'"
                                                 :label="'Chassi'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'renavam'"
                                                 :value="$item"
                                                 :mask="'00000000000000000'"
                                                 :label="'Renavam'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'cor'"
                                                 :value="$item"
                                                 :label="'Cor'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'consumo_medio'"
                                                 :value="$item"
                                                 :label="'Consumo Médio'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'observacoes'"
                                                 :value="$item"
                                                 :label="'Observações'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'tanque_capacidade'"
                                                 :value="$item"
                                                 :mask="'000'"
                                                 :label="'Capacidade do Tanque'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'limite_troca_oleo'"
                                                 :value="$item"
                                                 :mask="'00000'"
                                                 :label="'Limite Troca de Óleo'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'data_proximo_licenciamento'"
                                                 :value="$item"
                                                 :mask="'00/00/0000'"
                                                 :label="'Data do Próximo Licenciamento'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'seguradora'"
                                                 :value="$item"
                                                 :label="'Seguradora'"></x-crud.forms.input-text>

                        <x-crud.forms.input-text :name="'valor_limite_mes'"
                                                 :value="$item"
                                                 :mask="'00.000.000,00'"
                                                 :maskReverse="'true'"
                                                 :label="'Valor Limite Mês'"></x-crud.forms.input-text>

                        <x-primary-button class="mt-8">Salvar</x-primary-button>

                    </form>


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


