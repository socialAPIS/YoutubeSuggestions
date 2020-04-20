![compatible](https://img.shields.io/badge/PHP%207-Compatible-brightgreen.svg) 

This repo is acting like the original youtube android aplication. It uses Google protobuf to decode the response.

**Do you like this project? Support it by donating**

**socialAPIS**

- ![btc](https://raw.githubusercontent.com/reek/anti-adblock-killer/gh-pages/images/bitcoin.png) Bitcoin: bc1qkauwj52rr6pelckjfq4htgjl7jvamkq5lklqca

# Installation
You Need!

- Use PHP >= 7
- Install composer.

Once you have composer installed, you can do the following:

```
composer require socialapis/youtube-suggestions
```
# Usage
You can then do the following:
```
require_once '../vendor/autoload.php';

$youtube = new YoutubeSuggestions\Suggestions();

$response = $youtube->getSuggestions("Search query");

echo "Suggestion count: ", $response->getSearchModel()->count(), "\n";
echo "Requested query: ", $response->getRequestedQuery(), "\n";
echo "Request id: ", $response->getId()->getId(), "\n";

foreach ($response->getSearchModel() as $search_model) {
    $sugg = strip_tags($search_model->getSuggestion());
    echo $sugg, "\n";
}
```
See the following example, click [here](./Examples/fetchSuggestions.php).

#License
The Unlicense

For more information, please refer to [https://unlicense.org](https://unlicense.org)

#Legal
This code is in no way affiliated with, authorized, maintained, sponsored or endorsed by Google or Youtube or any of its affiliates or subsidiaries. This is an independent and unofficial API. Use at your own risk.