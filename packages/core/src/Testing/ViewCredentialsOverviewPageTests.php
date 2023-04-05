<?php

namespace ClaudioDekker\LaravelAuth\Testing;

trait ViewCredentialsOverviewPageTests
{
    /** @test */
    public function the_credentials_overview_page_can_be_viewed(): void
    {
        $this->enableSudoMode();

        $response = $this->authenticated()->get(route('auth.settings'));

        $response->assertOk();
    }

    /** @test */
    public function the_credentials_overview_page_cannot_be_viewed_when_no_longer_in_sudo_mode(): void
    {
        $response = $this->authenticated()->get(route('auth.settings'));

        $response->assertRedirect(route('auth.sudo_mode'));
    }

    /** @test */
    public function the_credentials_overview_page_cannot_be_viewed_when_not_authenticated(): void
    {
        $response = $this->get(route('auth.settings'));

        $response->assertRedirect(route('login'));
    }
}
