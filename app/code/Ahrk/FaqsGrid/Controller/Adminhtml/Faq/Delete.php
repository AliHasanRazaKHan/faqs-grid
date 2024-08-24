<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Delete extends Action implements HttpGetActionInterface
{

    const ADMIN_RESOURCE = 'Ahrk_faqsgrid::faq_delete';
    public function execute()
    {

    }
}
