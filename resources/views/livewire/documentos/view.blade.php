@section('title', __('Documentos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h3><i class="fab fa-laravel text-info"></i>
							Documentos </h3>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Documentos">
						</div>
						<div class="btn btn-sm btn-success p-2" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Documentos
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.documentos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm text-center">
						<thead class="thead">
							<tr>
								<td>Id Documento</td>
								<th>Doc Nombre</th>
								<th>Doc Codigo</th>
								<th>Doc Contenido</th>
								<th>Doc Id Tipo</th>
								<th>Doc Id Proceso</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@forelse($documentos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->DOC_NOMBRE }}</td>
								<td>{{ $row->DOC_CODIGO }}</td>
								<td>{{ $row->DOC_CONTENIDO }}</td>
										<td wire:defer>{{ $row->tipo->TIP_NOMBRE }}</td>
			<td wire:defer>{{ $row->proceso->PRO_NOMBRE }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirmar, Eliminar el Documento  {{$row->DOC_NOMBRE}}? \n¡Los documentos eliminados no se pueden recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>
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
					<div class="float-end">{{ $documentos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
