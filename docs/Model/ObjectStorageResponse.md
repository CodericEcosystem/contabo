# ObjectStorageResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tenant_id** | **string** | Your customer tenant id | 
**customer_id** | **string** | Your customer number | 
**object_storage_id** | **string** | Your object storage id | 
**created_date** | [**\DateTime**](\DateTime.md) | Creation date for object storage. | 
**cancel_date** | [**\DateTime**](\DateTime.md) | Cancellation date for object storage. | 
**auto_scaling** | [**AllOfObjectStorageResponseAutoScaling**](AllOfObjectStorageResponseAutoScaling.md) | Autoscaling settings | 
**data_center** | **string** | Data center your object storage is located | 
**total_purchased_space_tb** | **double** | Amount of purchased / requested object storage in TB. | 
**s3_url** | **string** | S3 URL to connect to your S3 compatible object storage | 
**s3_tenant_id** | **string** | Your S3 tenantId. Only required for public sharing. | 
**status** | **string** | The object storage status | 
**region** | **string** | The region where your object storage is located | 
**display_name** | **string** | Display name for object storage. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

