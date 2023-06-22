<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Documento;
use App\Models\Tipo;
use App\Models\Proceso;

class Documentos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $DOC_NOMBRE, $DOC_CODIGO, $DOC_CONTENIDO, $DOC_ID_TIPO, $DOC_ID_PROCESO;

    // Renderiza la vista y pasa los datos necesarios
    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.documentos.view', [
            'documentos' => Documento::latest()
                ->orWhere('DOC_NOMBRE', 'LIKE', $keyWord)
                ->orWhere('DOC_CODIGO', 'LIKE', $keyWord)
                ->orWhere('DOC_CONTENIDO', 'LIKE', $keyWord)
                ->orWhere('DOC_ID_TIPO', 'LIKE', $keyWord)
                ->orWhere('DOC_ID_PROCESO', 'LIKE', $keyWord)
                ->paginate(10),
            'tipos' => Tipo::pluck('TIP_NOMBRE', 'id'), // Obtener los valores de la tabla "tipo"
            'procesos' => Proceso::pluck('PRO_NOMBRE', 'id'), // Obtener los valores de la tabla "proceso"     
        ]);
    }

    // Cancela la acción y reinicia los inputs
    public function cancel()
    {
        $this->resetInput();
    }

    // Reinicia los valores de los inputs
    private function resetInput()
    {
        $this->DOC_NOMBRE = null;
        $this->DOC_CODIGO = null;
        $this->DOC_CONTENIDO = null;
        $this->DOC_ID_TIPO = null;
        $this->DOC_ID_PROCESO = null;
    }


    // Almacena un nuevo documento en la base de datos
    public function store()
    {
        $this->validate([
            'DOC_NOMBRE' => 'required',
            'DOC_CODIGO' => 'required',
            'DOC_CONTENIDO' => 'required',
            'DOC_ID_TIPO' => 'required',
            'DOC_ID_PROCESO' => 'required',
        ]);

        // Lógica para generar un nuevo código único
        $prefijo = $this->DOC_CODIGO; // Obtener el valor del input DOC_CODIGO

        // Consulta a la bd para obtener el último registro con ese código
        $ultimoRegistro = Documento::where('DOC_CODIGO', 'LIKE', $prefijo . '-%')
            ->orderBy('DOC_CODIGO', 'desc')
            ->first();

            /*En esta parte, se verifica si se encontró un último registro con el prefijo especificado.
             Si existe, se extrae el número después del guion ("-") del código y se incrementa en 1 para obtener el nuevo número.
              Si no se encontró ningún registro, se asigna el número 1 como nuevo número*/

        if ($ultimoRegistro) {
            $ultimoNumero = intval(substr($ultimoRegistro->DOC_CODIGO, strrpos($ultimoRegistro->DOC_CODIGO, '-') + 1));
            $nuevoNumero = $ultimoNumero + 1;
        } else {
            $nuevoNumero = 1;
        }

        /*formatea el nuevo número agrega ceros a la izquierda para asegurarse de que el número tenga una longitud de 3 dígitos*/
        $nuevoNumeroFormateado = str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);
        $nuevoCodigo = $prefijo . '-' . $nuevoNumeroFormateado;

        // Crear el nuevo documento en la base de datos
        Documento::create([
            'DOC_NOMBRE' => $this->DOC_NOMBRE,
            'DOC_CODIGO' => $nuevoCodigo,
            'DOC_CONTENIDO' => $this->DOC_CONTENIDO,
            'DOC_ID_TIPO' => $this->DOC_ID_TIPO,
            'DOC_ID_PROCESO' => $this->DOC_ID_PROCESO
        ]);

        $this->resetInput(); // Reiniciar los valores de los inputs
        $this->dispatchBrowserEvent('closeModal'); // Cerrar el modal (ventana emergente)
        session()->flash('message', 'Documento creado exitosamente.'); // Mostrar un mensaje de éxito
    }


    // Carga los datos de un documento en el formulario para editar
    public function edit($id)
    {
        $record = Documento::findOrFail($id);
        $this->selected_id = $id;
        $this->DOC_NOMBRE = $record->DOC_NOMBRE;
        $this->DOC_CODIGO = $record->DOC_CODIGO;
        $this->DOC_CONTENIDO = $record->DOC_CONTENIDO;
        $this->DOC_ID_TIPO = $record->DOC_ID_TIPO;
        $this->DOC_ID_PROCESO = $record->DOC_ID_PROCESO;
        
    }

    // Actualiza los datos de un documento en la base de datos
    public function update()
    {
        $this->validate([
            'DOC_NOMBRE' => 'required',
            'DOC_CODIGO' => 'required',
            'DOC_CONTENIDO' => 'required',
            'DOC_ID_TIPO' => 'required',
            'DOC_ID_PROCESO' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Documento::find($this->selected_id);
            $record->update([
                'DOC_NOMBRE' => $this->DOC_NOMBRE,
                'DOC_CODIGO' => $this->DOC_CODIGO,
                'DOC_CONTENIDO' => $this->DOC_CONTENIDO,
                'DOC_ID_TIPO' => $this->DOC_ID_TIPO,
                'DOC_ID_PROCESO' => $this->DOC_ID_PROCESO
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Documento actualizado exitosamente.');
        }
    }

    // Elimina un documento de la base de datos
    public function destroy($id)
    {
        if ($id) {
            Documento::where('id', $id)->delete();
        }
    }
}
