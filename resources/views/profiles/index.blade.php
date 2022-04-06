<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>
    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                        <div class="row text-center">
                            
                            <div class="col-1 col-lg-1 col-md-1">
                                <label for="q" class="text-right pt-2"><strong>Nombre: </strong></label>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-1 mt-2">
                                <input placeholder="Nombres o Apellidos" name="q" type="text" id="q" class="form-control" value="{{ request('q') }}" style="width: 100%">                            
                            </div>
                            <div class="col-md-5 col-sm-12 col-lg-5 mt-2">
                                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>                                
                                <a class="btn btn-outline-success m-6" href="{{ route('users.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a> 
                                <a href="{{ route('users.index') }}" class="btn btn-outline-info"><i class="fa fa-refresh" aria-hidden="true"></i> Restablecer</a>   
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
                    @include('layouts.session-status')
                
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th> 
                                <th>Apellidos</th> 
                                <th>Telefono</th> 
                                <th>Direccion</th> 
                                <th>Correo</th> 
                                <th>Fecha Nacimiento</th>
                                <th>Roles</th>
                                <th>Acciones</th>  
                            <tr>
                        </thead>    
                        <tbody>  
                            @forelse($users as $key => $user)
                                <tr>
                                    <td class="text-center">{{ $users->firstItem() + $key }}</td>
                                    <td>{!! $user->names !!}</td>
                                    <td>{!! $user->lastnames !!}</td>
                                    <td>{!! $user->phone !!}</td>
                                    <td>{!! $user->address !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->birth !!}</td>
                                    <td>{!! $user->names !!}</td>
                                    <td class="text-center">
                                        <!--<a href="{{ route('users.show', $user->id) }}" id="show-user-{{ $user->id }}" class="btn btn-outline-primary" title="Ver más"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                        <a href="{{ route('users.edit', $user->id) }}" id="edit-user-{{ $user->id }}" class="btn btn-outline-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form method="POST" action="{{ route('users.destroy', $user) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('¿Estas seguro de eliminar esto?') }}&quot;)" class="del-form float-right" style="display: inline;">
                                            {{ csrf_field() }} {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <input type="hidden" name="user_id" id="user_id" value="{{ old('user', $user->id) }}"/>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <strong>No hay usuarios para mostrar! &nbsp;</strong> Puedes añadir usuarios dando click en nuevo.
                                    <button type="button" class="btn-close mb-2" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-lg fa-close" aria-hidden="true"></i></button>
                                </div>
                            @endforelse
                        <tbody>
                    <table> 
                </div>
                <div class="card-body" style="float: none; text-align: center;">{{ $users->appends(Request::except('page'))->render() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>