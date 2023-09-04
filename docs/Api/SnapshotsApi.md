# Contabo\ContaboSdk\SnapshotsApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createSnapshot**](SnapshotsApi.md#createsnapshot) | **POST** /v1/compute/instances/{instanceId}/snapshots | Create a new instance snapshot
[**deleteSnapshot**](SnapshotsApi.md#deletesnapshot) | **DELETE** /v1/compute/instances/{instanceId}/snapshots/{snapshotId} | Delete existing snapshot by id
[**retrieveSnapshot**](SnapshotsApi.md#retrievesnapshot) | **GET** /v1/compute/instances/{instanceId}/snapshots/{snapshotId} | Retrieve a specific snapshot by id
[**retrieveSnapshotList**](SnapshotsApi.md#retrievesnapshotlist) | **GET** /v1/compute/instances/{instanceId}/snapshots | List snapshots
[**rollbackSnapshot**](SnapshotsApi.md#rollbacksnapshot) | **POST** /v1/compute/instances/{instanceId}/snapshots/{snapshotId}/rollback | Revert the instance to a particular snapshot based on its identifier
[**updateSnapshot**](SnapshotsApi.md#updatesnapshot) | **PATCH** /v1/compute/instances/{instanceId}/snapshots/{snapshotId} | Update specific snapshot by id

# **createSnapshot**
> \Contabo\ContaboSdk\Model\CreateSnapshotResponse createSnapshot($body, $x_request_id, $instance_id, $x_trace_id)

Create a new instance snapshot

Create a new snapshot for instance, with name and description attributes

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\CreateSnapshotRequest(); // \Contabo\ContaboSdk\Model\CreateSnapshotRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->createSnapshot($body, $x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->createSnapshot: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\CreateSnapshotRequest**](../Model/CreateSnapshotRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CreateSnapshotResponse**](../Model/CreateSnapshotResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSnapshot**
> deleteSnapshot($x_request_id, $instance_id, $snapshot_id, $x_trace_id)

Delete existing snapshot by id

Delete existing instance snapshot by id

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$snapshot_id = "snapshot_id_example"; // string | The identifier of the snapshot
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $apiInstance->deleteSnapshot($x_request_id, $instance_id, $snapshot_id, $x_trace_id);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->deleteSnapshot: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **snapshot_id** | **string**| The identifier of the snapshot |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

void (empty response body)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveSnapshot**
> \Contabo\ContaboSdk\Model\FindSnapshotResponse retrieveSnapshot($x_request_id, $instance_id, $snapshot_id, $x_trace_id)

Retrieve a specific snapshot by id

Get all attributes for a specific snapshot

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$snapshot_id = "snapshot_id_example"; // string | The identifier of the snapshot
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveSnapshot($x_request_id, $instance_id, $snapshot_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->retrieveSnapshot: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **snapshot_id** | **string**| The identifier of the snapshot |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\FindSnapshotResponse**](../Model/FindSnapshotResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveSnapshotList**
> \Contabo\ContaboSdk\Model\ListSnapshotResponse retrieveSnapshotList($x_request_id, $instance_id, $x_trace_id, $page, $size, $order_by, $name)

List snapshots

List and filter all your snapshots for a specific instance

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.
$page = 789; // int | Number of page to be fetched.
$size = 789; // int | Number of elements per page.
$order_by = array("order_by_example"); // string[] | Specify fields and ordering (ASC for ascending, DESC for descending) in following format `field:ASC|DESC`.
$name = "name_example"; // string | Filter as substring match for snapshots names.

try {
    $result = $apiInstance->retrieveSnapshotList($x_request_id, $instance_id, $x_trace_id, $page, $size, $order_by, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->retrieveSnapshotList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]
 **page** | **int**| Number of page to be fetched. | [optional]
 **size** | **int**| Number of elements per page. | [optional]
 **order_by** | [**string[]**](../Model/string.md)| Specify fields and ordering (ASC for ascending, DESC for descending) in following format &#x60;field:ASC|DESC&#x60;. | [optional]
 **name** | **string**| Filter as substring match for snapshots names. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListSnapshotResponse**](../Model/ListSnapshotResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **rollbackSnapshot**
> \Contabo\ContaboSdk\Model\RollbackSnapshotResponse rollbackSnapshot($body, $x_request_id, $instance_id, $snapshot_id, $x_trace_id)

Revert the instance to a particular snapshot based on its identifier

Rollback instance to a specific snapshot. The snapshot must be the latest one in order to be able to restore it, otherwise you will receive an error informing you that the snapshot is not the latest

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\RollbackSnapshotRequest(); // \Contabo\ContaboSdk\Model\RollbackSnapshotRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$snapshot_id = "snapshot_id_example"; // string | The identifier of the snapshot
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->rollbackSnapshot($body, $x_request_id, $instance_id, $snapshot_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->rollbackSnapshot: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\RollbackSnapshotRequest**](../Model/RollbackSnapshotRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **snapshot_id** | **string**| The identifier of the snapshot |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\RollbackSnapshotResponse**](../Model/RollbackSnapshotResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateSnapshot**
> \Contabo\ContaboSdk\Model\UpdateSnapshotResponse updateSnapshot($body, $x_request_id, $instance_id, $snapshot_id, $x_trace_id)

Update specific snapshot by id

Update attributes of a snapshot. You may only specify the attributes you want to change. If an attribute is not set, it will retain its original value.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\SnapshotsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\UpdateSnapshotRequest(); // \Contabo\ContaboSdk\Model\UpdateSnapshotRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$snapshot_id = "snapshot_id_example"; // string | The identifier of the snapshot
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->updateSnapshot($body, $x_request_id, $instance_id, $snapshot_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SnapshotsApi->updateSnapshot: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\UpdateSnapshotRequest**](../Model/UpdateSnapshotRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **snapshot_id** | **string**| The identifier of the snapshot |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\UpdateSnapshotResponse**](../Model/UpdateSnapshotResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

