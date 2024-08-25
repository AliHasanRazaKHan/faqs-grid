<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Controller\Adminhtml\Faq;

use Ahrk\FaqsGrid\Model\Faq;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Ahrk\FaqsGrid\Model\ResourceModel\Faq as FaqResource;
use Ahrk\FaqsGrid\Model\FaqFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;

class Delete extends Action implements HttpGetActionInterface
{

    protected FaqResource $faqResource;

    protected FaqFactory $faqFactory;
    const ADMIN_RESOURCE = 'Ahrk_faqsgrid::faq_delete';

    /**
     * @param Context $context
     * @param FaqFactory $faqFactory
     * @param FaqResource $faqResource
     * @return void
     */
    public function __construct(
        Context     $context,
        FaqFactory  $faqFactory,
        FaqResource $faqResource,
    )
    {
        $this->faqFactory = $faqFactory;
        $this->faqResource = $faqResource;
        parent::__construct($context);
    }

    public function execute(): Redirect
    {
        try {
            $faqId = $this->getRequest()->getParam('id');
            /**
             * @var Faq $faq
             */
            $faq = $this->faqFactory->create();

            $this->faqResource->load($faq, $faqId);
            if ($faq->getId()) {
                $this->faqResource->delete($faq);
                $this->messageManager->addSuccessMessage(__("The record has been deleted."));
        } else {
                $this->messageManager->addErrorMessage(__("The record does not exist."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath("*/*");
    }
}
