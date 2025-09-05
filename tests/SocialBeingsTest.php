<?php

namespace TafadzwaLawrence\SocialBeings\Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TafadzwaLawrence\SocialBeings\Traits\CanFollow;
use TafadzwaLawrence\SocialBeings\Traits\CanLike;
use TafadzwaLawrence\SocialBeings\Traits\CanFavor;
use TafadzwaLawrence\SocialBeings\Traits\CanSubscribe;
use TafadzwaLawrence\SocialBeings\Traits\Followable;
use TafadzwaLawrence\SocialBeings\Traits\Likeable;
use TafadzwaLawrence\SocialBeings\Traits\Favourable;
use TafadzwaLawrence\SocialBeings\Traits\Subscribable;

class TestUser extends Authenticatable
{
    use CanFollow, CanLike, CanFavor, CanSubscribe;

    protected $table = 'users';
    protected $fillable = ['name', 'email'];
}

class TestPost extends Model
{
    use Followable, Likeable, Favourable, Subscribable;

    protected $table = 'posts';
    protected $fillable = ['title', 'content'];
}

it('can load traits without errors', function () {
    $user = new TestUser();
    $post = new TestPost();

    expect($user)->toBeInstanceOf(TestUser::class);
    expect($post)->toBeInstanceOf(TestPost::class);
});

it('has correct trait methods', function () {
    $user = new TestUser();
    $post = new TestPost();

    // Check CanFollow methods
    expect(method_exists($user, 'follow'))->toBeTrue();
    expect(method_exists($user, 'unfollow'))->toBeTrue();
    expect(method_exists($user, 'isFollowing'))->toBeTrue();

    // Check Followable methods
    expect(method_exists($post, 'followers'))->toBeTrue();
    expect(method_exists($post, 'isFollowedBy'))->toBeTrue();
    expect(method_exists($post, 'follow'))->toBeTrue();
    expect(method_exists($post, 'unfollow'))->toBeTrue();

    // Check CanLike methods
    expect(method_exists($user, 'like'))->toBeTrue();
    expect(method_exists($user, 'unlike'))->toBeTrue();

    // Check Likeable methods
    expect(method_exists($post, 'likes'))->toBeTrue();
    expect(method_exists($post, 'isLikedBy'))->toBeTrue();
    expect(method_exists($post, 'like'))->toBeTrue();
    expect(method_exists($post, 'unlike'))->toBeTrue();

    // Check CanFavor methods
    expect(method_exists($user, 'favour'))->toBeTrue();
    expect(method_exists($user, 'unfavour'))->toBeTrue();
    expect(method_exists($user, 'isFavourite'))->toBeTrue();

    // Check Favourable methods
    expect(method_exists($post, 'favorites'))->toBeTrue();
    expect(method_exists($post, 'isFavouredBy'))->toBeTrue();
    expect(method_exists($post, 'favour'))->toBeTrue();
    expect(method_exists($post, 'unfavour'))->toBeTrue();

    // Check CanSubscribe methods
    expect(method_exists($user, 'subscribe'))->toBeTrue();
    expect(method_exists($user, 'unsubscribe'))->toBeTrue();
    expect(method_exists($user, 'isSubscribedTo'))->toBeTrue();

    // Check Subscribable methods
    expect(method_exists($post, 'subscriptions'))->toBeTrue();
    expect(method_exists($post, 'isSubscribedBy'))->toBeTrue();
    expect(method_exists($post, 'subscribe'))->toBeTrue();
    expect(method_exists($post, 'unsubscribe'))->toBeTrue();
});