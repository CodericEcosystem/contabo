# RoleResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**role_id** | **int** | Role&#x27;s id | 
**tenant_id** | **string** | Your customer tenant id | 
**customer_id** | **string** | Your customer number | 
**name** | **string** | Role&#x27;s name | 
**admin** | **bool** | Admin | 
**access_all_resources** | **bool** | Access All Resources | 
**type** | **string** | Role type can be either &#x60;default&#x60; or &#x60;custom&#x60;. The &#x60;default&#x60; roles cannot be modified or deleted. | 
**permissions** | [**\Contabo\ContaboSdk\Model\PermissionResponse[]**](PermissionResponse.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

