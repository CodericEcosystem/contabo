# InstanceResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tenant_id** | **string** | Your customer tenant id | 
**customer_id** | **string** | Customer ID | 
**additional_ips** | [**\Contabo\ContaboSdk\Model\AdditionalIp[]**](AdditionalIp.md) |  | 
**name** | **string** | Instance Name | 
**display_name** | **string** | Instance display name | 
**instance_id** | **int** | Instance ID | 
**data_center** | **string** | The data center where your Private Network is located | 
**region** | **string** | Instance region where the compute instance should be located. | 
**region_name** | **string** | The name of the region where the instance is located. | 
**product_id** | **string** | Product ID | 
**image_id** | **string** | Image&#x27;s id | 
**ip_config** | [**\Contabo\ContaboSdk\Model\IpConfig**](IpConfig.md) |  | 
**mac_address** | **string** | MAC Address | 
**ram_mb** | **float** | Image RAM size in MB | 
**cpu_cores** | **int** | CPU core count | 
**os_type** | **string** | Type of operating system (OS) | 
**disk_mb** | **float** | Image Disk size in MB | 
**ssh_keys** | **int[]** | Array of &#x60;secretId&#x60;s of public SSH keys for logging into as &#x60;defaultUser&#x60; with administrator/root privileges. Applies to Linux/BSD systems. Please refer to Secrets Management API. | 
**created_date** | [**\DateTime**](\DateTime.md) | The creation date for the instance | 
**cancel_date** | [**\DateTime**](\DateTime.md) | The date on which the instance will be cancelled | 
**status** | [**\Contabo\ContaboSdk\Model\InstanceStatus**](InstanceStatus.md) |  | 
**v_host_id** | **int** | ID of host system | 
**add_ons** | [**\Contabo\ContaboSdk\Model\AddOnResponse[]**](AddOnResponse.md) |  | 
**error_message** | **string** | Message in case of an error. | [optional] 
**product_type** | **string** | Instance&#x27;s category depending on Product Id | 
**default_user** | **string** | Default user name created for login during (re-)installation with administrative privileges. Allowed values for Linux/BSD are &#x60;admin&#x60; (use sudo to apply administrative privileges like root) or &#x60;root&#x60;. Allowed values for Windows are &#x60;admin&#x60; (has administrative privileges like administrator) or &#x60;administrator&#x60;. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

