<?php


namespace Piyush\Employee\Model\ResourceModel\Report;


use Piyush\Employee\Model\Report;
use Piyush\Employee\Model\ResourceModel\Report as ReportResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Report::class, ReportResourceModel::class);
    }
}