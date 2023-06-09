<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear paquete de preguntas') }}
            </h2>
        </x-slot>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear paquete de preguntas
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="w-full max-w-md mx-auto mt-6">
                        <form wire:submit.prevent="guardarTodo" class="space-y-5">
                            <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                                <label class="block text-gray-700 text-lg font-medium mb-2" for="nombre">
                                    Nombre
                                </label>
                                <input wire:model="nombre"
                                    class="shadow-inner appearance-none border border-grey-200 rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="nombre" type="text" placeholder="Introduce tu nombre">
                            </div>
                            <br>
                            <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                                <label class="block text-gray-700 text-lg font-medium mb-2" for="photo">
                                    Foto
                                </label>
                                <input wire:model="photo"
                                    class="shadow-inner appearance-none border border-grey-200 rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="photo" type="file">
                            </div>
                            <br>
                            <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                                <label class="block text-gray-700 text-lg font-medium mb-2" for="description">
                                    Descripción
                                </label>
                                <textarea wire:model="description"
                                    class="shadow-inner appearance-none border border-grey-200 rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="description" placeholder="Introduce una descripción"></textarea>
                            </div>
                            <br>
                            <div class="p-6 border border-black border-solid border-2 rounded-lg shadow-lg bg-white">
                                <label class="block text-gray-700 text-lg font-medium mb-2" for="categoria">
                                    Categoría
                                </label>
                                <select wire:model="categoria"
                                    class="shadow-inner appearance-none border border-grey-200 rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="categoria">
                                    <option value="">-- Selecciona una categoría --</option>
                                    <option value="categoria1">Anime</option>
                                    <option value="categoria2">Doner Kebab</option>
                                    <option value="categoria3">Futurama</option>
                                </select>
                            </div>
                            <div>
                                @livewire('preguntas-form')
                            </div>


                            <div class="flex items-center justify-between">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
