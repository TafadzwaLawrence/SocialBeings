<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Subscription;

trait CanSubscribe
{
    /**
     * Subscribe to a subscribable model.
     *
     * @param  mixed  $subscribable
     * @return Subscription
     */
    public function subscribe($subscribable)
    {
        return $this->subscriptions()->create([
            'subscriber_id' => $this->id,
            'subscribable_id' => $subscribable->id,
            'subscribable_type' => get_class($subscribable),
        ]);
    }

    /**
     * Unsubscribe from a subscribable model.
     *
     * @param  mixed  $subscribable
     * @return int
     */
    public function unsubscribe($subscribable)
    {
        return $this->subscriptions()->where('subscribable_id', $subscribable->id)
            ->where('subscribable_type', get_class($subscribable))
            ->delete();
    }
}
