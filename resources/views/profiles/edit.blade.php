<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asignar roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    @include('layouts.errors')

                    <form method="POST" action="{{ route('profiles.update', $profile) }}" accept-charset="UTF-8">
                            {{ csrf_field() }} {{ method_field('patch') }}

                        <div>
                            <x-label for="names" :value="__('Name')" />                            
                            <input type="hidden" id="user_id" name="user_id" value="{{ old('user_id', $profile->id) }}" />
                            <input id="names" class="form-control{{ $errors->has('names') ? ' is-invalid' : '' }}" name="names" value="{{ old('names', $profile->names) }}" readonly>
                        </div>

                        <div>
                            <x-label for="lastnames" :value="__('Last Name')" />
                            
                            <input id="lastnames" class="form-control{{ $errors->has('lastnames') ? ' is-invalid' : '' }}" name="lastnames" value="{{ old('lastnames', $profile->lastnames) }}" readonly>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            
                            <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $profile->email) }}" readonly>
                        </div>

                        
                        <div class="mt-4">
                            <x-label for="roles" :value="__('Roles')" />
                            {!! $errors->first('roles', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <select id="roles" class="select2 form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}" name="roles[]" value="{{ old('roles') }}" multiple="multiple" >
                                <option value=""> {{ __('Seleccione un Rol')}}</option>
                                @forelse($roles as $key => $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->role }}</option>
                                @empty
                                    <option value=""> {{ __('Roles Vacios')}}</option>
                                @endforelse
                            </select>
                        </div>

                        <!-- Password -->
                       
                        <div class="flex items-center justify-center mt-4">

                            <input type="submit" class="btn btn-lg btn-outline-primary" value="{{ __('Guardar') }}"/>
                                
                            </button>
                            <a href="{{ route('profiles.index') }}" class="ml-3 btn btn-outline-danger btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>