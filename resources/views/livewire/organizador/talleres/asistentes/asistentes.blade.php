<div>
    <div class="min-h-screen py-5 w-full text-white">
        <div class="mb-14"><span class="text-4xl border-b-4">Talleres aprobados</span></div>
        @if (count($talleres) > 0)
            <div class="">
                @foreach ($talleres as $taller)
                    <livewire:organizador.talleres.asistentes.taller :taller="$taller" :wire:key="$taller->id" />
                @endforeach
            </div>

            <div class="flex justify-center mt-20">{{ $talleres->links() }}</div>
        @else
            <span>No tienes talleres aprobados</span>
        @endif
    </div>
</div>


