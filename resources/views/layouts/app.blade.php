<!DOCTYPE html>
<html>
<head>
    <title>TaskBoard</title>
    <style>
        /* Reset básico e fontes */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background: #F3F4F6; 
            color: #1E293B;
        }

        a {
            text-decoration: none;
            color: #3B82F6;
            margin-right: 15px;
            transition: color 0.3s;
        }

        a:hover {
            color: #2563EB;
        }

        header {
            background-color: #FFFFFF;
            padding: 15px 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info {
            font-size: 16px;
        }

        .user-info form button {
            background-color: #EF4444;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .user-info form button:hover {
            background-color: #DC2626;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: #FFFFFF;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #3B82F6;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #F8FAFC;
        }

        tr:hover {
            background-color: #EFF6FF;
        }

        button, input[type="submit"] {
            background-color: #3B82F6;
            color: white;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #2563EB;
        }

        hr {
            border: none;
            border-top: 1px solid #CBD5E1;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    @auth
        <header>
            <div class="user-info">
                Olá, {{ auth()->user()->name }}
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
            <nav>
                <a href="{{ route('tasks.index') }}">Tarefas</a>
                <a href="{{ route('tags.index') }}">Tags</a>
            </nav>
        </header>
    @endauth

    <main>
        @yield('content')
    </main>
</body>
</html>
