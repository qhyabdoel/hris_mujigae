<?php
class ButtonColumn extends CButtonColumn
{
    public $evaluateID = false;

    public function renderDataCellContent($row, $data)
    {
        $tr=array();
        ob_start();
        foreach($this->buttons as $id=>$button)
        {
            if($this->evaluateID and isset($button['options']['id'])) 
            {
                $button['options']['id'] = $this->evaluateExpression($button['options']['id'], array('row'=>$row,'data'=>$data));
            }
 
            $this->renderButton($id,$button,$row,$data);
            $tr['{'.$id.'}']=ob_get_contents();
            ob_clean();
        }
        ob_end_clean();
        echo strtr($this->template,$tr);
    }
}