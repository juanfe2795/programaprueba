<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Permiso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="rol_id"></label>
                        <input wire:model="rol_id" type="text" class="form-control" id="rol_id" placeholder="Rol Id">@error('rol_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="modulo_id"></label>
                        <input wire:model="modulo_id" type="text" class="form-control" id="modulo_id" placeholder="Modulo Id">@error('modulo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="crear"></label>
                        <input wire:model="crear" type="text" class="form-control" id="crear" placeholder="Crear">@error('crear') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ver"></label>
                        <input wire:model="ver" type="text" class="form-control" id="ver" placeholder="Ver">@error('ver') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="editar"></label>
                        <input wire:model="editar" type="text" class="form-control" id="editar" placeholder="Editar">@error('editar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="borrar"></label>
                        <input wire:model="borrar" type="text" class="form-control" id="borrar" placeholder="Borrar">@error('borrar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="importar"></label>
                        <input wire:model="importar" type="text" class="form-control" id="importar" placeholder="Importar">@error('importar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exportar"></label>
                        <input wire:model="exportar" type="text" class="form-control" id="exportar" placeholder="Exportar">@error('exportar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Permiso</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="rol_id"></label>
                        <input wire:model="rol_id" type="text" class="form-control" id="rol_id" placeholder="Rol Id">@error('rol_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="modulo_id"></label>
                        <input wire:model="modulo_id" type="text" class="form-control" id="modulo_id" placeholder="Modulo Id">@error('modulo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="crear"></label>
                        <input wire:model="crear" type="text" class="form-control" id="crear" placeholder="Crear">@error('crear') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ver"></label>
                        <input wire:model="ver" type="text" class="form-control" id="ver" placeholder="Ver">@error('ver') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="editar"></label>
                        <input wire:model="editar" type="text" class="form-control" id="editar" placeholder="Editar">@error('editar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="borrar"></label>
                        <input wire:model="borrar" type="text" class="form-control" id="borrar" placeholder="Borrar">@error('borrar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="importar"></label>
                        <input wire:model="importar" type="text" class="form-control" id="importar" placeholder="Importar">@error('importar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exportar"></label>
                        <input wire:model="exportar" type="text" class="form-control" id="exportar" placeholder="Exportar">@error('exportar') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
