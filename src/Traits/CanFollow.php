<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use Exception;
use TafadzwaLawrence\SocialBeings\Models\Follow;

trait CanFollow
{
    /**
     * Follow a followable model.
     *
     * @param  mixed  $followable
     * @return Follow
     */
    public function follow($followable)
    {
        // Ensure the model is followable
        if (method_exists($followable, 'isFollowedBy')) {
            return $followable->follow($this->id);
        }

        throw new \Exception('The model is not followable.');
    }

    /**
     * Unfollow a followable model.
     *
     * @param  mixed  $followable
     * @return int
     */
    public function unfollow($followable)
    {
        // Ensure the model is followable
        if (method_exists($followable, 'isFollowedBy')) {
            return $followable->unfollow($this->id);
        }

        throw new Exception('The model is not followable.');
    }

    /**
     * Check if the model is following a followable model.
     *
     * @param  mixed  $followable
     * @return bool
     */
    public function isFollowing($followable)
    {
        // Ensure the model is followable
        if (method_exists($followable, 'isFollowedBy')) {
            return $followable->isFollowedBy($this->id);
        }

        throw new \Exception('The model is not followable.');
    }
}
