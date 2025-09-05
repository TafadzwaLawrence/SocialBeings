<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use Exception;

trait CanFavor
{
    /**
     * Favor a favorable model.
     *
     * @param  mixed  $favorable
     * @return Favourite
     */
    public function favour($favorable)
    {
        // Ensure the model is favorable
        if (method_exists($favorable, 'isFavouredBy')) {
            return $favorable->favour($this->id);
        }

        throw new \Exception('The model is not favorable.');
    }

    /**
     * Unfavor a favorable model.
     *
     * @param  mixed  $favorable
     * @return int
     */
    public function unfavour($favorable)
    {
        // Ensure the model is favorable
        if (method_exists($favorable, 'isFavouredBy')) {
            return $favorable->unfavour($this->id);
        }

        throw new Exception('The model is not favourable.');
    }

    /**
     * Check if the user has favored a favorable model.
     *
     * @param  mixed  $favorable
     * @return bool
     */
    public function isFavourite($favorable)
    {
        // Ensure the model is favorable
        if (method_exists($favorable, 'isFavouredBy')) {
            return $favorable->isFavouredBy($this->id);
        }

        throw new \Exception('The model is not favourable.');
    }
}
