<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class PaginationTest extends TestCase
{
    protected $path = 'http://pagination.laravel/users/';

    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testBootstrapTheme()
    {
        $this->assertTheme('bootstrap');
    }

    public function testFoundationTheme()
    {
        $this->assertTheme('foundation');
    }

    public function testMaterializeTheme()
    {
        $this->assertTheme('materialize');
    }

    protected function assertTheme($theme, $total = 55, $perPage = 10)
    {
        Config::set('blade-pagination.theme', $theme);

        factory(User::class, $total)->create();
        $users = User::paginate($perPage);

        $users->setPath($this->path . $theme . '/');

        $html = file_get_contents(__DIR__ . "/html/$theme.html");

        return $this->assertEquals(
            $this->removeWhitespaces($html),
            $this->removeWhitespaces($users->render())
        );
    }

    protected function removeWhitespaces($string)
    {
        return preg_replace('/\s+/', ' ', $string);
    }
}
