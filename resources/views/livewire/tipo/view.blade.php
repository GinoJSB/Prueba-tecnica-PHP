


@section('title', __('Tipo'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista de los Tipos de documentos</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Tipos">
						</div>
						<div class="btn btn-sm btn-success p-2" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i> Agregrar Tipos
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.tipo.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm text-center">
						<thead class="thead">
							<tr>
								<td>Id</td>
								<th> Nombre</th>
								<th>Prefijo</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($tipo as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->TIP_NOMBRE }}</td>
								<td>{{ $row->TIP_PREFIJO }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones Tipo
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirmar para eliminar el Tipo {{$row->TIP_NOMBRE}}? \n¡Los Tipos eliminados no se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>
										</ul>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">Datos no encontrados</td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $tipo->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
