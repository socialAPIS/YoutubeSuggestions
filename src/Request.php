<?php

namespace YoutubeSuggestions;

class Request {

    protected $guzzleHttpClient;

    /**
     * Request constructor.
     */
    public function __construct() {
        $this->guzzleHttpClient = new \GuzzleHttp\Client(
            [
                'exceptions' => false,
                'verify' => false,
                'cookies' => true
            ]
        );
    }

    /**
     * @param $query
     *
     * @return \suggestions_response
     *
     * @throws \Exception
     */
    public function sendRequest($query) {
        $queryEncoded = urlencode($query);
        $response = $this->guzzleHttpClient->request("GET", "https://suggestqueries.google.com/complete/search?ds=yt&oe=UTF-8&xssi=t&client=youtube-android-pb&hl=en&gl=us&hjson=t&cp=8&ytbolding=1&q=$$queryEncoded",
            [
                "headers" => [
                    "User-Agent" => "com.google.android.youtube/14.43.55(Linux; U; Android 5.1.1; en_US; google Pixel 2r Build/LYZ28N) gzip",
                    "Accept-Encoding" => "gzip, deflate"
                ]
            ]
        );
        if ($response->getStatusCode() === 200){
            $codedInputStream = new \Google\Protobuf\Internal\CodedInputStream($response->getBody()->getContents());
            $suggestions_response= new \suggestions_response();
            $suggestions_response->parseFromStream($codedInputStream);
            return $suggestions_response;
        }
        throw new \Exception("Error fetching suggestions", $response->getStatusCode());

    }

}
