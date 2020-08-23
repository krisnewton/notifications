<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Notification;

class NotificationObject extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function generate($notifiers = [], $entity_type, $entity_id, $actor_id, $extra = [])
    {
    	$data = [
    		'entity_type' 	=> $entity_type,
    		'entity_id' 	=> $entity_id,
    		'user_id' 		=> $actor_id,
    		'extra' 		=> json_encode($extra)
    	];

    	$id = DB::table('notification_objects')->insertGetId($data);

    	foreach ($notifiers as $notifier) {
    		Notification::create([
    			'user_id' 					=> $notifier,
    			'notification_object_id' 	=> $id,
    			'status' 					=> 'unread',
    			'extra' 					=> json_encode([])
    		]);
    	}
    }
}
