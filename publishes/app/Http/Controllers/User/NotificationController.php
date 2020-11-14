<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function index()
    {
    	$breadcrumb = [
    		'Pemberitahuan' => ''
    	];

    	$notifications = Notification::latest()->paginate(15);

    	return view('user.notifications.index', compact('breadcrumb', 'notifications'));
    }

    public function opener(Request $request, Notification $notification)
    {
        $user_id = $request->user()->id;
        
        if ($notification->user_id == $user_id) {
            $notification->update(['status' => 'read']);

            return redirect()->away($notification->link());
        }
        else {
            abort(403);
        }
    }

    public function clear()
    {
        
    }
}
