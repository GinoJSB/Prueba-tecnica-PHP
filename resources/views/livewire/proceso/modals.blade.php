<!-- La explicacion del codigo es la misma de documentos view.blade.php de documentos -->

<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nuevo proceso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="PRO_PREFIJO"></label>
                        <input wire:model="PRO_PREFIJO" type="text" class="form-control" id="PRO_PREFIJO" placeholder="Pro_Prefijo">@error('PRO_PREFIJO') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="PRO_NOMBRE"></label>
                        <input wire:model="PRO_NOMBRE" type="text" class="form-control" id="PRO_NOMBRE" placeholder="Pro_Nombre">@error('PRO_NOMBRE') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar Proceso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="PRO_PREFIJO"></label>
                        <input wire:model="PRO_PREFIJO" type="text" class="form-control" id="PRO_PREFIJO" placeholder="Pro Prefijo">@error('PRO_PREFIJO') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="PRO_NOMBRE"></label>
                        <input wire:model="PRO_NOMBRE" type="text" class="form-control" id="PRO_NOMBRE" placeholder="Pro Nombre">@error('PRO_NOMBRE') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success">Guardar</button>
            </div>
       </div>
    </div>
</div>
