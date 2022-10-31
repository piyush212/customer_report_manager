<?php


namespace Piyush\Employee\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Report extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('feedback_data', 'Feedback_No');
    }
}