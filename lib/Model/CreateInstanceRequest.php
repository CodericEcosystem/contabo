<?php
/**
 * CreateInstanceRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  Contabo\ContaboSdk
 * @author   Coderic Development Team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Contabo API
 *
 * # Introduction  Contabo API allows you to manage your resources using HTTP requests. This documentation includes a set of HTTP endpoints that are designed to RESTful principles. Each endpoint includes descriptions, request syntax, and examples.  Contabo provides also a CLI tool which enables you to manage your resources easily from the command line. [CLI Download and  Installation instructions.](https://github.com/contabo/cntb)  ## Product documentation  If you are looking for description about the products themselves and their usage in general or for specific purposes, please check the [Contabo Product Documentation](https://docs.contabo.com/).  ## Getting Started  In order to use the Contabo API you will need the following credentials which are available from the [Customer Control Panel](https://my.contabo.com/api/details): 1. ClientId 2. ClientSecret 3. API User (your email address to login to the [Customer Control Panel](https://my.contabo.com/api/details)) 4. API Password (this is a new password which you'll set or change in the [Customer Control Panel](https://my.contabo.com/api/details))  You can either use the API directly or by using the `cntb` CLI (Command Line Interface) tool.  ### Using the API directly  #### Via `curl` for Linux/Unix like systems  This requires `curl` and `jq` in your shell (e.g. `bash`, `zsh`). Please replace the first four placeholders with actual values.  ```sh CLIENT_ID=<ClientId from Customer Control Panel> CLIENT_SECRET=<ClientSecret from Customer Control Panel> API_USER=<API User from Customer Control Panel> API_PASSWORD='<API Password from Customer Control Panel>' ACCESS_TOKEN=$(curl -d \"client_id=$CLIENT_ID\" -d \"client_secret=$CLIENT_SECRET\" --data-urlencode \"username=$API_USER\" --data-urlencode \"password=$API_PASSWORD\" -d 'grant_type=password' 'https://auth.contabo.com/auth/realms/contabo/protocol/openid-connect/token' | jq -r '.access_token') # get list of your instances curl -X GET -H \"Authorization: Bearer $ACCESS_TOKEN\" -H \"x-request-id: 51A87ECD-754E-4104-9C54-D01AD0F83406\" \"https://api.contabo.com/v1/compute/instances\" | jq ```  #### Via `PowerShell` for Windows  Please open `PowerShell` and execute the following code after replacing the first four placeholders with actual values.  ```powershell $client_id='<ClientId from Customer Control Panel>' $client_secret='<ClientSecret from Customer Control Panel>' $api_user='<API User from Customer Control Panel>' $api_password='<API Password from Customer Control Panel>' $body = @{grant_type='password' client_id=$client_id client_secret=$client_secret username=$api_user password=$api_password} $response = Invoke-WebRequest -Uri 'https://auth.contabo.com/auth/realms/contabo/protocol/openid-connect/token' -Method 'POST' -Body $body $access_token = (ConvertFrom-Json $([String]::new($response.Content))).access_token # get list of your instances $headers = @{} $headers.Add(\"Authorization\",\"Bearer $access_token\") $headers.Add(\"x-request-id\",\"51A87ECD-754E-4104-9C54-D01AD0F83406\") Invoke-WebRequest -Uri 'https://api.contabo.com/v1/compute/instances' -Method 'GET' -Headers $headers ```  ### Using the Contabo API via the `cntb` CLI tool  1. Download `cntb` for your operating system (MacOS, Windows and Linux supported) [here](https://github.com/contabo/cntb) 2. Unzip the downloaded file 3. You might move the executable to any location on your disk. You may update your `PATH` environment variable for easier invocation. 4. Configure it once to use your credentials              ```sh    cntb config set-credentials --oauth2-clientid=<ClientId from Customer Control Panel> --oauth2-client-secret=<ClientSecret from Customer Control Panel> --oauth2-user=<API User from Customer Control Panel> --oauth2-password='<API Password from Customer Control Panel>'    ```  5. Use the CLI              ```sh    # get list of your instances    cntb get instances    # help    cntb help    ```  ## API Overview  ### [Compute Management](#tag/Instances)  The Compute Management API allows you to manage compute resources (e.g. creation, deletion, starting, stopping) of VPS and VDS (please note that Storage VPS are not supported via API or CLI) as well as managing snapshots and custom images. It also offers you to take advantage of [cloud-init](https://cloud-init.io/) at least on our default / standard images (for custom images you'll need to provide cloud-init support packages). The API offers provisioning of cloud-init scripts via the `user_data` field.  Custom images must be provided in `.qcow2` or `.iso` format. This gives you even more flexibility for setting up your environment.  ### [Object Storage](#tag/Object-Storages)  The Object Storage API allows you to order, upgrade, cancel and control the auto-scaling feature for [S3](https://en.wikipedia.org/wiki/Amazon_S3) compatible object storage. You may also get some usage statistics. You can only buy one object storage per location. In case you need more storage space in a location you can purchase more space or enable the auto-scaling feature to purchase automatically more storage space up to the specified monthly limit.  Please note that this is not the S3 compatible API. It is not documented here. The S3 compatible API needs to be used with the corresponding credentials, namely an `access_key` and `secret_key`. Those can be retrieved by invoking the User Management API. All purchased object storages in different locations share the same credentials. You are free to use S3 compatible tools like [`aws`](https://aws.amazon.com/cli/) cli or similar.  ### [Private Networking](#tag/Private-Networks)  The Private Networking API allows you to manage private networks / Virtual Private Clouds (VPC) for your Cloud VPS and VDS (please note that Storage VPS are not supported via API or CLI). Having a private network allows the associated instances to have a private and direct network connection. The traffic won't leave the data center and cannot be accessed by any other instance.  With this feature you can create multi layer systems, e.g. having a database server being only accessible from your application servers in one private network and keep the database replication in a second, separate network. This increases the speed as the traffic is NOT routed to the internet and also security as the traffic is within it's own secured VLAN.  Adding a Cloud VPS or VDS to a private network requires a reinstallation to make sure that all relevant parts for private networking are in place. When adding the same instance to another private network it will require a restart in order to make additional virtual network interface cards (NICs) available.  Please note that for each instance being part of one or several private networks a payed add-on is required. You can automatically purchase it via the Compute Management API.  ### [Secrets Management](#tag/Secrets)  You can optionally save your passwords or public ssh keys using the Secrets Management API. You are not required to use it there will be no functional disadvantages.  By using that API you can easily reuse you public ssh keys when setting up different servers without the need to look them up every time. It can also be used to allow Contabo Supporters to access your machine without sending the passwords via potentially unsecure emails.  ### [User Management](#tag/Users)  If you need to allow other persons or automation scripts to access specific API endpoints resp. resources the User Management API comes into play. With that API you are able to manage users having possibly restricted access. You are free to define those restrictions to fit your needs. So beside an arbitrary number of users you basically define any number of so called `roles`. Roles allows access and must be one of the following types:  * `apiPermission`             This allows you to specify a restriction to certain functions of an API by allowing control over POST (=Create), GET (=Read), PUT/PATCH (=Update) and DELETE (=Delete) methods for each API endpoint (URL) individually. * `resourcePermission`             In order to restrict access to specific resources create a role with `resourcePermission` type by specifying any number of [tags](#tag-management). These tags need to be assigned to resources for them to take effect. E.g. a tag could be assigned to several compute resources. So that a user with that role (and of course access to the API endpoints via `apiPermission` role type) could only access those compute resources.  The `roles` are then assigned to a `user`. You can assign one or several roles regardless of the role's type. Of course you could also assign a user `admin` privileges without specifying any roles.  ### [Tag Management](#tag/Tags)  The Tag Management API allows you to manage your tags in order to organize your resources in a more convenient way. Simply assign a tag to resources like a compute resource to manage them.The assignments of tags to resources will also enable you to control access to these specific resources to users via the [User Management API](#user-management). For convenience reasons you might choose a color for tag. The Customer Control Panel will use that color to display the tags.  ## Requests  The Contabo API supports HTTP requests like mentioned below. Not every endpoint supports all methods. The allowed methods are listed within this documentation.  Method | Description ---    | --- GET    | To retrieve information about a resource, use the GET method.<br>The data is returned as a JSON object. GET methods are read-only and do not affect any resources. POST   | Issue a POST method to create a new object. Include all needed attributes in the request body encoded as JSON. PATCH  | Some resources support partial modification with PATCH,<br>which modifies specific attributes without updating the entire object representation. PUT    | Use the PUT method to update information about a resource.<br>PUT will set new values on the item without regard to their current values. DELETE | Use the DELETE method to destroy a resource in your account.<br>If it is not found, the operation will return a 4xx error and an appropriate message.  ## Responses  Usually the Contabo API should respond to your requests. The data returned is in [JSON](https://www.json.org/) format allowing easy processing in any programming language or tools.  As common for HTTP requests you will get back a so called HTTP status code. This gives you overall information about success or error. The following table lists common HTTP status codes.  Please note that the description of the endpoints and methods are not listing all possibly status codes in detail as they are generic. Only special return codes with their resp. response data are explicitly listed.  Response Code | Description --- | --- 200 | The response contains your requested information. 201 | Your request was accepted. The resource was created. 204 | Your request succeeded, there is no additional information returned. 400 | Your request was malformed. 401 | You did not supply valid authentication credentials. 402 | Request refused as it requires additional payed service. 403 | You are not allowed to perform the request. 404 | No results were found for your request or resource does not exist. 409 | Conflict with resources. For example violation of unique data constraints detected when trying to create or change resources. 429 | Rate-limit reached. Please wait for some time before doing more requests. 500 | We were unable to perform the request due to server-side problems. In such cases please retry or contact the support.  Not every endpoint returns data. For example DELETE requests usually don't return any data. All others do return data. For easy handling the return values consists of metadata denoted with and underscore (\"_\") like `_links` or `_pagination`. The actual data is returned in a field called `data`. For convenience reasons this `data` field is always returned as an array even if it consists of only one single element.  Some general details about Contabo API from [Contabo](https://contabo.com).
 *
 * OpenAPI spec version: 1.0.0
 * Contact: support@contabo.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.46
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Contabo\ContaboSdk\Model;

use \ArrayAccess;
use \Contabo\ContaboSdk\ObjectSerializer;

/**
 * CreateInstanceRequest Class Doc Comment
 *
 * @category Class
 * @package  Contabo\ContaboSdk
 * @author   Coderic Development Team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CreateInstanceRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateInstanceRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'image_id' => 'string',
        'product_id' => 'string',
        'region' => 'string',
        'ssh_keys' => 'int[]',
        'root_password' => 'int',
        'user_data' => 'string',
        'license' => 'string',
        'period' => 'int',
        'display_name' => 'string',
        'default_user' => 'string',
        'add_ons' => 'AllOfCreateInstanceRequestAddOns'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'image_id' => null,
        'product_id' => null,
        'region' => null,
        'ssh_keys' => 'int64',
        'root_password' => 'int64',
        'user_data' => null,
        'license' => null,
        'period' => 'int64',
        'display_name' => null,
        'default_user' => null,
        'add_ons' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'image_id' => 'imageId',
        'product_id' => 'productId',
        'region' => 'region',
        'ssh_keys' => 'sshKeys',
        'root_password' => 'rootPassword',
        'user_data' => 'userData',
        'license' => 'license',
        'period' => 'period',
        'display_name' => 'displayName',
        'default_user' => 'defaultUser',
        'add_ons' => 'addOns'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'image_id' => 'setImageId',
        'product_id' => 'setProductId',
        'region' => 'setRegion',
        'ssh_keys' => 'setSshKeys',
        'root_password' => 'setRootPassword',
        'user_data' => 'setUserData',
        'license' => 'setLicense',
        'period' => 'setPeriod',
        'display_name' => 'setDisplayName',
        'default_user' => 'setDefaultUser',
        'add_ons' => 'setAddOns'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'image_id' => 'getImageId',
        'product_id' => 'getProductId',
        'region' => 'getRegion',
        'ssh_keys' => 'getSshKeys',
        'root_password' => 'getRootPassword',
        'user_data' => 'getUserData',
        'license' => 'getLicense',
        'period' => 'getPeriod',
        'display_name' => 'getDisplayName',
        'default_user' => 'getDefaultUser',
        'add_ons' => 'getAddOns'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const REGION_EU = 'EU';
    const REGION_US_CENTRAL = 'US-central';
    const REGION_US_EAST = 'US-east';
    const REGION_US_WEST = 'US-west';
    const REGION_SIN = 'SIN';
    const REGION_UK = 'UK';
    const REGION_AUS = 'AUS';
    const REGION_JPN = 'JPN';
    const LICENSE_C_PANEL5 = 'cPanel5';
    const LICENSE_C_PANEL30 = 'cPanel30';
    const LICENSE_C_PANEL50 = 'cPanel50';
    const LICENSE_C_PANEL100 = 'cPanel100';
    const LICENSE_C_PANEL150 = 'cPanel150';
    const LICENSE_C_PANEL200 = 'cPanel200';
    const LICENSE_C_PANEL250 = 'cPanel250';
    const LICENSE_C_PANEL300 = 'cPanel300';
    const LICENSE_C_PANEL350 = 'cPanel350';
    const LICENSE_C_PANEL400 = 'cPanel400';
    const LICENSE_C_PANEL450 = 'cPanel450';
    const LICENSE_C_PANEL500 = 'cPanel500';
    const LICENSE_C_PANEL550 = 'cPanel550';
    const LICENSE_C_PANEL600 = 'cPanel600';
    const LICENSE_C_PANEL650 = 'cPanel650';
    const LICENSE_C_PANEL700 = 'cPanel700';
    const LICENSE_C_PANEL750 = 'cPanel750';
    const LICENSE_C_PANEL800 = 'cPanel800';
    const LICENSE_C_PANEL850 = 'cPanel850';
    const LICENSE_C_PANEL900 = 'cPanel900';
    const LICENSE_C_PANEL950 = 'cPanel950';
    const LICENSE_C_PANEL1000 = 'cPanel1000';
    const LICENSE_PLESK_ADMIN = 'PleskAdmin';
    const LICENSE_PLESK_HOST = 'PleskHost';
    const LICENSE_PLESK_PRO = 'PleskPro';
    const DEFAULT_USER_ROOT = 'root';
    const DEFAULT_USER_ADMIN = 'admin';
    const DEFAULT_USER_ADMINISTRATOR = 'administrator';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRegionAllowableValues()
    {
        return [
            self::REGION_EU,
            self::REGION_US_CENTRAL,
            self::REGION_US_EAST,
            self::REGION_US_WEST,
            self::REGION_SIN,
            self::REGION_UK,
            self::REGION_AUS,
            self::REGION_JPN,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLicenseAllowableValues()
    {
        return [
            self::LICENSE_C_PANEL5,
            self::LICENSE_C_PANEL30,
            self::LICENSE_C_PANEL50,
            self::LICENSE_C_PANEL100,
            self::LICENSE_C_PANEL150,
            self::LICENSE_C_PANEL200,
            self::LICENSE_C_PANEL250,
            self::LICENSE_C_PANEL300,
            self::LICENSE_C_PANEL350,
            self::LICENSE_C_PANEL400,
            self::LICENSE_C_PANEL450,
            self::LICENSE_C_PANEL500,
            self::LICENSE_C_PANEL550,
            self::LICENSE_C_PANEL600,
            self::LICENSE_C_PANEL650,
            self::LICENSE_C_PANEL700,
            self::LICENSE_C_PANEL750,
            self::LICENSE_C_PANEL800,
            self::LICENSE_C_PANEL850,
            self::LICENSE_C_PANEL900,
            self::LICENSE_C_PANEL950,
            self::LICENSE_C_PANEL1000,
            self::LICENSE_PLESK_ADMIN,
            self::LICENSE_PLESK_HOST,
            self::LICENSE_PLESK_PRO,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDefaultUserAllowableValues()
    {
        return [
            self::DEFAULT_USER_ROOT,
            self::DEFAULT_USER_ADMIN,
            self::DEFAULT_USER_ADMINISTRATOR,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['image_id'] = isset($data['image_id']) ? $data['image_id'] : 'afecbb85-e2fc-46f0-9684-b46b1faf00bb';
        $this->container['product_id'] = isset($data['product_id']) ? $data['product_id'] : 'V1';
        $this->container['region'] = isset($data['region']) ? $data['region'] : 'EU';
        $this->container['ssh_keys'] = isset($data['ssh_keys']) ? $data['ssh_keys'] : null;
        $this->container['root_password'] = isset($data['root_password']) ? $data['root_password'] : null;
        $this->container['user_data'] = isset($data['user_data']) ? $data['user_data'] : null;
        $this->container['license'] = isset($data['license']) ? $data['license'] : null;
        $this->container['period'] = isset($data['period']) ? $data['period'] : 1;
        $this->container['display_name'] = isset($data['display_name']) ? $data['display_name'] : null;
        $this->container['default_user'] = isset($data['default_user']) ? $data['default_user'] : 'admin';
        $this->container['add_ons'] = isset($data['add_ons']) ? $data['add_ons'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['product_id'] === null) {
            $invalidProperties[] = "'product_id' can't be null";
        }
        $allowedValues = $this->getRegionAllowableValues();
        if (!is_null($this->container['region']) && !in_array($this->container['region'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'region', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getLicenseAllowableValues();
        if (!is_null($this->container['license']) && !in_array($this->container['license'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'license', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['period'] === null) {
            $invalidProperties[] = "'period' can't be null";
        }
        $allowedValues = $this->getDefaultUserAllowableValues();
        if (!is_null($this->container['default_user']) && !in_array($this->container['default_user'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'default_user', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets image_id
     *
     * @return string
     */
    public function getImageId()
    {
        return $this->container['image_id'];
    }

    /**
     * Sets image_id
     *
     * @param string $image_id ImageId to be used to setup the compute instance. Default is Ubuntu 22.04
     *
     * @return $this
     */
    public function setImageId($image_id)
    {
        $this->container['image_id'] = $image_id;

        return $this;
    }

    /**
     * Gets product_id
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->container['product_id'];
    }

    /**
     * Sets product_id
     *
     * @param string $product_id Default is V1
     *
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->container['product_id'] = $product_id;

        return $this;
    }

    /**
     * Gets region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->container['region'];
    }

    /**
     * Sets region
     *
     * @param string $region Instance Region where the compute instance should be located. Default is EU
     *
     * @return $this
     */
    public function setRegion($region)
    {
        $allowedValues = $this->getRegionAllowableValues();
        if (!is_null($region) && !in_array($region, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'region', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['region'] = $region;

        return $this;
    }

    /**
     * Gets ssh_keys
     *
     * @return int[]
     */
    public function getSshKeys()
    {
        return $this->container['ssh_keys'];
    }

    /**
     * Sets ssh_keys
     *
     * @param int[] $ssh_keys Array of `secretId`s of public SSH keys for logging into as `defaultUser` with administrator/root privileges. Applies to Linux/BSD systems. Please refer to Secrets Management API.
     *
     * @return $this
     */
    public function setSshKeys($ssh_keys)
    {
        $this->container['ssh_keys'] = $ssh_keys;

        return $this;
    }

    /**
     * Gets root_password
     *
     * @return int
     */
    public function getRootPassword()
    {
        return $this->container['root_password'];
    }

    /**
     * Sets root_password
     *
     * @param int $root_password `secretId` of the password for the `defaultUser` with administrator/root privileges. For Linux/BSD please use SSH, for Windows RDP. Please refer to Secrets Management API.
     *
     * @return $this
     */
    public function setRootPassword($root_password)
    {
        $this->container['root_password'] = $root_password;

        return $this;
    }

    /**
     * Gets user_data
     *
     * @return string
     */
    public function getUserData()
    {
        return $this->container['user_data'];
    }

    /**
     * Sets user_data
     *
     * @param string $user_data [Cloud-Init](https://cloud-init.io/) Config in order to customize during start of compute instance.
     *
     * @return $this
     */
    public function setUserData($user_data)
    {
        $this->container['user_data'] = $user_data;

        return $this;
    }

    /**
     * Gets license
     *
     * @return string
     */
    public function getLicense()
    {
        return $this->container['license'];
    }

    /**
     * Sets license
     *
     * @param string $license Additional licence in order to enhance your chosen product, mainly needed for software licenses on your product (not needed for windows).
     *
     * @return $this
     */
    public function setLicense($license)
    {
        $allowedValues = $this->getLicenseAllowableValues();
        if (!is_null($license) && !in_array($license, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'license', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['license'] = $license;

        return $this;
    }

    /**
     * Gets period
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->container['period'];
    }

    /**
     * Sets period
     *
     * @param int $period Initial contract period in months. Available periods are: 1, 3, 6 and 12 months. Default to 1 month
     *
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->container['period'] = $period;

        return $this;
    }

    /**
     * Gets display_name
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->container['display_name'];
    }

    /**
     * Sets display_name
     *
     * @param string $display_name The display name of the instance
     *
     * @return $this
     */
    public function setDisplayName($display_name)
    {
        $this->container['display_name'] = $display_name;

        return $this;
    }

    /**
     * Gets default_user
     *
     * @return string
     */
    public function getDefaultUser()
    {
        return $this->container['default_user'];
    }

    /**
     * Sets default_user
     *
     * @param string $default_user Default user name created for login during (re-)installation with administrative privileges. Allowed values for Linux/BSD are `admin` (use sudo to apply administrative privileges like root) or `root`. Allowed values for Windows are `admin` (has administrative privileges like administrator) or `administrator`.
     *
     * @return $this
     */
    public function setDefaultUser($default_user)
    {
        $allowedValues = $this->getDefaultUserAllowableValues();
        if (!is_null($default_user) && !in_array($default_user, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'default_user', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['default_user'] = $default_user;

        return $this;
    }

    /**
     * Gets add_ons
     *
     * @return AllOfCreateInstanceRequestAddOns
     */
    public function getAddOns()
    {
        return $this->container['add_ons'];
    }

    /**
     * Sets add_ons
     *
     * @param AllOfCreateInstanceRequestAddOns $add_ons Set attributes in the addons object for the corresponding ones that need to be added to the instance
     *
     * @return $this
     */
    public function setAddOns($add_ons)
    {
        $this->container['add_ons'] = $add_ons;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
