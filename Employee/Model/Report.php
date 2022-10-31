<?php
namespace Piyush\Employee\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Piyush\Employee\Api\Data\ReportInterface;
use Piyush\Employee\Model\ResourceModel\Report as ResourceModel;

/**
 * Class Report
 */
class Report extends AbstractModel implements
    ReportInterface,
    IdentityInterface
{
    const CACHE_TAG = 'feedback_data';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getFeedback_No()];
    }

    public function getFeedback_No()
    {
        return $this->getData('Feedback_No');
    }
    public function getName()
    {
        return $this->getData('Name');
    }
    public function setName($Name)
    {
        return $this->setData('name', $Name);
    }
    public function getEmail()
    {
        return $this->getData('Email');
    }
    public function setEmail($Email)
    {
        return $this->setData('Email', $Email);
    }
    public function getMobile()
    {
        return $this->getData('Mobile');
    }
    public function setMobile($Mobile)
    {
        return $this->setData('Mobile', $Mobile);
    }

    public function getFeedback()
    {
        return $this->getData();
    }
}
