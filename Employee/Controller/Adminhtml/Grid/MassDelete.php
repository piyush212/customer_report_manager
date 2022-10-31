<?php

namespace Piyush\Employee\Controller\Adminhtml\Grid;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Piyush\Employee\Model\ResourceModel\Report\CollectionFactory;
class MassDelete extends \Magento\Backend\App\Action
{
   
    protected $_filter;
   
    protected $_collectionFactory;
 
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDeleted = 0;
        foreach ($collection->getItems() as $record) {
            $record->setFeedback_No($record->getFeedback_No());
            $record->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
  
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Piyush_Employee::row_data_delete');
    }
}