# This is my package socialbeings

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tafadzwa/socialbeings.svg?style=flat-square)](https://packagist.org/packages/tafadzwa/socialbeings)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tafadzwa/socialbeings/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tafadzwa/socialbeings/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tafadzwa/socialbeings/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tafadzwa/socialbeings/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tafadzwa/socialbeings.svg?style=flat-square)](https://packagist.org/packages/tafadzwa/socialbeings)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/SocialBeings.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/SocialBeings)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require tafadzwa/socialbeings
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="socialbeings-migrations"
php artisan migrate
```

You can publish the config file with:s

```bash
php artisan vendor:publish --tag="socialbeings-config"
```

This is the contents of the published config file:

```php
return [
    'use_uuids' => false, // Default to false, can be set to true by the user

    'user_table' => env('USER_TABLE', 'users'), // Default to 'users'
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="socialbeings-views"
```

## Following

You can follow any model by using import the CanFollow Trait which enable a trait to follow another model

```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Likesocialjson\Likesocial\Traits\CanFollow;

class User extends Authenticatable
{
    use CanFollow;
    // Other model properties and methods...
}
```

Then the model you want to follow add the following trait

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Likesocialjson\Likesocial\Traits\Followable;

class Post extends Model
{
    use Followable;

    // Other model properties and methods...
}
```

Use Cases

```php

    $user = User::find(1);
    $post = Post::find(1);

    $user->follow($post);
    $user->unfollow($post);
    $user->isFollowedBy($post);

    $post->followers(); //Retrieve all the followers
    $post->getFollowersCountAttribute();  // Count the number of followers
    $post->getFormattedFollowersCountAttribute();  // Formats using 10K if count is > 1000

```

## Likes

You can like any model by using import the CanFollow Trait which enable a trait to follow another model

```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Likesocialjson\Likesocial\Traits\CanLike;

class User extends Authenticatable
{
    use CanLike;
    // Other model properties and methods...
}
```

Then the model you want to follow add the following trait

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Likesocialjson\Likesocial\Traits\Likable;

class Post extends Model
{
    use Likable;

    // Other model properties and methods...
}
```

Use case

```php

    $user = User::find(1);
    $post = Post::find(1);

    $user->like($post);
    $user->unlike($post);

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tafadzwa Lawrence](https://github.com/Tafadzwa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
