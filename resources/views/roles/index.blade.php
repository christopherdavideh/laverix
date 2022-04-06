<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                        <div class="row text-center">
                            
                            <div class="col-1 col-lg-1 col-md-1">
                                <label for="q" class="text-right pt-2"><strong>Rol: </strong></label>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-1 mt-2">
                                <input placeholder="Rol" name="q" type="text" id="q" class="form-control" value="{{ request('q') }}" style="width: 100%">                            
                            </div>
                            <div class="col-md-5 col-sm-12 col-lg-5 mt-2">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>                                
                                <a class="btn btn-outline-success m-6" href="{{ route('roles.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a> 
                                <a href="{{ route('roles.index') }}" class="btn btn-outline-info"><i class="fa fa-refresh" aria-hidden="true"></i> Restablecer</a>   
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 bg-white border-b border-gray-200">
                
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Rol</th> 
                                <th>Accion</th> 
                            <tr>
                        </thead>    
                        <tbody>  
                            @forelse($roles as $key => $role)
                                <tr>
                                    <td class="text-center">{{ $roles->firstItem() + $key }}</td>
                                    <td>{!! $role->role !!}</td>
                                    <td class="text-center">
                                        <a href="{{ route('roles.show', $role->id) }}" id="show-role-{{ $role->id }}" class="btn btn-outline-primary" title="Ver más"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ route('roles.edit', $role->id) }}" id="edit-role-{{ $role->id }}" class="btn btn-outline-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('roles.edit', [$role, 'action' => 'delete']) }}" id="del-role-{{ $role->id }}" class="btn btn-outline-danger float-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <div class="col-md-12">
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-exclamation-triangle"></i>No hay roles para mostrar</h4>
                                    </div>
                                </div>
                            @endforelse
                        <tbody>
                    <table> 
                </div>
                <div class="card-body" style="float: none; text-align: center;">{{ $roles->appends(Request::except('page'))->render() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>