<div>
    @foreach ($generos as $genero)
        <livewire:genero.genero :genero="$genero" :wire:key="$genero->id" />
    @endforeach
</div>

<script>
  
</script>
