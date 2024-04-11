# Pixie Commerce Security

The Pixie Commerce security suite

This FREE version includes the following functionality

 - Disable Output
 - Script Output Replacer
 
 Premium features Coming Soon
 
 - File scanner 
 - Database scanner 
   - System Configuration 
   - CMS Blocks 
   - CMS Pages 
   - Change approval 
   - Email Notification 
 - Incident Reporter 
   - Record incident 
   - Send incident to Pixie HQ 

`Dev Note : requires Pixie_Core with menu item`

## How to use

### Disable Output

To enhance security, Pixie Security for Magento 2 offers the ability to disable common outputs used in themes that are frequently compromised. Follow these steps to configure this feature:

1. Navigate to **Pixie Commerce > Security Suite: Replacement Scripts** in the Magento admin panel.

2. Under the **Disable Output** tab:

    - Enable "Block Default Head Includes" to prevent the rendering of core header includes, enhancing security by limiting potential attack vectors.
    
    - Enable "Block Default Absolute Footer" to prevent the rendering of core footer includes, further securing your store from potential vulnerabilities.
    
    - Enable "Block Default Shipping Policy Content" to stop the rendering of core checkout Shipping Policy Content, reducing the exposure of sensitive information during the checkout process.

### Script Output Replacer

To configure the Script Output Replacer feature in Pixie Security for Magento 2, follow these steps:

1. Navigate to **Pixie Media > Security Suite: Replacement Scripts** in the Magento admin panel.

2. You will encounter three tabs:

    - **Replace Output: HTML Head**: Toggle this option to replace content in the HTML head section of your store. Use the text area provided to input replacement content. This helps obfuscate the header configurations, making it harder for malicious actors to inject unauthorized content into your site.
    
    - **Replace Output: Footer**: Toggle this option to replace content in the footer section of your store. Use the text area provided to input replacement content. This adds an additional layer of security by obfuscating footer configuration and preventing unauthorized content injection.
    
    - **Replace Output: Shipping Policy**: Toggle this option to replace content related to shipping policy parameters. Use the text area provided to input replacement content. This serves as a preventive measure against potential attacks by obscuring checkout configurations and thwarting unauthorized content injection attempts.

