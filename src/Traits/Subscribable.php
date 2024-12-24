<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Subscriptions;

trait Subscribable
{
    /**
     * Get all of the subscriptions for the model.
     */
    public function subscriptions()
    {
        return $this->morphMany(Subscription::class, 'subscribable');
    }

    /**
     * Check if the model is subscribed by a given user.
     *
     * @param  int  $userId
     * @return bool
     */
    public function isSubscribedBy($userId)
    {
        return $this->subscriptions()->where('subscriber_id', $userId)->exists();
    }

    /**
     * Unfollow the model.
     *
     * @param  int  $userId
     * @return int
     */
    public function unsubcribe($userId)
    {
        return $this->subscriptions()->where('subscriber_id', $userId)->delete();
    }

    /**
     * Get the count of subscribers.
     *
     * @return int
     */
    public function getSubscribersCountAttribute()
    {
        return $this->subscriptions()->count();
    }
}
