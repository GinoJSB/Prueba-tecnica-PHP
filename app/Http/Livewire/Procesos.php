<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proceso;

class Procesos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $PRO_PREFIJO, $PRO_NOMBRE;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.proceso.view', [
            'proceso' => Proceso::latest()
						->orWhere('PRO_PREFIJO', 'LIKE', $keyWord)
						->orWhere('PRO_NOMBRE', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->PRO_PREFIJO = null;
		$this->PRO_NOMBRE = null;
    }

    public function store()
    {
        $this->validate([
		'PRO_PREFIJO' => 'required',
		'PRO_NOMBRE' => 'required',
        ]);

        Proceso::create([
			'PRO_PREFIJO' => $this-> PRO_PREFIJO,
			'PRO_NOMBRE' => $this-> PRO_NOMBRE
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Proceso Creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Proceso::findOrFail($id);
        $this->selected_id = $id;
		$this->PRO_PREFIJO = $record-> PRO_PREFIJO;
		$this->PRO_NOMBRE = $record-> PRO_NOMBRE;
    }

    public function update()
{
    $this->validate([
        'PRO_PREFIJO' => 'required',
        'PRO_NOMBRE' => 'required',
    ]);

    if ($this->selected_id) {
        $record = Proceso::find($this->selected_id);
        $record->update([
            'PRO_PREFIJO' => $this->PRO_PREFIJO,
            'PRO_NOMBRE' => $this->PRO_NOMBRE
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Proceso actualizado exitosamente.');
    }
}

    public function destroy($id)
    {
        if ($id) {
            Proceso::where('id', $id)->delete();
        }
    }
}
