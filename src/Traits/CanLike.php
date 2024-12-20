<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Like;

trait CanLike
{
    /**
     * Like a likeable model.
     *
     * @param  mixed  $likeable
     * @return Like
     */
    public function like($likeable)
    {
        return $this->likes()->create([
            'user_id' => $this->id,
            'likable_id' => $likeable->id,
            'likable_type' => get_class($likeable),
        ]);
    }

    /**
     * Unlike a likeable model.
     *
     * @param  mixed  $likeable
     * @return int
     */
    public function unlike($likeable)
    {
        return $this->likes()->where('likable_id', $likeable->id)
            ->where('likable_type', get_class($likeable))
            ->delete();
    }
}
