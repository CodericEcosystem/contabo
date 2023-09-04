# CreateInstanceAddons

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**private_networking** | **object** | Set this attribute if you want to upgrade your instance with the Private Networking addon.   Please provide an empty object for the time being as value. There will be more configuration possible   in the future. | [optional] 
**additional_ips** | **object** | Set this attribute if you want to upgrade your instance with the Additional IPs addon. Please provide an empty object for the time being as value. There will be more configuration possible in the future. | [optional] 
**extra_storage** | [**AllOfCreateInstanceAddonsExtraStorage**](AllOfCreateInstanceAddonsExtraStorage.md) | Set this attribute if you want to upgrade your instance with the Extra Storage addon. | [optional] 
**custom_image** | **object** | Set this attribute if you want to upgrade your instance with the Custom Images addon.   Please provide an empty object for the time being as value. There will be more configuration possible   in the future. | [optional] 
**addons_ids** | [**\Contabo\ContaboSdk\Model\AddOnRequest[]**](AddOnRequest.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

