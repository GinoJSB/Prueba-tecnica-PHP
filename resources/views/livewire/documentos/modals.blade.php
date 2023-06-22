<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Documento</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
               <!-- Formulario para agregar un nuevo documento -->
				<form>
                    <div class="form-group">
                        <label for="DOC_NOMBRE"></label>
                        <input wire:model="DOC_NOMBRE" type="text" class="form-control" id="DOC_NOMBRE" placeholder="Doc Nombre">@error('DOC_NOMBRE') <span class="error text-danger">{{ $message }}</span> @enderror
                       <!-- Validación de errores para DOC_NOMBRE y igual en el resto -->
                    </div>
                    <div class="form-group">
                        <label for="DOC_CODIGO"></label>
                        <input wire:model="DOC_CODIGO" type="text" class="form-control" id="DOC_CODIGO" placeholder="Doc Codigo">@error('DOC_CODIGO') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DOC_CONTENIDO"></label>
                        <input wire:model="DOC_CONTENIDO" type="text" class="form-control" id="DOC_CONTENIDO" placeholder="Doc Contenido">@error('DOC_CONTENIDO') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DOC_ID_TIPO">Tipo</label>
                        <select wire:model="DOC_ID_TIPO" class="form-control" id="DOC_ID_TIPO">
                          
                            @foreach ($tipos as $tipoId => $tipoNombre)
                                <option value="{{ $tipoId }}">{{ $tipoNombre }}</option>
                            @endforeach
                        </select>
                        @error('DOC_ID_TIPO')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="DOC_ID_PROCESO">Proceso</label>
                        <select wire:model="DOC_ID_PROCESO" class="form-control" id="DOC_ID_PROCESO">
                           
                            @foreach ($procesos as $procesoId => $procesoNombre)
                         
                                <option value="{{ $procesoId }}">{{ $procesoNombre }}</option>
                            @endforeach
                        </select>
                        @error('DOC_ID_PROCESO')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <!-- Invocar el método "store()" del componente Livewire para guardar el documento -->
                <button type="button" wire:click.prevent="store()" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Documento</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <!-- Formulario para editar un documento existente -->
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="DOC_NOMBRE"></label>
                        <input wire:model="DOC_NOMBRE" type="text" class="form-control" id="DOC_NOMBRE" placeholder="Doc Nombre">@error('DOC_NOMBRE') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DOC_CODIGO"></label>
                        <input wire:model="DOC_CODIGO" type="text" class="form-control" id="DOC_CODIGO" placeholder="Doc Codigo">@error('DOC_CODIGO') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DOC_CONTENIDO"></label>
                        <input wire:model="DOC_CONTENIDO" type="text" class="form-control" id="DOC_CONTENIDO" placeholder="Doc Contenido">@error('DOC_CONTENIDO') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DOC_ID_TIPO">Tipo</label>
                        <select wire:model="DOC_ID_TIPO" class="form-control" id="DOC_ID_TIPO">
                          
                            @foreach ($tipos as $tipoId => $tipoNombre)
                                <option value="{{ $tipoId }}">{{ $tipoNombre }}</option>
                            @endforeach
                        </select>
                        @error('DOC_ID_TIPO')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="DOC_ID_PROCESO">Proceso</label>
                        <select wire:model="DOC_ID_PROCESO" class="form-control" id="DOC_ID_PROCESO">
                           
                            @foreach ($procesos as $procesoId => $procesoNombre)
                         
                                <option value="{{ $procesoId }}">{{ $procesoNombre }}</option>
                            @endforeach
                        </select>
                        @error('DOC_ID_PROCESO')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <!-- Invocar el método "update()" del componente Livewire para actualizar el documento -->
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
