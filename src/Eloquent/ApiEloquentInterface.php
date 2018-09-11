<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 2018/7/9
 * Time: 14:35
 */

namespace Sea\ApiSdk\Eloquent;


interface ApiEloquentInterface
{

    
    /**
     * 构造查询(query)的字符串
     * @param string|array $name
     * @param mixed $value
     */
    public function query($name , $value = null);

    /**
     * 请求get资源
     * @return mixed
     */
    public function get();

    /**
     * 请求post资源
     * @param null $data
     * @return mixed
     */
    public function post($data = null);

    /**
     * 设置body内容
     * @param array $data
     */
    public function setBody(array $data);

    /**
     * 设置requst头内容
     * @param string|array $name
     * @param mixed|null $value
     */
    public function setHeader($name , $value = null);

}