<div>
	<div class="mt-40"></div>
	<div class=''>
		<div class="flex">
			<div class="swiper-slide">
				<div class="grid grid-cols-4 gap-10 mb-10">
					@foreach ($artistas as $artista)
					<div class="col">
						<div class="max-w-md w-full lg:flex flex-col">
							<div class=" h-40 lg:w-60 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-1 text-center overflow-hidden" style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
							</div>
							<div class=" object-content border-l w-60 h-28 border-grey-light  bg-gradient-to-tr from-black via-primary to-blue-900 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">


								<div class="flex justify-center self-center">
									<button class=" font-bold px-2 py-2 w-44 text-center text-white hover:bg-white hover:text-primary cursor-pointer" wire:click="mostrarTaller">{{ $artista->ART_Nombre }}
									</button>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="swiper-pagination text-white">

					</div>
				</div>
			</div>         
		</div>
	</div>
	<form>
		<div class="Filtro">
			<div class="Grupo_1">
				<svg class="Trazado" viewBox="0 0 238 654">
					<path class="Trazado" d="M 0 0 L 238 0 L 238 500 L 0 500 L 0 0 Z">
					</path>
				</svg>
				<div class="Buscar">
					<span>Buscar</span>

				</div>
				<TextField id="standard-basic" label="Standard" />
				

			</div>
			<div class="Grupo_gen">
				<div class="Genero">
					<span>Genero</span>
				</div>
				<div class="Genero_group">
					<div id="Genero_group_1">

						<div class="Genero_ckb">
							<input type="checkbox" id="cbx1" value="ck1">Genero 1</input><br>
							<input type="checkbox" id="cbx2" value="ck1">Genero 2</input><br>
							<input type="checkbox" id="cbx3" value="ck1">Genero 3</input>
						</div>
					</div>
            </div>
			<div class="Grupo_art">
						<div class="Artista">
							<span>Artista</span>
						</div>
						<div class="Artista_group">
							<div>
								<div class="Artista_ckb">
									<input type="checkbox" id="cbx1" value="ck2">Artista 1</input><br>
									<input type="checkbox" id="cbx2" value="ck2">Artista 1</input><br>
									<input type="checkbox" id="cbx3" value="ck2">Artista 1</input>
								</div>
							</div>
						</div>
            </div>
		    <div class="Grupo_est">
							<div class="Estilo">
								<span>Estilo</span>
							</div>
						
						<div class="Estilo_group">
							<div>
								<div class="Estilo_ckb">
									<livewire:estilo.estilos />
								</div>
							</div>
						</div>
            </div>
			
		</div>
	</form>           
</div>
