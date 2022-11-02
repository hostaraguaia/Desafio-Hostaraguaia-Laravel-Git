<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Combustíveis → Ver
        </h2>
    </x-slot>

    <x-crud.veiculos.menu :rota="$rotaBase"></x-crud.veiculos.menu>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                        <x-crud.show.show :value="$item->nome"
                                          :label="'Nome'"></x-crud.show.show>


                        <x-crud.show.show :value="$item->valor"
                                          :label="'Valor'"></x-crud.show.show>


                        <x-crud.show.show :value="$item->observacoes"
                                          :label="'Observações'"></x-crud.show.show>



                        <x-primary-button class="mt-8">Salvar</x-primary-button>


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


