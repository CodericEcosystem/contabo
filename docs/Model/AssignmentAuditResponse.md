# AssignmentAuditResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tenant_id** | **string** | Your customer tenant id | 
**customer_id** | **string** | Your customer number | 
**id** | **float** | The identifier of the audit entry. | 
**resource_id** | **string** | Resource&#x27;s id | 
**resource_type** | **string** | Resource type. Resource type is one of &#x60;instance|image|object-storage&#x60;. | 
**tag_id** | **float** | Tag&#x27;s id | 
**action** | **string** | Audit Action | 
**timestamp** | [**\DateTime**](\DateTime.md) | Audit creation date | 
**changed_by** | **string** | User ID | 
**username** | **string** | User Full Name | 
**request_id** | **string** | Request ID | 
**trace_id** | **string** | Trace ID | 
**changes** | **object** | Changes made for a specific Tag | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

