# Magento Custom Headers

A very simple module that allow you to inject custom HTTP headers on responses.

Define the key-value pair like following:

```xml

<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">
    <!-- As defined in app/code/Magento/Store/etc/di.xml
    <type name="Magento\Framework\App\Response\Http">
        <plugin name="genericHeaderPlugin" type="Magento\Framework\App\Response\HeaderManager"/>
    </type>
    -->
    
    <type name="Magento\Framework\App\StaticResource">
        <plugin name="genericHeaderPlugin" type="Magento\Framework\App\Response\HeaderManager"/>
    </type>

    <virtualType name="serviceWorkerHeader" type="Manobi\CustomHeaders\Model\CustomHeader">
        <arguments>
            <argument name="headerName" xsi:type="string">service-worker-allowed</argument>
            <argument name="headerValue" xsi:type="string">/media</argument>
        </arguments>
    </virtualType>

    <type name="Magento\Framework\App\Response\HeaderManager">
        <arguments>
            <argument name="headerProviderList" xsi:type="array">
                <item name="HSTSHeader" xsi:type="object">Magento\Store\Model\HeaderProvider\Hsts</item>
                <item name="upgrade-insecure-requests" xsi:type="object">Magento\Store\Model\HeaderProvider\UpgradeInsecure</item>
                <item name="x-content-type-options" xsi:type="object">Magento\Framework\App\Response\HeaderProvider\XContentTypeOptions</item>
                <item name="x-xss-protection" xsi:type="object">Magento\Framework\App\Response\HeaderProvider\XssProtection</item>
                <item name="service-worker" xsi:type="object">serviceWorkerHeader</item>
            </argument>
        </arguments>
    </type>
</config>
```