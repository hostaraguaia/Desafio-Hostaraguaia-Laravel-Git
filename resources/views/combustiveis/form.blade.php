<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Combustíveis → {{$action}}
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
                            @if($action==='Editar')
                                @method('PUT')
                            @endif
                        @endisset



                        <x-crud.forms.input-text :name="'nome'"
                                                 :value="$item"
                                                 :required="true"
                                                 :label="'Nome'"></x-crud.forms.input-text>


                        <x-crud.forms.input-text :name="'valor'"
                                                 :value="$item"
                                                 :mask="'00.000.000,00'"
                                                 :maskReverse="'true'"
                                                 :label="'Valor'"></x-crud.forms.input-text>



                        <x-crud.forms.input-text :name="'observacoes'"
                                                 :value="$item"
                                                 :label="'Observações'"></x-crud.forms.input-text>

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


