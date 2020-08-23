<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $user_id = Auth::id();
            $builder->where('user_id', $user_id);
        });
    }

    public function notification_object()
    {
    	return $this->belongsTo('App\NotificationObject');
    }

    public function show()
    {
    	$notification_object = $this->notification_object;

    	switch ($notification_object->entity_type) {
    		case 'test':
    			$output = 'Hello, World!';
    			break;
    		default:
    			$output = 'Kesalahan';
    			break;
    	}

    	return $output;
    }

    public function link()
    {
        $notification_object = $this->notification_object;

        switch ($notification_object->entity_type) {
            case 'test':
                $output = route('home');
                break;          
            default:
                $output = route('notifications.index');
                break;
        }

        return $output;
    }
}
