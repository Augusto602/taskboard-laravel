@extends('layouts.app')

@section('content')
<h1 style="font-size: 28px; font-weight: 700; color: #111827; margin-bottom: 20px;">Minhas Tarefas</h1>

<a href="{{ route('tasks.create') }}" style="display: inline-block;background-color: #3B82F6;color: white;font-weight: 600;padding: 10px 20px;border-radius: 8px;text-decoration: none;margin-bottom: 20px;transition: all 0.3s;" onmouseover="this.style.backgroundColor='#2563EB'; this.style.transform='translateY(-2px)';" onmouseout="this.style.backgroundColor='#3B82F6'; this.style.transform='translateY(0)';">
   Criar Nova Tarefa
</a>

<table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
    <tr style="background-color: #E5E7EB; text-align: left;">
        <th style="padding: 10px; border-bottom: 2px solid #D1D5DB;">Título</th>
        <th style="padding: 10px; border-bottom: 2px solid #D1D5DB;">Status</th>
        <th style="padding: 10px; border-bottom: 2px solid #D1D5DB;">Prioridade</th>
        <th style="padding: 10px; border-bottom: 2px solid #D1D5DB;">Data Limite</th>
        <th style="padding: 10px; border-bottom: 2px solid #D1D5DB;">Tags</th>
        <th style="padding: 10px; border-bottom: 2px solid #D1D5DB;">Ações</th>
    </tr>
    @foreach($tasks as $task)
    <tr style="border-bottom: 1px solid #E5E7EB; transition: background-color 0.3s;" 
        onmouseover="this.style.backgroundColor='#F3F4F6';" 
        onmouseout="this.style.backgroundColor='white';">
        <td style="padding: 10px;">{{ $task->title }}</td>
        <td style="padding: 10px;">{{ $task->status }}</td>
        <td style="padding: 10px;">{{ $task->priority }}</td>
        <td style="padding: 10px;">{{ $task->due_date }}</td>
        <td style="padding: 10px;">{{ $task->tags->pluck('name')->join(', ') }}</td>
        <td style="padding: 10px;">
            <a href="{{ route('tasks.edit', $task->id) }}" style=" background-color: #F59E0B; color: white; padding: 5px 10px; border-radius: 6px; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.backgroundColor='#D97706'; this.style.transform='translateY(-1px)';" onmouseout="this.style.backgroundColor='#F59E0B'; this.style.transform='translateY(0)';">
               Editar
            </a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit"
                    style="
                        background-color: #DC2626;
                        color: white;
                        padding: 6px 12px;
                        border-radius: 6px;
                        border: none;
                        cursor: pointer;
                        font-weight: 500;
                        transition: all 0.3s;
                    "
                    onmouseover="this.style.backgroundColor='#B91C1C'; this.style.transform='translateY(-2px)';"
                    onmouseout="this.style.backgroundColor='#DC2626'; this.style.transform='translateY(0)';"
                    onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');"
                >
                    Excluir
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
