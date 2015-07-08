<?php namespace Stevenmaguire\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\StandardUser;

/**
 * @property array $response
 * @property string $uid
 */
class User extends StandardUser
{
    /**
     * Get user id
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->uid;
    }

    /**
     * Get user email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->response['user']['email'] ?: null;
    }
}
