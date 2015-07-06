<?php namespace Stevenmaguire\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\UserInterface;

class User implements UserInterface
{
    /**
     * User email
     *
     * @var string
     */
    protected $email;

    /**
     * User userId
     *
     * @var string
     */
    protected $userId;

    /**
     * Create new user
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        array_walk($attributes, [$this, 'mergeAttribute']);
    }

    /**
     * Attempt to merge individual attributes with user properties
     *
     * @param  mixed   $value
     * @param  string  $key
     *
     * @return void
     */
    private function mergeAttribute($value, $key)
    {
        $method = 'set'.ucfirst($key);

        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    /**
     * Get user email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set user email
     *
     * @param  string $email
     *
     * @return this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get user userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set user userId
     *
     * @param  string $userId
     *
     * @return this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
}
