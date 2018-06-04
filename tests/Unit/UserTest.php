<?php
//
//namespace Tests\Unit;
//
//use App\User;
//use Tests\TestCase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Laravel\Dusk\Dusk;
//use Laravel\Dusk\Chrome;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//
//class UserTest extends DuskTestCase
//{
//    use DatabaseMigrations;
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
////    public function testExample()
////    {
////        $this->assertTrue(false);
////    }
//
//    public function testBasicUser() {
//        $user = new User([
//            'id' => 10001,
//            'firstName' => 'First',
//            'lastName' => 'Last',
//            'email' => 'fake10001@fake.com',
//            'password' => '12345678',
//            'profilePicture' => 'https://www.google.com',
//            'genderId' => 1,
//            'targetGenderId' => 2
//        ]);
//        $this->browse(function ($browser) use ($user) {
//            $browser->visit('/login')
//                ->type('email', $user->email)
//                ->type('password', '12345678')
//                ->press('Login')
//                ->assertPathIs('/home');
//        });
//    }
//}
