<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use \App\Models\User;

class UserTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        $this->user = new User;
    }

    public function tearDown(): void
    {
        $this->user = null;
    }

    public function testThatWeCanGetTheFirstName()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
        $this->user->setLastName('Garret');

        $this->assertEquals($this->user->getLastName(), 'Garret');
    }

    public function testFullNameIsReturned()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garret');

        $this->assertEquals($this->user->getFullName(), 'Billy Garret');
    }

    public function testFistNameAndLastNameIsTrimmed()
    {
        $this->user->setFirstName('Billy    ');
        $this->user->setLastName('     Garret    ');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Garret');
    }

    public function testEmailAddressCanBeSet()
    {
        $email = 'billy@codecourse.com';

        $this->user->setEmail($email);

        $this->assertEquals($this->user->getEmail(), $email);
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garret');
        $this->user->setEmail('billy@codecourse.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Garret');
        $this->assertEquals($emailVariables['email'], 'billy@codecourse.com');
    }
}
