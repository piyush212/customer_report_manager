<?php

namespace Piyush\Employee\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ReportInterface extends ExtensibleDataInterface
{
    
    public function getFeedback_No();
    
    public function getName();

    
    public function setName($Name);

    
    public function getEmail();

    
    public function setEmail($Email);

    
    public function getMobile();

    public function setMobile($Mobile);

    public function getFeedback();
}