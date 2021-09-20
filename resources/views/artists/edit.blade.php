<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Artista
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('artists.update',$artist) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
            
                        <!-- Name -->
                        <div>
                            <x-label for="name" value="Nome" />
            
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$artist->name" required autofocus />
                        </div>
            
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$artist->email" required />
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="age" value="Idade" />
            
                            <x-input id="age" class="block mt-1 w-full"
                                            type="number"
                                            name="age"
                                            :value="$artist->age"
                                            required/>
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="image" value="Imagem" />
            
                            <x-input id="image" class="block mt-1 w-full"
                                            type="file"
                                            name="image" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            
                            <x-button class="ml-4">
                                Salvar
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
