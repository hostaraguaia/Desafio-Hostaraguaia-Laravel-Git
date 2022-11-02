<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Permissões
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <livewire:permissoes.lista></livewire:permissoes.lista>

                </div>
            </div>
        </div>
    </div>
    @pushonce('scripts')

    @endpushonce
</x-app-layout>
