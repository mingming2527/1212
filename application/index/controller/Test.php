<?php
namespace app\index\controller;

use think\Db;

class Test
{
    public function index()
    {
        $user = Db::name('user')->where('id', 1)->find();
        var_dump($user);
        Db::name('user')->where('id', 1)->update(['age' => 1]);
//        print_r($user);
        echo THINK_VERSION;
        return 'index';
    }

    public function obj()
    {
        /*$fileConent = file_get_contents("city.list.min.json");
//        var_dump($fileConent);

        $array = json_decode($fileConent);
        var_dump(count($array));

        print_r(current($array));*/
        require ROOT_PATH.'vendor/Predis/Autoloader.php';

        \Predis\Autoloader::register();
        $client = new \Predis\Client([
            'scheme' => 'tcp',
            'host'   => '127.0.0.1',
            'port'   => 6379,
        ]);
//        $client->set('test', 1);
        echo $client->get('test');

        echo __DIR__."<br/>";
        echo ROOT_PATH;
    }

    public function obj2()
    {
        $pinyin =  new \Pinyin();
        $str = '漂亮您好';

//        echo mb_strlen($str);
//        echo mb_substr($str, 0, 3);


        for($i=0; $i<mb_strlen($str); $i++){
            $tmpStr = mb_substr($str, $i, 1);
            echo $pinyin->getFirstChar($tmpStr);
        }
    }
}
