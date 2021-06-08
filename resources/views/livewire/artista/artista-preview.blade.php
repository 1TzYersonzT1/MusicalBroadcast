<div>
    <div class="text-white px-10">

        <div class="mb-4 text-4xl font-bold">
            {{ $artistaActual->ART_Nombre }}
        </div>
        
        <div class="mb-10">{{ $artistaActual }} </div>

        
        <div class="grid grid-cols-2 gap-10 mb-10">

            <div class="col">
                <p class="font-bold">Biografia</p>
                <p>{{ $artistaActual }}</p>
            </div>

            <div class="col">
                <p class="font-bold">Album</p>
                <p>{{ $artistaActual }}</p>
            </div>

            <div class="col">
                <p class="font-bold">Proximo evento</p>
                <p>{{ $artistaActual }}</p>
            </div>

            <div class="col">
                <p class="font-bold">PROTOCOLO COVID</p>
                <p>{{ $artistaActual }}</p>
            </div>
        </div>

    </div>
</div>
<script>
window.addEventListener("verArtista", function(){
console.log("wenas");

})
</script>
