# Contabo\ContaboSdk\ImagesApi

All URIs are relative to *https://api.contabo.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCustomImage**](ImagesApi.md#createcustomimage) | **POST** /v1/compute/images | Provide a custom image
[**deleteImage**](ImagesApi.md#deleteimage) | **DELETE** /v1/compute/images/{imageId} | Delete an uploaded custom image by its id
[**retrieveCustomImagesStats**](ImagesApi.md#retrievecustomimagesstats) | **GET** /v1/compute/images/stats | List statistics regarding the customer&#x27;s custom images
[**retrieveImage**](ImagesApi.md#retrieveimage) | **GET** /v1/compute/images/{imageId} | Get details about a specific image by its id
[**retrieveImageList**](ImagesApi.md#retrieveimagelist) | **GET** /v1/compute/images | List available standard and custom images
[**updateImage**](ImagesApi.md#updateimage) | **PATCH** /v1/compute/images/{imageId} | Update custom image name by its id

# **createCustomImage**
> \Contabo\ContaboSdk\Model\CreateCustomImageResponse createCustomImage($body, $x_request_id, $x_trace_id)

Provide a custom image

In order to provide a custom image please specify an URL from where the image can be directly downloaded. A custom image must be in either `.iso` or `.qcow2` format. Other formats will be rejected. Please note that downloading can take a while depending on network speed resp. bandwidth and size of image. You can check the status by retrieving information about the image via a GET request. Download will be rejected if you have exceeded your limits.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\CreateCustomImageRequest(); // \Contabo\ContaboSdk\Model\CreateCustomImageRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->createCustomImage($body, $x_request_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->createCustomImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\CreateCustomImageRequest**](../Model/CreateCustomImageRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CreateCustomImageResponse**](../Model/CreateCustomImageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteImage**
> deleteImage($x_request_id, $image_id, $x_trace_id)

Delete an uploaded custom image by its id

Your are free to delete a previously uploaded custom images at any time

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$image_id = "image_id_example"; // string | The identifier of the image
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $apiInstance->deleteImage($x_request_id, $image_id, $x_trace_id);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->deleteImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **image_id** | **string**| The identifier of the image |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

void (empty response body)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveCustomImagesStats**
> \Contabo\ContaboSdk\Model\CustomImagesStatsResponse retrieveCustomImagesStats($x_request_id, $x_trace_id)

List statistics regarding the customer's custom images

List statistics regarding the customer's custom images such as the number of custom images uploaded, used disk space, free available disk space and total available disk space

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveCustomImagesStats($x_request_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->retrieveCustomImagesStats: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\CustomImagesStatsResponse**](../Model/CustomImagesStatsResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveImage**
> \Contabo\ContaboSdk\Model\FindImageResponse retrieveImage($x_request_id, $image_id, $x_trace_id)

Get details about a specific image by its id

Get details about a specific image. This could be either a standard or custom image. In case of an custom image you can also check the download status

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$image_id = "image_id_example"; // string | The identifier of the image
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->retrieveImage($x_request_id, $image_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->retrieveImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **image_id** | **string**| The identifier of the image |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\FindImageResponse**](../Model/FindImageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveImageList**
> \Contabo\ContaboSdk\Model\ListImageResponse retrieveImageList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $standard_image)

List available standard and custom images

List and filter all available standard images provided by [Contabo](https://contabo.com) and your uploaded custom images.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ImagesApi(
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
$name = "name_example"; // string | The name of the image
$standard_image = true; // bool | Flag indicating that image is either a standard (true) or a custom image (false)

try {
    $result = $apiInstance->retrieveImageList($x_request_id, $x_trace_id, $page, $size, $order_by, $name, $standard_image);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->retrieveImageList: ', $e->getMessage(), PHP_EOL;
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
 **name** | **string**| The name of the image | [optional]
 **standard_image** | **bool**| Flag indicating that image is either a standard (true) or a custom image (false) | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\ListImageResponse**](../Model/ListImageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateImage**
> \Contabo\ContaboSdk\Model\UpdateCustomImageResponse updateImage($body, $x_request_id, $image_id, $x_trace_id)

Update custom image name by its id

Update name of the custom image

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: bearer
    $config = Contabo\ContaboSdk\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Contabo\ContaboSdk\Api\ImagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Contabo\ContaboSdk\Model\UpdateCustomImageRequest(); // \Contabo\ContaboSdk\Model\UpdateCustomImageRequest | 
$x_request_id = "x_request_id_example"; // string | [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually.
$image_id = "image_id_example"; // string | The identifier of the image
$x_trace_id = "x_trace_id_example"; // string | Identifier to trace group of requests.

try {
    $result = $apiInstance->updateImage($body, $x_request_id, $image_id, $x_trace_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImagesApi->updateImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Contabo\ContaboSdk\Model\UpdateCustomImageRequest**](../Model/UpdateCustomImageRequest.md)|  |
 **x_request_id** | **string**| [Uuid4](https://en.wikipedia.org/wiki/Universally_unique_identifier#Version_4_(random)) to identify individual requests for support cases. You can use [uuidgenerator](https://www.uuidgenerator.net/version4) to generate them manually. |
 **image_id** | **string**| The identifier of the image |
 **x_trace_id** | **string**| Identifier to trace group of requests. | [optional]

### Return type

[**\Contabo\ContaboSdk\Model\UpdateCustomImageResponse**](../Model/UpdateCustomImageResponse.md)

### Authorization

[bearer](../../README.md#bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

