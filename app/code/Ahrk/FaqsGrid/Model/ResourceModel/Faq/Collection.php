<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Model\ResourceModel\Faq;

use Ahrk\FaqsGrid\Model\Faq;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected function _construct(): void
    {
        $this->_init(Faq::class, \Ahrk\FaqsGrid\Model\ResourceModel\Faq::class);
    }

}
