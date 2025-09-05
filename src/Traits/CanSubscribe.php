<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

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
        if (method_exists($subscribable, 'isSubscribedBy')) {
            return $subscribable->subscribe($this->id);
        }

        throw new \Exception('The model is not subscribable.');
    }

    /**
     * Check if the user is subscribed to a subscribable model.
     *
     * @param  mixed  $subscribable
     * @return bool
     */
    public function isSubscribedTo($subscribable)
    {
        if (method_exists($subscribable, 'isSubscribedBy')) {
            return $subscribable->isSubscribedBy($this->id);
        }

        throw new \Exception('The model is not subscribable.');
    }

    /**
     * Unsubscribe from a subscribable model.
     *
     * @param  mixed  $subscribable
     * @return int
     */
    public function unsubscribe($subscribable)
    {
        if (method_exists($subscribable, 'isSubscribedBy')) {
            return $subscribable->unsubscribe($this->id);
        }

        throw new \Exception('The model is not subscribable.');
    }
}
