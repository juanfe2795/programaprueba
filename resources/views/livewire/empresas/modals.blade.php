<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Empresa</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nombre_empresa">Nombre Empresa</label>
                        <input wire:model="nombre_empresa" type="text" class="form-control" id="nombre_empresa" placeholder="Nombre Empresa">@error('nombre_empresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio_contrato">Fecha inicio</label>
                        <input wire:model="fecha_inicio_contrato" type="date" class="form-control" id="fecha_inicio_contrato" placeholder="Fecha Inicio Contrato">@error('fecha_inicio_contrato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin_contrato">Fecha fin</label>
                        <input wire:model="fecha_fin_contrato" type="date" class="form-control" id="fecha_fin_contrato" placeholder="Fecha Fin Contrato">@error('fecha_fin_contrato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="valor_contrato">Valor contrato</label>
                        <input wire:model="valor_contrato" type="number" class="form-control" id="valor_contrato" placeholder="Valor Contrato">@error('valor_contrato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pago_mensual">Pago Mensual</label>
                        <input wire:model="pago_mensual" type="number" class="form-control" id="pago_mensual" placeholder="Pago Mensual">@error('pago_mensual') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Empresa</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombre_empresa"></label>
                        <input wire:model="nombre_empresa" type="text" class="form-control" id="nombre_empresa" placeholder="Nombre Empresa">@error('nombre_empresa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio_contrato"></label>
                        <input wire:model="fecha_inicio_contrato" type="date" class="form-control" id="fecha_inicio_contrato" placeholder="Fecha Inicio Contrato">@error('fecha_inicio_contrato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin_contrato"></label>
                        <input wire:model="fecha_fin_contrato" type="date" class="form-control" id="fecha_fin_contrato" placeholder="Fecha Fin Contrato">@error('fecha_fin_contrato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="valor_contrato"></label>
                        <input wire:model="valor_contrato" type="number" class="form-control" id="valor_contrato" placeholder="Valor Contrato">@error('valor_contrato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pago_mensual"></label>
                        <input wire:model="pago_mensual" type="number" class="form-control" id="pago_mensual" placeholder="Pago Mensual">@error('pago_mensual') <span class="error text-danger">{{ $message }}</span> @enderror
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
