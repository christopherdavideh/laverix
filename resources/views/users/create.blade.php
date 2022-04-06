<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo') }}
        </h2>
    </x-slot>
    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    @include('layouts.errors')

                    <form method="POST" action="{{ route('users.store') }}" accept-charset="UTF-8">
                            {{ csrf_field() }} 

                        <!-- Name -->
                        <div>
                            <x-label for="names" :value="__('Name')" />
                            {!! $errors->first('names', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="names" class="form-control{{ $errors->has('names') ? ' is-invalid' : '' }}" name="names" value="{{ old('names') }}">
                        </div>

                        <div>
                            <x-label for="lastnames" :value="__('Last Name')" />
                            {!! $errors->first('lastnames', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="lastnames" class="form-control{{ $errors->has('lastnames') ? ' is-invalid' : '' }}" name="lastnames" value="{{ old('lastnames') }}">
                        </div>

                        <div>
                            <x-label for="phone" :value="__('Phone')" />
                            {!! $errors->first('phone', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div>
                            <x-label for="address" :value="__('Address')" />
                            {!! $errors->first('address', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}">
                        </div>

                        <div>
                            <x-label for="birth" :value="__('Birth')" />
                            {!! $errors->first('birth', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="birth" type="date" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" name="birth" value="{{ old('birth') }}">
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            {!! $errors->first('email', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                            {!! $errors->first('nombre_com', '<span class="invalid-feedback" role="alert" style=" color: red">:message</span>') !!}
                            <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            type="password"
                                            name="password"
                                             autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            
                            <input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation"  />
                        </div>
                        <div class="flex items-center justify-center mt-4">

                            <input type="submit" class="btn btn-lg btn-outline-primary" value="{{ __('Guardar') }}"/>
                                
                            </button>
                            <a href="{{ route('users.index') }}" class="ml-3 btn btn-outline-danger btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>