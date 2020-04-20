<?php

namespace YoutubeSuggestions;

class Suggestions extends Request {


    /**
     * @param $queryString
     *
     * @return \suggestions_response
     *
     * @throws \Exception
     */
    public function getSuggestions($queryString) {
        return $this->sendRequest($queryString);
    }
}
