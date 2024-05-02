<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //by user login
    public function showByUserLogin()
    {
        return response([
            'data' => Notification::where('user_id', Auth::id())->orderBy('date', 'desc')->orderBy('time', 'desc')->get()
        ], 200);
    }

    public function markAllAsRead()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->where('is_read', 0)
            ->get();

        foreach ($notifications as $notification) {
            $notification->update([
                'is_read' => 1,
            ]);
        }

        return response([
            'message' => 'All notifications marked as read for the logged in user.',
        ], 200);
    }
}
