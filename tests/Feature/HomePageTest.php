<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * Teste para a pagina inicial do projeto
     *
     * @return void
     */
    public function test_home_page_is_deplayed(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('home')
            ->assertSee('My Progress');
    }
}
