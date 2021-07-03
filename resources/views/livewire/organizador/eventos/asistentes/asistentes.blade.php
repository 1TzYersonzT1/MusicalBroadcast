<div>
    <div class="min-h-screen py-5 w-full text-white">
        <div class="bg-black bg-opacity-20 px-5 py-3">
            <div class="mb-14"><span class="text-4xl border-b-4">Eventos aprobados</span></div>
            @if (count($eventos) > 0)
                <div class="">
                    @foreach ($eventos as $evento)
                        <livewire:organizador.eventos.asistentes.evento :evento="$evento" :wire:key="$evento->id" />
                    @endforeach
                </div>

                <div class="flex justify-center mt-20">{{ $eventos->links() }}</div>
            @else
                <span>No tienes talleres aprobados</span>
            @endif
        </div>
    </div>
</div>
