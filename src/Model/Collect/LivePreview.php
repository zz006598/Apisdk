<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 2018/7/9
 * Time: 14:05
 */

namespace App\Api\Model\Collect;

use App\Api\Eloquent\ApiEloquent;

class LivePreview extends ApiEloquent
{
    use Collect;
    protected $path = '/service/user/realtime/count/{domainKey}/{appKey}';
}