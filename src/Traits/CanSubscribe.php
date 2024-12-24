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
        // Ensure the model is followable
        if (method_exists($subscribable, 'isSubscribedBy')) {
            return $subscribable->subscribe($this->id);
        }

        throw new \Exception('The model is not subscribeable.');
    }

    /**
     * Subscribe to a subscribable model.
     *
     * @param  mixed  $subscribable
     * @return Subscription
     */
    public function isSubscribedBy($subscribable)
    {
        // Ensure the model is followable
        if (method_exists($subscribable, 'isSubscribedBy')) {
            return $subscribable->subscribe($this->id);
        }

        throw new \Exception('The model is not subscribeable.');
    }

    /**
     * Unsubscribe from a subscribable model.
     *
     * @param  mixed  $subscribable
     * @return int
     */
    public function unsubscribe($subscribable)
    {
        // Ensure the model is followable
        if (method_exists($subscribable, 'isSubscribedBy')) {
            return $subscribable->subscribe($this->id);
        }

        throw new \Exception('The model is not subscribeable.');
    }
}
