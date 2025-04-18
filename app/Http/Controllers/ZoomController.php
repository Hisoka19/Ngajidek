<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ZoomService;
use App\Models\ZoomMeeting;

class ZoomController extends Controller
{
    protected $zoom;

    public function __construct(ZoomService $zoom)
    {
        $this->zoom = $zoom;
    }

    public function create(Request $request)
    {
        $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'topic'       => 'required|string',
            'start_time'  => 'required|date',
            'duration'    => 'nullable|integer',
        ]);

        $userId = 'me'; // gunakan 'me' jika pakai OAuth, atau ganti dengan Zoom user ID

        $meeting = $this->zoom->createMeeting(
            $userId,
            $request->topic,
            $request->start_time,
            $request->duration ?? 60
        );

        ZoomMeeting::create([
            'course_id'        => $request->course_id,
            'zoom_meeting_id'  => $meeting['id'],
            'join_url'         => $meeting['join_url'],
            'start_time'       => $meeting['start_time']
        ]);

        return redirect()->route('pengajar.kelas')->with('success', 'Zoom meeting berhasil dibuat.');
    }

    public function getRecording($meetingId)
    {
        $recording = $this->zoom->getRecordings($meetingId);
        return response()->json($recording);
    }

    public function index()
    {
    $courses = auth()->user()->courses; // atau Course::all();
    return view('pengajar.zoom', compact('courses'));
    }
}
