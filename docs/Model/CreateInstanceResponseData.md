# CreateInstanceResponseData

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tenant_id** | **string** | Your customer tenant id | 
**customer_id** | **string** | Your customer number | 
**instance_id** | **int** | Instance&#x27;s id | 
**created_date** | [**\DateTime**](\DateTime.md) | Creation date for instance | 
**image_id** | **string** | Image&#x27;s id | 
**product_id** | **string** | Product ID | 
**region** | **string** | Instance Region where the compute instance should be located. | 
**add_ons** | [**\Contabo\ContaboSdk\Model\AddOnResponse[]**](AddOnResponse.md) |  | 
**os_type** | **string** | Type of operating system (OS) | 
**status** | [**\Contabo\ContaboSdk\Model\InstanceStatus**](InstanceStatus.md) |  | 
**ssh_keys** | **int[]** | Array of &#x60;secretId&#x60;s of public SSH keys for logging into as &#x60;defaultUser&#x60; with administrator/root privileges. Applies to Linux/BSD systems. Please refer to Secrets Management API. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

