<?php

// config for TafadzwaLawrence/SocialBeings
return [
    'use_uuids' => false, // Default to false, can be set to true by the user

    'user_table' => env('USER_TABLE', 'users'), // Default to 'users'

    // Fully qualified class name of your User model. Will default to App\Models\User if not set.
    'user_model' => env('USER_MODEL', \App\Models\User::class),
];
