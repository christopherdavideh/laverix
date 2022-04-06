<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar') }}
        </h2>
    </x-slot>
    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('roles.update', $role) }}" accept-charset="UTF-8">
                            {{ csrf_field() }} {{ method_field('patch') }}

                        <!-- Name -->
                        <div>
                            <x-label for="rol" :value="__('Rol')" />
                            {!! $errors->first('nombre_com', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="{{ old('role', $role->role) }}">
                        </div>

                       
                        <div class="flex items-center justify-center mt-4">

                            <input type="submit" class="btn btn-lg btn-outline-primary" value="{{ __('Actualizar') }}"/>
                                
                            </button>
                            <a href="{{ route('roles.index') }}" class="ml-3 btn btn-outline-danger btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>