<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Frentistas → {{$action}}
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
                                <x-crud.forms.hidden :name="'user_id'"
                                                     :value="$item"></x-crud.forms.hidden>
                            @endif
                        @endisset


                        <x-crud.forms.select :name="'posto_id'"
                                             :label="'Posto'"
                                             :required="true"
                                             :value="$item"
                                             :options="$opcoesPosto"></x-crud.forms.select>

                        <x-crud.forms.input-text :label="'Nome'"
                                                 :name="'nome'"
                                                 :value="$item"
                                                 :required="true"
                        ></x-crud.forms.input-text>

                        <x-crud.forms.input-text :label="'E-mail'"
                                                 :name="'email'"
                                                 :value="$item"
                                                 :type="'email'"
                                                 :required="true"
                        ></x-crud.forms.input-text>

                        <x-crud.forms.input-text :label="'Telefone'"
                                                 :name="'telefone'"
                                                 :value="$item"
                                                 :mask="'(00) 00000-0000'"
                        ></x-crud.forms.input-text>

                        @if($action === 'Novo')
                        <x-crud.forms.input-text :label="'Nome de Usuário'"
                                                 :name="'username'"
                                                 :required="true"
                                                 :value="$item"
                        ></x-crud.forms.input-text>

                        <x-crud.forms.input-text :label="'Senha'"
                                                 :name="'password'"
                                                 :required="true"
                                                 :value="$item"
                                                 :type="'password'"
                        ></x-crud.forms.input-text>
                        @endif



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


