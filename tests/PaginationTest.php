<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class PaginationTest extends TestCase
{
    protected $path = 'http://pagination.laravel/users/';

    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_bootstrap_theme()
    {
        $this->assertTheme('bootstrap');
    }

    public function test_foundation_theme()
    {
        $this->assertTheme('foundation');
    }

    public function test_materialize_theme()
    {
        $this->assertTheme('materialize');
    }

    public function test_uikit_theme()
    {
        $this->assertTheme('uikit');
    }

    public function test_dont_show_if_theres_only_one_page()
    {
        $this->assertEmpty(
            $this->renderPagination(9, 10)
        );
    }

    protected function renderPagination($total = 55, $perPage = 10, $theme = 'bootstrap')
    {
        factory(User::class, $total)->create();
        $users = User::paginate($perPage);

        $users->setPath($this->path . $theme . '/');

        return $users->render();
    }

    protected function assertTheme($theme, $total = 55, $perPage = 10)
    {
        Config::set('blade-pagination.theme', $theme);

        $html = file_get_contents(__DIR__ . "/html/$theme.html");
        $pagination = $this->renderPagination($total, $perPage, $theme);

        return $this->assertEquals(
            $this->removeWhitespaces($html),
            $this->removeWhitespaces($pagination)
        );
    }

    protected function removeWhitespaces($string)
    {
        return preg_replace('/\s+/', ' ', $string);
    }

}
