# Contabo\ContaboSdk\InstanceActionsApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**rescue**](InstanceActionsApi.md#rescue) | **POST** /v1/compute/instances/{instanceId}/actions/rescue | Rescue a compute instance / resource identified by its id
[**resetPasswordAction**](InstanceActionsApi.md#resetpasswordaction) | **POST** /v1/compute/instances/{instanceId}/actions/resetPassword | Reset password for a compute instance / resource referenced by an id
[**restart**](InstanceActionsApi.md#restart) | **POST** /v1/compute/instances/{instanceId}/actions/restart | Retrieve a list of your custom images history.
[**shutdown**](InstanceActionsApi.md#shutdown) | **POST** /v1/compute/instances/{instanceId}/actions/shutdown | Shutdown compute instance / resource by its id
[**start**](InstanceActionsApi.md#start) | **POST** /v1/compute/instances/{instanceId}/actions/start | Start a compute instance / resource identified by its id
[**stop**](InstanceActionsApi.md#stop) | **POST** /v1/compute/instances/{instanceId}/actions/stop | Stop compute instance / resource by its id

# **rescue**
> \Contabo\ContaboSdk\Model\InstanceRescueActionResponse rescue($body, $x_request_id, $instance_id, $x_trace_id)

Rescue a compute instance / resource identified by its id

You can reboot your instance in rescue mode to resolve system issues. Rescue system is Linux based and its booted instead of your regular operating system. The disk containing your operating sytstem, software and your data is already mounted for you to access and repair/modify files. After a reboot your compute instance will boot your operating system. Please note that this is for advanced users.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstanceActionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\InstancesActionsRescueRequest(); // \Contabo\ContaboSdk\Model\InstancesActionsRescueRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the compute instance / resource to be started in rescue mode.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->rescue($body, $x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstanceActionsApi->rescue: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\InstancesActionsRescueRequest**](../Model/InstancesActionsRescueRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the compute instance / resource to be started in rescue mode. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\InstanceRescueActionResponse**](../Model/InstanceRescueActionResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resetPasswordAction**
> \Contabo\ContaboSdk\Model\InstanceResetPasswordActionResponse resetPasswordAction($body, $x_request_id, $instance_id, $x_trace_id)

Reset password for a compute instance / resource referenced by an id

Reset password for a compute instance / resource referenced by an id. This will reset the current password to the password that you provided in the body of this request.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstanceActionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\InstancesResetPasswordActionsRequest(); // \Contabo\ContaboSdk\Model\InstancesResetPasswordActionsRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the compute instance / resource to be started in rescue mode.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->resetPasswordAction($body, $x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstanceActionsApi->resetPasswordAction: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\InstancesResetPasswordActionsRequest**](../Model/InstancesResetPasswordActionsRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the compute instance / resource to be started in rescue mode. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\InstanceResetPasswordActionResponse**](../Model/InstanceResetPasswordActionResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **restart**
> \Contabo\ContaboSdk\Model\InstanceRestartActionResponse restart($x_request_id, $instance_id, $x_trace_id)

Retrieve a list of your custom images history.

List of your custom images history, with the ability to apply filters.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstanceActionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the compute instance / resource to be started in rescue mode.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->restart($x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstanceActionsApi->restart: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the compute instance / resource to be started in rescue mode. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\InstanceRestartActionResponse**](../Model/InstanceRestartActionResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **shutdown**
> \Contabo\ContaboSdk\Model\InstanceShutdownActionResponse shutdown($x_request_id, $instance_id, $x_trace_id)

Shutdown compute instance / resource by its id

Shutdown an compute instance / resource. This is similar to pressing the power button on a physical machine. This will send an ACPI event for the guest OS, which should then proceed to a clean shutdown.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstanceActionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the compute instance / resource to be started in rescue mode.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->shutdown($x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstanceActionsApi->shutdown: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the compute instance / resource to be started in rescue mode. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\InstanceShutdownActionResponse**](../Model/InstanceShutdownActionResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **start**
> \Contabo\ContaboSdk\Model\InstanceStartActionResponse start($x_request_id, $instance_id, $x_trace_id)

Start a compute instance / resource identified by its id

Starting a compute instance / resource is like powering on a real server. If the compute instance / resource is already started nothing will happen. You may check the current status anytime when getting information about a compute instance / resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstanceActionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the compute instance / resource to be started in rescue mode.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->start($x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstanceActionsApi->start: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the compute instance / resource to be started in rescue mode. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\InstanceStartActionResponse**](../Model/InstanceStartActionResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stop**
> \Contabo\ContaboSdk\Model\InstanceStopActionResponse stop($x_request_id, $instance_id, $x_trace_id)

Stop compute instance / resource by its id

Stopping a compute instance / resource is like powering off a real server. So please be aware that data may be lost. Alternatively you may log in and shut your compute instance / resource gracefully via the operating system. If the compute instance / resource is already stopped nothing will happen. You may check the current status anytime when getting information about a compute instance / resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\InstanceActionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$instance_id = 789; // int | The identifier of the compute instance / resource to be started in rescue mode.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->stop($x_request_id, $instance_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstanceActionsApi->stop: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **instance_id** | **int**| The identifier of the compute instance / resource to be started in rescue mode. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\InstanceStopActionResponse**](../Model/InstanceStopActionResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

