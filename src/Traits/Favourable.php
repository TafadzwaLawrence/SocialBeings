<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Favourite;

trait Favourable
{
    /**
     * Get all of the favorites for the model.
     */
    public function favorites()
    {
        return $this->morphMany(Favourite::class, 'favorable');
    }

    /**
     * Determine if the model is favored by a given user.
     *
     * @param  int  $userId
     * @return bool
     */
    public function isFavouredBy($userId)
    {
        return $this->favorites()->where('favor_id', $userId)->exists();
    }

    /**
     * Favor the model.
     *
     * @param  int  $userId
     * @return Favourite
     */
    public function favour($userId)
    {
        return $this->favorites()->create(['favor_id' => $userId]);
    }

    /**
     * Unfavor the model.
     *
     * @param  int  $userId
     * @return int
     */
    public function unfavour($userId)
    {
        return $this->favorites()->where('favor_id', $userId)->delete();
    }

    /**
     * Accessor to get the count of favorites.
     *
     * @return int
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites()->count();
    }

    /**
     * Accessor to get the formatted count of favorites.
     *
     * @return string
     */
    public function getFormattedFavoritesCountAttribute()
    {
        $count = $this->favorites_count; // Use the favorites count accessor

        if ($count >= 1000) {
            return round($count / 1000, 1).'K'; // Format as K
        }

        return $count; // Return the count as is if less than 1000
    }
}
