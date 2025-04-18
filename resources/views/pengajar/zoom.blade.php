@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-xl mt-10">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Meeting Zoom</h2>

    <form method="POST" action="{{ route('zoom.create') }}" id="zoomForm" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Topik Meeting</label>
            <input type="text" name="topic" id="topic" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Tanggal & Waktu Mulai</label>
            <input type="datetime-local" name="start_time" id="start_time" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Durasi (menit)</label>
            <input type="number" name="duration" id="duration" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500" value="60">
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Pilih Kelas</label>
            <select name="course_id" id="course_id" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="button" onclick="previewMeeting()" class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-xl">Preview</button>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl">Buat Meeting</button>
        </div>
    </form>

    <div id="previewCard" class="hidden mt-8 bg-gray-50 border border-gray-300 p-6 rounded-xl">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Preview Meeting:</h3>
        <ul class="text-gray-700 space-y-1">
            <li><strong>Topik:</strong> <span id="previewTopic"></span></li>
            <li><strong>Waktu Mulai:</strong> <span id="previewStart"></span></li>
            <li><strong>Durasi:</strong> <span id="previewDuration"></span> menit</li>
            <li><strong>Kelas:</strong> <span id="previewCourse"></span></li>
        </ul>
    </div>

    <!-- Countdown Section -->
<div id="countdownCard" class="hidden mt-4 bg-blue-50 border border-blue-300 p-4 rounded-xl">
    <h4 class="text-md font-semibold text-blue-800 mb-2">Waktu menuju meeting:</h4>
    <p id="countdown" class="text-xl font-mono text-blue-700">--:--:--</p>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
function previewMeeting() {
    const topic = document.getElementById('topic').value;
    const startTime = document.getElementById('start_time').value;
    const duration = document.getElementById('duration').value;
    const course = document.getElementById('course_id');
    const courseText = course.options[course.selectedIndex].text;

    document.getElementById('previewTopic').innerText = topic;
    document.getElementById('previewStart').innerText = startTime;
    document.getElementById('previewDuration').innerText = duration;
    document.getElementById('previewCourse').innerText = courseText;

    document.getElementById('previewCard').classList.remove('hidden');

    // Countdown
    const countdownCard = document.getElementById('countdownCard');
    countdownCard.classList.remove('hidden');

    const startDate = new Date(startTime);
    const countdown = document.getElementById('countdown');

    clearInterval(window.countdownInterval); // clear previous countdown

    window.countdownInterval = setInterval(() => {
        const now = new Date();
        const diff = startDate - now;

        if (diff <= 0) {
            countdown.innerText = "Meeting sudah dimulai";
            clearInterval(window.countdownInterval);
            return;
        }

        const hrs = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const mins = Math.floor((diff / (1000 * 60)) % 60);
        const secs = Math.floor((diff / 1000) % 60);

        countdown.innerText = `${hrs.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }, 1000);
}

</script>
@endsection
