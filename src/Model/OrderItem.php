<?php

namespace CloudPrinter\CloudApps\Model;

use CloudPrinter\CloudApps\Exception\ValidationException;
use Particle\Validator\Validator;

/**
 * Class OrderItem
 *
 * @copyright   2019 by CloudPrinter
 * @author      Vasyl Kushniruk <kushniruk92@gmail.com>
 */
class OrderItem implements ModelInterface
{
    const STOCK_PRODUCT_TYPE = 'stock';

    /**
     * @var string Order reference identifier
     */
    private $reference;

    /**
     * @var string Reference of the product
     */
    private $productReference;

    /**
     * @var string Title of the product
     */
    private $title;

    /**
     * @var int The number of copies
     */
    private $count;

    /**
     * @var array Array of one or more file objects
     */
    private $files = [];

    /**
     * @var array Array of zero or more option objects
     */
    private $options = [];

    /**
     * @var float Price of the end customer sales.
     */
    private $price;

    /**
     * @var string Currency of the end customer sales (ISO 4217)
     */
    private $currency;

    /**
     * @var string Classify product according to Harmonized System
     */
    private $hc;

    /**
     * @var string Reorder cause text
     */
    private $reorderCause;

    /**
     * @var string Additional description of the problem
     */
    private $reorderDescription;

    /**
     * @var string Reference to the original order
     */
    private $reorderOrderReference;

    /**
     * @var string Reference to the item in the original order
     */
    private $reorderItemReference;

    /**
     * @var string A quote hash reference from a quote call
     */
    private $quote;

    /**
     * @var string Product type
     */
    private $type;

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference(string $reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductReference()
    {
        return $this->productReference;
    }

    /**
     * @param string $productReference
     * @return $this
     */
    public function setProductReference(string $productReference)
    {
        $this->productReference = $productReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return $this
     */
    public function setCount(int $count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param File $file
     * @return $this
     */
    public function addFile(File $file)
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Option $option
     * @return $this
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $hc
     * @return $this
     */
    public function setHc(string $hc)
    {
        $this->hc = $hc;

        return $this;
    }

    /**
     * @return string
     */
    public function getHc()
    {
        return $this->hc;
    }

    /**
     * @param string $reorderCause
     * @return $this
     */
    public function setReorderCause(string $reorderCause)
    {
        $this->reorderCause = $reorderCause;

        return $this;
    }

    /**
     * @return string
     */
    public function getReorderCause()
    {
        return $this->reorderCause;
    }

    /**
     * @param $reorderDescription
     * @return $this
     */
    public function setReorderDescription(string $reorderDescription)
    {
        $this->reorderDescription = $reorderDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getReorderDescription()
    {
        return $this->reorderDescription;
    }

    /**
     * @param string $reorderOrderReference
     * @return $this
     */
    public function setReorderOrderReference(string $reorderOrderReference)
    {
        $this->reorderOrderReference = $reorderOrderReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getReorderOrderReference()
    {
        return $this->reorderOrderReference;
    }

    /**
     * @param string $reorderItemReference
     * @return $this
     */
    public function setReorderItemReference(string $reorderItemReference)
    {
        $this->reorderItemReference = $reorderItemReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getReorderItemReference()
    {
        return $this->reorderItemReference;
    }

    /**
     * @param string $quote
     * @return $this
     */
    public function setQuote(string $quote)
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Object to array
     * @return array
     * @throws ValidationException
     */
    public function toArray()
    {
        $data = [
            'reference' => $this->getReference(),
            'product_reference' => $this->getProductReference(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'count' => $this->getCount(),
            'files' => [],
            'options' => [],
            'price' => $this->getPrice(),
            'currency' => $this->getCurrency(),
            'hc' => $this->getHc(),
            'reorder_cause' => $this->getReorderCause(),
            'reorder_desc' => $this->getReorderDescription(),
            'reorder_order_reference' => $this->getReorderOrderReference(),
            'reorder_item_reference' => $this->getReorderItemReference(),
            'quote' => $this->getQuote()
        ];

        /** @var File $file */
        foreach ($this->getFiles() as $file) {
            $data['files'][] = $file->toArray();
        }

        /** @var Option $option */
        foreach ($this->getOptions() as $option) {
            $data['options'][] = $option->toArray();
        }

        $dataFiltered = array_filter($data);
        $this->validate($dataFiltered);

        return $dataFiltered;
    }

    /**
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function validate(array $data)
    {
        $validator = new Validator();
        $validator->required('reference');
        $validator->required('product_reference');
        $validator->required('count')->numeric();

        $type = $this->getType();
        if ($type !== self::STOCK_PRODUCT_TYPE) {
            $validator->required('files')->isArray();
        }

        if (!$this->isReorderItem()) {
            $validator->required('quote');
        }

        $result = $validator->validate($data);

        if ($result->isNotValid()) {
            throw new ValidationException(self::class, $result->getMessages());
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isReorderItem() {
        return !empty($this->getReorderOrderReference());
    }
}
