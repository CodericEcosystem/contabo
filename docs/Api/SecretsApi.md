# Contabo\ContaboSdk\SecretsApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createSecret**](SecretsApi.md#createsecret) | **POST** /v1/secrets | Create a new secret
[**deleteSecret**](SecretsApi.md#deletesecret) | **DELETE** /v1/secrets/{secretId} | Delete existing secret by id
[**retrieveSecret**](SecretsApi.md#retrievesecret) | **GET** /v1/secrets/{secretId} | Get specific secret by id
[**retrieveSecretList**](SecretsApi.md#retrievesecretlist) | **GET** /v1/secrets | List secrets
[**updateSecret**](SecretsApi.md#updatesecret) | **PATCH** /v1/secrets/{secretId} | Update specific secret by id

# **createSecret**
> \Contabo\ContaboSdk\Model\CreateSecretResponse createSecret($body, $x_request_id, $x_trace_id)

Create a new secret

Create a new secret in your account with attributes name, type and value. Attribute type can be password or ssh.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SecretsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\CreateSecretRequest(); // \Contabo\ContaboSdk\Model\CreateSecretRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->createSecret($body, $x_request_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecretsApi->createSecret: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\CreateSecretRequest**](../Model/CreateSecretRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CreateSecretResponse**](../Model/CreateSecretResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSecret**
> deleteSecret($x_request_id, $secret_id, $x_trace_id)

Delete existing secret by id

You can remove a specific secret from your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SecretsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$secret_id = 789; // int | The id of the secret
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $apiInstance->deleteSecret($x_request_id, $secret_id, $x_trace_id);
} catch (Exception $e) {
    echo 'Exception when calling SecretsApi->deleteSecret: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **secret_id** | **int**| The id of the secret |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

void (empty response body)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveSecret**
> \Contabo\ContaboSdk\Model\FindSecretResponse retrieveSecret($x_request_id, $secret_id, $x_trace_id)

Get specific secret by id

Get attributes values for a specific secret on your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SecretsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$secret_id = 789; // int | The id of the secret
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveSecret($x_request_id, $secret_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecretsApi->retrieveSecret: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **secret_id** | **int**| The id of the secret |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\FindSecretResponse**](../Model/FindSecretResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveSecretList**
> \Contabo\ContaboSdk\Model\ListSecretResponse retrieveSecretList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $type)

List secrets

List and filter all secrets in your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SecretsApi(
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
$name = "name_example"; // string | Filter secrets by name
$type = "type_example"; // string | Filter secrets by type

try {
    $result = $apiInstance->retrieveSecretList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecretsApi->retrieveSecretList: ', $e->getMessage(), PHP_EOL;
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
 **name** | **string**| Filter secrets by name | [optional]
 **type** | **string**| Filter secrets by type | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListSecretResponse**](../Model/ListSecretResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateSecret**
> \Contabo\ContaboSdk\Model\UpdateSecretResponse updateSecret($body, $x_request_id, $secret_id, $x_trace_id)

Update specific secret by id

Update attributes to your secret. Attributes are optional. If not set, the attributes will retain their original values. Only name and value can be updated.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SecretsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\UpdateSecretRequest(); // \Contabo\ContaboSdk\Model\UpdateSecretRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$secret_id = 789; // int | The id of the secret
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->updateSecret($body, $x_request_id, $secret_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecretsApi->updateSecret: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\UpdateSecretRequest**](../Model/UpdateSecretRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **secret_id** | **int**| The id of the secret |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\UpdateSecretResponse**](../Model/UpdateSecretResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

