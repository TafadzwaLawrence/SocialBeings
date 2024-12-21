<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

trait CanLike
{
    /**
     * Follow a followable model.
     *
     * @param  mixed  $followable
     * @return Follow
     */
    public function like($likeable)
    {
        // Ensure the model is followable
        if (method_exists($likeable, 'isLikedBy')) {
            return $likeable->like($this->id);
        }

        throw new \Exception('The model is not likeable.');
    }

    /**
     * Follow a followable model.
     *
     * @param  mixed  $followable
     * @return Follow
     */
    public function unlike($likeable)
    {
        // Ensure the model is followable
        if (method_exists($likeable, 'isLikedBy')) {
            return $likeable->like($this->id);
        }

        throw new \Exception('The model is not likeable.');
    }
}
