<?php

namespace Tests\Feature\Http\Controllers;

use App\Mail\PostSubscription;
use Database\Factories\PostFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PostSubscriptionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_subscription()
    {
        Mail::fake();

        $post = PostFactory::new()->create();

        $response = $this->post($post->subscriptionUrl(), ['email' => 'nam.nguyenthanh@saigontechnology.com']);

        $response->assertRedirect($post->url());

        Mail::assertSent(PostSubscription::class, function ($mail) {
            return $mail->hasTo('nam.nguyenthanh@saigontechnology.com');
        });
    }
}
