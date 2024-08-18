<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Ahrk\FaqsGrid\Model\Faq as FaqModel;
class Faq extends AbstractDb
{
    /**
     * @var string Main Table name
     */
    const MAIN_TABLE ='ahrk_faqs_grid_faq';

    /**
     * @var string Main Table primary id
     */
    const ID_FIELD_NAME = 'id';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
