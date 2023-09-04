# Contabo\ContaboSdk\PrivateNetworksApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**assignInstancePrivateNetwork**](PrivateNetworksApi.md#assigninstanceprivatenetwork) | **POST** /v1/private-networks/{privateNetworkId}/instances/{instanceId} | Add instance to a Private Network
[**createPrivateNetwork**](PrivateNetworksApi.md#createprivatenetwork) | **POST** /v1/private-networks | Create a new Private Network
[**deletePrivateNetwork**](PrivateNetworksApi.md#deleteprivatenetwork) | **DELETE** /v1/private-networks/{privateNetworkId} | Delete existing Private Network by id
[**patchPrivateNetwork**](PrivateNetworksApi.md#patchprivatenetwork) | **PATCH** /v1/private-networks/{privateNetworkId} | Update a Private Network by id
[**retrievePrivateNetwork**](PrivateNetworksApi.md#retrieveprivatenetwork) | **GET** /v1/private-networks/{privateNetworkId} | Get specific Private Network by id
[**retrievePrivateNetworkList**](PrivateNetworksApi.md#retrieveprivatenetworklist) | **GET** /v1/private-networks | List Private Networks
[**unassignInstancePrivateNetwork**](PrivateNetworksApi.md#unassigninstanceprivatenetwork) | **DELETE** /v1/private-networks/{privateNetworkId}/instances/{instanceId} | Remove instance from a Private Network

# **assignInstancePrivateNetwork**
> \Contabo\ContaboSdk\Model\AssignInstancePrivateNetworkResponse assignInstancePrivateNetwork($x_request_id, $private_network_id, $instance_id, $x_trace_id)

Add instance to a Private Network

Add a specific instance to a Private Network

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$private_network_id = 789; // int | The identifier of the Private Network
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->assignInstancePrivateNetwork($x_request_id, $private_network_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->assignInstancePrivateNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **private_network_id** | **int**| The identifier of the Private Network |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\AssignInstancePrivateNetworkResponse**](../Model/AssignInstancePrivateNetworkResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createPrivateNetwork**
> \Contabo\ContaboSdk\Model\CreatePrivateNetworkResponse createPrivateNetwork($body, $x_request_id, $x_trace_id)

Create a new Private Network

Create a new Private Network in your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\CreatePrivateNetworkRequest(); // \Contabo\ContaboSdk\Model\CreatePrivateNetworkRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->createPrivateNetwork($body, $x_request_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->createPrivateNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\CreatePrivateNetworkRequest**](../Model/CreatePrivateNetworkRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CreatePrivateNetworkResponse**](../Model/CreatePrivateNetworkResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletePrivateNetwork**
> deletePrivateNetwork($x_request_id, $private_network_id, $x_trace_id)

Delete existing Private Network by id

Delete existing Virtual Private Cloud by id and automatically unassign all instances from it

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$private_network_id = 789; // int | The identifier of the Private Network
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $apiInstance->deletePrivateNetwork($x_request_id, $private_network_id, $x_trace_id);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->deletePrivateNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **private_network_id** | **int**| The identifier of the Private Network |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

void (empty response body)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchPrivateNetwork**
> \Contabo\ContaboSdk\Model\PatchPrivateNetworkResponse patchPrivateNetwork($body, $x_request_id, $private_network_id, $x_trace_id)

Update a Private Network by id

Update a Private Network by id in your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\PatchPrivateNetworkRequest(); // \Contabo\ContaboSdk\Model\PatchPrivateNetworkRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$private_network_id = 789; // int | The identifier of the Private Network
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->patchPrivateNetwork($body, $x_request_id, $private_network_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->patchPrivateNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\PatchPrivateNetworkRequest**](../Model/PatchPrivateNetworkRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **private_network_id** | **int**| The identifier of the Private Network |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\PatchPrivateNetworkResponse**](../Model/PatchPrivateNetworkResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrievePrivateNetwork**
> \Contabo\ContaboSdk\Model\FindPrivateNetworkResponse retrievePrivateNetwork($x_request_id, $private_network_id, $x_trace_id)

Get specific Private Network by id

Get attributes values to a specific Private Network on your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$private_network_id = 789; // int | The identifier of the Private Network
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrievePrivateNetwork($x_request_id, $private_network_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->retrievePrivateNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **private_network_id** | **int**| The identifier of the Private Network |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\FindPrivateNetworkResponse**](../Model/FindPrivateNetworkResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrievePrivateNetworkList**
> \Contabo\ContaboSdk\Model\ListPrivateNetworkResponse retrievePrivateNetworkList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $instance_ids, $region, $data_center)

List Private Networks

List and filter all Private Networks in your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.
$page = 789; // int | Number of page to be fetched.
$size = 789; // int | Number of elements per page.
$order_by = array("order_by_example"); // string[] | Specify fields and ordering (ASC for ascending, DESC for descending) in following format `field:ASC|DESC`.
$name = "name_example"; // string | The name of the Private Network
$instance_ids = "instance_ids_example"; // string | Comma separated instances identifiers
$region = "region_example"; // string | The slug of the region where your Private Network is located
$data_center = "data_center_example"; // string | The data center where your Private Network is located

try {
    $result = $apiInstance->retrievePrivateNetworkList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $instance_ids, $region, $data_center);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->retrievePrivateNetworkList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]
 **page** | **int**| Number of page to be fetched. | [optional]
 **size** | **int**| Number of elements per page. | [optional]
 **order_by** | [**string[]**](../Model/string.md)| Specify fields and ordering (ASC for ascending, DESC for descending) in following format &#x60;field:ASC|DESC&#x60;. | [optional]
 **name** | **string**| The name of the Private Network | [optional]
 **instance_ids** | **string**| Comma separated instances identifiers | [optional]
 **region** | **string**| The slug of the region where your Private Network is located | [optional]
 **data_center** | **string**| The data center where your Private Network is located | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListPrivateNetworkResponse**](../Model/ListPrivateNetworkResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unassignInstancePrivateNetwork**
> \Contabo\ContaboSdk\Model\UnassignInstancePrivateNetworkResponse unassignInstancePrivateNetwork($x_request_id, $private_network_id, $instance_id, $x_trace_id)

Remove instance from a Private Network

Remove a specific instance from a Private Network

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$private_network_id = 789; // int | The identifier of the Private Network
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->unassignInstancePrivateNetwork($x_request_id, $private_network_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksApi->unassignInstancePrivateNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **private_network_id** | **int**| The identifier of the Private Network |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\UnassignInstancePrivateNetworkResponse**](../Model/UnassignInstancePrivateNetworkResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

