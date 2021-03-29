<?php


namespace App\Helper;


use Facades\App\Model\Repository\PessoaRepository;

/**
 * Classe que realiza procura do valor informado no quick-search
 *
 * Class Search
 * @package App\Helper
 */
class Search
{
    public $result;

    function __construct()
    {
        $this->result = array();
    }

    /**
     * Carrega as consultas para jogar em result
     * Estrutura de result (stdClass)
     *
     * $result: [
     *      session [
     *          title: string,
     *          result: [
     *              icon: [
     *                  name: string,
     *                  color: string,
     *              ],
     *              img: string,
     *              route: string,
     *              title: string,
     *              subtitle: string,
     *          ]
     *      ]
     * ]
     *
     */
    public function load($expressao) {
        $pessoas = PessoaRepository::procuraGenerica($expressao);

        $this->montaResultMenus($expressao);
        $this->montaResultPessoa($pessoas);
    }

    private function montaResultPessoa($pessoas)
    {
        if ($pessoas->count() <= 0)
            return;
        $res = array();
        $res['title'] = 'Clientes';
        $res['result'] = array();
        foreach ($pessoas as $pessoa) {
            $res['result'][] = [
                'icon' => false,
                'img' => $pessoa->getImagemLink(),
                'img_class' => '',
                'route' => 'web.pessoa.edit',
                'route_params' => ['pessoa' => $pessoa->getKey()],
                'title' => $pessoa->nome . ' ' . $pessoa->sobrenome,
                'subtitle' => $pessoa->email
            ];
        }

        $this->result[] = $res;
    }

    private function routeExists($collection, $routeToCheck) {
        foreach ($collection as $item) {
            if ($item['route'] == $routeToCheck)
                return true;
        }
        return false;
    }

    private function recursiveFindMenus($items, $expressao, $forceAdd, &$collection) {
        $return = null;
        if (!is_array($items))
            return null;
        if (isset($items['title'])) {
            if ($forceAdd || (strpos(strtolower($items['title']), strtolower($expressao)) !== false)) {
                if (isset($items['page']) && isset($items['route']) && $items['route']) {  //TODO Permitir link direto, sem ser rota
                    if (!$this->routeExists($collection,$items['page']))
                        $collection[] = [
                            'icon' => true,
                            'img' => asset(isset($items['icon']) ? $items['icon'] : 'media/svg/icons/Navigation/Arrow-right.svg'),
                            'img_class' => 'svg-icon svg-icon-md svg-icon-primary',
                            'route' => $items['page'],
                            'route_params' => [],
                            'title' => $items['title'],
                            'subtitle' => isset($items['desc']) ? $items['desc'] : '',
                        ];
                }
                $forceAdd = true;
            } else
                $forceAdd = false;
        }
        foreach ($items as $item) {
            $this->recursiveFindMenus($item, $expressao,$forceAdd, $collection);
        }
        return null;
    }

    private function montaResultMenus($expressao)
    {
        $res['title'] = 'Menus';
        $res['result'] = array();
        $this->recursiveFindMenus(config('menu_header.items'),$expressao,false, $res['result']);
        $this->recursiveFindMenus(config('menu_aside.items'),$expressao,false, $res['result']);
        if (count($res['result'])>0)
            $this->result[] = $res;
    }
}
