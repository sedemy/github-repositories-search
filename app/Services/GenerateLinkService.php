<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class GenerateLinkService{

    const GETHUB_BASE_URL= "https://api.github.com/search/repositories";

    private $language; // PHP
    private $created; // 2019-01-10
    private $sort; // stars
    private $order; // desc

    public function __construct($language='',$created='',$sort='',$order='',$per_page=100){
        $this->language= $language;
        $this->created = $created;
        $this->sort    = $sort;
        $this->order   = $order;
        $this->per_page= $per_page;
    }

    private function generate_url(){

        $q = $this->language!='' ? 'language:'.$this->language : '';
        $q.= $this->created !='' ? '+created:>'.$this->created : '';

        $parameters= 'q='.$q.'&sort='.$this->sort.'&order='.$this->order.'&per_page='.$this->per_page;

        return self::GETHUB_BASE_URL."?".$parameters;

    }

    public function get_repositories(){

        $response = Http::get($this->generate_url());

        return json_decode($response->body())->items;

    }
}

?>
