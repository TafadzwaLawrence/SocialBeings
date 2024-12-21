<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Favourite;

trait Favourable
{
    /**
     * Get all of the favoriteers for the model.
     */
    public function favorites()
    {
        return $this->morphMany(Favourite::class, 'favorable');
    }

    /**
     * Determine if the model is favoriteed by a given user.
     *
     * @param  int  $userId
     * @return bool
     */
    public function isfavouredBy($userId)
    {
        return $this->favorites()->where('favorable_id', $userId)->exists();
    }

    /**
     * favorite the model.
     *
     * @param  int  $userId
     * @return favorite
     */
    public function favour($userId)
    {
        return $this->favorites()->create(['favorable_id' => $userId]);
    }

    /**
     * Unfavorite the model.
     *
     * @param  int  $userId
     * @return int
     */
    public function unfavour($userId)
    {
        return $this->favorites()->where('favorable_id', $userId)->delete();
    }

    /**
     * Accessor to get the count of favoriteers.
     *
     * @return int
     */
    public function getfavouriteersCountAttribute()
    {
        return $this->favorites()->count();
    }

    /**
     * Accessor to get the formatted count of favoriteers.
     *
     * @return string
     */
    public function getFormattedfavoriteersCountAttribute()
    {
        $count = $this->favourites_count; // Use the favoriteers count accessor

        if ($count >= 1000) {
            return round($count / 1000, 1).'K'; // Format as K
        }

        return $count; // Return the count as is if less than 1000
    }
}
