<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 2018/7/9
 * Time: 14:34
 */

namespace Sea\ApiSdk\Eloquent;

use GuzzleHttp\Client as Http;
use Illuminate\Contracts\Support\Arrayable;

abstract class ApiEloquent implements ApiEloquentInterface
{

    protected $query    = [];
    protected $body     = [];
    protected $header   = [];
    protected $path     = null;
    protected $host     = null;
    protected $client   = null;
    protected $url      = null;

    /**
     * BaseApi constructor.
     */
    public function __construct(Http $client)
    {
        $this->host     = $this->host();
        $this->client   = $client;
    }

    /**
     * 构造查询(query)的字符串
     * @param array|string $name
     * @param null $value
     * @return $this
     */
    public function query($name, $value = null)
    {
        if(is_array($name)){
            foreach($name as $key=>$value){
                $this->query($key,$value);
            }
        }else{
            $this->query[$name] = $value;
        }
        return $this;
    }

    /**
     * 请求get资源
     */
    public function get()
    {
        $this->makeUrl();
        $this->buildQuery();

        $response = $this->client->request('GET', $this->url);
        return $this->json($response->getBody());
    }

    /**
     * 字符串转json
     * @param $data
     * @return array|mixed
     */
    public function json($data){

        if ($data instanceof Arrayable)
            return $data->toArray();

        return json_decode($data,true);
    }

    /**
     * 请求post资源
     * @param null $data
     * @return mixed
     */
    public function post($data = null)
    {
        $this->makeUrl();
        $this->buildQuery();

        $response = $this->client->request('POST', $this->url);
        return $this->json($response->getBody());
    }

    /**
     * 设置body内容
     * @param array $data
     */
    public function setBody(array $data)
    {
        $this->body = $data;
    }

    /**
     * 设置requst头内容
     * @param string|array $name
     * @param mixed|null $value
     */
    public function setHeader($name, $value = null)
    {
        // TODO: Implement setHeader() method.
    }

    /**
     * 生成查询
     * @return string
     */
    protected function buildQuery(){
        $symbol = '?';
        $url    = $this->url;
        $query  = [];

        if(strpos($url,$symbol)!==false){
            $symbol = '&';
        }
        foreach($this->query as $key => $value){
            $match = '{'.$key.'}';
            if(strpos($url,$match) !== false){
                $url = str_replace($match,$value,$url);
            }else{
                $query[] = $key.'='.$value;
            }
        }
        $query      = implode('&',$query);
        $this->url  = $url.$symbol.$query;
    }

    /**
     * 生成一个url地址
     */
    protected function makeUrl(){
        $this->url = $this->host.$this->path;
    }


    abstract protected function host();

}