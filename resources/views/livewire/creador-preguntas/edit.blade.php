<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Editar paquete de preguntas') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    @if (session()->has('message'))
                        <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="w-full max-w-md mx-auto mt-6">
                        <form wire:submit.prevent="actualizarTodo" class="space-y-5">
                            <div class="p-6 bg-white border border-2 border-black border-solid rounded-lg shadow-lg">
                                <label class="block mb-2 text-lg font-medium text-gray-700" for="nombre">
                                    Nombre
                                </label>
                                <input wire:model="nombre"
                                    class="w-full px-3 py-3 leading-tight text-gray-700 border rounded shadow-inner appearance-none border-grey-200 focus:outline-none focus:shadow-outline"
                                    id="nombre" type="text" placeholder="Introduce tu nombre"
                                    value="{{ $paquete->nombre }}">
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="p-6 bg-white border border-2 border-black border-solid rounded-lg shadow-lg">
                                <label class="block mb-2 text-lg font-medium text-gray-700" for="photo">
                                    Foto
                                </label>
                                <input wire:model="photo"
                                    class="w-full px-3 py-3 leading-tight text-gray-700 border rounded shadow-inner appearance-none border-grey-200 focus:outline-none focus:shadow-outline"
                                    id="photo" type="file">
                                <!-- Vista previa de la imagen -->
                                @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}">
                                @else
                                    @if ($paquete->photo)
                                        <img src="{{ Storage::url($paquete->photo) }}" alt="Foto existente">
                                    @endif
                                @endif
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <br>
                            <div class="p-6 bg-white border border-2 border-black border-solid rounded-lg shadow-lg">
                                <label class="block mb-2 text-lg font-medium text-gray-700" for="description">
                                    Descripción
                                </label>
                                <textarea wire:model="description"
                                    class="w-full px-3 py-3 leading-tight text-gray-700 border rounded shadow-inner appearance-none border-grey-200 focus:outline-none focus:shadow-outline"
                                    id="description" placeholder="Introduce una descripción"></textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="p-6 bg-white border border-2 border-black border-solid rounded-lg shadow-lg">
                                <label class="block mb-2 text-lg font-medium text-gray-700" for="categoria">
                                    Categoría
                                </label>
                                <select wire:model="categoria"
                                    class="w-full px-3 py-3 leading-tight text-gray-700 border rounded shadow-inner appearance-none border-grey-200 focus:outline-none focus:shadow-outline"
                                    id="categoria">
                                    <option value="">-- Selecciona una categoría --</option>
                                    <option value="categoria1">Ciencia</option>
                                    <option value="categoria2">Cultura general</option>
                                    <option value="categoria3">Entretenimiento</option>
                                </select>
                            </div>
                            @error('categoria')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="flex items-center justify-between">
                                <button
                                    class="px-4 py-3 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
