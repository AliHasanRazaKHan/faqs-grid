<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Model;

use Magento\Framework\Model\AbstractModel;
use Ahrk\FaqsGrid\Model\ResourceModel\Faq as FaqResourceModel;

class Faq extends AbstractModel
{

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(FaqResourceModel::class);
    }
}
