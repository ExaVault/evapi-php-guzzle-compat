<?php
/**
 * AccountApi
 * PHP version 5
 *
 * @category Class
 * @package  ExaVault
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * ExaVault API
 *
 * See our API reference documentation at https://www.exavault.com/developer/api-docs/
 *
 * OpenAPI spec version: 2.0
 * Contact: support@exavault.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.22
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace ExaVault\Api;

use GuzzleHttpEV\Client;
use GuzzleHttpEV\ClientInterface;
use GuzzleHttpEV\Exception\RequestException;
use GuzzleHttpEV\Psr7\MultipartStream;
use GuzzleHttpEV\Psr7\Request;
use GuzzleHttpEV\RequestOptions;
use ExaVault\ApiException;
use ExaVault\Configuration;
use ExaVault\HeaderSelector;
use ExaVault\ObjectSerializer;

/**
 * AccountApi Class Doc Comment
 *
 * @category Class
 * @package  ExaVault
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AccountApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getAccount
     *
     * Get account settings
     *
     * @param  string $evApiKey API Key required for the request (required)
     * @param  string $evAccessToken Access Token for the request (required)
     * @param  string $include Related records to include in the response. Valid option is **masterUser** (optional)
     *
     * @throws \ExaVault\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ExaVault\Model\AccountResponse
     */
    public function getAccount($evApiKey, $evAccessToken, $include = null)
    {
        list($response) = $this->getAccountWithHttpInfo($evApiKey, $evAccessToken, $include);
        return $response;
    }

    /**
     * Operation getAccountWithHttpInfo
     *
     * Get account settings
     *
     * @param  string $evApiKey API Key required for the request (required)
     * @param  string $evAccessToken Access Token for the request (required)
     * @param  string $include Related records to include in the response. Valid option is **masterUser** (optional)
     *
     * @throws \ExaVault\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \ExaVault\Model\AccountResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAccountWithHttpInfo($evApiKey, $evAccessToken, $include = null)
    {
        $returnType = '\ExaVault\Model\AccountResponse';
        $request = $this->getAccountRequest($evApiKey, $evAccessToken, $include);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\ExaVault\Model\AccountResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAccountAsync
     *
     * Get account settings
     *
     * @param  string $evApiKey API Key required for the request (required)
     * @param  string $evAccessToken Access Token for the request (required)
     * @param  string $include Related records to include in the response. Valid option is **masterUser** (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Promise\PromiseInterface
     */
    public function getAccountAsync($evApiKey, $evAccessToken, $include = null)
    {
        return $this->getAccountAsyncWithHttpInfo($evApiKey, $evAccessToken, $include)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAccountAsyncWithHttpInfo
     *
     * Get account settings
     *
     * @param  string $evApiKey API Key required for the request (required)
     * @param  string $evAccessToken Access Token for the request (required)
     * @param  string $include Related records to include in the response. Valid option is **masterUser** (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Promise\PromiseInterface
     */
    public function getAccountAsyncWithHttpInfo($evApiKey, $evAccessToken, $include = null)
    {
        $returnType = '\ExaVault\Model\AccountResponse';
        $request = $this->getAccountRequest($evApiKey, $evAccessToken, $include);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAccount'
     *
     * @param  string $evApiKey API Key required for the request (required)
     * @param  string $evAccessToken Access Token for the request (required)
     * @param  string $include Related records to include in the response. Valid option is **masterUser** (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Psr7\Request
     */
    protected function getAccountRequest($evApiKey, $evAccessToken, $include = null)
    {
        // verify the required parameter 'evApiKey' is set
        if ($evApiKey === null || (is_array($evApiKey) && count($evApiKey) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $evApiKey when calling getAccount'
            );
        }
        // verify the required parameter 'evAccessToken' is set
        if ($evAccessToken === null || (is_array($evAccessToken) && count($evAccessToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $evAccessToken when calling getAccount'
            );
        }

        $resourcePath = '/account';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($include !== null) {
            $queryParams['include'] = ObjectSerializer::toQueryValue($include, null);
        }
        // header params
        if ($evApiKey !== null) {
            $headerParams['ev-api-key'] = ObjectSerializer::toHeaderValue($evApiKey);
        }
        // header params
        if ($evAccessToken !== null) {
            $headerParams['ev-access-token'] = ObjectSerializer::toHeaderValue($evAccessToken);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttpEV\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttpEV\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttpEV\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttpEV\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateAccount
     *
     * Update account settings
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  \ExaVault\Model\UpdateAccountRequestBody $body Update Account Settings (optional)
     *
     * @throws \ExaVault\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ExaVault\Model\AccountResponse
     */
    public function updateAccount($evApiKey, $evAccessToken, $body = null)
    {
        list($response) = $this->updateAccountWithHttpInfo($evApiKey, $evAccessToken, $body);
        return $response;
    }

    /**
     * Operation updateAccountWithHttpInfo
     *
     * Update account settings
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  \ExaVault\Model\UpdateAccountRequestBody $body Update Account Settings (optional)
     *
     * @throws \ExaVault\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \ExaVault\Model\AccountResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateAccountWithHttpInfo($evApiKey, $evAccessToken, $body = null)
    {
        $returnType = '\ExaVault\Model\AccountResponse';
        $request = $this->updateAccountRequest($evApiKey, $evAccessToken, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\ExaVault\Model\AccountResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateAccountAsync
     *
     * Update account settings
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  \ExaVault\Model\UpdateAccountRequestBody $body Update Account Settings (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Promise\PromiseInterface
     */
    public function updateAccountAsync($evApiKey, $evAccessToken, $body = null)
    {
        return $this->updateAccountAsyncWithHttpInfo($evApiKey, $evAccessToken, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateAccountAsyncWithHttpInfo
     *
     * Update account settings
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  \ExaVault\Model\UpdateAccountRequestBody $body Update Account Settings (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Promise\PromiseInterface
     */
    public function updateAccountAsyncWithHttpInfo($evApiKey, $evAccessToken, $body = null)
    {
        $returnType = '\ExaVault\Model\AccountResponse';
        $request = $this->updateAccountRequest($evApiKey, $evAccessToken, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateAccount'
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  \ExaVault\Model\UpdateAccountRequestBody $body Update Account Settings (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Psr7\Request
     */
    protected function updateAccountRequest($evApiKey, $evAccessToken, $body = null)
    {
        // verify the required parameter 'evApiKey' is set
        if ($evApiKey === null || (is_array($evApiKey) && count($evApiKey) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $evApiKey when calling updateAccount'
            );
        }
        // verify the required parameter 'evAccessToken' is set
        if ($evAccessToken === null || (is_array($evAccessToken) && count($evAccessToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $evAccessToken when calling updateAccount'
            );
        }

        $resourcePath = '/account';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($evApiKey !== null) {
            $headerParams['ev-api-key'] = ObjectSerializer::toHeaderValue($evApiKey);
        }
        // header params
        if ($evAccessToken !== null) {
            $headerParams['ev-access-token'] = ObjectSerializer::toHeaderValue($evAccessToken);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttpEV\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttpEV\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttpEV\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttpEV\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
