<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NotificationChannels\WebPush\HasPushSubscriptions;

class Guest extends Model
{
    use HasFactory, HasPushSubscriptions;

    protected $fillable = [
        'endpoint',
    ];

    /**
     * Determine if the given subscription belongs to this user.
     *
     * @param  \NotificationChannels\WebPush\PushSubscription $subscription
     * @return bool
     */
    public function pushSubscriptionBelongsToUser($subscription){
        return (int) $subscription->guest_id === (int) $this->id;
    }
}
