<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    protected $baseUrl = 'https://api.zoom.us/v2/';
    protected $token;

    public function __construct()
    {
        $this->token = env('ZOOM_API_KEY');
    }

    protected function headers()
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ];
    }

    public function createMeeting($userId, $topic, $startTime, $duration = 60)
    {
        $response = Http::withHeaders($this->headers())
            ->post($this->baseUrl . "users/{$userId}/meetings", [
                'topic' => $topic,
                'type' => 2, // Scheduled meeting
                'start_time' => $startTime,
                'duration' => $duration,
                'timezone' => 'Asia/Jakarta',
                'agenda' => 'Kelas ngaji online',
                'settings' => [
                    'host_video' => true,
                    'participant_video' => true,
                    'join_before_host' => false,
                    'mute_upon_entry' => true,
                    'approval_type' => 0,
                    'waiting_room' => true,
                    'recording' => true,
                ]
            ]);

        return $response->json();
    }

    public function getRecordings($meetingId)
    {
        $response = Http::withHeaders($this->headers())
            ->get($this->baseUrl . "meetings/{$meetingId}/recordings");

        return $response->json();
    }
}
