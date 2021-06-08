<div>

    <div class="flex justify-between"  >
      
        <div class="bg-white lg:w-45 h-80 border-1">
	        <form>   
			        <div class="">

				        <div class="">
					        <span>Buscar</span><br>
                           <livewire:formularios.filtro-artista />
				        </div>
				        
				

			        </div>
			        <div class="">
				        <div class="">
					        <span>Genero</span>
				        </div>
				        <div class="">
					        <div id="">

						        <div class="">
							        <livewire:genero.generos />
						        </div>
					        </div>
                    </div>
			        <div class="">
						        <div class="">
							        <span>Artista</span>
						        </div>
						        <div class="">
							        <div>
								        <div class="">
									        <input type="checkbox" id="art1" value="ck2">Solistas</input><br>
									        <input type="checkbox" id="art2" value="ck2">Bandas</input>
								        </div>
							        </div>
						        </div>
                    </div>
		            <div class="">
							        <div class="">
								        <span>Estilo</span>
							        </div>
						        <div class="">
							        <div>
								        <div class="">
                                        <livewire:estilo.estilos />
								        </div>
							        </div>
						        </div>
                    </div>

			
		        
	        </form>
         </div>
      </div>
	    <div class=''>
		    <div class="flex">
			    <div class="swiper-slide">
				    <div class="grid grid-cols-4 gap-10 mb-10">
					    @foreach ($artistas as $artista)
					        <livewire:artista.artista :artista="$artista" :wire:key="$artista->id" />

					    @endforeach
					    <div class="swiper-pagination text-white">

					    </div>
				    </div>
			    </div>         
		    </div>
	    </div>
    </div>
</div>
