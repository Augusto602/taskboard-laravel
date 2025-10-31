@extends('layouts.app')

@section('content')
<div style="max-width: 500px; margin: 40px auto; padding: 20px; background-color: #F9FAFB; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
    
    <h1 style="font-size: 24px; font-weight: 700; color: #111827; margin-bottom: 20px; text-align: center;">
        Criar Tarefa
    </h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div style="margin-bottom: 15px; width: 400px;">
            <label for="title" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Título
            </label>
            <input type="text" name="title" required
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

        <div style="margin-bottom: 15px; width: 400px;">

            <label for="description" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Descrição
            </label>

            <textarea name="description"
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
            ></textarea>

        </div>

        <div style="margin-bottom: 15px; width: 400px;">

            <label for="description" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Status
            </label>

            <select name="status"style="width: 100%;padding: 10px 15px;border: 1px solid #CBD5E1;border-radius: 12px;font-size: 16px;outline: none;transition: all 0.3s;">
                <option value="todo">Todo</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
            </select>

        </div>

        <div style="margin-bottom: 15px; width: 50px;">

            <label for="description" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Prioridade
            </label>

            <input type="number" name="priority" required min="1" max="5" value="3"
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

        <div style="margin-bottom: 15px; width: 120px;">
            
            <label for="description" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Data Limite:
            </label>

            <input type="date" name="due_date" required
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

        <div style="margin-bottom: 15px; width: 120px;">

            <label for="description" style="display: block; font-weight: 500; color: #374151; margin-bottom: 5px;">
                Tags:
            </label>

            @foreach($tags as $tag)
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; padding: 10px 15px;  transition: all 0.3s; font-size: 16px;">
                    <input 
                        type="checkbox" 
                        name="tags[]" 
                        value="{{ $tag->id }}" 
                        required
                        style="width: 18px; height: 18px; accent-color: #3B82F6; cursor: pointer;"
                        onfocus="this.parentElement.style.borderColor='#3B82F6'; this.parentElement.style.boxShadow='0 0 0 2px rgba(59,130,246,0.3)';"
                        onblur="this.parentElement.style.borderColor='#CBD5E1'; this.parentElement.style.boxShadow='none';"
                    >
                    <span>{{ $tag->name }}</span>
                </label>
            @endforeach

        </div> 

        <button 
            type="submit" 
            style="
                background-color: #3B82F6;
                color: white;
                padding: 10px 20px;
                font-size: 16px;
                font-weight: 500;
                border: none;
                border-radius: 12px;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            "
            onmouseover="this.style.backgroundColor='#2563EB'; this.style.boxShadow='0 4px 8px rgba(37,99,235,0.3)';"
            onmouseout="this.style.backgroundColor='#3B82F6'; this.style.boxShadow='0 2px 4px rgba(0, 0, 0, 0.1)';"
            onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(59,130,246,0.4)';"
            onblur="this.style.boxShadow='0 2px 4px rgba(0, 0, 0, 0.1)';"
        >
            Salvar
        </button>

    </form>
</div>
@endsection
