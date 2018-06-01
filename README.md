# magento2-AutoRefreshCache
Magento 2 module to automatically refresh cache using cron.

Please run these commands in CLI 
php bin/magentosetup:upgrade
php bin/magento cache:flush

Please set cron by running this command:
crontab -e

Set this crontab:
*/2 * * * * php /var/www/html/magento2/bin/magentocron:run

Save and exit and you are all set.
