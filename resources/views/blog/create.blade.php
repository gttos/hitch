<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('cards.store') }}">
        @csrf

        <!-- Email Address -->
        <label>
            <select name="tip_id">
                @foreach ($tips as $tip)
                    <option value="{{ $tip->id }}" @selected(old('tip_id') == $tip->id)>
                        {{ $tip->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <div>
            <x-input-label for="title" :value="__('Titulo')" />
            <x-text-input id="title" class="block mt-1 w-full" type="email" name="title" :value="old('title')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Descripción')" />

            <x-text-input id="description" class="block mt-1 w-full"
                            type="password"
                            name="description"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Guardar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
