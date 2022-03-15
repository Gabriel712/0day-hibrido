<?php

namespace Gabriel712\DesafioOne\Block;

use Magento\Framework\View\Element\Template;

use Magento\Cms\Model\Page;
use Magento\Store\Model\StoreManagerInterface;

class Suzuki extends Template {

    public function getSuzukiUrl(){

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
        $cmsPage = $objectManager->get('\Magento\Cms\Model\Page');
        
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        
        // URL
        $baseUrl = $storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_WEB);
        //$baseUrl = $storeManager->getStore()->getBaseUrl(); sem o index.php
        
        // URL CMS
        $cms_Url = $cmsPage->getIdentifier();
        $act_Url = $baseUrl . $cms_Url;
        
        // END URL

        return($act_Url);
    }


    public function getSuzukiLang(){

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
        $cmsPage = $objectManager->get('\Magento\Cms\Model\Page');
        
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
                
        //$cms_Id = $cmsPage->getId(); // retorna o ID do CMS
        //$cms_StoreId = $storeManager->getStore()->getStoreId(); // retorna o ID da store/view        
        $cms_StoreCode = $storeManager->getStore()->getCode(); // retorna o code da loja

        
        switch ($cms_StoreCode) {

            case "pt_br":
                $storeLanguage = "pt-br";
                break;

            case "en_us":
                $storeLanguage = "en-us";
                break;

            case "en_gb":
                $storeLanguage = "en-gb";
                break;
        }

        return($storeLanguage);
    }    
}