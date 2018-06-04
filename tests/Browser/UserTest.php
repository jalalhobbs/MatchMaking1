<?php

namespace Tests\Browser;

use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserTest extends DuskTestCase
{


    // redirect
    public function testUserRegistration()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/')
                ->assertSeeIn('.card-header', 'Welcome')
                ->clickLink('Register')
                ->type('firstName', 'FIRSTNAME')
                ->type('lastName', 'LASTNAME')
                ->type('email', 'fakedE@fake.com')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('Register')
                ->assertSee('Please complete your profile by entering your Date of Birth, Gender and your Profile Picture.');

            // add userId to $GLOBALS to be called in tearDown
            $GLOBALS['userId'] = $browser->script("return $(\"meta[name='userId']\").attr('content')")[0];

            // now Logout
            $browser->clickLink('FIRSTNAME LASTNAME')
                ->clickLink('Logout');
        });
    }

    public function testUserLoginAndProfileEntryWithBoundsTesting()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/')
                ->assertSeeIn('.card-header', 'Welcome')
                ->clickLink('Login')
                ->type('email', 'fakedE@fake.com')
                ->type('password', '12345678')
                ->press('Login')
//                ->assertPathIs('/profile/' . $GLOBALS['userId'] . '/edit')
                ->assertSee('Please complete your profile by entering your Date of Birth, Gender and your Profile Picture.')
                ->type('profilePicture', 'https://i.imgur.com/l1aYe.jpg')
                ->select('genderId', '1')
                ->script("$('#dob').val('1905-01-01')");

            $browser->press('Confirm')
                ->assertSee('The dob must be a date after 01-01-1905.')
                ->script("$('#dob').val('2001-06-04')");
            $browser->press('Confirm')
                ->assertSee('You must be 18 to use this site.')
                ->script("$('#dob').val('2000-06-03')");
            $browser->press('Confirm')
                ->assertSee('Your Profile has been updated.')
                ->clickLink('FIRSTNAME LASTNAME')
                ->clickLink('Logout');
        });
    }

    public function testUserLoginAndLookingForEntryWithBoundsTesting()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/')
                ->assertSeeIn('.card-header', 'Welcome')
                ->clickLink('Login')
                ->type('email', 'fakedE@fake.com')
                ->type('password', '12345678')
                ->press('Login')
                ->clickLink('FIRSTNAME LASTNAME')
                ->clickLink('Looking for.....')
                ->assertSeeIn('.card-header', "I'm Looking For Someone.....")
                ->type('targetMinAge', '17')
                ->press('Confirm')
                ->assertSee('Ages must be between 18 and 120 to use this site.')
                ->type('targetMinAge', '120')
                ->type('targetMaxAge', '18')
                ->press('Confirm')
                ->assertSee('The minimum age must not be greater than maximum age.')
                ->assertSee('The maximum age must not be less than minimum age.')
                ->type('targetMaxAge', '121')
                ->press('Confirm')
                ->assertSee('Ages must be between 18 and 120 to use this site.')
                ->type('targetMinHeight', '49')
                ->press('Confirm')
                ->assertSee('Heights entered should be betwen 50 to 300cm.')
                ->type('targetMinHeight', '')
                ->type('targetMaxHeight', '301')
                ->press('Confirm')
                ->assertSee('Heights entered should be betwen 50 to 300cm.')
                ->type('targetMinHeight', '300')
                ->type('targetMaxHeight', '50')
                ->press('Confirm')
                ->assertSee('The minimum height must not be greater than maximum height.')
                ->assertSee('The maximum height must not be less than minimum height.')
                ->type('targetMinHeight', '50')
                ->type('targetMaxHeight', '300')
                ->type('targetMinAge', '18')
                ->type('targetMaxAge', '120')
                ->press('Confirm')
                ->assertSee('Your Matchmaking "Looking for a....." information has been updated.')
                ->clickLink('FIRSTNAME LASTNAME')
                ->clickLink('Logout');

            // Must call this from last test that needs user,
            // tearDownAfterClass not functioning cleanly in Laravel due to ongoing issue #10808:
            // https://github.com/laravel/framework/issues/10808
            DB::table('users')->where('id', $GLOBALS['userId'])->delete();
        });
    }

}
