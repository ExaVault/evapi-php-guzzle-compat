<?php

/**
 * ExaVault API
 *
 * See our API reference documentation at https://www.exavault.com/developer/api-docs/
 *
 * OpenAPI spec version: 2.0
 * Contact: support@exavault.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.20
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
 * DownloadApi Class Doc Comment
 *
 * @category Class
 * @package  ExaVault
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DownloadApi
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

    private $resourcesApi;

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
        // For using the pre-generated ResourcesApi
        $this->resourcesApi = new ResourcesApi($this->client, $this->config);
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation download
     *
     * Download a file
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  string[] $resources Path of file or folder to be downloaded, starting from the root. Can also be an array of paths. (required)
     * @param  string $downloadArchiveName If zipping multiple files, the name of the zip file to create and download. (optional)
     *
     * @throws \ExaVault\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function download($evApiKey, $evAccessToken, $resources, $downloadArchiveName = null)
    {
        /** ExaVault Customization
         * If we aren't passing in an array of resources, use the Swagger-generated ResourcesApi::download method instead
         */
        if (!is_array($resources)) {
            return $this->resourcesApi->download($evApiKey, $evAccessToken, $resources, $downloadArchiveName);
        }
        /** End ExaVault Customization */
        list($response) = $this->downloadWithHttpInfo($evApiKey, $evAccessToken, $resources, $downloadArchiveName);
        return $response;
    }

    /**
     * Operation downloadWithHttpInfo
     *
     * Download a file
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  string[] $resources Path of file or folder to be downloaded, starting from the root. Can also be an array of paths. (required)
     * @param  string $downloadArchiveName If zipping multiple files, the name of the zip file to create and download. (optional)
     *
     * @throws \ExaVault\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function downloadWithHttpInfo($evApiKey, $evAccessToken, $resources, $downloadArchiveName = null)
    {
        /** ExaVault Customization
         * If we aren't passing in an array of resources, use the Swagger-generated ResourcesApi::downloadWithHttpInfo method instead
         */
        if (!is_array($resources)) {
            return $this->resourcesApi->downloadWithHttpInfo($evApiKey, $evAccessToken, $resources, $downloadArchiveName);
        }
        /** End ExaVault Customization */
        $returnType = 'string';
        $request = $this->downloadRequest($evApiKey, $evAccessToken, $resources, $downloadArchiveName);

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
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation downloadAsync
     *
     * Download a file
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  string[] $resources Path of file or folder to be downloaded, starting from the root. Can also be an array of paths. (required)
     * @param  string $downloadArchiveName If zipping multiple files, the name of the zip file to create and download. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Promise\PromiseInterface
     */
    public function downloadAsync($evApiKey, $evAccessToken, $resources, $downloadArchiveName = null)
    {
        /** ExaVault Customization
         * If we aren't passing in an array of resources, use the Swagger-generated ResourcesApi::downloadAsync method instead
         */
        if (!is_array($resources)) {
            return $this->resourcesApi->downloadAsync($evApiKey, $evAccessToken, $resources, $downloadArchiveName);
        }
        /** End ExaVault Customization */
        return $this->downloadAsyncWithHttpInfo($evApiKey, $evAccessToken, $resources, $downloadArchiveName)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation downloadAsyncWithHttpInfo
     *
     * Download a file
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  string[] $resources Path of file or folder to be downloaded, starting from the root. Can also be an array of paths. (required)
     * @param  string $downloadArchiveName If zipping multiple files, the name of the zip file to create and download. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Promise\PromiseInterface
     */
    public function downloadAsyncWithHttpInfo($evApiKey, $evAccessToken, $resources, $downloadArchiveName = null)
    {
        /** ExaVault Customization
         * If we aren't passing in an array of resources, use the Swagger-generated ResourcesApi::downloadAsyncWithHttpInfo method instead
         */
        if (!is_array($resources)) {
            return $this->resourcesApi->downloadAsyncWithHttpInfo($evApiKey, $evAccessToken, $resources, $downloadArchiveName);
        }
        /** End ExaVault Customization */        
        $returnType = 'string';
        $request = $this->downloadRequest($evApiKey, $evAccessToken, $resources, $downloadArchiveName);

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
     * Create request for operation 'download'
     *
     * @param  string $evApiKey API Key required to make the API call. (required)
     * @param  string $evAccessToken Access token required to make the API call. (required)
     * @param  string[] $resources Path of file or folder to be downloaded, starting from the root. Can also be an array of paths. (required)
     * @param  string $downloadArchiveName If zipping multiple files, the name of the zip file to create and download. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttpEV\Psr7\Request
     */
    protected function downloadRequest($evApiKey, $evAccessToken, $resources, $downloadArchiveName = null)
    {
        // verify the required parameter 'evApiKey' is set
        if ($evApiKey === null || (is_array($evApiKey) && count($evApiKey) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $evApiKey when calling download'
            );
        }
        // verify the required parameter 'evAccessToken' is set
        if ($evAccessToken === null || (is_array($evAccessToken) && count($evAccessToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $evAccessToken when calling download'
            );
        }
        // verify the required parameter 'resources' is set
        if ($resources === null || (is_array($resources) && count($resources) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $resources when calling download'
            );
        }

        $resourcePath = '/resources/download';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($resources)) {
            /**
             * ExaVault Customization 
             * 
             * The ExaVault api expects a bracketed representation of arrray paramters in a GET request, such as 
             * ?resources[]=id:3&resources[]=id:4&resources[]:id5 
             * The swagger-codegen library will not generate PHP code with this kind of query string, so we have
             * customized this method to make the $resources parameter a 2-dimensonal array
             */
            if (!array_key_exists('resources[]', $resources)) {
                $resources = ['resources[]' => $resources];
            }
            /** End ExaVault Customization */
            $resources = ObjectSerializer::serializeCollection($resources, 'multi', true);
        }
        // query params
        if ($downloadArchiveName !== null) {
            $queryParams['downloadArchiveName'] = ObjectSerializer::toQueryValue($downloadArchiveName);
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
                ['application/octet-stream', 'application/zip', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream', 'application/zip', 'application/json'],
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
        /**
         * ExaVault Customization
         * 
         * We are appending our custom string for resources to the end of the existing query string
         */
        $query .= ($query ? "&{$resources}" : $resources);
        /** End ExaVault Customization */
        return new Request(
            'GET',
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
