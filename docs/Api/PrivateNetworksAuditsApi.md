# Contabo\ContaboSdk\PrivateNetworksAuditsApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**retrievePrivateNetworkAuditsList**](PrivateNetworksAuditsApi.md#retrieveprivatenetworkauditslist) | **GET** /v1/private-networks/audits | List history about your Private Networks (audit)

# **retrievePrivateNetworkAuditsList**
> \Contabo\ContaboSdk\Model\ListPrivateNetworkAuditResponse retrievePrivateNetworkAuditsList($x_request_id, $x_trace_id, $page, $size, $order_by, $private_network_id, $request_id, $changed_by, $start_date, $end_date)

List history about your Private Networks (audit)

List and filters the history about your Private Networks.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\PrivateNetworksAuditsApi(
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
$private_network_id = 789; // int | The identifier of the Private Network
$request_id = "request_id_example"; // string | The requestId of the API call which led to the change.
$changed_by = "changed_by_example"; // string | User name which did the change.
$start_date = new \DateTime("2013-10-20"); // \DateTime | Start of search time range.
$end_date = new \DateTime("2013-10-20"); // \DateTime | End of search time range.

try {
    $result = $apiInstance->retrievePrivateNetworkAuditsList($x_request_id, $x_trace_id, $page, $size, $order_by, $private_network_id, $request_id, $changed_by, $start_date, $end_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PrivateNetworksAuditsApi->retrievePrivateNetworkAuditsList: ', $e->getMessage(), PHP_EOL;
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
 **private_network_id** | **int**| The identifier of the Private Network | [optional]
 **request_id** | **string**| The requestId of the API call which led to the change. | [optional]
 **changed_by** | **string**| User name which did the change. | [optional]
 **start_date** | **\DateTime**| Start of search time range. | [optional]
 **end_date** | **\DateTime**| End of search time range. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListPrivateNetworkAuditResponse**](../Model/ListPrivateNetworkAuditResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

