<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipo;

class Tipos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $TIP_NOMBRE, $TIP_PREFIJO;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipo.view', [
            'tipo' => Tipo::latest()
						->orWhere('TIP_NOMBRE', 'LIKE', $keyWord)
						->orWhere('TIP_PREFIJO', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->TIP_NOMBRE = null;
		$this->TIP_PREFIJO = null;
    }

    public function store()
    {
        $this->validate([
		'TIP_NOMBRE' => 'required',
		'TIP_PREFIJO' => 'required',
        ]);

        Tipo::create([
			'TIP_NOMBRE' => $this-> TIP_NOMBRE,
			'TIP_PREFIJO' => $this-> TIP_PREFIJO
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Tipo creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Tipo::findOrFail($id);
        $this->selected_id = $id;
		$this->TIP_NOMBRE = $record-> TIP_NOMBRE;
		$this->TIP_PREFIJO = $record-> TIP_PREFIJO;
    }

    public function update()
    {
        $this->validate([
		'TIP_NOMBRE' => 'required',
		'TIP_PREFIJO' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tipo::find($this->selected_id);
            $record->update([
			'TIP_NOMBRE' => $this-> TIP_NOMBRE,
			'TIP_PREFIJO' => $this-> TIP_PREFIJO
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Tipo editado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Tipo::where('id', $id)->delete();
        }
    }
}
