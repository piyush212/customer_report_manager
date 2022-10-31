<?php


namespace Piyush\Employee\Model;
 
use Piyush\Employee\Model\ResourceModel\Report\CollectionFactory;;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if (isset($this->_loadedData)) {
        
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
     
        foreach ($items as $data) {
            $this->_loadedData[$data->getFeedback_No()]= $data->getData();
        }
        
        return $this->_loadedData;
    }
}