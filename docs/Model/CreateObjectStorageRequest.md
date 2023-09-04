# CreateObjectStorageRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**region** | **string** | Region where the object storage should be located. Default is EU. Available regions: EU, US-central, SIN | [default to 'EU']
**auto_scaling** | [**AllOfCreateObjectStorageRequestAutoScaling**](AllOfCreateObjectStorageRequestAutoScaling.md) | Autoscaling settings | [optional] 
**total_purchased_space_tb** | **double** | Amount of purchased / requested object storage in TB. | 
**display_name** | **string** | Display name helps to differentiate between object storages, especially if they are in the same region. If display name is not provided, it will be generated. Display name can be changed any time. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

