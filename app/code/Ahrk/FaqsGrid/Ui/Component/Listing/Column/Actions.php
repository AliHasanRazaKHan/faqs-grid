<?php declare(strict_types=1);

namespace Ahrk\FaqsGrid\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Escaper;

class Actions extends Column
{

    protected UrlInterface $urlBuilder;

    private Escaper $escaper;

    public const FAQ_URL_EDIT ='faqs_grid/faqs/edit';
    public const FAQ_URL_DELETE ='faqs_grid/faqs/delete';

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        Escaper $escaper,
        array $components = [],
        array $data = []
    )
    {
        $this->urlBuilder = $urlBuilder;
        $this->escaper = $escaper;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource): array
    {
        if(!isset($dataSource['data']['items'])) {
            return  $dataSource;
        }

        foreach($dataSource['data']['items'] as & $item)
        {
            if(!isset($item['id']))
            {
                continue;
            }
            $title = $this->escaper->escapeHtmlAttr($item['question']);
            $item[$this->getData('name')] = [
                'edit' => [
                    'href' => $this->urlBuilder->getUrl(static::FAQ_URL_EDIT, [
                        'id' => $item['id']
                    ]),
                    'label' => __('Edit'),
                ],

                'delete' => [
                    'href' => $this->urlBuilder->getUrl(static::FAQ_URL_DELETE, [
                        'id' => $item['id']
                    ]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete %1', $title),
                        'message' => __('Are you sure you want to delete a %1 record?', $title)
                    ],
                ]
            ];
        }
        return $dataSource;
    }

}
