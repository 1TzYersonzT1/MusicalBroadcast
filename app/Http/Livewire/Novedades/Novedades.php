<?php

namespace App\Http\Livewire\Novedades;

use Livewire\Component;
use Weidner\Goutte\GoutteFacade;

class Novedades extends Component
{

    public $novedades = [];

    public function mount()
    {
        $crawler = GoutteFacade::request('GET', 'http://calamacultural.cl/index2/Noticias%20Cultura.html');
        $crawler->filter('.mbr-timeline-title')->each(function ($node) {
          
        });
    
    }

    public function render()
    {
        return view('livewire.novedades.novedades');
    }
}
