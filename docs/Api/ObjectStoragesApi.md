# Contabo\ContaboSdk\ObjectStoragesApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**cancelObjectStorage**](ObjectStoragesApi.md#cancelobjectstorage) | **PATCH** /v1/object-storages/{objectStorageId}/cancel | Cancels the specified object storage at the next possible date
[**createObjectStorage**](ObjectStoragesApi.md#createobjectstorage) | **POST** /v1/object-storages | Create a new object storage
[**retrieveDataCenterList**](ObjectStoragesApi.md#retrievedatacenterlist) | **GET** /v1/data-centers | List data centers
[**retrieveObjectStorage**](ObjectStoragesApi.md#retrieveobjectstorage) | **GET** /v1/object-storages/{objectStorageId} | Get specific object storage by its id
[**retrieveObjectStorageList**](ObjectStoragesApi.md#retrieveobjectstoragelist) | **GET** /v1/object-storages | List all your object storages
[**retrieveObjectStoragesStats**](ObjectStoragesApi.md#retrieveobjectstoragesstats) | **GET** /v1/object-storages/{objectStorageId}/stats | List usage statistics about the specified object storage
[**updateObjectStorage**](ObjectStoragesApi.md#updateobjectstorage) | **PATCH** /v1/object-storages/{objectStorageId} | Modifies the display name of object storage
[**upgradeObjectStorage**](ObjectStoragesApi.md#upgradeobjectstorage) | **POST** /v1/object-storages/{objectStorageId}/resize | Upgrade object storage size resp. update autoscaling settings.

# **cancelObjectStorage**
> \Contabo\ContaboSdk\Model\CancelObjectStorageResponse cancelObjectStorage($x_request_id, $object_storage_id, $x_trace_id)

Cancels the specified object storage at the next possible date

Cancels the specified object storage at the next possible date. Please be aware of your contract periods.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$object_storage_id = "object_storage_id_example"; // string | The identifier of the object storage.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->cancelObjectStorage($x_request_id, $object_storage_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->cancelObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **object_storage_id** | **string**| The identifier of the object storage. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CancelObjectStorageResponse**](../Model/CancelObjectStorageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createObjectStorage**
> \Contabo\ContaboSdk\Model\CreateObjectStorageResponse createObjectStorage($body, $x_request_id, $x_trace_id)

Create a new object storage

Create / purchase a new object storage in your account. Please note that you can only buy one object storage per location. You can actually increase the object storage space via `POST` to `/v1/object-storages/{objectStorageId}/resize`

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\CreateObjectStorageRequest(); // \Contabo\ContaboSdk\Model\CreateObjectStorageRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->createObjectStorage($body, $x_request_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->createObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\CreateObjectStorageRequest**](../Model/CreateObjectStorageRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CreateObjectStorageResponse**](../Model/CreateObjectStorageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveDataCenterList**
> \Contabo\ContaboSdk\Model\ListDataCenterResponse retrieveDataCenterList($x_request_id, $x_trace_id, $page, $size, $order_by, $slug, $name, $region_name, $region_slug)

List data centers

List all data centers and their corresponding regions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
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
$slug = "slug_example"; // string | Filter as match for data centers.
$name = "name_example"; // string | Filter for Object Storages regions.
$region_name = "region_name_example"; // string | Filter for Object Storage region names.
$region_slug = "region_slug_example"; // string | Filter for Object Storage region slugs.

try {
    $result = $apiInstance->retrieveDataCenterList($x_request_id, $x_trace_id, $page, $size, $order_by, $slug, $name, $region_name, $region_slug);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->retrieveDataCenterList: ', $e->getMessage(), PHP_EOL;
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
 **slug** | **string**| Filter as match for data centers. | [optional]
 **name** | **string**| Filter for Object Storages regions. | [optional]
 **region_name** | **string**| Filter for Object Storage region names. | [optional]
 **region_slug** | **string**| Filter for Object Storage region slugs. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListDataCenterResponse**](../Model/ListDataCenterResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveObjectStorage**
> \Contabo\ContaboSdk\Model\FindObjectStorageResponse retrieveObjectStorage($x_request_id, $object_storage_id, $x_trace_id)

Get specific object storage by its id

Get data for a specific object storage on your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$object_storage_id = "object_storage_id_example"; // string | The identifier of the object storage.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveObjectStorage($x_request_id, $object_storage_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->retrieveObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **object_storage_id** | **string**| The identifier of the object storage. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\FindObjectStorageResponse**](../Model/FindObjectStorageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveObjectStorageList**
> \Contabo\ContaboSdk\Model\ListObjectStorageResponse retrieveObjectStorageList($x_request_id, $x_trace_id, $page, $size, $order_by, $data_center_name, $s3_tenant_id, $region)

List all your object storages

List and filter all object storages in your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
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
$data_center_name = "data_center_name_example"; // string | Filter for Object Storage locations.
$s3_tenant_id = "s3_tenant_id_example"; // string | Filter for Object Storage S3 tenantId.
$region = "region_example"; // string | Filter for Object Storage by regions. Available regions: EU, US-central, SIN

try {
    $result = $apiInstance->retrieveObjectStorageList($x_request_id, $x_trace_id, $page, $size, $order_by, $data_center_name, $s3_tenant_id, $region);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->retrieveObjectStorageList: ', $e->getMessage(), PHP_EOL;
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
 **data_center_name** | **string**| Filter for Object Storage locations. | [optional]
 **s3_tenant_id** | **string**| Filter for Object Storage S3 tenantId. | [optional]
 **region** | **string**| Filter for Object Storage by regions. Available regions: EU, US-central, SIN | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListObjectStorageResponse**](../Model/ListObjectStorageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveObjectStoragesStats**
> \Contabo\ContaboSdk\Model\ObjectStoragesStatsResponse retrieveObjectStoragesStats($x_request_id, $object_storage_id, $x_trace_id)

List usage statistics about the specified object storage

List usage statistics about the specified object storage such as the number of objects uploaded / created, used object storage space. Please note that the usage statistics are updated regularly and are not live usage statistics.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$object_storage_id = "object_storage_id_example"; // string | The identifier of the object storage.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveObjectStoragesStats($x_request_id, $object_storage_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->retrieveObjectStoragesStats: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **object_storage_id** | **string**| The identifier of the object storage. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ObjectStoragesStatsResponse**](../Model/ObjectStoragesStatsResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateObjectStorage**
> \Contabo\ContaboSdk\Model\CancelObjectStorageResponse updateObjectStorage($body, $x_request_id, $object_storage_id, $x_trace_id)

Modifies the display name of object storage

Modifies the display name of object storage. Display name must be unique.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\PatchObjectStorageRequest(); // \Contabo\ContaboSdk\Model\PatchObjectStorageRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$object_storage_id = "object_storage_id_example"; // string | The identifier of the object storage.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->updateObjectStorage($body, $x_request_id, $object_storage_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->updateObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\PatchObjectStorageRequest**](../Model/PatchObjectStorageRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **object_storage_id** | **string**| The identifier of the object storage. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CancelObjectStorageResponse**](../Model/CancelObjectStorageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **upgradeObjectStorage**
> \Contabo\ContaboSdk\Model\UpgradeObjectStorageResponse upgradeObjectStorage($body, $x_request_id, $object_storage_id, $x_trace_id)

Upgrade object storage size resp. update autoscaling settings.

Upgrade object storage size. You can also adjust the autoscaling settings for your object storage. Autoscaling allows you to automatically purchase storage capacity on a monthly basis up to the specified limit.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ObjectStoragesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\UpgradeObjectStorageRequest(); // \Contabo\ContaboSdk\Model\UpgradeObjectStorageRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$object_storage_id = "object_storage_id_example"; // string | The identifier of the object storage.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->upgradeObjectStorage($body, $x_request_id, $object_storage_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStoragesApi->upgradeObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\UpgradeObjectStorageRequest**](../Model/UpgradeObjectStorageRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **object_storage_id** | **string**| The identifier of the object storage. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\UpgradeObjectStorageResponse**](../Model/UpgradeObjectStorageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

