# SwaggerClient-php
Introduction  Contabo API allows you to manage your resources using HTTP requests. This documentation includes a set of HTTP endpoints that are designed to RESTful principles. Each endpoint includes descriptions, request syntax, and examples.  Contabo provides also a CLI tool which enables you to manage your resources easily from the command line. [CLI Download and  Installation instructions.](https://github.com/contabo/cntb)  ## Product documentation  If you are looking for description about the products themselves and their usage in general or for specific purposes, please check the [Contabo Product Documentation](https://docs.contabo.com/).  ## Getting Started  In order to use the Contabo API you will need the following credentials which are available from the [Customer Control Panel](https://my.contabo.com/api/details): 1. ClientId 2. ClientSecret 3. API User (your email address to login to the [Customer Control Panel](https://my.contabo.com/api/details)) 4. API Password (this is a new password which you'll set or change in the [Customer Control Panel](https://my.contabo.com/api/details))  You can either use the API directly or by using the `cntb` CLI (Command Line Interface) tool.  ### Using the API directly  #### Via `curl` for Linux/Unix like systems  This requires `curl` and `jq` in your shell (e.g. `bash`, `zsh`). Please replace the first four placeholders with actual values.  ```sh CLIENT_ID=<ClientId from Customer Control Panel> CLIENT_SECRET=<ClientSecret from Customer Control Panel> API_USER=<API User from Customer Control Panel> API_PASSWORD='<API Password from Customer Control Panel>' ACCESS_TOKEN=$(curl -d \"client_id=$CLIENT_ID\" -d \"client_secret=$CLIENT_SECRET\" --data-urlencode \"username=$API_USER\" --data-urlencode \"password=$API_PASSWORD\" -d 'grant_type=password' 'https://auth.contabo.com/auth/realms/contabo/protocol/openid-connect/token' | jq -r '.access_token') # get list of your instances curl -X GET -H \"Authorization: Bearer $ACCESS_TOKEN\" -H \"x-request-id: 51A87ECD-754E-4104-9C54-D01AD0F83406\" \"https://api.contabo.com/v1/compute/instances\" | jq ```  #### Via `PowerShell` for Windows  Please open `PowerShell` and execute the following code after replacing the first four placeholders with actual values.  ```powershell $client_id='<ClientId from Customer Control Panel>' $client_secret='<ClientSecret from Customer Control Panel>' $api_user='<API User from Customer Control Panel>' $api_password='<API Password from Customer Control Panel>' $body = @{grant_type='password' client_id=$client_id client_secret=$client_secret username=$api_user password=$api_password} $response = Invoke-WebRequest -Uri 'https://auth.contabo.com/auth/realms/contabo/protocol/openid-connect/token' -Method 'POST' -Body $body $access_token = (ConvertFrom-Json $([String]::new($response.Content))).access_token # get list of your instances $headers = @{} $headers.Add(\"Authorization\",\"Bearer $access_token\") $headers.Add(\"x-request-id\",\"51A87ECD-754E-4104-9C54-D01AD0F83406\") Invoke-WebRequest -Uri 'https://api.contabo.com/v1/compute/instances' -Method 'GET' -Headers $headers ```  ### Using the Contabo API via the `cntb` CLI tool  1. Download `cntb` for your operating system (MacOS, Windows and Linux supported) [here](https://github.com/contabo/cntb) 2. Unzip the downloaded file 3. You might move the executable to any location on your disk. You may update your `PATH` environment variable for easier invocation. 4. Configure it once to use your credentials              ```sh    cntb config set-credentials --oauth2-clientid=<ClientId from Customer Control Panel> --oauth2-client-secret=<ClientSecret from Customer Control Panel> --oauth2-user=<API User from Customer Control Panel> --oauth2-password='<API Password from Customer Control Panel>'    ```  5. Use the CLI              ```sh    # get list of your instances    cntb get instances    # help    cntb help    ```  ## API Overview  ### [Compute Management](#tag/Instances)  The Compute Management API allows you to manage compute resources (e.g. creation, deletion, starting, stopping) of VPS and VDS (please note that Storage VPS are not supported via API or CLI) as well as managing snapshots and custom images. It also offers you to take advantage of [cloud-init](https://cloud-init.io/) at least on our default / standard images (for custom images you'll need to provide cloud-init support packages). The API offers provisioning of cloud-init scripts via the `user_data` field.  Custom images must be provided in `.qcow2` or `.iso` format. This gives you even more flexibility for setting up your environment.  ### [Object Storage](#tag/Object-Storages)  The Object Storage API allows you to order, upgrade, cancel and control the auto-scaling feature for [S3](https://en.wikipedia.org/wiki/Amazon_S3) compatible object storage. You may also get some usage statistics. You can only buy one object storage per location. In case you need more storage space in a location you can purchase more space or enable the auto-scaling feature to purchase automatically more storage space up to the specified monthly limit.  Please note that this is not the S3 compatible API. It is not documented here. The S3 compatible API needs to be used with the corresponding credentials, namely an `access_key` and `secret_key`. Those can be retrieved by invoking the User Management API. All purchased object storages in different locations share the same credentials. You are free to use S3 compatible tools like [`aws`](https://aws.amazon.com/cli/) cli or similar.  ### [Private Networking](#tag/Private-Networks)  The Private Networking API allows you to manage private networks / Virtual Private Clouds (VPC) for your Cloud VPS and VDS (please note that Storage VPS are not supported via API or CLI). Having a private network allows the associated instances to have a private and direct network connection. The traffic won't leave the data center and cannot be accessed by any other instance.  With this feature you can create multi layer systems, e.g. having a database server being only accessible from your application servers in one private network and keep the database replication in a second, separate network. This increases the speed as the traffic is NOT routed to the internet and also security as the traffic is within it's own secured VLAN.  Adding a Cloud VPS or VDS to a private network requires a reinstallation to make sure that all relevant parts for private networking are in place. When adding the same instance to another private network it will require a restart in order to make additional virtual network interface cards (NICs) available.  Please note that for each instance being part of one or several private networks a payed add-on is required. You can automatically purchase it via the Compute Management API.  ### [Secrets Management](#tag/Secrets)  You can optionally save your passwords or public ssh keys using the Secrets Management API. You are not required to use it there will be no functional disadvantages.  By using that API you can easily reuse you public ssh keys when setting up different servers without the need to look them up every time. It can also be used to allow Contabo Supporters to access your machine without sending the passwords via potentially unsecure emails.  ### [User Management](#tag/Users)  If you need to allow other persons or automation scripts to access specific API endpoints resp. resources the User Management API comes into play. With that API you are able to manage users having possibly restricted access. You are free to define those restrictions to fit your needs. So beside an arbitrary number of users you basically define any number of so called `roles`. Roles allows access and must be one of the following types:  * `apiPermission`             This allows you to specify a restriction to certain functions of an API by allowing control over POST (=Create), GET (=Read), PUT/PATCH (=Update) and DELETE (=Delete) methods for each API endpoint (URL) individually. * `resourcePermission`             In order to restrict access to specific resources create a role with `resourcePermission` type by specifying any number of [tags](#tag-management). These tags need to be assigned to resources for them to take effect. E.g. a tag could be assigned to several compute resources. So that a user with that role (and of course access to the API endpoints via `apiPermission` role type) could only access those compute resources.  The `roles` are then assigned to a `user`. You can assign one or several roles regardless of the role's type. Of course you could also assign a user `admin` privileges without specifying any roles.  ### [Tag Management](#tag/Tags)  The Tag Management API allows you to manage your tags in order to organize your resources in a more convenient way. Simply assign a tag to resources like a compute resource to manage them.The assignments of tags to resources will also enable you to control access to these specific resources to users via the [User Management API](#user-management). For convenience reasons you might choose a color for tag. The Customer Control Panel will use that color to display the tags.  ## Requests  The Contabo API supports HTTP requests like mentioned below. Not every endpoint supports all methods. The allowed methods are listed within this documentation.  Method | Description ---    | --- GET    | To retrieve information about a resource, use the GET method.<br>The data is returned as a JSON object. GET methods are read-only and do not affect any resources. POST   | Issue a POST method to create a new object. Include all needed attributes in the request body encoded as JSON. PATCH  | Some resources support partial modification with PATCH,<br>which modifies specific attributes without updating the entire object representation. PUT    | Use the PUT method to update information about a resource.<br>PUT will set new values on the item without regard to their current values. DELETE | Use the DELETE method to destroy a resource in your account.<br>If it is not found, the operation will return a 4xx error and an appropriate message.  ## Responses  Usually the Contabo API should respond to your requests. The data returned is in [JSON](https://www.json.org/) format allowing easy processing in any programming language or tools.  As common for HTTP requests you will get back a so called HTTP status code. This gives you overall information about success or error. The following table lists common HTTP status codes.  Please note that the description of the endpoints and methods are not listing all possibly status codes in detail as they are generic. Only special return codes with their resp. response data are explicitly listed.  Response Code | Description --- | --- 200 | The response contains your requested information. 201 | Your request was accepted. The resource was created. 204 | Your request succeeded, there is no additional information returned. 400 | Your request was malformed. 401 | You did not supply valid authentication credentials. 402 | Request refused as it requires additional payed service. 403 | You are not allowed to perform the request. 404 | No results were found for your request or resource does not exist. 409 | Conflict with resources. For example violation of unique data constraints detected when trying to create or change resources. 429 | Rate-limit reached. Please wait for some time before doing more requests. 500 | We were unable to perform the request due to server-side problems. In such cases please retry or contact the support.  Not every endpoint returns data. For example DELETE requests usually don't return any data. All others do return data. For easy handling the return values consists of metadata denoted with and underscore (\"_\") like `_links` or `_pagination`. The actual data is returned in a field called `data`. For convenience reasons this `data` field is always returned as an array even if it consists of only one single element.  Some general details about Contabo API from [Contabo](https://contabo.com).

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.0.0
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen
For more information, please visit [https://contabo.com](https://contabo.com)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/git_user_id/git_repo_id.git"
    }
  ],
  "require": {
    "git_user_id/git_repo_id": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


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

## Documentation for API Endpoints

All URIs are relative to *https://api.contabo.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ImagesApi* | [**createCustomImage**](docs/Api/ImagesApi.md#createcustomimage) | **POST** /v1/compute/images | Provide a custom image
*ImagesApi* | [**deleteImage**](docs/Api/ImagesApi.md#deleteimage) | **DELETE** /v1/compute/images/{imageId} | Delete an uploaded custom image by its id
*ImagesApi* | [**retrieveCustomImagesStats**](docs/Api/ImagesApi.md#retrievecustomimagesstats) | **GET** /v1/compute/images/stats | List statistics regarding the customer&#x27;s custom images
*ImagesApi* | [**retrieveImage**](docs/Api/ImagesApi.md#retrieveimage) | **GET** /v1/compute/images/{imageId} | Get details about a specific image by its id
*ImagesApi* | [**retrieveImageList**](docs/Api/ImagesApi.md#retrieveimagelist) | **GET** /v1/compute/images | List available standard and custom images
*ImagesApi* | [**updateImage**](docs/Api/ImagesApi.md#updateimage) | **PATCH** /v1/compute/images/{imageId} | Update custom image name by its id
*ImagesAuditsApi* | [**retrieveImageAuditsList**](docs/Api/ImagesAuditsApi.md#retrieveimageauditslist) | **GET** /v1/compute/images/audits | List history about your custom images (audit)
*InstanceActionsApi* | [**rescue**](docs/Api/InstanceActionsApi.md#rescue) | **POST** /v1/compute/instances/{instanceId}/actions/rescue | Rescue a compute instance / resource identified by its id
*InstanceActionsApi* | [**resetPasswordAction**](docs/Api/InstanceActionsApi.md#resetpasswordaction) | **POST** /v1/compute/instances/{instanceId}/actions/resetPassword | Reset password for a compute instance / resource referenced by an id
*InstanceActionsApi* | [**restart**](docs/Api/InstanceActionsApi.md#restart) | **POST** /v1/compute/instances/{instanceId}/actions/restart | Retrieve a list of your custom images history.
*InstanceActionsApi* | [**shutdown**](docs/Api/InstanceActionsApi.md#shutdown) | **POST** /v1/compute/instances/{instanceId}/actions/shutdown | Shutdown compute instance / resource by its id
*InstanceActionsApi* | [**start**](docs/Api/InstanceActionsApi.md#start) | **POST** /v1/compute/instances/{instanceId}/actions/start | Start a compute instance / resource identified by its id
*InstanceActionsApi* | [**stop**](docs/Api/InstanceActionsApi.md#stop) | **POST** /v1/compute/instances/{instanceId}/actions/stop | Stop compute instance / resource by its id
*InstanceActionsAuditsApi* | [**retrieveInstancesActionsAuditsList**](docs/Api/InstanceActionsAuditsApi.md#retrieveinstancesactionsauditslist) | **GET** /v1/compute/instances/actions/audits | List history about your actions (audit) triggered via the API
*InstancesApi* | [**cancelInstance**](docs/Api/InstancesApi.md#cancelinstance) | **POST** /v1/compute/instances/{instanceId}/cancel | Cancel specific instance by id
*InstancesApi* | [**createInstance**](docs/Api/InstancesApi.md#createinstance) | **POST** /v1/compute/instances | Create a new instance
*InstancesApi* | [**patchInstance**](docs/Api/InstancesApi.md#patchinstance) | **PATCH** /v1/compute/instances/{instanceId} | Update specific instance
*InstancesApi* | [**reinstallInstance**](docs/Api/InstancesApi.md#reinstallinstance) | **PUT** /v1/compute/instances/{instanceId} | Reinstall specific instance
*InstancesApi* | [**retrieveInstance**](docs/Api/InstancesApi.md#retrieveinstance) | **GET** /v1/compute/instances/{instanceId} | Get specific instance by id
*InstancesApi* | [**retrieveInstancesList**](docs/Api/InstancesApi.md#retrieveinstanceslist) | **GET** /v1/compute/instances | List instances
*InstancesApi* | [**upgradeInstance**](docs/Api/InstancesApi.md#upgradeinstance) | **POST** /v1/compute/instances/{instanceId}/upgrade | Upgrading instance capabilities
*InstancesAuditsApi* | [**retrieveInstancesAuditsList**](docs/Api/InstancesAuditsApi.md#retrieveinstancesauditslist) | **GET** /v1/compute/instances/audits | List history about your custom images (audit)
*InternalApi* | [**createTicket**](docs/Api/InternalApi.md#createticket) | **POST** /v1/create-ticket | Create a new support ticket
*InternalApi* | [**retrieveUserIsPasswordSet**](docs/Api/InternalApi.md#retrieveuserispasswordset) | **GET** /v1/users/is-password-set | Get user is password set status
*ObjectStoragesApi* | [**cancelObjectStorage**](docs/Api/ObjectStoragesApi.md#cancelobjectstorage) | **PATCH** /v1/object-storages/{objectStorageId}/cancel | Cancels the specified object storage at the next possible date
*ObjectStoragesApi* | [**createObjectStorage**](docs/Api/ObjectStoragesApi.md#createobjectstorage) | **POST** /v1/object-storages | Create a new object storage
*ObjectStoragesApi* | [**retrieveDataCenterList**](docs/Api/ObjectStoragesApi.md#retrievedatacenterlist) | **GET** /v1/data-centers | List data centers
*ObjectStoragesApi* | [**retrieveObjectStorage**](docs/Api/ObjectStoragesApi.md#retrieveobjectstorage) | **GET** /v1/object-storages/{objectStorageId} | Get specific object storage by its id
*ObjectStoragesApi* | [**retrieveObjectStorageList**](docs/Api/ObjectStoragesApi.md#retrieveobjectstoragelist) | **GET** /v1/object-storages | List all your object storages
*ObjectStoragesApi* | [**retrieveObjectStoragesStats**](docs/Api/ObjectStoragesApi.md#retrieveobjectstoragesstats) | **GET** /v1/object-storages/{objectStorageId}/stats | List usage statistics about the specified object storage
*ObjectStoragesApi* | [**updateObjectStorage**](docs/Api/ObjectStoragesApi.md#updateobjectstorage) | **PATCH** /v1/object-storages/{objectStorageId} | Modifies the display name of object storage
*ObjectStoragesApi* | [**upgradeObjectStorage**](docs/Api/ObjectStoragesApi.md#upgradeobjectstorage) | **POST** /v1/object-storages/{objectStorageId}/resize | Upgrade object storage size resp. update autoscaling settings.
*ObjectStoragesAuditsApi* | [**retrieveObjectStorageAuditsList**](docs/Api/ObjectStoragesAuditsApi.md#retrieveobjectstorageauditslist) | **GET** /v1/object-storages/audits | List history about your object storages (audit)
*PrivateNetworksApi* | [**assignInstancePrivateNetwork**](docs/Api/PrivateNetworksApi.md#assigninstanceprivatenetwork) | **POST** /v1/private-networks/{privateNetworkId}/instances/{instanceId} | Add instance to a Private Network
*PrivateNetworksApi* | [**createPrivateNetwork**](docs/Api/PrivateNetworksApi.md#createprivatenetwork) | **POST** /v1/private-networks | Create a new Private Network
*PrivateNetworksApi* | [**deletePrivateNetwork**](docs/Api/PrivateNetworksApi.md#deleteprivatenetwork) | **DELETE** /v1/private-networks/{privateNetworkId} | Delete existing Private Network by id
*PrivateNetworksApi* | [**patchPrivateNetwork**](docs/Api/PrivateNetworksApi.md#patchprivatenetwork) | **PATCH** /v1/private-networks/{privateNetworkId} | Update a Private Network by id
*PrivateNetworksApi* | [**retrievePrivateNetwork**](docs/Api/PrivateNetworksApi.md#retrieveprivatenetwork) | **GET** /v1/private-networks/{privateNetworkId} | Get specific Private Network by id
*PrivateNetworksApi* | [**retrievePrivateNetworkList**](docs/Api/PrivateNetworksApi.md#retrieveprivatenetworklist) | **GET** /v1/private-networks | List Private Networks
*PrivateNetworksApi* | [**unassignInstancePrivateNetwork**](docs/Api/PrivateNetworksApi.md#unassigninstanceprivatenetwork) | **DELETE** /v1/private-networks/{privateNetworkId}/instances/{instanceId} | Remove instance from a Private Network
*PrivateNetworksAuditsApi* | [**retrievePrivateNetworkAuditsList**](docs/Api/PrivateNetworksAuditsApi.md#retrieveprivatenetworkauditslist) | **GET** /v1/private-networks/audits | List history about your Private Networks (audit)
*RolesApi* | [**createRole**](docs/Api/RolesApi.md#createrole) | **POST** /v1/roles | Create a new role
*RolesApi* | [**deleteRole**](docs/Api/RolesApi.md#deleterole) | **DELETE** /v1/roles/{roleId} | Delete existing role by id
*RolesApi* | [**retrieveApiPermissionsList**](docs/Api/RolesApi.md#retrieveapipermissionslist) | **GET** /v1/roles/api-permissions | List of API permissions
*RolesApi* | [**retrieveRole**](docs/Api/RolesApi.md#retrieverole) | **GET** /v1/roles/{roleId} | Get specific role by id
*RolesApi* | [**retrieveRoleList**](docs/Api/RolesApi.md#retrieverolelist) | **GET** /v1/roles | List roles
*RolesApi* | [**updateRole**](docs/Api/RolesApi.md#updaterole) | **PUT** /v1/roles/{roleId} | Update specific role by id
*RolesAuditsApi* | [**retrieveRoleAuditsList**](docs/Api/RolesAuditsApi.md#retrieveroleauditslist) | **GET** /v1/roles/audits | List history about your roles (audit)
*SecretsApi* | [**createSecret**](docs/Api/SecretsApi.md#createsecret) | **POST** /v1/secrets | Create a new secret
*SecretsApi* | [**deleteSecret**](docs/Api/SecretsApi.md#deletesecret) | **DELETE** /v1/secrets/{secretId} | Delete existing secret by id
*SecretsApi* | [**retrieveSecret**](docs/Api/SecretsApi.md#retrievesecret) | **GET** /v1/secrets/{secretId} | Get specific secret by id
*SecretsApi* | [**retrieveSecretList**](docs/Api/SecretsApi.md#retrievesecretlist) | **GET** /v1/secrets | List secrets
*SecretsApi* | [**updateSecret**](docs/Api/SecretsApi.md#updatesecret) | **PATCH** /v1/secrets/{secretId} | Update specific secret by id
*SecretsAuditsApi* | [**retrieveSecretAuditsList**](docs/Api/SecretsAuditsApi.md#retrievesecretauditslist) | **GET** /v1/secrets/audits | List history about your secrets (audit)
*SnapshotsApi* | [**createSnapshot**](docs/Api/SnapshotsApi.md#createsnapshot) | **POST** /v1/compute/instances/{instanceId}/snapshots | Create a new instance snapshot
*SnapshotsApi* | [**deleteSnapshot**](docs/Api/SnapshotsApi.md#deletesnapshot) | **DELETE** /v1/compute/instances/{instanceId}/snapshots/{snapshotId} | Delete existing snapshot by id
*SnapshotsApi* | [**retrieveSnapshot**](docs/Api/SnapshotsApi.md#retrievesnapshot) | **GET** /v1/compute/instances/{instanceId}/snapshots/{snapshotId} | Retrieve a specific snapshot by id
*SnapshotsApi* | [**retrieveSnapshotList**](docs/Api/SnapshotsApi.md#retrievesnapshotlist) | **GET** /v1/compute/instances/{instanceId}/snapshots | List snapshots
*SnapshotsApi* | [**rollbackSnapshot**](docs/Api/SnapshotsApi.md#rollbacksnapshot) | **POST** /v1/compute/instances/{instanceId}/snapshots/{snapshotId}/rollback | Revert the instance to a particular snapshot based on its identifier
*SnapshotsApi* | [**updateSnapshot**](docs/Api/SnapshotsApi.md#updatesnapshot) | **PATCH** /v1/compute/instances/{instanceId}/snapshots/{snapshotId} | Update specific snapshot by id
*SnapshotsAuditsApi* | [**retrieveSnapshotsAuditsList**](docs/Api/SnapshotsAuditsApi.md#retrievesnapshotsauditslist) | **GET** /v1/compute/snapshots/audits | List history about your snapshots (audit) triggered via the API
*TagAssignmentsApi* | [**createAssignment**](docs/Api/TagAssignmentsApi.md#createassignment) | **POST** /v1/tags/{tagId}/assignments/{resourceType}/{resourceId} | Create a new assignment for the tag
*TagAssignmentsApi* | [**deleteAssignment**](docs/Api/TagAssignmentsApi.md#deleteassignment) | **DELETE** /v1/tags/{tagId}/assignments/{resourceType}/{resourceId} | Delete existing tag assignment
*TagAssignmentsApi* | [**retrieveAssignment**](docs/Api/TagAssignmentsApi.md#retrieveassignment) | **GET** /v1/tags/{tagId}/assignments/{resourceType}/{resourceId} | Get specific assignment for the tag
*TagAssignmentsApi* | [**retrieveAssignmentList**](docs/Api/TagAssignmentsApi.md#retrieveassignmentlist) | **GET** /v1/tags/{tagId}/assignments | List tag assignments
*TagAssignmentsAuditsApi* | [**retrieveAssignmentsAuditsList**](docs/Api/TagAssignmentsAuditsApi.md#retrieveassignmentsauditslist) | **GET** /v1/tags/assignments/audits | List history about your assignments (audit)
*TagsApi* | [**createTag**](docs/Api/TagsApi.md#createtag) | **POST** /v1/tags | Create a new tag
*TagsApi* | [**deleteTag**](docs/Api/TagsApi.md#deletetag) | **DELETE** /v1/tags/{tagId} | Delete existing tag by id
*TagsApi* | [**retrieveTag**](docs/Api/TagsApi.md#retrievetag) | **GET** /v1/tags/{tagId} | Get specific tag by id
*TagsApi* | [**retrieveTagList**](docs/Api/TagsApi.md#retrievetaglist) | **GET** /v1/tags | List tags
*TagsApi* | [**updateTag**](docs/Api/TagsApi.md#updatetag) | **PATCH** /v1/tags/{tagId} | Update specific tag by id
*TagsAuditsApi* | [**retrieveTagAuditsList**](docs/Api/TagsAuditsApi.md#retrievetagauditslist) | **GET** /v1/tags/audits | List history about your assignments (audit)
*UsersApi* | [**createUser**](docs/Api/UsersApi.md#createuser) | **POST** /v1/users | Create a new user
*UsersApi* | [**deleteUser**](docs/Api/UsersApi.md#deleteuser) | **DELETE** /v1/users/{userId} | Delete existing user by id
*UsersApi* | [**generateClientSecret**](docs/Api/UsersApi.md#generateclientsecret) | **PUT** /v1/users/client/secret | Generate new client secret
*UsersApi* | [**getObjectStorageCredentials**](docs/Api/UsersApi.md#getobjectstoragecredentials) | **GET** /v1/users/{userId}/object-storages/{objectStorageId}/credentials/{credentialId} | Get S3 compatible object storage credentials.
*UsersApi* | [**listObjectStorageCredentials**](docs/Api/UsersApi.md#listobjectstoragecredentials) | **GET** /v1/users/{userId}/object-storages/credentials | Get list of S3 compatible object storage credentials for user.
*UsersApi* | [**regenerateObjectStorageCredentials**](docs/Api/UsersApi.md#regenerateobjectstoragecredentials) | **PATCH** /v1/users/{userId}/object-storages/{objectStorageId}/credentials/{credentialId} | Regenerates secret key of specified user for the S3 compatible object storages.
*UsersApi* | [**resendEmailVerification**](docs/Api/UsersApi.md#resendemailverification) | **POST** /v1/users/{userId}/resend-email-verification | Resend email verification
*UsersApi* | [**resetPassword**](docs/Api/UsersApi.md#resetpassword) | **POST** /v1/users/{userId}/reset-password | Send reset password email
*UsersApi* | [**retrieveUser**](docs/Api/UsersApi.md#retrieveuser) | **GET** /v1/users/{userId} | Get specific user by id
*UsersApi* | [**retrieveUserClient**](docs/Api/UsersApi.md#retrieveuserclient) | **GET** /v1/users/client | Get client
*UsersApi* | [**retrieveUserList**](docs/Api/UsersApi.md#retrieveuserlist) | **GET** /v1/users | List users
*UsersApi* | [**updateUser**](docs/Api/UsersApi.md#updateuser) | **PATCH** /v1/users/{userId} | Update specific user by id
*UsersAuditsApi* | [**retrieveUserAuditsList**](docs/Api/UsersAuditsApi.md#retrieveuserauditslist) | **GET** /v1/users/audits | List history about your users (audit)

## Documentation For Models

 - [AddOnQuantityRequest](docs/Model/AddOnQuantityRequest.md)
 - [AddOnRequest](docs/Model/AddOnRequest.md)
 - [AddOnResponse](docs/Model/AddOnResponse.md)
 - [AdditionalIp](docs/Model/AdditionalIp.md)
 - [AllOfAssignInstancePrivateNetworkResponseLinks](docs/Model/AllOfAssignInstancePrivateNetworkResponseLinks.md)
 - [AllOfCancelInstanceResponseLinks](docs/Model/AllOfCancelInstanceResponseLinks.md)
 - [AllOfCancelObjectStorageResponseLinks](docs/Model/AllOfCancelObjectStorageResponseLinks.md)
 - [AllOfCreateAssignmentResponseLinks](docs/Model/AllOfCreateAssignmentResponseLinks.md)
 - [AllOfCreateCustomImageResponseLinks](docs/Model/AllOfCreateCustomImageResponseLinks.md)
 - [AllOfCreateInstanceAddonsExtraStorage](docs/Model/AllOfCreateInstanceAddonsExtraStorage.md)
 - [AllOfCreateInstanceRequestAddOns](docs/Model/AllOfCreateInstanceRequestAddOns.md)
 - [AllOfCreateInstanceResponseLinks](docs/Model/AllOfCreateInstanceResponseLinks.md)
 - [AllOfCreateObjectStorageRequestAutoScaling](docs/Model/AllOfCreateObjectStorageRequestAutoScaling.md)
 - [AllOfCreateObjectStorageResponseDataAutoScaling](docs/Model/AllOfCreateObjectStorageResponseDataAutoScaling.md)
 - [AllOfCreateObjectStorageResponseLinks](docs/Model/AllOfCreateObjectStorageResponseLinks.md)
 - [AllOfCreatePrivateNetworkResponseLinks](docs/Model/AllOfCreatePrivateNetworkResponseLinks.md)
 - [AllOfCreateRoleResponseLinks](docs/Model/AllOfCreateRoleResponseLinks.md)
 - [AllOfCreateSecretResponseLinks](docs/Model/AllOfCreateSecretResponseLinks.md)
 - [AllOfCreateSnapshotResponseLinks](docs/Model/AllOfCreateSnapshotResponseLinks.md)
 - [AllOfCreateTagResponseLinks](docs/Model/AllOfCreateTagResponseLinks.md)
 - [AllOfCreateTicketResponseLinks](docs/Model/AllOfCreateTicketResponseLinks.md)
 - [AllOfCreateUserResponseLinks](docs/Model/AllOfCreateUserResponseLinks.md)
 - [AllOfCustomImagesStatsResponseLinks](docs/Model/AllOfCustomImagesStatsResponseLinks.md)
 - [AllOfFindAssignmentResponseLinks](docs/Model/AllOfFindAssignmentResponseLinks.md)
 - [AllOfFindClientResponseLinks](docs/Model/AllOfFindClientResponseLinks.md)
 - [AllOfFindCredentialResponseLinks](docs/Model/AllOfFindCredentialResponseLinks.md)
 - [AllOfFindImageResponseLinks](docs/Model/AllOfFindImageResponseLinks.md)
 - [AllOfFindInstanceResponseLinks](docs/Model/AllOfFindInstanceResponseLinks.md)
 - [AllOfFindObjectStorageResponseLinks](docs/Model/AllOfFindObjectStorageResponseLinks.md)
 - [AllOfFindPrivateNetworkResponseLinks](docs/Model/AllOfFindPrivateNetworkResponseLinks.md)
 - [AllOfFindRoleResponseLinks](docs/Model/AllOfFindRoleResponseLinks.md)
 - [AllOfFindSecretResponseLinks](docs/Model/AllOfFindSecretResponseLinks.md)
 - [AllOfFindSnapshotResponseLinks](docs/Model/AllOfFindSnapshotResponseLinks.md)
 - [AllOfFindTagResponseLinks](docs/Model/AllOfFindTagResponseLinks.md)
 - [AllOfFindUserIsPasswordSetResponseLinks](docs/Model/AllOfFindUserIsPasswordSetResponseLinks.md)
 - [AllOfFindUserResponseLinks](docs/Model/AllOfFindUserResponseLinks.md)
 - [AllOfFindVncResponseLinks](docs/Model/AllOfFindVncResponseLinks.md)
 - [AllOfGenerateClientSecretResponseLinks](docs/Model/AllOfGenerateClientSecretResponseLinks.md)
 - [AllOfImageAuditResponseLinks](docs/Model/AllOfImageAuditResponseLinks.md)
 - [AllOfImageAuditResponsePagination](docs/Model/AllOfImageAuditResponsePagination.md)
 - [AllOfInstanceRescueActionResponseLinks](docs/Model/AllOfInstanceRescueActionResponseLinks.md)
 - [AllOfInstanceResetPasswordActionResponseLinks](docs/Model/AllOfInstanceResetPasswordActionResponseLinks.md)
 - [AllOfInstanceRestartActionResponseLinks](docs/Model/AllOfInstanceRestartActionResponseLinks.md)
 - [AllOfInstanceShutdownActionResponseLinks](docs/Model/AllOfInstanceShutdownActionResponseLinks.md)
 - [AllOfInstanceStartActionResponseLinks](docs/Model/AllOfInstanceStartActionResponseLinks.md)
 - [AllOfInstanceStopActionResponseLinks](docs/Model/AllOfInstanceStopActionResponseLinks.md)
 - [AllOfListApiPermissionResponseLinks](docs/Model/AllOfListApiPermissionResponseLinks.md)
 - [AllOfListAssignmentAuditsResponseLinks](docs/Model/AllOfListAssignmentAuditsResponseLinks.md)
 - [AllOfListAssignmentAuditsResponsePagination](docs/Model/AllOfListAssignmentAuditsResponsePagination.md)
 - [AllOfListAssignmentResponseLinks](docs/Model/AllOfListAssignmentResponseLinks.md)
 - [AllOfListAssignmentResponsePagination](docs/Model/AllOfListAssignmentResponsePagination.md)
 - [AllOfListCredentialResponseLinks](docs/Model/AllOfListCredentialResponseLinks.md)
 - [AllOfListCredentialResponsePagination](docs/Model/AllOfListCredentialResponsePagination.md)
 - [AllOfListDataCenterResponseLinks](docs/Model/AllOfListDataCenterResponseLinks.md)
 - [AllOfListDataCenterResponsePagination](docs/Model/AllOfListDataCenterResponsePagination.md)
 - [AllOfListImageResponseLinks](docs/Model/AllOfListImageResponseLinks.md)
 - [AllOfListImageResponsePagination](docs/Model/AllOfListImageResponsePagination.md)
 - [AllOfListInstancesActionsAuditResponseLinks](docs/Model/AllOfListInstancesActionsAuditResponseLinks.md)
 - [AllOfListInstancesActionsAuditResponsePagination](docs/Model/AllOfListInstancesActionsAuditResponsePagination.md)
 - [AllOfListInstancesAuditResponseLinks](docs/Model/AllOfListInstancesAuditResponseLinks.md)
 - [AllOfListInstancesAuditResponsePagination](docs/Model/AllOfListInstancesAuditResponsePagination.md)
 - [AllOfListInstancesResponseLinks](docs/Model/AllOfListInstancesResponseLinks.md)
 - [AllOfListInstancesResponsePagination](docs/Model/AllOfListInstancesResponsePagination.md)
 - [AllOfListObjectStorageAuditResponseLinks](docs/Model/AllOfListObjectStorageAuditResponseLinks.md)
 - [AllOfListObjectStorageAuditResponsePagination](docs/Model/AllOfListObjectStorageAuditResponsePagination.md)
 - [AllOfListObjectStorageResponseLinks](docs/Model/AllOfListObjectStorageResponseLinks.md)
 - [AllOfListObjectStorageResponsePagination](docs/Model/AllOfListObjectStorageResponsePagination.md)
 - [AllOfListPrivateNetworkAuditResponseLinks](docs/Model/AllOfListPrivateNetworkAuditResponseLinks.md)
 - [AllOfListPrivateNetworkAuditResponsePagination](docs/Model/AllOfListPrivateNetworkAuditResponsePagination.md)
 - [AllOfListPrivateNetworkResponseLinks](docs/Model/AllOfListPrivateNetworkResponseLinks.md)
 - [AllOfListPrivateNetworkResponsePagination](docs/Model/AllOfListPrivateNetworkResponsePagination.md)
 - [AllOfListRoleAuditResponseLinks](docs/Model/AllOfListRoleAuditResponseLinks.md)
 - [AllOfListRoleResponseLinks](docs/Model/AllOfListRoleResponseLinks.md)
 - [AllOfListRoleResponsePagination](docs/Model/AllOfListRoleResponsePagination.md)
 - [AllOfListSecretAuditResponseLinks](docs/Model/AllOfListSecretAuditResponseLinks.md)
 - [AllOfListSecretAuditResponsePagination](docs/Model/AllOfListSecretAuditResponsePagination.md)
 - [AllOfListSecretResponseLinks](docs/Model/AllOfListSecretResponseLinks.md)
 - [AllOfListSecretResponsePagination](docs/Model/AllOfListSecretResponsePagination.md)
 - [AllOfListSnapshotResponseLinks](docs/Model/AllOfListSnapshotResponseLinks.md)
 - [AllOfListSnapshotResponsePagination](docs/Model/AllOfListSnapshotResponsePagination.md)
 - [AllOfListSnapshotsAuditResponseLinks](docs/Model/AllOfListSnapshotsAuditResponseLinks.md)
 - [AllOfListSnapshotsAuditResponsePagination](docs/Model/AllOfListSnapshotsAuditResponsePagination.md)
 - [AllOfListTagAuditsResponseLinks](docs/Model/AllOfListTagAuditsResponseLinks.md)
 - [AllOfListTagAuditsResponsePagination](docs/Model/AllOfListTagAuditsResponsePagination.md)
 - [AllOfListTagResponseLinks](docs/Model/AllOfListTagResponseLinks.md)
 - [AllOfListTagResponsePagination](docs/Model/AllOfListTagResponsePagination.md)
 - [AllOfListUserAuditResponseLinks](docs/Model/AllOfListUserAuditResponseLinks.md)
 - [AllOfListUserAuditResponsePagination](docs/Model/AllOfListUserAuditResponsePagination.md)
 - [AllOfListUserResponseLinks](docs/Model/AllOfListUserResponseLinks.md)
 - [AllOfListUserResponsePagination](docs/Model/AllOfListUserResponsePagination.md)
 - [AllOfObjectStorageResponseAutoScaling](docs/Model/AllOfObjectStorageResponseAutoScaling.md)
 - [AllOfObjectStoragesStatsResponseLinks](docs/Model/AllOfObjectStoragesStatsResponseLinks.md)
 - [AllOfPatchInstanceResponseLinks](docs/Model/AllOfPatchInstanceResponseLinks.md)
 - [AllOfPatchPrivateNetworkResponseLinks](docs/Model/AllOfPatchPrivateNetworkResponseLinks.md)
 - [AllOfReinstallInstanceResponseLinks](docs/Model/AllOfReinstallInstanceResponseLinks.md)
 - [AllOfRollbackSnapshotResponseLinks](docs/Model/AllOfRollbackSnapshotResponseLinks.md)
 - [AllOfUnassignInstancePrivateNetworkResponseLinks](docs/Model/AllOfUnassignInstancePrivateNetworkResponseLinks.md)
 - [AllOfUpdateCustomImageResponseLinks](docs/Model/AllOfUpdateCustomImageResponseLinks.md)
 - [AllOfUpdateRoleResponseLinks](docs/Model/AllOfUpdateRoleResponseLinks.md)
 - [AllOfUpdateSecretResponseLinks](docs/Model/AllOfUpdateSecretResponseLinks.md)
 - [AllOfUpdateSnapshotResponseLinks](docs/Model/AllOfUpdateSnapshotResponseLinks.md)
 - [AllOfUpdateTagResponseLinks](docs/Model/AllOfUpdateTagResponseLinks.md)
 - [AllOfUpdateUserResponseLinks](docs/Model/AllOfUpdateUserResponseLinks.md)
 - [AllOfUpgradeInstanceRequestPrivateNetworking](docs/Model/AllOfUpgradeInstanceRequestPrivateNetworking.md)
 - [AllOfUpgradeObjectStorageRequestAutoScaling](docs/Model/AllOfUpgradeObjectStorageRequestAutoScaling.md)
 - [AllOfUpgradeObjectStorageResponseDataAutoScaling](docs/Model/AllOfUpgradeObjectStorageResponseDataAutoScaling.md)
 - [AllOfUpgradeObjectStorageResponseLinks](docs/Model/AllOfUpgradeObjectStorageResponseLinks.md)
 - [ApiPermissionsResponse](docs/Model/ApiPermissionsResponse.md)
 - [AssignInstancePrivateNetworkResponse](docs/Model/AssignInstancePrivateNetworkResponse.md)
 - [AssignmentAuditResponse](docs/Model/AssignmentAuditResponse.md)
 - [AssignmentResponse](docs/Model/AssignmentResponse.md)
 - [AutoScalingTypeRequest](docs/Model/AutoScalingTypeRequest.md)
 - [AutoScalingTypeResponse](docs/Model/AutoScalingTypeResponse.md)
 - [CancelInstanceResponse](docs/Model/CancelInstanceResponse.md)
 - [CancelInstanceResponseData](docs/Model/CancelInstanceResponseData.md)
 - [CancelObjectStorageResponse](docs/Model/CancelObjectStorageResponse.md)
 - [CancelObjectStorageResponseData](docs/Model/CancelObjectStorageResponseData.md)
 - [ClientResponse](docs/Model/ClientResponse.md)
 - [ClientSecretResponse](docs/Model/ClientSecretResponse.md)
 - [CreateAssignmentResponse](docs/Model/CreateAssignmentResponse.md)
 - [CreateCustomImageFailResponse](docs/Model/CreateCustomImageFailResponse.md)
 - [CreateCustomImageRequest](docs/Model/CreateCustomImageRequest.md)
 - [CreateCustomImageResponse](docs/Model/CreateCustomImageResponse.md)
 - [CreateCustomImageResponseData](docs/Model/CreateCustomImageResponseData.md)
 - [CreateInstanceAddons](docs/Model/CreateInstanceAddons.md)
 - [CreateInstanceRequest](docs/Model/CreateInstanceRequest.md)
 - [CreateInstanceResponse](docs/Model/CreateInstanceResponse.md)
 - [CreateInstanceResponseData](docs/Model/CreateInstanceResponseData.md)
 - [CreateObjectStorageRequest](docs/Model/CreateObjectStorageRequest.md)
 - [CreateObjectStorageResponse](docs/Model/CreateObjectStorageResponse.md)
 - [CreateObjectStorageResponseData](docs/Model/CreateObjectStorageResponseData.md)
 - [CreatePrivateNetworkRequest](docs/Model/CreatePrivateNetworkRequest.md)
 - [CreatePrivateNetworkResponse](docs/Model/CreatePrivateNetworkResponse.md)
 - [CreateRoleRequest](docs/Model/CreateRoleRequest.md)
 - [CreateRoleResponse](docs/Model/CreateRoleResponse.md)
 - [CreateRoleResponseData](docs/Model/CreateRoleResponseData.md)
 - [CreateSecretRequest](docs/Model/CreateSecretRequest.md)
 - [CreateSecretResponse](docs/Model/CreateSecretResponse.md)
 - [CreateSnapshotRequest](docs/Model/CreateSnapshotRequest.md)
 - [CreateSnapshotResponse](docs/Model/CreateSnapshotResponse.md)
 - [CreateTagRequest](docs/Model/CreateTagRequest.md)
 - [CreateTagResponse](docs/Model/CreateTagResponse.md)
 - [CreateTagResponseData](docs/Model/CreateTagResponseData.md)
 - [CreateTicketRequest](docs/Model/CreateTicketRequest.md)
 - [CreateTicketResponse](docs/Model/CreateTicketResponse.md)
 - [CreateTicketResponseData](docs/Model/CreateTicketResponseData.md)
 - [CreateUserRequest](docs/Model/CreateUserRequest.md)
 - [CreateUserResponse](docs/Model/CreateUserResponse.md)
 - [CreateUserResponseData](docs/Model/CreateUserResponseData.md)
 - [CredentialData](docs/Model/CredentialData.md)
 - [CustomImagesStatsResponse](docs/Model/CustomImagesStatsResponse.md)
 - [CustomImagesStatsResponseData](docs/Model/CustomImagesStatsResponseData.md)
 - [DataCenterResponse](docs/Model/DataCenterResponse.md)
 - [ExtraStorageRequest](docs/Model/ExtraStorageRequest.md)
 - [FindAssignmentResponse](docs/Model/FindAssignmentResponse.md)
 - [FindClientResponse](docs/Model/FindClientResponse.md)
 - [FindCredentialResponse](docs/Model/FindCredentialResponse.md)
 - [FindImageResponse](docs/Model/FindImageResponse.md)
 - [FindInstanceResponse](docs/Model/FindInstanceResponse.md)
 - [FindObjectStorageResponse](docs/Model/FindObjectStorageResponse.md)
 - [FindPrivateNetworkResponse](docs/Model/FindPrivateNetworkResponse.md)
 - [FindRoleResponse](docs/Model/FindRoleResponse.md)
 - [FindSecretResponse](docs/Model/FindSecretResponse.md)
 - [FindSnapshotResponse](docs/Model/FindSnapshotResponse.md)
 - [FindTagResponse](docs/Model/FindTagResponse.md)
 - [FindUserIsPasswordSetResponse](docs/Model/FindUserIsPasswordSetResponse.md)
 - [FindUserResponse](docs/Model/FindUserResponse.md)
 - [FindVncResponse](docs/Model/FindVncResponse.md)
 - [FirewallingUpgradeRequest](docs/Model/FirewallingUpgradeRequest.md)
 - [GenerateClientSecretResponse](docs/Model/GenerateClientSecretResponse.md)
 - [ImageAuditResponse](docs/Model/ImageAuditResponse.md)
 - [ImageAuditResponseData](docs/Model/ImageAuditResponseData.md)
 - [ImageResponse](docs/Model/ImageResponse.md)
 - [InstanceAssignmentSelfLinks](docs/Model/InstanceAssignmentSelfLinks.md)
 - [InstanceRescueActionResponse](docs/Model/InstanceRescueActionResponse.md)
 - [InstanceRescueActionResponseData](docs/Model/InstanceRescueActionResponseData.md)
 - [InstanceResetPasswordActionResponse](docs/Model/InstanceResetPasswordActionResponse.md)
 - [InstanceResetPasswordActionResponseData](docs/Model/InstanceResetPasswordActionResponseData.md)
 - [InstanceResponse](docs/Model/InstanceResponse.md)
 - [InstanceRestartActionResponse](docs/Model/InstanceRestartActionResponse.md)
 - [InstanceRestartActionResponseData](docs/Model/InstanceRestartActionResponseData.md)
 - [InstanceShutdownActionResponse](docs/Model/InstanceShutdownActionResponse.md)
 - [InstanceShutdownActionResponseData](docs/Model/InstanceShutdownActionResponseData.md)
 - [InstanceStartActionResponse](docs/Model/InstanceStartActionResponse.md)
 - [InstanceStartActionResponseData](docs/Model/InstanceStartActionResponseData.md)
 - [InstanceStatus](docs/Model/InstanceStatus.md)
 - [InstanceStopActionResponse](docs/Model/InstanceStopActionResponse.md)
 - [InstanceStopActionResponseData](docs/Model/InstanceStopActionResponseData.md)
 - [Instances](docs/Model/Instances.md)
 - [InstancesActionsAuditResponse](docs/Model/InstancesActionsAuditResponse.md)
 - [InstancesActionsRescueRequest](docs/Model/InstancesActionsRescueRequest.md)
 - [InstancesAuditResponse](docs/Model/InstancesAuditResponse.md)
 - [InstancesResetPasswordActionsRequest](docs/Model/InstancesResetPasswordActionsRequest.md)
 - [IpConfig](docs/Model/IpConfig.md)
 - [IpV4](docs/Model/IpV4.md)
 - [IpV6](docs/Model/IpV6.md)
 - [Links](docs/Model/Links.md)
 - [ListApiPermissionResponse](docs/Model/ListApiPermissionResponse.md)
 - [ListAssignmentAuditsResponse](docs/Model/ListAssignmentAuditsResponse.md)
 - [ListAssignmentResponse](docs/Model/ListAssignmentResponse.md)
 - [ListCredentialResponse](docs/Model/ListCredentialResponse.md)
 - [ListDataCenterResponse](docs/Model/ListDataCenterResponse.md)
 - [ListImageResponse](docs/Model/ListImageResponse.md)
 - [ListImageResponseData](docs/Model/ListImageResponseData.md)
 - [ListInstancesActionsAuditResponse](docs/Model/ListInstancesActionsAuditResponse.md)
 - [ListInstancesAuditResponse](docs/Model/ListInstancesAuditResponse.md)
 - [ListInstancesResponse](docs/Model/ListInstancesResponse.md)
 - [ListInstancesResponseData](docs/Model/ListInstancesResponseData.md)
 - [ListObjectStorageAuditResponse](docs/Model/ListObjectStorageAuditResponse.md)
 - [ListObjectStorageResponse](docs/Model/ListObjectStorageResponse.md)
 - [ListPrivateNetworkAuditResponse](docs/Model/ListPrivateNetworkAuditResponse.md)
 - [ListPrivateNetworkResponse](docs/Model/ListPrivateNetworkResponse.md)
 - [ListPrivateNetworkResponseData](docs/Model/ListPrivateNetworkResponseData.md)
 - [ListRoleAuditResponse](docs/Model/ListRoleAuditResponse.md)
 - [ListRoleResponse](docs/Model/ListRoleResponse.md)
 - [ListSecretAuditResponse](docs/Model/ListSecretAuditResponse.md)
 - [ListSecretResponse](docs/Model/ListSecretResponse.md)
 - [ListSnapshotResponse](docs/Model/ListSnapshotResponse.md)
 - [ListSnapshotsAuditResponse](docs/Model/ListSnapshotsAuditResponse.md)
 - [ListTagAuditsResponse](docs/Model/ListTagAuditsResponse.md)
 - [ListTagResponse](docs/Model/ListTagResponse.md)
 - [ListUserAuditResponse](docs/Model/ListUserAuditResponse.md)
 - [ListUserResponse](docs/Model/ListUserResponse.md)
 - [ObjectStorageAuditResponse](docs/Model/ObjectStorageAuditResponse.md)
 - [ObjectStorageResponse](docs/Model/ObjectStorageResponse.md)
 - [ObjectStoragesStatsResponse](docs/Model/ObjectStoragesStatsResponse.md)
 - [ObjectStoragesStatsResponseData](docs/Model/ObjectStoragesStatsResponseData.md)
 - [PaginationMeta](docs/Model/PaginationMeta.md)
 - [PatchInstanceRequest](docs/Model/PatchInstanceRequest.md)
 - [PatchInstanceResponse](docs/Model/PatchInstanceResponse.md)
 - [PatchInstanceResponseData](docs/Model/PatchInstanceResponseData.md)
 - [PatchObjectStorageRequest](docs/Model/PatchObjectStorageRequest.md)
 - [PatchPrivateNetworkRequest](docs/Model/PatchPrivateNetworkRequest.md)
 - [PatchPrivateNetworkResponse](docs/Model/PatchPrivateNetworkResponse.md)
 - [PatchVncRequest](docs/Model/PatchVncRequest.md)
 - [PermissionRequest](docs/Model/PermissionRequest.md)
 - [PermissionResponse](docs/Model/PermissionResponse.md)
 - [PrivateIpConfig](docs/Model/PrivateIpConfig.md)
 - [PrivateNetworkAuditResponse](docs/Model/PrivateNetworkAuditResponse.md)
 - [PrivateNetworkResponse](docs/Model/PrivateNetworkResponse.md)
 - [PrivateNetworkingUpgradeRequest](docs/Model/PrivateNetworkingUpgradeRequest.md)
 - [ReinstallInstanceRequest](docs/Model/ReinstallInstanceRequest.md)
 - [ReinstallInstanceResponse](docs/Model/ReinstallInstanceResponse.md)
 - [ReinstallInstanceResponseData](docs/Model/ReinstallInstanceResponseData.md)
 - [ResourcePermissionsResponse](docs/Model/ResourcePermissionsResponse.md)
 - [RoleAuditResponse](docs/Model/RoleAuditResponse.md)
 - [RoleResponse](docs/Model/RoleResponse.md)
 - [RollbackSnapshotRequest](docs/Model/RollbackSnapshotRequest.md)
 - [RollbackSnapshotResponse](docs/Model/RollbackSnapshotResponse.md)
 - [SecretAuditResponse](docs/Model/SecretAuditResponse.md)
 - [SecretResponse](docs/Model/SecretResponse.md)
 - [SelfLinks](docs/Model/SelfLinks.md)
 - [SnapshotResponse](docs/Model/SnapshotResponse.md)
 - [SnapshotsAuditResponse](docs/Model/SnapshotsAuditResponse.md)
 - [TagAssignmentSelfLinks](docs/Model/TagAssignmentSelfLinks.md)
 - [TagAuditResponse](docs/Model/TagAuditResponse.md)
 - [TagResponse](docs/Model/TagResponse.md)
 - [TagResponse1](docs/Model/TagResponse1.md)
 - [UnassignInstancePrivateNetworkResponse](docs/Model/UnassignInstancePrivateNetworkResponse.md)
 - [UpdateCustomImageRequest](docs/Model/UpdateCustomImageRequest.md)
 - [UpdateCustomImageResponse](docs/Model/UpdateCustomImageResponse.md)
 - [UpdateCustomImageResponseData](docs/Model/UpdateCustomImageResponseData.md)
 - [UpdateRoleRequest](docs/Model/UpdateRoleRequest.md)
 - [UpdateRoleResponse](docs/Model/UpdateRoleResponse.md)
 - [UpdateSecretRequest](docs/Model/UpdateSecretRequest.md)
 - [UpdateSecretResponse](docs/Model/UpdateSecretResponse.md)
 - [UpdateSnapshotRequest](docs/Model/UpdateSnapshotRequest.md)
 - [UpdateSnapshotResponse](docs/Model/UpdateSnapshotResponse.md)
 - [UpdateTagRequest](docs/Model/UpdateTagRequest.md)
 - [UpdateTagResponse](docs/Model/UpdateTagResponse.md)
 - [UpdateUserRequest](docs/Model/UpdateUserRequest.md)
 - [UpdateUserResponse](docs/Model/UpdateUserResponse.md)
 - [UpgradeAutoScalingType](docs/Model/UpgradeAutoScalingType.md)
 - [UpgradeInstanceRequest](docs/Model/UpgradeInstanceRequest.md)
 - [UpgradeObjectStorageRequest](docs/Model/UpgradeObjectStorageRequest.md)
 - [UpgradeObjectStorageResponse](docs/Model/UpgradeObjectStorageResponse.md)
 - [UpgradeObjectStorageResponseData](docs/Model/UpgradeObjectStorageResponseData.md)
 - [UserAuditResponse](docs/Model/UserAuditResponse.md)
 - [UserIsPasswordSetResponse](docs/Model/UserIsPasswordSetResponse.md)
 - [UserResponse](docs/Model/UserResponse.md)
 - [VncResponse](docs/Model/VncResponse.md)

## Documentation For Authorization


## bearer

- **Type**: HTTP bearer authentication


## Author

support@contabo.com

