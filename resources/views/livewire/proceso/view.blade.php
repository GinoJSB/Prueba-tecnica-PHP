
@section('title', __('Proceso'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista Proceso  </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar proceso">
						</div>
						<div class="btn btn-sm btn-success p-2" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i> Agregar Proceso
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.proceso.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm text-center">
						<thead class="thead">
							<tr>
								<td>ID </td>
								<th> Prefijo</th>
								<th> Nombre</th>
								<td>Acciones </td>
							</tr>
						</thead>
						<tbody>
							@forelse($proceso as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->PRO_PREFIJO }}</td>
								<td>{{ $row->PRO_NOMBRE }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones proceso
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirmar para eliminar el proceso {{$row->PRO_NOMBRE}}? \nLos Procesos eliminados no se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>
										</ul>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Datos no encontrados </td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $proceso->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
