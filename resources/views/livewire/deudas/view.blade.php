@section('title', __('Deudas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Deuda Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Deudas">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Deudas
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.deudas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre Deuda</th>
								<th>Concepto</th>
								<th>Valor</th>
								<th>Pagado</th>
								<th>Fecha Pago</th>
								<th>Valor Abono</th>
								<th>Info Abono</th>
								<th>Fecha Abono</th>
								<th>Ingresos Id</th>
								<th>Borrado</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($deudas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre_deuda }}</td>
								<td>{{ $row->concepto }}</td>
								<td width="150px">$ {{ number_format($row->valor, 2, ',', '.') }}</td>
								<td>
									@if($row->pagado == 1)
										<span class="badge text-bg-success">Si</span>
									@else
										<span class="badge text-bg-danger">No</span>
									@endif
								</td>
								<td>{{ $row->fecha_pago }}</td>
								<td width="150px">$ {{ number_format($row->valor_abono, 2, ',', '.') }}</td>
								<td>{{ $row->info_abono }}</td>
								<td>{{ $row->fecha_abono }}</td>
								<td>{{ $row->nombre_ingreso }}</td>
								<td>
									@if($row->borrado == 1)
										<span class="badge text-bg-danger">Si</span>
									@else
										<span class="badge text-bg-primary">No</span>
									@endif
								</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Deuda id {{$row->id}}? \nDeleted Deudas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $deudas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>