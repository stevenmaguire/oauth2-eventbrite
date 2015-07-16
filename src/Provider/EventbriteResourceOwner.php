<?php namespace Stevenmaguire\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\GenericResourceOwner;

/**
 * @property array $response
 * @property string $uid
 */
class EventbriteResourceOwner extends GenericResourceOwner
{
    /**
     * Get user id
     *
     * @return string
     */
    public function getId()
    {
        return $this->resourceOwnerId;
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
