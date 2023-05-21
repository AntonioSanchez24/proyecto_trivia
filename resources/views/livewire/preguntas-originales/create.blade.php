<form wire:submit.prevent="submit">
    <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">

    <div>
        <x-label for="pregunta" value="{{ __('Pregunta') }}" />
        <input id="pregunta"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="text" name="pregunta" required wire:model="pregunta" placeholder="¿Qué fue antes..?" />
        @error('pregunta')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="respuesta_correcta" value="{{ __('Respuesta correcta') }}" />
        <input id="respuesta_correcta"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="text" name="respuesta_correcta" wire:model="respuesta_correcta" required
            placeholder="¡La gallina!" />
        @error('respuesta_correcta')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-4">
        <x-label for="respuesta_incorrecta1" value="{{ __('Respuestas incorrectas') }}" />
        <input id="respuesta_incorrecta1"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="text" name="respuesta_incorrecta1" required wire:model="respuesta_incorrecta1"
            placeholder="Eso de ahí." />
        @error('respuesta_incorrecta1')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <input id="respuesta_incorrecta2"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="text" name="respuesta_incorrecta2" required wire:model="respuesta_incorrecta2"
            placeholder="Pasapalabra." />
        @error('respuesta_incorrecta2')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <input id="respuesta_incorrecta3"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="text" name="respuesta_incorrecta3" required wire:model="respuesta_incorrecta3"
            placeholder="Un huevo." />
        @error('respuesta_incorrecta3')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-start mt-4">
        <x-label for="categoria" value="{{ __('Categoría') }}" style="margin-left:20px;" />
        <input id="categoria"
            class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            wire:model="categoria" type="text" name="categoria" required placeholder="Eso de ahí."
            style="margin-left:5px;" />
            @error('respuesta_correcta')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <x-label for="dificultad" value="{{ __('Dificultad') }}" style="margin-left:20px;" />
        <input id="dificultad"
            class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            wire:model="dificultad" type="number" name="dificultad" required placeholder="Eso de ahí."
            style="margin-left:5px;" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit"
            class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Añadir
        </button>
    </div>
</form>
