<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

trait CanFriend
{
    /**
     * Send a friend request to a friendable model.
     *
     * @param  mixed  $friendable
     * @return Friend
     */
    public function sendFriendRequest($friendable)
    {
        return $this->friendsTo()->attach($friendable->id, ['accepted' => false]);
    }

    /**
     * Accept a friend request from a friendable model.
     *
     * @param  mixed  $friendable
     * @return bool
     */
    public function acceptFriendRequest($friendable)
    {
        return $this->friendsFrom()->updateExistingPivot($friendable->id, ['accepted' => true]);
    }

    /**
     * Decline a friend request from a friendable model.
     *
     * @param  mixed  $friendable
     * @return int
     */
    public function declineFriendRequest($friendable)
    {
        return $this->friendsFrom()->detach($friendable->id);
    }

    /**
     * Unfriend a friendable model.
     *
     * @param  mixed  $friendable
     * @return int
     */
    public function unfriend($friendable)
    {
        return $this->friendsTo()->detach($friendable->id);
    }
}
