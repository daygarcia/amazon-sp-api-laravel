<?php

/**
 * MerchantFulfillmentApi.
 *
 * @author   Stefan Neuhaus / ClouSale
 */

/**
 * Selling Partner API for Merchant Fulfillment.
 *
 * The Selling Partner API for Merchant Fulfillment helps you build applications that let sellers purchase shipping for non-Prime and Prime orders using Amazon’s Buy Shipping Services.
 *
 * OpenAPI spec version: v0
 */

namespace DayGarcia\AmazonSPApiLaravel\Api;

use DayGarcia\AmazonSPApiLaravel\ApiException;
use DayGarcia\AmazonSPApiLaravel\Configuration;
use DayGarcia\AmazonSPApiLaravel\HeaderSelector;
use DayGarcia\AmazonSPApiLaravel\Helpers\SellingPartnerApiRequest;
use DayGarcia\AmazonSPApiLaravel\Models\FulfillmentInbound\GetShipmentsResponse;
use DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse;
use DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse;
use DayGarcia\AmazonSPApiLaravel\Models\Shipping\CancelShipmentResponse;
use DayGarcia\AmazonSPApiLaravel\Models\Shipping\CreateShipmentResponse;
use DayGarcia\AmazonSPApiLaravel\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;

/**
 * MerchantFulfillmentApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / ClouSale
 */
class MerchantFulfillmentApi
{
    use SellingPartnerApiRequest;

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

