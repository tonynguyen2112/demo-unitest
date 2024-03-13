<?php

namespace Tests\Feature\Models;

use Database\Factories\PostFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_post_url()
    {
        $post = PostFactory::new()->create();

        $postUrl = url('posts/' . $post->getKey());

        $this->assertEquals($postUrl, $post->url());
    }

    public function test_post_subscription_url()
    {
        $post = PostFactory::new()->create();

        $postUrl = url('posts/' . $post->getKey(). '/subscription');

        $this->assertEquals($postUrl, $post->subscriptionUrl());
    }
}
