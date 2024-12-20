<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use Exception;

trait CanFavor
{
    /**
     * Follow a followable model.
     *
     * @param  mixed  $followable
     * @return Follow
     */
    public function favour($favorable)
    {
        // Ensure the model is followable
        if (method_exists($favorable, 'isfavouredBy')) {
            return $favorable->favour($this->id);
        }

        throw new \Exception('The model is not favorable.');
    }

    /**
     * Unfollow a followable model.
     *
     * @param  mixed  $followable
     * @return int
     */
    public function unfavour($favorable)
    {
        // Ensure the model is followable
        if (method_exists($favorable, 'isfavouredBy')) {
            return $favorable->unfavour($this->id);
        }

        throw new Exception('The model is not favourable.');
    }

    /**
     * Check if the model is following a followable model.
     *
     * @param  mixed  $followable
     * @return bool
     */
    public function isFavourite($favorable)
    {
        // Ensure the model is followable
        if (method_exists($favorable, 'isFollowedBy')) {
            return $favorable->isfavouredBy($this->id);
        }

        throw new \Exception('The model is not favourable.');
    }
}
