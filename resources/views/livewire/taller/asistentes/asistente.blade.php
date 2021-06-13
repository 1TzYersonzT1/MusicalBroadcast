<tr>
    <td class="px-6 py-4" wire:model="asistente_rut">{{ $asistente->rut }}</td>
    <td class="px-6 py-4">{{ $asistente->nombre }} {{ $asistente->apellidos}}</td>
    <td class="px-6 py-4">{{ $asistente->email }}</td>
    <td class="px-6 py-4">{{ $asistente->telefono }}</td>
    <td class="px-6 py-4">
        <button class="eliminarAsistenteBtn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </td>
</tr>


<script>

    $(".eliminarAsistenteBtn").on("click", function() {
         Swal.fire({
             title: '¿Está seguro?',
             text: `Está a punto de eliminar a este participante, asegúrese de contactarlo antes de proceder. 
             De lo contrario se expone a sanciones por malas prácticas.`,
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Si, eliminar'
         }).then((result) => {
             if (result.isConfirmed) {
                 Livewire.emit("eliminarAsistente");
                 Swal.fire(
                     'Eliminado',
                     'Haz eliminado al participante.',
                     'success'
                 );
             }
         });
    });
 
    window.addEventListener("prueba", (event) => {
        alert(event.detail.id);
    })
 
</script>





