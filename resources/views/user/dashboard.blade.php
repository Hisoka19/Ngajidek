
@extends('layouts.user')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Kelas yang Diikuti</h2>

    @php
        $now = \Carbon\Carbon::now();
        $nextMonth = $now->copy()->addMonth();
    @endphp

    @forelse ($user->courses as $course)
        @php
            $upcomingMeetings = $course->zoomMeetings->filter(function ($meeting) use ($now, $nextMonth) {
                return \Carbon\Carbon::parse($meeting->start_time)->between($now, $nextMonth);
            });
        @endphp

        @if ($upcomingMeetings->count())
            <div class="p-4 border rounded-lg shadow mb-4">
                <h3 class="text-lg font-semibold">{{ $course->name }}</h3>
                <ul class="mt-2 space-y-2">
                    @foreach ($upcomingMeetings as $meeting)
                        <li class="p-2 bg-gray-100 rounded flex flex-col md:flex-row justify-between items-start md:items-center gap-2">
                            <div>
                                <p><strong>Topik:</strong> {{ $meeting->topic ?? 'Pertemuan Zoom' }}</p>
                                <p><strong>Waktu Mulai:</strong> {{ \Carbon\Carbon::parse($meeting->start_time)->format('d M Y H:i') }}</p>
                                <p><strong>Sisa Waktu:</strong> <span class="text-blue-500 countdown" data-start="{{ $meeting->start_time }}"></span></p>
                            </div>
                            @if ($meeting->join_url)
                                <a href="{{ $meeting->join_url }}" onclick="showJoinSuccess(event)" target="_blank" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                                    Masuk Zoom
                                </a>
                            @else
                                <span class="text-sm text-red-500">Link belum tersedia</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    @empty
        <p class="text-gray-500">Belum ada kelas yang diikuti.</p>
    @endforelse
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/luxon@3/build/global/luxon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showJoinSuccess(event) {
            event.preventDefault();
            const link = event.currentTarget.href;
            Swal.fire({
                title: 'Berhasil!',
                text: 'Kamu akan diarahkan ke Zoom!',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                window.open(link, '_blank');
            });
        }

        function startCountdown() {
            const countdowns = document.querySelectorAll('.countdown');
            countdowns.forEach(el => {
                const startTime = luxon.DateTime.fromISO(el.dataset.start).toLocal();
                const update = () => {
                    const now = luxon.DateTime.local();
                    const diff = startTime.diff(now, ['hours', 'minutes', 'seconds']);
                    if (diff.toMillis() <= 0) {
                        el.textContent = 'Sudah dimulai';
                        return;
                    }
                    el.textContent = `${diff.hours}j ${diff.minutes}m ${diff.seconds}s`;
                    requestAnimationFrame(update);
                };
                update();
            });
        }

        document.addEventListener('DOMContentLoaded', startCountdown);
    </script>
@endsection
