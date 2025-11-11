@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-bold text-white mb-4 animate-fade-in-down">Dashboard</h1>
    <p class="text-lg text-gray-400 mb-8 animate-fade-in-down">
        Selamat datang kembali, <span class="font-bold text-white">{{ Auth::user()->name }}</span>!
    </p>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-sm text-gray-400">Total Siswa</p>
            <p class="text-3xl font-bold text-sky-400">{{ $totalStudents }}</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-sm text-gray-400">Total Guru</p>
            <p class="text-3xl font-bold text-sky-400">{{ $totalTeachers }}</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-sm text-gray-400">Total Kelas</p>
            <p class="text-3xl font-bold text-sky-400">{{ $totalClasses }}</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-sm text-gray-400">Total Jurusan</p>
            <p class="text-3xl font-bold text-sky-400">{{ $totalJurusans }}</p>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <div class="lg:col-span-2 bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">Jumlah Siswa per Jurusan</h2>
            <canvas id="jurusanChart"></canvas>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">Aksi Cepat</h2>
            <div class="space-y-4">
                <a href="{{ route('students.create') }}" class="block w-full text-center bg-sky-600 text-white px-6 py-3 rounded-lg hover:bg-sky-700">Tambah Siswa Baru</a>
                <a href="{{ route('teachers.create') }}" class="block w-full text-center bg-sky-600 text-white px-6 py-3 rounded-lg hover:bg-sky-700">Tambah Guru Baru</a>
                <a href="{{ route('school-classes.create') }}" class="block w-full text-center bg-sky-600 text-white px-6 py-3 rounded-lg hover:bg-sky-700">Tambah Kelas Baru</a>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">5 Siswa Pendaftar Terakhir</h2>
            <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b border-gray-600 font-medium">
                    <tr>
                        <th class="px-6 py-4">Nama Siswa</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestStudents as $student)
                        <tr class="border-b border-gray-700">
                            <td class="px-6 py-4 font-medium">{{ $student->nama }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $student->schoolClass->name }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $student->schoolClass->jurusan->name }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-4 text-gray-500">Belum ada data siswa.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">5 Guru Pendaftar Terakhir</h2>
            <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b border-gray-600 font-medium">
                    <tr>
                        <th class="px-6 py-4">Nama Guru</th>
                        <th class="px-6 py-4">Tipe</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestTeachers as $teacher)
                        <tr class="border-b border-gray-700">
                            <td class="px-6 py-4 font-medium">{{ $teacher->nama }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ ucfirst($teacher->tipe_guru) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="2" class="text-center py-4 text-gray-500">Belum ada data guru.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Script Chart.js --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('jurusanChart');
    const chartLabels = @json($chartLabels);
    const chartData = @json($chartData);
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Siswa',
                data: chartData,
                backgroundColor: 'rgba(56, 189, 248, 0.6)',
                borderColor: 'rgba(56, 189, 248, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
            }
        }
    });
});
</script>
@endsection
