<tr>
        <td class="px-4 py-2">{{ $asistente->rut }}</td>
        <td class="px-4 py-2">{{ $asistente->nombre }} {{ $asistente->apellidos}}</td>
        <td class="px-4 py-2">{{ $asistente->email }}</td>
        <td class="px-4 py-2">{{ $asistente->telefono }}</td>
        <td class="px-4 py-2">
            <button wire:click="eliminar">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </td>
</tr>

<script>

window.addEventListener("eliminarBtn", function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit("eliminarConfirmado");
        }
    });
});

</script>








