<p align="center">
<a href="https://www.mercadolivre.com.br/">
<img alt="MercadoLibre logo" height="100px" src="https://upload.wikimedia.org/wikipedia/pt/0/04/Logotipo_MercadoLivre.png"/>
</a>
</p>
<h1 align="center">Mercado Livre SDK PHP</h1>

## How to use
```php
use LucasFidelis\MercadoLivreSdk\Client\Client;
use LucasFidelis\MercadoLivreSdk\Managers\ProductManager;

...

$itemId = 'MLB123456789';

$client = new Client($CLIENT_ID, $CLIENT_SECRET, $ACCESS_TOKEN, $REFRESH_TOKEN);
$productManager = new ProductManager($client);

$product = $productManager->findById($itemId);
$product->setPrice(123.45);
$productManager->updatePrice($product);
```

## How to install

    composer require lucasfidelis/mercado-livre-sdk

## Supported features

### Authentication and Authorization
| Feature | Status |
|----------|--------|
| Authorization | ✅ |
| Refresh token | ✅ |
| Create a test user | ✅ |
| Get Profile | ✅ |

### Products
| Feature | Status |
|----------|--------|
| Get Item by ID | ✅ |
| Search items by Seller ID | ✅ |
| Get current sales price | ✅ |
| Change variations | ✅ |
| Update Available Quantity | ✅ |
| Get Item Prices | ✅ |
| Update Price | ✅ |
| Create an Item | 🔜 |

## Contribute

Feel free to open pull requests; we welcome contributions! However, for significant changes, it's best to open an issue beforehand. Before creating your own issue or pull request, always check to see if one already exists!

## Disclaimer

This project is not associated, authorized, endorsed by, or in any way with MercadoLibre.

MercadoLibre, as well as related names, marks, emblems and images are registered trademarks of their respective owners.