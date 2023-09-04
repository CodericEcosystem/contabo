# PermissionResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**api_name** | **string** | API endpoint. In order to get a list availbale api enpoints please refer to the GET api-permissions endpoint. | 
**actions** | **string[]** | Action allowed for the API endpoint. Basically &#x60;CREATE&#x60; corresponds to POST endpoints, &#x60;READ&#x60; to GET endpoints, &#x60;UPDATE&#x60; to PATCH / PUT endpoints and &#x60;DELETE&#x60; to DELETE endpoints. | 
**resources** | [**\Contabo\ContaboSdk\Model\ResourcePermissionsResponse[]**](ResourcePermissionsResponse.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)
