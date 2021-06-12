<?php
namespace Abhay\Blog\Block;

use Magento\Customer\Model\Session;
 
class BlogList extends \Magento\Framework\View\Element\Template
{
    public $blogCollection;
 
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Abhay\Blog\Model\ResourceModel\Blog\CollectionFactory $blogCollection,
        Session $customerSession,
        array $data = []
    ) {
        $this->blogCollection = $blogCollection;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }
 
    public function getBlogs()
    {
        $customerId = $this->customerSession->getCustomer()->getId();
        $collection = $this->blogCollection->create();
        // $collection->addFieldToFilter('user_id', $customerId)
        //             ->setOrder('updated_at', 'DESC');
        return $collection;
    }
}