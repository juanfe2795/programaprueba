<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Deuda</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nombre_deuda">Nombre deuda</label>
                        <input wire:model="nombre_deuda" type="text" class="form-control" id="nombre_deuda" placeholder="Nombre Deuda">@error('nombre_deuda') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto Deuda</label>
                        <input wire:model="concepto" type="text" class="form-control" id="concepto" placeholder="Concepto">@error('concepto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor </label>
                        <input wire:model="valor" type="number" class="form-control" id="valor" placeholder="Valor">@error('valor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pagado"> Pagado</label>
                        <select wire:model="pagado" id="pagado" class="form-control">
                            <option>-Seleccione una opción-</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('pagado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_pago">Fecha pago</label>
                        <input wire:model="fecha_pago" type="date" class="form-control" id="fecha_pago" placeholder="Fecha Pago">@error('fecha_pago') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="valor_abono">Valor abono</label>
                        <input wire:model="valor_abono" type="text" class="form-control" id="valor_abono" placeholder="Valor Abono">@error('valor_abono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="info_abono">Información de abonos</label>
                        <input wire:model="info_abono" type="text" class="form-control" id="info_abono" placeholder="Info Abono">@error('info_abono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_abono">Fecha abono</label>
                        <input wire:model="fecha_abono" type="date" class="form-control" id="fecha_abono" placeholder="Fecha Abono">@error('fecha_abono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ingresos_id">Ingreso</label>
                        <select id="ingresos_id" wire:model="ingresos_id" class="form-control">
                            <option>-Seleccione una opción-</option>
                            @foreach($ingresos as $row)
                            <option value="{{$row->id}}">{{$row->nombre_ingreso}}</option>
                            @endforeach
                        </select>
                        @error('ingresos_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Deuda</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nombre_deuda">Nombre deuda</label>
                        <input wire:model="nombre_deuda" type="text" class="form-control" id="nombre_deuda" placeholder="Nombre Deuda">@error('nombre_deuda') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto Deuda</label>
                        <input wire:model="concepto" type="text" class="form-control" id="concepto" placeholder="Concepto">@error('concepto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor </label>
                        <input wire:model="valor" type="number" class="form-control" id="valor" placeholder="Valor">@error('valor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pagado"> Pagado</label>
                        <select wire:model="pagado" id="pagado" class="form-control">
                            <option>-Seleccione una opción-</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('pagado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_pago">Fecha pago</label>
                        <input wire:model="fecha_pago" type="date" class="form-control" id="fecha_pago" placeholder="Fecha Pago">@error('fecha_pago') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="valor_abono">Valor abono</label>
                        <input wire:model="valor_abono" type="text" class="form-control" id="valor_abono" placeholder="Valor Abono">@error('valor_abono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="info_abono">Información de abonos</label>
                        <input wire:model="info_abono" type="text" class="form-control" id="info_abono" placeholder="Info Abono">@error('info_abono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_abono"></label>
                        <input wire:model="fecha_abono" type="date" class="form-control" id="fecha_abono" placeholder="Fecha Abono">@error('fecha_abono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ingresos_id">Ingreso</label>
                        <select id="ingresos_id" wire:model="ingresos_id" class="form-control">
                            <option>-Seleccione una opción-</option>
                            @foreach($ingresos as $row)
                            <option value="{{$row->id}}">{{$row->nombre_ingreso}}</option>
                            @endforeach
                        </select>
                        @error('ingresos_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
