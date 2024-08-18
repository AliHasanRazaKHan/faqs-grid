<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = "Ahrk_FaqsGrid::faq";

    /**
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        private PageFactory $pageFactory
    )
    {
        parent::__construct($context);
    }

    /**
     *
     * @return Page
     */
    public function execute()
    {
       $page = $this->pageFactory->create();
      // $page->setActiveMenu('Ahrk_FaqsGrid::Faq');
       $page->getConfig()->getTitle()->prepend(__("FAQs"));
        return $page;
    }
}