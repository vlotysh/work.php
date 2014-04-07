<table class="table table-striped">
  
    <? $i = 1; $date = ''; foreach ($posts as $post):?>
    
    <? if($date != $post['date']): ?>
    <?$date = $post['date']?>
    <tr>
        <td  colspan="4"><em><strong style="font-size: 1.2em;">--- <?=$post['date']?> ---</strong></em></td>
        </tr>
    <? $i = 1; endif;?>
      <tr>
        <td><?=$i?></td>
         <td><?=$post['title']?></td>
          <td><?=$post['content']?></td>
          <td><?=date('G:i:s',$post['time'])?></td>
          
    </tr>
    
    <? $i++; endforeach;?>
</table>