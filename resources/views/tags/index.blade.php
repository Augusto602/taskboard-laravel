@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 40px auto; background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 16px; padding: 30px 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
    
    <h1 style="font-size: 28px; font-weight: 600; color: #1E293B; margin-bottom: 25px; text-align: center;">
        Tags
    </h1>

    {{-- Formulário para adicionar nova tag --}}
    <form method="POST" action="{{ route('tags.store') }}" style="display: flex; gap: 10px; margin-bottom: 25px;">
        @csrf
        <input 
            type="text" 
            name="name" 
            placeholder="Nova tag" 
            required
            style="
                flex: 1;
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
        >
            Adicionar
        </button>
    </form>

    {{-- Lista de tags --}}
    <ul style="list-style: none; padding: 0; margin: 0;">
        @foreach($tags as $tag)
            <li 
                style="
                    background-color: #F8FAFC;
                    border: 1px solid #E2E8F0;
                    border-radius: 12px;
                    padding: 10px 15px;
                    margin-bottom: 10px;
                    font-size: 16px;
                    color: #334155;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    transition: all 0.3s;
                "
                onmouseover="this.style.backgroundColor='#EFF6FF';"
                onmouseout="this.style.backgroundColor='#F8FAFC';"
            >
                <span>{{ $tag->name }}</span>

                {{-- Botão deletar --}}
                <form method="POST" action="{{ route('tags.destroy', $tag->id) }}" onsubmit="return confirm('Tem certeza que deseja deletar esta tag?')" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        style="
                            background-color: #EF4444;
                            color: white;
                            border: none;
                            padding: 6px 12px;
                            border-radius: 8px;
                            cursor: pointer;
                            font-weight: 500;
                            transition: all 0.3s;
                        "
                        onmouseover="this.style.backgroundColor='#DC2626';"
                        onmouseout="this.style.backgroundColor='#EF4444';"
                    >
                        Deletar
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
