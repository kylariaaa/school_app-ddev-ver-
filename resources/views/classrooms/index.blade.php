<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas & Siswa</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card-3d {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            transform-style: preserve-3d;
        }

        .card-3d:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1),
                0 6px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100 antialiased">

    <div class="py-24 px-6 md:px-12 min-h-screen">
        <div class="container mx-auto">
            <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8">
                Daftar Kelas & Siswa
            </h1>

            <!-- Grid Classrooms -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($classrooms as $classroom)
                <div class="bg-white p-6 rounded-xl shadow-lg card-3d">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">
                        {{ $classroom->name }} ({{ $classroom->class_code }})
                    </h2>

                    <p class="text-gray-500 mb-4">
                        Jumlah Siswa:
                        <span class="font-semibold">
                            {{ $classroom->students->count() }}
                        </span>
                    </p>

                    <hr class="border-gray-200 mb-4">

                    <h3 class="text-lg font-semibold text-gray-600 mb-2">
                        Siswa di Kelas Ini:
                    </h3>

                    @if ($classroom->students->isEmpty())
                    <p class="text-gray-500 italic">
                        Belum ada siswa di kelas ini.
                    </p>
                    @else
                    <ul class="list-disc list-inside text-gray-700">
                        @foreach ($classroom->students as $student)
                        <li>{{ $student->nama }} (NIS: {{ $student->nis }})</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- Back Button -->
            <div class="text-center mt-12">
                <a href="{{ url('/dashboard') }}"
                    class="inline-block bg-blue-500 hover:bg-blue-600
                    text-white font-bold py-2 px-6 rounded-lg shadow-lg
                    transition duration-300">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

</body>

</html>
