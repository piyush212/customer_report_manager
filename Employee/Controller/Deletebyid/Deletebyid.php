<?php
namespace Piyush\Employee\Controller\Deletebyid;

    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\Exception\CouldNotSaveException;
    use Magento\Framework\Exception\LocalizedException;
    use Magento\Framework\Exception\NoSuchEntityException;
    use Magento\Framework\View\Result\PageFactory;

    use Piyush\Employee\Api\ReportRepositoryInterface;
    use Piyush\Employee\Api\Data\ReportInterface;

    class Deletebyid extends Action
    {
        protected $_pageFactory;

        protected $_ReportRepository;
        protected $_ReportModel;


        public function __construct(
            Context $context,
            PageFactory $pageFactory,
            ReportRepositoryInterface $ReportRepository,
            ReportInterface $ReportInterface
        ) {
            $this->_pageFactory = $pageFactory;
            $this->_ReportRepository=$ReportRepository;
            $this->_ReportModel = $ReportInterface;
            return parent::__construct($context);
        }

        public function execute()
        {
            $Feedback_No = $_GET;
          
            try {
                $this->_ReportRepository->deleteById($Feedback_No);
                // echo "Deleted the record with id =" .$id . "<br>" . "Go to database and check.";
            } catch (NoSuchEntityException $e) {
                echo "No such entity exception - " . $e->getMessage();
            } catch (LocalizedException $e) {
                echo "Localized Exception" . $e->getMessage();
            }
            $redirect = $this->resultRedirectFactory->create();
             $redirect->setPath('employee');
             return $redirect;
        }
    }
