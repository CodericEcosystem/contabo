# Contabo\ContaboSdk\InstancesApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**cancelInstance**](InstancesApi.md#cancelinstance) | **POST** /v1/compute/instances/{instanceId}/cancel | Cancel specific instance by id
[**createInstance**](InstancesApi.md#createinstance) | **POST** /v1/compute/instances | Create a new instance
[**patchInstance**](InstancesApi.md#patchinstance) | **PATCH** /v1/compute/instances/{instanceId} | Update specific instance
[**reinstallInstance**](InstancesApi.md#reinstallinstance) | **PUT** /v1/compute/instances/{instanceId} | Reinstall specific instance
[**retrieveInstance**](InstancesApi.md#retrieveinstance) | **GET** /v1/compute/instances/{instanceId} | Get specific instance by id
[**retrieveInstancesList**](InstancesApi.md#retrieveinstanceslist) | **GET** /v1/compute/instances | List instances
[**upgradeInstance**](InstancesApi.md#upgradeinstance) | **POST** /v1/compute/instances/{instanceId}/upgrade | Upgrading instance capabilities

# **cancelInstance**
> \Contabo\ContaboSdk\Model\CancelInstanceResponse cancelInstance($x_request_id, $instance_id, $x_trace_id)

Cancel specific instance by id

Your are free to cancel a previously created instance at any time.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->cancelInstance($x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->cancelInstance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CancelInstanceResponse**](../Model/CancelInstanceResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createInstance**
> \Contabo\ContaboSdk\Model\CreateInstanceResponse createInstance($body, $x_request_id, $x_trace_id)

Create a new instance

Create a new instance for your account with the provided parameters.         <table>           <tr><th>ProductId</th><th>Product</th><th>Disk Size</th></tr>           <tr><td>V1</td><td>VPS S SSD</td><td>200 GB SSD</td></tr>           <tr><td>V35</td><td>VPS S Storage</td><td>400 GB SSD</td></tr>           <tr><td>V12</td><td>VPS S NVMe</td><td>50 GB NVMe</td></tr>           <tr><td>V2</td><td>VPS M SSD</td><td>400 GB SSD</td></tr>           <tr><td>V36</td><td>VPS M Storage</td><td>800 GB SSD</td></tr>           <tr><td>V13</td><td>VPS M NVMe</td><td>100 GB NVMe</td></tr>           <tr><td>V3</td><td>VPS L SSD</td><td>800 GB SSD</td></tr>           <tr><td>V37</td><td>VPS L Storage</td><td>1600 GB SSD</td></tr>           <tr><td>V14</td><td>VPS L NVMe</td><td>200 GB NVMe</td></tr>           <tr><td>V4</td><td>VPS XL SSD</td><td>1600 GB SSD</td></tr>           <tr><td>V38</td><td>VPS XL SSD</td><td>3200 GB SSD</td></tr>           <tr><td>V15</td><td>VPS XL NVMe</td><td>400 GB NVMe</td></tr>           <tr><td>V8</td><td>VDS S</td><td>180 GB NVMe</td></tr>           <tr><td>V9</td><td>VDS M</td><td>240 GB NVMe</td></tr>           <tr><td>V10</td><td>VDS L</td><td>360 GB NVMe</td></tr>           <tr><td>V11</td><td>VDS XL</td><td>480 GB NVMe</td></tr>           <tr><td>V16</td><td>VDS XXL</td><td>720 GB NVMe</td></tr>           </table>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\CreateInstanceRequest(); // \Contabo\ContaboSdk\Model\CreateInstanceRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->createInstance($body, $x_request_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->createInstance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\CreateInstanceRequest**](../Model/CreateInstanceRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CreateInstanceResponse**](../Model/CreateInstanceResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchInstance**
> \Contabo\ContaboSdk\Model\PatchInstanceResponse patchInstance($body, $x_request_id, $instance_id, $x_trace_id)

Update specific instance

Update specific instance by instanceId.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\PatchInstanceRequest(); // \Contabo\ContaboSdk\Model\PatchInstanceRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->patchInstance($body, $x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->patchInstance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\PatchInstanceRequest**](../Model/PatchInstanceRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\PatchInstanceResponse**](../Model/PatchInstanceResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reinstallInstance**
> \Contabo\ContaboSdk\Model\ReinstallInstanceResponse reinstallInstance($body, $x_request_id, $instance_id, $x_trace_id)

Reinstall specific instance

You can reinstall a specific instance with a new image and optionally add ssh keys, a root password or cloud-init.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\ReinstallInstanceRequest(); // \Contabo\ContaboSdk\Model\ReinstallInstanceRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->reinstallInstance($body, $x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->reinstallInstance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\ReinstallInstanceRequest**](../Model/ReinstallInstanceRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ReinstallInstanceResponse**](../Model/ReinstallInstanceResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveInstance**
> \Contabo\ContaboSdk\Model\FindInstanceResponse retrieveInstance($x_request_id, $instance_id, $x_trace_id)

Get specific instance by id

Get attributes values to a specific instance on your account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveInstance($x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->retrieveInstance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\FindInstanceResponse**](../Model/FindInstanceResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveInstancesList**
> \Contabo\ContaboSdk\Model\ListInstancesResponse retrieveInstancesList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $display_name, $data_center, $region, $instance_id, $instance_ids, $status, $add_on_ids, $product_types, $ip_config)

List instances

List and filter all instances in your account

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
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
$name = "name_example"; // string | The name of the instance
$display_name = "display_name_example"; // string | The display name of the instance
$data_center = "data_center_example"; // string | The data center of the instance
$region = "region_example"; // string | The Region of the instance
$instance_id = 789; // int | The identifier of the instance (deprecated)
$instance_ids = "instance_ids_example"; // string | Comma separated instances identifiers
$status = "status_example"; // string | The status of the instance
$add_on_ids = "add_on_ids_example"; // string | Identifiers of Addons the instances have
$product_types = "product_types_example"; // string | Comma separated instance's category depending on Product Id
$ip_config = true; // bool | Filter instances that have an ip config

try {
    $result = $apiInstance->retrieveInstancesList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $display_name, $data_center, $region, $instance_id, $instance_ids, $status, $add_on_ids, $product_types, $ip_config);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->retrieveInstancesList: ', $e->getMessage(), PHP_EOL;
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
 **name** | **string**| The name of the instance | [optional]
 **display_name** | **string**| The display name of the instance | [optional]
 **data_center** | **string**| The data center of the instance | [optional]
 **region** | **string**| The Region of the instance | [optional]
 **instance_id** | **int**| The identifier of the instance (deprecated) | [optional]
 **instance_ids** | **string**| Comma separated instances identifiers | [optional]
 **status** | **string**| The status of the instance | [optional]
 **add_on_ids** | **string**| Identifiers of Addons the instances have | [optional]
 **product_types** | **string**| Comma separated instance&#x27;s category depending on Product Id | [optional]
 **ip_config** | **bool**| Filter instances that have an ip config | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListInstancesResponse**](../Model/ListInstancesResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **upgradeInstance**
> \Contabo\ContaboSdk\Model\PatchInstanceResponse upgradeInstance($body, $x_request_id, $instance_id, $x_trace_id)

Upgrading instance capabilities

In order to enhance your instance with additional features you can purchase add-ons.   Currently only firewalling and private network addon is allowed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstancesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\UpgradeInstanceRequest(); // \Contabo\ContaboSdk\Model\UpgradeInstanceRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the instance
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->upgradeInstance($body, $x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstancesApi->upgradeInstance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\UpgradeInstanceRequest**](../Model/UpgradeInstanceRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the instance |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\PatchInstanceResponse**](../Model/PatchInstanceResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

