<div>
    <div class="col">
        <div class="max-w-md w-full lg:flex flex-col">
            <div class=" h-40 lg:w-60 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-1 text-center overflow-hidden">
                <img src="{{ "https://musicalimages.blob.core.windows.net/images/" . $artista->imagen }}" class="w-60" />
            </div>
            <div
                class="w-60 h-28 bg-gradient-to-tr from-black via-primary to-blue-900 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">

                <a href="{{ route('artista.show', $artista) }}"
                class="flex justify-center self-center font-bold px-2 py-2 w-60 text-center text-white 
                    hover:bg-white hover:text-primary cursor-pointer">
                    {{ $artista->ART_Nombre }}</a>
            </div>
        </div>
    </div>
</div>
