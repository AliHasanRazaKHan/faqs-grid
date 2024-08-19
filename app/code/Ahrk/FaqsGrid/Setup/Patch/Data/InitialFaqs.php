<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Setup\Patch\Data;

use Ahrk\FaqsGrid\Model\ResourceModel\Faq;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


class InitialFaqs implements DataPatchInterface {


    /**
     * @param ModuleDataSetupInterface $setup
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
       protected ModuleDataSetupInterface $setup,
        protected  ResourceConnection $resourceConnection
    )
    {}

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply(): self
    {
         $connection = $this->resourceConnection->getConnection();
         $data = [
             [
                 'question' => 'What is your best selling Item ?',
                 'answer' => 'The item you buy',
                 'is_published' => 1,
             ],
             [
                 'question' => 'What is your customer support number ?',
                 'answer' => '212-867-5434. Ask for Jenny!',
                 'is_published' => 1,
             ],
             [
                 'question' => 'When will I get my order ?',
                 'answer' => 'When it gets delivered, silly!',
                 'is_published' => 0,
             ],
         ];

         $connection->insertMultiple(Faq::MAIN_TABLE, $data);
         return $this;
    }
}
