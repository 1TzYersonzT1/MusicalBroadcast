<div class="flex flex-col items-center">
    <div class="lg:col-span-2 gap-5 lg:flex justify-center py-2">
        <span class="text-2xl font-bold text-center">Instrumentos</span>
    </div>

    <div class="flex flex-wrap w-96 my-3">
        @foreach ($instrumentos as $index => $instrumento)
            <div class="flex flex-col mx-5 my-2 items-center">
                <div class="flex items-center mb-2 instrumento">
                    <input type="checkbox" value="{{ $instrumento->id }}"
                    wire:model="instrumentosSeleccionados.{{$index}}"
                        class="opacity-0 absolute w-10 h-10 rounded-full" />
                    <div
                        class="bg-trasparent w-10 h-10 flex flex-shrink-0 justify-center items-center focus-within:bg-green-400">
                        <img src="{{ $instrumento->imagen }}" />
                    </div>
                </div>
                <span>{{ $instrumento->INST_Nombre }}</span>
            </div>
        @endforeach
    </div>

    @json($instrumentosSeleccionados)
</div>