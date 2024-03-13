<?php

namespace Tests\Feature\Http\Controllers;

use Database\Factories\PostFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_index_page(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function test_post_index_page_with_links_to_the_posts()
    {
        $firstPost = PostFactory::new()->create();
        $secondPost = PostFactory::new()->create();

        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee($firstPost->title);
        $response->assertSee($firstPost->url());
        $response->assertSee($secondPost->title);
        $response->assertSee($secondPost->url());
    }

    public function test_post_show_page()
    {
        $firstPost = PostFactory::new()->create();

        $response = $this->get($firstPost->url());

        $response->assertStatus(200);
        $response->assertSee($firstPost->title);
        $response->assertSee($firstPost->body);
    }
}
