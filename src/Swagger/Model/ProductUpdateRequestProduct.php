<?php
/**
 * ProductUpdateRequestProduct
 *
 * PHP version 5
 *
 * @category Class
 * @package  ColorMeShop\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * カラーミーショップ API
 *
 * # カラーミーショップ API  [カラーミーショップ](https://shop-pro.jp) APIでは、受注の検索や商品情報の更新を行うことができます。  ## 利用手順  はじめに、カラーミーデベロッパーアカウントを用意します。[デベロッパー登録ページ](https://api.shop-pro.jp/developers/sign_up)から登録してください。  次に、[登録ページ](https://api.shop-pro.jp/oauth/applications/new)からアプリケーション登録を行ってください。 スマートフォンのWebViewを利用する場合は、リダイレクトURIに`urn:ietf:wg:oauth:2.0:oob`を入力してください。  その後、カラーミーショップアカウントの認証ページを開きます。認証ページのURLは、`https://api.shop-pro.jp/oauth/authorize`に必要なパラメータをつけたものです。  |パラメータ名|値| |---|---| |`client_id`|アプリケーション詳細画面で確認できるクライアントID| |`response_type`|\"code\"という文字列| |`scope`| 別表参照| |`redirect_uri`|アプリケーション登録時に入力したリダイレクトURI|  `scope`は、以下のうち、アプリケーションが利用したい機能をスペース区切りで指定してください。  |スコープ|機能| |---|---| |`read_products`|商品データの参照| |`write_products`|在庫データの更新| |`read_sales`|受注・顧客データの参照| |`write_sales`|受注データの更新|  以下のようなURLとなります。  ``` https://api.shop-pro.jp/oauth/authorize?client_id=CLIENT_ID&redirect_uri=REDIRECT_URI&response_type=code&scope=read_products%20write_products ```  初めてこのページを訪れる場合は、カラーミーショップアカウントのIDとパスワードの入力を求められます。 承認ボタンを押すと、このアプリケーションがショップのデータにアクセスすることが許可され、リダイレクトURIへリダイレクトされます。  承認された場合は、`code`というクエリパラメータに認可コードが付与されます。承認がキャンセルされた、またはエラーが起きた場合は、 `error`パラメータにエラーの内容を表す文字列が与えられます。  アプリケーション登録時のリダイレクトURIに`urn:ietf:wg:oauth:2.0:oob`を指定した場合は、以下のようなURLにリダイレクトされます。 末尾のパスが認可コードになっています。  ``` https://api.shop-pro.jp/oauth/authorize/AUTH_CODE ```  認可コードの有効期限は発行から10分間です。  最後に、認可コードとアクセストークンを交換します。以下のパラメータを付けて、`https://api.shop-pro.jp/oauth/token`へリクエストを送ります。  |パラメータ名|値| |---|---| |`client_id`|アプリケーション詳細画面に表示されているクライアントID| |`client_secret`|アプリケーション詳細画面に表示されているクライアントシークレット| |`code`|取得した認可コード| |`grant_type`|\"authorization_code\"という文字列| |`redirect_uri`|アプリケーション登録時に入力したリダイレクトURI|  ```console # curl での例  $ curl -X POST \\   -d'client_id=CLIENT_ID' \\   -d'client_secret=CLIENT_SECRET' \\   -d'code=CODE' \\   -d'grant_type=authorization_code'   \\   -d'redirect_uri=REDIRECT_URI'  \\   'https://api.shop-pro.jp/oauth/token' ```  リクエストが成功すると、以下のようなJSONが返ってきます。  ```json {   \"access_token\": \"d461ab8XXXXXXXXXXXXXXXXXXXXXXXXX\",   \"token_type\": \"bearer\",   \"scope\": \"read_products write_products\" } ```  アクセストークンに有効期限はありませんが、許可済みアプリケーション一覧画面から失効させることができます。なお、同じ認可コードをアクセストークンに交換できるのは1度だけです。  取得したアクセストークンは、Authorizationヘッダに入れて使用します。以下にショップ情報を取得する際の例を示します。  ```console # curlの例  $ curl -H 'Authorization: Bearer d461ab8XXXXXXXXXXXXXXXXXXXXXXXXX' https://api.shop-pro.jp/v1/shop.json ```  ## エラー  カラーミーショップAPI v1では  - エラーコード - エラーメッセージ - ステータスコード  の配列でエラーを表現します。以下に例を示します。  ```json {   \"errors\": [     {       \"code\": 404100,       \"message\": \"レコードが見つかりませんでした。\",       \"status\": 404     }   ] } ```
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.0
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace ColorMeShop\Swagger\Model;

use \ArrayAccess;
use \ColorMeShop\Swagger\ObjectSerializer;

/**
 * ProductUpdateRequestProduct Class Doc Comment
 *
 * @category Class
 * @package  ColorMeShop\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProductUpdateRequestProduct implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ProductUpdateRequest_product';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'price' => 'int',
        'category_id_big' => 'int',
        'category_id_small' => 'int',
        'cost' => 'int',
        'sales_price' => 'int',
        'members_price' => 'int',
        'model_number' => 'string',
        'expl' => 'string',
        'simple_expl' => 'string',
        'smartphone_expl' => 'string',
        'display_state' => 'string',
        'stock_managed' => 'bool',
        'group_ids' => 'int[]',
        'variants' => '\ColorMeShop\Swagger\Model\ProductUpdateRequestProductVariants[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'price' => null,
        'category_id_big' => null,
        'category_id_small' => null,
        'cost' => null,
        'sales_price' => null,
        'members_price' => null,
        'model_number' => null,
        'expl' => null,
        'simple_expl' => null,
        'smartphone_expl' => null,
        'display_state' => null,
        'stock_managed' => null,
        'group_ids' => null,
        'variants' => null
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
        'name' => 'name',
        'price' => 'price',
        'category_id_big' => 'category_id_big',
        'category_id_small' => 'category_id_small',
        'cost' => 'cost',
        'sales_price' => 'sales_price',
        'members_price' => 'members_price',
        'model_number' => 'model_number',
        'expl' => 'expl',
        'simple_expl' => 'simple_expl',
        'smartphone_expl' => 'smartphone_expl',
        'display_state' => 'display_state',
        'stock_managed' => 'stock_managed',
        'group_ids' => 'group_ids',
        'variants' => 'variants'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'price' => 'setPrice',
        'category_id_big' => 'setCategoryIdBig',
        'category_id_small' => 'setCategoryIdSmall',
        'cost' => 'setCost',
        'sales_price' => 'setSalesPrice',
        'members_price' => 'setMembersPrice',
        'model_number' => 'setModelNumber',
        'expl' => 'setExpl',
        'simple_expl' => 'setSimpleExpl',
        'smartphone_expl' => 'setSmartphoneExpl',
        'display_state' => 'setDisplayState',
        'stock_managed' => 'setStockManaged',
        'group_ids' => 'setGroupIds',
        'variants' => 'setVariants'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'price' => 'getPrice',
        'category_id_big' => 'getCategoryIdBig',
        'category_id_small' => 'getCategoryIdSmall',
        'cost' => 'getCost',
        'sales_price' => 'getSalesPrice',
        'members_price' => 'getMembersPrice',
        'model_number' => 'getModelNumber',
        'expl' => 'getExpl',
        'simple_expl' => 'getSimpleExpl',
        'smartphone_expl' => 'getSmartphoneExpl',
        'display_state' => 'getDisplayState',
        'stock_managed' => 'getStockManaged',
        'group_ids' => 'getGroupIds',
        'variants' => 'getVariants'
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

    const DISPLAY_STATE_SHOWING = 'showing';
    const DISPLAY_STATE_HIDDEN = 'hidden';
    const DISPLAY_STATE_SHOWING_FOR_MEMBERS = 'showing_for_members';
    const DISPLAY_STATE_SALE_FOR_MEMBERS = 'sale_for_members';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDisplayStateAllowableValues()
    {
        return [
            self::DISPLAY_STATE_SHOWING,
            self::DISPLAY_STATE_HIDDEN,
            self::DISPLAY_STATE_SHOWING_FOR_MEMBERS,
            self::DISPLAY_STATE_SALE_FOR_MEMBERS,
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['price'] = isset($data['price']) ? $data['price'] : null;
        $this->container['category_id_big'] = isset($data['category_id_big']) ? $data['category_id_big'] : null;
        $this->container['category_id_small'] = isset($data['category_id_small']) ? $data['category_id_small'] : null;
        $this->container['cost'] = isset($data['cost']) ? $data['cost'] : null;
        $this->container['sales_price'] = isset($data['sales_price']) ? $data['sales_price'] : null;
        $this->container['members_price'] = isset($data['members_price']) ? $data['members_price'] : null;
        $this->container['model_number'] = isset($data['model_number']) ? $data['model_number'] : null;
        $this->container['expl'] = isset($data['expl']) ? $data['expl'] : null;
        $this->container['simple_expl'] = isset($data['simple_expl']) ? $data['simple_expl'] : null;
        $this->container['smartphone_expl'] = isset($data['smartphone_expl']) ? $data['smartphone_expl'] : null;
        $this->container['display_state'] = isset($data['display_state']) ? $data['display_state'] : null;
        $this->container['stock_managed'] = isset($data['stock_managed']) ? $data['stock_managed'] : null;
        $this->container['group_ids'] = isset($data['group_ids']) ? $data['group_ids'] : null;
        $this->container['variants'] = isset($data['variants']) ? $data['variants'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['name']) && (strlen($this->container['name']) > 50)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['cost']) && ($this->container['cost'] < 0)) {
            $invalidProperties[] = "invalid value for 'cost', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['sales_price']) && ($this->container['sales_price'] < 0)) {
            $invalidProperties[] = "invalid value for 'sales_price', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['members_price']) && ($this->container['members_price'] < 0)) {
            $invalidProperties[] = "invalid value for 'members_price', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['model_number']) && (strlen($this->container['model_number']) > 50)) {
            $invalidProperties[] = "invalid value for 'model_number', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['simple_expl']) && (strlen($this->container['simple_expl']) > 255)) {
            $invalidProperties[] = "invalid value for 'simple_expl', the character length must be smaller than or equal to 255.";
        }

        $allowedValues = $this->getDisplayStateAllowableValues();
        if (!in_array($this->container['display_state'], $allowedValues)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'display_state', must be one of '%s'",
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

        if (strlen($this->container['name']) > 50) {
            return false;
        }
        if ($this->container['cost'] < 0) {
            return false;
        }
        if ($this->container['sales_price'] < 0) {
            return false;
        }
        if ($this->container['members_price'] < 0) {
            return false;
        }
        if (strlen($this->container['model_number']) > 50) {
            return false;
        }
        if (strlen($this->container['simple_expl']) > 255) {
            return false;
        }
        $allowedValues = $this->getDisplayStateAllowableValues();
        if (!in_array($this->container['display_state'], $allowedValues)) {
            return false;
        }
        return true;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name 商品名
     *
     * @return $this
     */
    public function setName($name)
    {
        if (!is_null($name) && (strlen($name) > 50)) {
            throw new \InvalidArgumentException('invalid length for $name when calling ProductUpdateRequestProduct., must be smaller than or equal to 50.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param int $price 定価
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets category_id_big
     *
     * @return int
     */
    public function getCategoryIdBig()
    {
        return $this->container['category_id_big'];
    }

    /**
     * Sets category_id_big
     *
     * @param int $category_id_big 大カテゴリーID
     *
     * @return $this
     */
    public function setCategoryIdBig($category_id_big)
    {
        $this->container['category_id_big'] = $category_id_big;

        return $this;
    }

    /**
     * Gets category_id_small
     *
     * @return int
     */
    public function getCategoryIdSmall()
    {
        return $this->container['category_id_small'];
    }

    /**
     * Sets category_id_small
     *
     * @param int $category_id_small 小カテゴリーID
     *
     * @return $this
     */
    public function setCategoryIdSmall($category_id_small)
    {
        $this->container['category_id_small'] = $category_id_small;

        return $this;
    }

    /**
     * Gets cost
     *
     * @return int
     */
    public function getCost()
    {
        return $this->container['cost'];
    }

    /**
     * Sets cost
     *
     * @param int $cost 原価
     *
     * @return $this
     */
    public function setCost($cost)
    {

        if (!is_null($cost) && ($cost < 0)) {
            throw new \InvalidArgumentException('invalid value for $cost when calling ProductUpdateRequestProduct., must be bigger than or equal to 0.');
        }

        $this->container['cost'] = $cost;

        return $this;
    }

    /**
     * Gets sales_price
     *
     * @return int
     */
    public function getSalesPrice()
    {
        return $this->container['sales_price'];
    }

    /**
     * Sets sales_price
     *
     * @param int $sales_price 販売価格
     *
     * @return $this
     */
    public function setSalesPrice($sales_price)
    {

        if (!is_null($sales_price) && ($sales_price < 0)) {
            throw new \InvalidArgumentException('invalid value for $sales_price when calling ProductUpdateRequestProduct., must be bigger than or equal to 0.');
        }

        $this->container['sales_price'] = $sales_price;

        return $this;
    }

    /**
     * Gets members_price
     *
     * @return int
     */
    public function getMembersPrice()
    {
        return $this->container['members_price'];
    }

    /**
     * Sets members_price
     *
     * @param int $members_price 会員価格
     *
     * @return $this
     */
    public function setMembersPrice($members_price)
    {

        if (!is_null($members_price) && ($members_price < 0)) {
            throw new \InvalidArgumentException('invalid value for $members_price when calling ProductUpdateRequestProduct., must be bigger than or equal to 0.');
        }

        $this->container['members_price'] = $members_price;

        return $this;
    }

    /**
     * Gets model_number
     *
     * @return string
     */
    public function getModelNumber()
    {
        return $this->container['model_number'];
    }

    /**
     * Sets model_number
     *
     * @param string $model_number 型番
     *
     * @return $this
     */
    public function setModelNumber($model_number)
    {
        if (!is_null($model_number) && (strlen($model_number) > 50)) {
            throw new \InvalidArgumentException('invalid length for $model_number when calling ProductUpdateRequestProduct., must be smaller than or equal to 50.');
        }

        $this->container['model_number'] = $model_number;

        return $this;
    }

    /**
     * Gets expl
     *
     * @return string
     */
    public function getExpl()
    {
        return $this->container['expl'];
    }

    /**
     * Sets expl
     *
     * @param string $expl 商品説明
     *
     * @return $this
     */
    public function setExpl($expl)
    {
        $this->container['expl'] = $expl;

        return $this;
    }

    /**
     * Gets simple_expl
     *
     * @return string
     */
    public function getSimpleExpl()
    {
        return $this->container['simple_expl'];
    }

    /**
     * Sets simple_expl
     *
     * @param string $simple_expl 簡易説明
     *
     * @return $this
     */
    public function setSimpleExpl($simple_expl)
    {
        if (!is_null($simple_expl) && (strlen($simple_expl) > 255)) {
            throw new \InvalidArgumentException('invalid length for $simple_expl when calling ProductUpdateRequestProduct., must be smaller than or equal to 255.');
        }

        $this->container['simple_expl'] = $simple_expl;

        return $this;
    }

    /**
     * Gets smartphone_expl
     *
     * @return string
     */
    public function getSmartphoneExpl()
    {
        return $this->container['smartphone_expl'];
    }

    /**
     * Sets smartphone_expl
     *
     * @param string $smartphone_expl スマホ向けショップの商品説明
     *
     * @return $this
     */
    public function setSmartphoneExpl($smartphone_expl)
    {
        $this->container['smartphone_expl'] = $smartphone_expl;

        return $this;
    }

    /**
     * Gets display_state
     *
     * @return string
     */
    public function getDisplayState()
    {
        return $this->container['display_state'];
    }

    /**
     * Sets display_state
     *
     * @param string $display_state 掲載設定
     *
     * @return $this
     */
    public function setDisplayState($display_state)
    {
        $allowedValues = $this->getDisplayStateAllowableValues();
        if (!is_null($display_state) && !in_array($display_state, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'display_state', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['display_state'] = $display_state;

        return $this;
    }

    /**
     * Gets stock_managed
     *
     * @return bool
     */
    public function getStockManaged()
    {
        return $this->container['stock_managed'];
    }

    /**
     * Sets stock_managed
     *
     * @param bool $stock_managed 在庫管理するか否か
     *
     * @return $this
     */
    public function setStockManaged($stock_managed)
    {
        $this->container['stock_managed'] = $stock_managed;

        return $this;
    }

    /**
     * Gets group_ids
     *
     * @return int[]
     */
    public function getGroupIds()
    {
        return $this->container['group_ids'];
    }

    /**
     * Sets group_ids
     *
     * @param int[] $group_ids グループIDの配列
     *
     * @return $this
     */
    public function setGroupIds($group_ids)
    {
        $this->container['group_ids'] = $group_ids;

        return $this;
    }

    /**
     * Gets variants
     *
     * @return \ColorMeShop\Swagger\Model\ProductUpdateRequestProductVariants[]
     */
    public function getVariants()
    {
        return $this->container['variants'];
    }

    /**
     * Sets variants
     *
     * @param \ColorMeShop\Swagger\Model\ProductUpdateRequestProductVariants[] $variants 商品オプションによるバリエーションごとに更新
     *
     * @return $this
     */
    public function setVariants($variants)
    {
        $this->container['variants'] = $variants;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
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
    public function offsetSet($offset, $value)
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
    public function offsetUnset($offset)
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


