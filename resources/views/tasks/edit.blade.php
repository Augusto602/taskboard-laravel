@extends('layouts.app')

@section('content')
<div style="max-width: 500px; margin: 40px auto; padding: 20px; background-color: #F9FAFB; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
    
    <h1 style="font-size: 24px; font-weight: 700; color: #111827; margin-bottom: 20px; text-align: center;">
        Editar Tarefa
    </h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <!-- Título -->
        <div style="margin-bottom: 15px; width: 400px;">
            <label for="title" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Título
            </label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required
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
        </div>

        <!-- Descrição -->
        <div style="margin-bottom: 15px; width: 400px;">
            <label for="description" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Descrição
            </label>
            <textarea name="description" id="description"
                style="
                    width: 100%;
                    padding: 10px 15px;
                    border: 1px solid #CBD5E1;
                    border-radius: 12px;
                    font-size: 16px;
                    outline: none;
                    min-height: 100px;
                    resize: vertical;
                    transition: all 0.3s;
                "
                onfocus="this.style.borderColor='#3B82F6'; this.style.boxShadow='0 0 0 2px rgba(59,130,246,0.3)';"
                onblur="this.style.borderColor='#CBD5E1'; this.style.boxShadow='none';"
            >{{ old('description', $task->description) }}</textarea>
        </div>

        <!-- Botão Salvar -->
        <button type="submit"
            style="
                width: 100%;
                background-color: #3B82F6;
                color: white;
                font-weight: 600;
                padding: 12px 0;
                border-radius: 12px;
                border: none;
                cursor: pointer;
                transition: all 0.3s;
            "
            onmouseover="this.style.backgroundColor='#2563EB'; this.style.transform='translateY(-2px)';"
            onmouseout="this.style.backgroundColor='#3B82F6'; this.style.transform='translateY(0)';"
        >
            Salvar
        </button>
    </form>
</div>
@endsection
