# Alternative Entity Base Class for CakePHP (PropertyEntity)

This is an alternative base class for your CakePHP entities. 
The class `PropertyEntity` extends from Cake's `Cake\ORM\Entity` class to stay compatible to CakePHP's core logic. 
This class gives you the ability to initialize/set class properties to your entities. 
It helps your IDE to get better code completion.


## Normal CakePHP Entity

````php
<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    // This does not work (or null etc.)
    protected $username = '123456789';
}
````

## PropertyEntity
````php
<?php
declare(strict_types=1); // recommend

namespace App\Model\Entity;

use PropertyEntity\Model\Entity\PropertyEntity;

class User extends PropertyEntity
{
    /**
     * This value will now be respected.
     * CakePHP's default Entity class ignores this value.
     *
     * @var string|null;
     */
    protected $username = '123456789';
    
    
    /**
     * @param string $value
     * @return User
     */
    public function setUsername(string $value): User
    {
        $this->set('username', $value);
        return $this;
    }


    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->get('username');
    }
}
````


## Normal CakePHP-Entity in Controller

````php
<?php
namespace App\Controller;

use App\Model\Entity\User;

class TestController extends AppController
{
    public function index()
    {
        $userEnity = new User();
        debug($userEnity);
        die();
    }
}
````

## Output ($this->username is missing)

````php
object(App\Model\Entity\User) {
    '[new]' => true,
    '[accessible]' => [
        '*' => true
    ],
    '[dirty]' => [],
    '[original]' => [],
    '[virtual]' => [],
    '[hasErrors]' => false,
    '[errors]' => [],
    '[invalid]' => [],
    '[repository]' => null
}
````

## With PropertyEntity in Controller

````php
object(App\Model\Entity\User) {
	'username' => '123456789',
	'[new]' => true,
	'[accessible]' => [
		'*' => true
	],
	'[dirty]' => [],
	'[original]' => [],
	'[virtual]' => [],
	'[hasErrors]' => false,
	'[errors]' => [],
	'[invalid]' => [],
	'[repository]' => null
}
````
