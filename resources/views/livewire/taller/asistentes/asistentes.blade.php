<div>
    <div class="min-h-screen mt-12 w-full text-white">
        <div class="mb-14"><span class="text-4xl border-b-4">Talleres aprobados</span></div>
        @if (count($talleres) > 0)
            <div class="">
                @foreach ($talleres as $taller)
                    <livewire:taller.asistentes.taller :taller="$taller" :wire:key="$taller->id" />
                @endforeach
            </div>

            <div class="flex justify-center mt-20">{{ $talleres->links() }}</div>
        @else
            <span>No tienes talleres aprobados</span>
        @endif
    </div>
</div>


