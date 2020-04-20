<?php

require_once '../vendor/autoload.php';

$youtube = new YoutubeSuggestions\Suggestions();
echo "Enter quit to exit\n";

StartAgainLabel:

$search = readline("Please enter your query > ");
if ($search === "quit"){
    exit(1);
}

$response = $youtube->getSuggestions($search);

echo "Suggestion count: ", $response->getSearchModel()->count(), "\n";
echo "Requested query: ", $response->getRequestedQuery(), "\n";
echo "Request id: ", $response->getId()->getId(), "\n";

foreach ($response->getSearchModel() as $search_model) {
    $sugg = strip_tags($search_model->getSuggestion());
    echo $sugg, "\n";
}
echo "========================\n\n";
goto StartAgainLabel;
