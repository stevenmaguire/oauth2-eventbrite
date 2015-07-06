<?php namespace Stevenmaguire\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class Eventbrite extends AbstractProvider
{
    /**
     * Get authorization headers used by this provider.
     *
     * Typically this is "Bearer" or "MAC". For more information see:
     * http://tools.ietf.org/html/rfc6749#section-7.1
     *
     * No default is provided, providers must overload this method to activate
     * authorization headers.
     *
     * @return array
     */
    protected function getAuthorizationHeaders($token = null)
    {
        return ['Authorization' => 'Bearer ' . $token];
    }

    /**
     * Get authorization url to begin OAuth flow
     *
     * @return string
     */
    public function getBaseAuthorizationUrl()
    {
        return 'https://www.eventbrite.com/oauth/authorize';
    }

    /**
     * Get access token url to retrieve token
     *
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://www.eventbrite.com/oauth/token';
    }

    /**
     * Get provider url to fetch user details
     *
     * @param  AccessToken $token
     *
     * @return string
     */
    public function getUserDetailsUrl(AccessToken $token)
    {
        return 'https://www.eventbrite.com/json/user_get';
    }

    /**
     * Get the default scopes used by this provider.
     *
     * This should not be a complete list of all scopes, but the minimum
     * required for the provider user interface!
     *
     * @return array
     */
    protected function getDefaultScopes()
    {
        return [];
    }

    /**
     * Check a provider response for errors.
     *
     * @throws IdentityProviderException
     * @param  ResponseInterface $response
     * @param  string $data Parsed response data
     * @return void
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {

    }

    /**
     * Generate a user object from a successful user details request.
     *
     * @param object $response
     * @param AccessToken $token
     * @return League\OAuth2\Client\Provider\UserInterface
     */
    protected function createUser(array $response, AccessToken $token)
    {
        $attributes = [
            'userId' => $response['user']['user_id'],
            'email' => $response['user']['email'],
        ];

        return new User($attributes);
    }
/*
    public function userUid($response, AccessToken $token)
    {
        return $response->user->user_id;
    }

    public function userEmail($response, AccessToken $token)
    {
        return isset($response->user->email) && $response->user->email ? $response->user->email : null;
    }

    public function userScreenName($response, AccessToken $token)
    {
        return $response->user->user_id;
    }
*/
}