    public function __construct(Configuration $config)
    {
        $this->client = new Client();
        $this->config = $config;
        $this->headerSelector = new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation cancelShipment.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse
     */
    public function cancelShipment($shipment_id)
    {
        list($response) = $this->cancelShipmentWithHttpInfo($shipment_id);

        return $response;
    }

    /**
     * Operation cancelShipmentWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelShipmentWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentRequest($shipment_id);

        return $this->sendRequest($request, CancelShipmentResponse::class);
    }

    /**
     * Operation cancelShipmentAsync.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentAsync($shipment_id)
    {
        return $this->cancelShipmentAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelShipmentAsyncWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentAsyncWithHttpInfo($shipment_id)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse';
        $request = $this->cancelShipmentRequest($shipment_id);

        return $this->sendRequestAsync($request, CancelShipmentResponse::class);
    }

    /**
     * Create request for operation 'cancelShipment'.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelShipmentRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new InvalidArgumentException('Missing the required parameter $shipment_id when calling cancelShipment');
        }

        $resourcePath = '/mfn/v0/shipments/{shipmentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{' . 'shipmentId' . '}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'DELETE', $httpBody);
    }

    /**
     * Operation cancelShipmentOld.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse
     */
    public function cancelShipmentOld($shipment_id)
    {
        list($response) = $this->cancelShipmentOldWithHttpInfo($shipment_id);

        return $response;
    }

    /**
     * Operation cancelShipmentOldWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelShipmentOldWithHttpInfo($shipment_id)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse';
        $request = $this->cancelShipmentOldRequest($shipment_id);

        return $this->sendRequest($request, CancelShipmentResponse::class);
    }

    /**
     * Operation cancelShipmentOldAsync.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentOldAsync($shipment_id)
    {
        return $this->cancelShipmentOldAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelShipmentOldAsyncWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentOldAsyncWithHttpInfo($shipment_id)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CancelShipmentResponse';
        $request = $this->cancelShipmentOldRequest($shipment_id);

        return $this->sendRequestAsync($request, CancelShipmentResponse::class);
    }

    /**
     * Create request for operation 'cancelShipmentOld'.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelShipmentOldRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new InvalidArgumentException('Missing the required parameter $shipment_id when calling cancelShipmentOld');
        }

        $resourcePath = '/mfn/v0/shipments/{shipmentId}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{' . 'shipmentId' . '}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'PUT', $httpBody);
    }

    /**
     * Operation createShipment.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentResponse
     */
    public function createShipment($body)
    {
        list($response) = $this->createShipmentWithHttpInfo($body);

        return $response;
    }

    /**
     * Operation createShipmentWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createShipmentWithHttpInfo($body)
    {
        $request = $this->createShipmentRequest($body);

        return $this->sendRequest($request, CreateShipmentResponse::class);
    }

    /**
     * Operation createShipmentAsync.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function createShipmentAsync($body)
    {
        return $this->createShipmentAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createShipmentAsyncWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function createShipmentAsyncWithHttpInfo($body)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentResponse';
        $request = $this->createShipmentRequest($body);

        return $this->sendRequestAsync($request, CreateShipmentResponse::class);
    }

    /**
     * Create request for operation 'createShipment'.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createShipmentRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling createShipment');
        }

        $resourcePath = '/mfn/v0/shipments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getAdditionalSellerInputs.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse
     */
    public function getAdditionalSellerInputs($body)
    {
        list($response) = $this->getAdditionalSellerInputsWithHttpInfo($body);

        return $response;
    }

    /**
     * Operation getAdditionalSellerInputsWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAdditionalSellerInputsWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsRequest($body);

        return $this->sendRequest($request, GetAdditionalSellerInputsResponse::class);
    }

    /**
     * Operation getAdditionalSellerInputsAsync.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsAsync($body)
    {
        return $this->getAdditionalSellerInputsAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAdditionalSellerInputsAsyncWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsAsyncWithHttpInfo($body)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse';
        $request = $this->getAdditionalSellerInputsRequest($body);

        return $this->sendRequestAsync($request, GetAdditionalSellerInputsResponse::class);
    }

    /**
     * Create request for operation 'getAdditionalSellerInputs'.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAdditionalSellerInputsRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getAdditionalSellerInputs');
        }

        $resourcePath = '/mfn/v0/additionalSellerInputs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getAdditionalSellerInputsOld.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse
     */
    public function getAdditionalSellerInputsOld($body)
    {
        list($response) = $this->getAdditionalSellerInputsOldWithHttpInfo($body);

        return $response;
    }

    /**
     * Operation getAdditionalSellerInputsOldWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAdditionalSellerInputsOldWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsOldRequest($body);

        return $this->sendRequest($request, GetAdditionalSellerInputsResponse::class);
    }

    /**
     * Operation getAdditionalSellerInputsOldAsync.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsOldAsync($body)
    {
        return $this->getAdditionalSellerInputsOldAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAdditionalSellerInputsOldAsyncWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsOldAsyncWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsOldRequest($body);

        return $this->sendRequestAsync($request, GetAdditionalSellerInputsResponse::class);
    }

    /**
     * Create request for operation 'getAdditionalSellerInputsOld'.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAdditionalSellerInputsOldRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getAdditionalSellerInputsOld');
        }

        $resourcePath = '/mfn/v0/sellerInputs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getEligibleShipmentServices.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse
     */
    public function getEligibleShipmentServices($body)
    {
        list($response) = $this->getEligibleShipmentServicesWithHttpInfo($body);

        return $response;
    }

    /**
     * Operation getEligibleShipmentServicesWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEligibleShipmentServicesWithHttpInfo($body)
    {
        $request = $this->getEligibleShipmentServicesRequest($body);

        return $this->sendRequest($request, GetEligibleShipmentServicesResponse::class);
    }

    /**
     * Operation getEligibleShipmentServicesAsync.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesAsync($body)
    {
        return $this->getEligibleShipmentServicesAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEligibleShipmentServicesAsyncWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesAsyncWithHttpInfo($body)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse';
        $request = $this->getEligibleShipmentServicesRequest($body);

        return $this->sendRequestAsync($request, GetEligibleShipmentServicesResponse::class);
    }

    /**
     * Create request for operation 'getEligibleShipmentServices'.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getEligibleShipmentServicesRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getEligibleShipmentServices');
        }

        $resourcePath = '/mfn/v0/eligibleShippingServices';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getEligibleShipmentServicesOld.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse
     */
    public function getEligibleShipmentServicesOld($body)
    {
        list($response) = $this->getEligibleShipmentServicesOldWithHttpInfo($body);

        return $response;
    }

    /**
     * Operation getEligibleShipmentServicesOldWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEligibleShipmentServicesOldWithHttpInfo($body)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse';
        $request = $this->getEligibleShipmentServicesOldRequest($body);

        return $this->sendRequest($request, GetEligibleShipmentServicesResponse::class);
    }

    /**
     * Operation getEligibleShipmentServicesOldAsync.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesOldAsync($body)
    {
        return $this->getEligibleShipmentServicesOldAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEligibleShipmentServicesOldAsyncWithHttpInfo.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesOldAsyncWithHttpInfo($body)
    {
        $returnType = '\DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse';
        $request = $this->getEligibleShipmentServicesOldRequest($body);

        return $this->sendRequest($request, GetEligibleShipmentServicesResponse::class);
    }

    /**
     * Create request for operation 'getEligibleShipmentServicesOld'.
     *
     * @param \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getEligibleShipmentServicesOldRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getEligibleShipmentServicesOld');
        }

        $resourcePath = '/mfn/v0/eligibleServices';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getShipment.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetShipmentResponse
     */
    public function getShipment($shipment_id)
    {
        list($response) = $this->getShipmentWithHttpInfo($shipment_id);

        return $response;
    }

    /**
     * Operation getShipmentWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \DayGarcia\AmazonSPApiLaravel\Models\MerchantFulfillment\GetShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getShipmentWithHttpInfo($shipment_id)
    {
        $request = $this->getShipmentRequest($shipment_id);

        return $this->sendRequest($request, GetShipmentsResponse::class);
    }

    /**
     * Operation getShipmentAsync.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getShipmentAsync($shipment_id)
    {
        return $this->getShipmentAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getShipmentAsyncWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getShipmentAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->getShipmentRequest($shipment_id);

        return $this->sendRequestAsync($request, GetShipmentsResponse::class);
    }

    /**
     * Create request for operation 'getShipment'.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getShipmentRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new InvalidArgumentException('Missing the required parameter $shipment_id when calling getShipment');
        }

        $resourcePath = '/mfn/v0/shipments/{shipmentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{' . 'shipmentId' . '}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }
}
