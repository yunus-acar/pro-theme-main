<?php 
namespace GreenCheap\ProTheme;

use GreenCheap\Application as App;
use stdClass;

class ThemeHelper
{
   /**
    * @var Object
    */
    protected $params;

    /**
     * Bootstrap helper
     * @param object $params
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @param string $name
     */
    public function getPosition( string $name )
    {
        $pattern = "/(^$name.)/";
        $positions = []; 
        foreach($this->params->get('positions') as $key => $value){
            if(preg_match($pattern , $key)){
                $positions[$key] = $value;
            }
        }
        return $positions;
    }

    /**
     * @param string $name
     */
    public function existsPosition( string $name )
    {
        $hasPosition = false;
        foreach($this->getPosition($name) as $key => $value){
            if(App::view()->position()->exists($key)){
                $hasPosition = true;
            break;
            }
        }
        return $hasPosition;
    }

    /**
     * Get Layer Options
     * @param array $param
     * @return object
     */
    public function getLayer( $param ) :object
    {
        $data = new stdClass;
        $sectionDom = [];
        $sectionData = [
            'section' => $param['section']['section'],
            'size'  => $param['section']['size'],
            'class' => $param['section']['class']
        ];
        if($param['background']['image']['src']){
            $sectionData['bgImage'] = 'uk-background';
            $sectionData['bgBlend'] = $param['background']['blend'];
            $sectionData['bgSize'] = $param['background']['size'];
            $sectionData['bgPosition'] = $param['background']['position'];
            $sectionData['bgFixed'] = $param['background']['fixed'] ? 'uk-background-fixed' : null;
            $sectionData['bgRepeat'] = $param['background']['repeat'] ? 'uk-background-norepeat' : null;
            $sectionDom[] = 'data-src="'.$param['background']['image']['src'].'"';
            $sectionDom[] = 'uk-img';
        }
        $data->sectionClass = implode(' ', array_values(array_merge($sectionData)));
        $data->sectionId = 'id="'.$param['section']['id'].'"';
        $data->sectionDom = implode(' ', array_values(array_merge([$param['section']['dom']] , $sectionDom)));
        
        $data->containerClass = implode(' ',[$param['container']['container'] , $param['container']['class']]);
        $data->containerId = 'id="'.$param['container']['id'].'"';
        $data->containerDom = $param['container']['dom'];
        
        return $data;
    }

    /**
     * Get Position Options
     * @param array $param
     * @return object
     */
    public function getPositionOption( $param ): object
    {
        $data = [];
        $data['positionDom'] = [];
        if(!$param['stacked']){
            $data['positionClass'][] = '';
            $data['positionClass'][] = $param['grid_config']['gap'];
            $data['positionClass'][] = $param['grid_config']['match'] ? 'uk-grid-match':null;
            $data['positionClass'][] = $param['grid_config']['divider'] ? 'uk-grid-divider':null;
            if($param['grid_config']['masonry']){
                $data['positionDom'][] = 'uk-grid="masonry:true; parallax:'.$param['grid_config']['parallax'].'"';
            }else{
                $data['positionDom'][] = 'uk-grid';
            }
            foreach($param['grids'] as $key => $value){
                $data['positionClass'][] = $value.$key;
                $data['positionDom'][] = $param['grid_config']['dom'];
            }
        }else{
            $data['positionClass'][] = 'uk-width-expand';
        }

        $data['positionClass'] = implode(' ', array_values(array_merge($data['positionClass'] , [
            $param['grid_config']['class']
        ])));
        $data['positionDom'] = implode(' ', array_values($data['positionDom']));
        $data['positionId'] = 'id="'.$param['grid_config']['id'].'"';
        return (object) array_merge($data , (array) $this->getLayer($param));
    }

    /**
     * @param array $param
     */
    public function getWidgetOption( $param ) :object
    {
        $data = new stdClass;
        $cardDom = [];
        $cardData = [
            'card' => $param['card']['card'],
            'size'  => $param['card']['size'],
            'class' => $param['card']['class']
        ];
        if($param['background']['image']['src']){
            $cardData['bgImage'] = 'uk-background';
            $cardData['bgBlend'] = $param['background']['blend'];
            $cardData['bgSize'] = $param['background']['size'];
            $cardData['bgPosition'] = $param['background']['position'];
            $cardData['bgFixed'] = $param['background']['fixed'] ? 'uk-background-fixed' : null;
            $cardData['bgRepeat'] = $param['background']['repeat'] ? 'uk-background-norepeat' : null;
            $cardDom[] = 'data-src="'.$param['background']['image']['src'].'"';
            $cardDom[] = 'uk-img';
        }
        $data->title_hide = $param['title_hide'];
        $data->alias_title = $param['alias_title'];
        $data->cardClass = implode(' ', array_values(array_merge($cardData)));
        $data->cardId = 'id="'.$param['card']['id'].'"';
        $data->cardDom = implode(' ', array_values(array_merge([$param['card']['dom']] , $cardDom)));
        return $data;
    }
}
?>