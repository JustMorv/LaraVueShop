@extends('layouts.auth')

@section('title', 'Вход в аккаунт')

@section('content')
    <x-forms.auth-forms
        title="Востановление пароля"
        method="POST"
      >
        @csrf
        <x-forms.text-input
            name="email"
            type="email"
            placeholder="E-mail"
            required="true"
            :isError="$errors->has('email')"
        />
        @error('email')
        <x-forms.error>
            {{$message}}
        </x-forms.error>
        @enderror


        <x-forms.text-input
            name="password"
            type="password"
            placeholder="Пароль"
            required="true"
            :isError="$errors->has('password')"
        />
        @error('password')
        <x-forms.error>
            {{$message}}
        </x-forms.error>
        @enderror


        <x-forms.text-input
            name="password_confirmation"
            type="password"
            placeholder="Повторный Пароль"
            required="true"
            :isError="$errors->has('password')"
        />
        @error('password_confirmation')
        <x-forms.error>
            {{$message}}
        </x-forms.error>
        @enderror
        <x-forms.primary-button>Сохранить</x-forms.primary-button>
        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs">
                    <a href="{{route('login')}}" class="text-white hover:text-white/70 font-bold">Войти в аккаунт </a>
                </div>
            </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection
