@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <!-- Título -->
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Bem-vindo de volta</h2>

        <!-- Formulário -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div style="margin-bottom: 15px; margin-top: 15px;">
                <label for="email" style="display: block; color: white; font-weight: 500; margin-bottom: 5px;">
                    Email
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    style="
                        width: 100%;
                        padding: 10px 15px;
                        border: 1px solid #CBD5E1;
                        border-radius: 12px;
                        font-size: 16px;
                        outline: none;
                        transition: all 0.3s;
                    "
                    onfocus="this.style.borderColor='#3B82F6'; this.style.boxShadow='0 0 0 2px rgba(59,130,246,0.3)';"
                    onblur="this.style.borderColor='#CBD5E1'; this.style.boxShadow='none';"
                >
                @error('email')
                    <span style="color: #EF4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>


            <!-- Senha -->
            <div style="margin-bottom: 15px; margin-top: 15px;">
                <label for="password" style="display: block; color: white; font-weight: 500; margin-bottom: 5px;">
                    Senha
                </label>
                <input type="password" name="password" id="password" required
                    style="
                        width: 100%;
                        padding: 10px 15px;
                        border: 1px solid #CBD5E1;
                        border-radius: 12px;
                        font-size: 16px;
                        outline: none;
                        transition: all 0.3s;
                    "
                    onfocus="this.style.borderColor='#3B82F6'; this.style.boxShadow='0 0 0 2px rgba(59,130,246,0.3)';"
                    onblur="this.style.borderColor='#CBD5E1'; this.style.boxShadow='none';"
                >
                @error('password')
                    <span style="color: #EF4444; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>


            <!-- Lembrar-me -->
            <div class="mb-4 flex items-center" style="margin-bottom: 15px; margin-top: 15px;">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Lembrar-me</label>
            </div>

            <!-- Botão -->
            <div class="mb-4" style="margin-bottom: 15px; margin-top: 15px;">
                <button type="submit"
                    style="width: 100%; background-color: #1abf90; color: white; font-weight: 600; padding: 12px 0; border-radius: 25px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.3s; cursor: pointer;"
                    onmouseover="this.style.backgroundColor='#1abf90'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 10px rgba(0,0,0,0.15)';"
                    onmouseout="this.style.backgroundColor='#1abf90'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)';">
                    Entrar
                </button>
            </div>

            <!-- Link para registrar -->
            <div style="text-align: center; font-size: 14px; color: white; margin-top: 15px; margin-bottom: 15px;">
                <span>Não possui conta? </span>
                <a href="{{ route('register') }}"
                style="
                    color: red;
                    text-decoration: none;
                    font-weight: 500;
                    transition: all 0.3s;
                "
                onmouseover="this.style.textDecoration='underline'; this.style.color='red';"
                onmouseout="this.style.textDecoration='none'; this.style.color='red';">
                Criar conta
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
