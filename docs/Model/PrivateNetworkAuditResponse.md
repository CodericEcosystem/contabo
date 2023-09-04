# PrivateNetworkAuditResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The identifier of the audit entry. | 
**private_network_id** | **float** | The identifier of the Private Network | 
**action** | **string** | Type of the action. | 
**timestamp** | [**\DateTime**](\DateTime.md) | When the change took place. | 
**tenant_id** | **string** | Customer tenant id | 
**customer_id** | **string** | Customer number | 
**changed_by** | **string** | User id | 
**username** | **string** | User name which did the change. | 
**request_id** | **string** | The requestId of the API call which led to the change. | 
**trace_id** | **string** | The traceId of the API call which led to the change. | 
**changes** | **object** | List of actual changes. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

