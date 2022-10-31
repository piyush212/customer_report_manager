<?php
namespace Piyush\Employee\Controller\Save;

    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\Exception\CouldNotSaveException;
    use Magento\Framework\Exception\LocalizedException;
    use Magento\Framework\Exception\NoSuchEntityException;
    use Magento\Framework\View\Result\PageFactory;

    use Piyush\Employee\Api\ReportRepositoryInterface;
    use Piyush\Employee\Api\Data\ReportInterface;
    class Save extends Action
    {
        protected $_pageFactory;

        protected $_ReportRepository;
        private $ReportModel;


        public function __construct(
            Context $context,
            PageFactory $pageFactory,
            ReportRepositoryInterface $ReportRepository,
            ReportInterface $ReportModel
        ) {
            $this->_pageFactory = $pageFactory;
            $this->_ReportRepository = $ReportRepository;
            $this->ReportModel = $ReportModel;
            return parent::__construct($context);
        }

        public function execute()
        {
            $params = $this->getRequest()->getParams();
        // var_dump($params);
        // die;
        $Report = $this->ReportModel->setData($params);//TODO: Challenge Modify here to support the edit save functionality
       try {
            $this->_ReportRepository->save($Report);
            $this->messageManager->addSuccessMessage(__("Successfully added the Report %1", $params['Name']));
       } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong."));
       }
        /* Redirect back to hero display page */
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('employee');
        return $redirect;
        }
    }