<?php
namespace Gideon\AutoRefreshCache\Model;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\App\Cache\Manager as CacheManager;

use Magento\Framework\App\Cache\TypeListInterface as CacheTypeListInterface;

class Cron
{
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
    )
    {
        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
    }
    public function myCronFunction()
    {
        $invalidcache = $this->_cacheTypeList->getInvalidated();
        foreach($invalidcache as $key => $value) {
          $this->_cacheTypeList->cleanType($key);
        }
    }
}