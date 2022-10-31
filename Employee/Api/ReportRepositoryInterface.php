<?php

namespace Piyush\Employee\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Piyush\Employee\Api\Data\ReportInterface;

interface ReportRepositoryInterface
{
    /**
     * @param int $Feedback_No
     * @return \Piyush\Employee\Api\Data\ReportInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($Feedback_No);

    /**
     * @param \Piyush\Employee\Api\Data\ReportInterface $Report
     * @return \Piyush\Employee\Api\Data\ReportInterface
     */
    public function save(ReportInterface $Report);

    /**
     * @param \Piyush\Employee\Api\Data\ReportInterface $Report
     * @return void
     */
    public function delete(ReportInterface $Report);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Piyush\Employee\Api\Data\ReportSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
     public function deleteById($d);
}