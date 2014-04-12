<h3>Вакансии</h3>
<table class="table">
    <thead>
        <th></th>
    <th>№</th>
    <th>Название<br> вакансии</th>
     <th>Пряма ссылка</th>    
    <th>Текст</th>    
     <th>Дата добавления</th>   
        <th>Текущее состояние</th> 
</thead>

<?
$i = 1;

foreach ($articles as $v):
    ?>
<tr>
    <td style="text-align: center; vertical-align: middle;" width="3%"><a href="/edit/<?=$v['id'];?>" rel="<?=$v['id'];?>"><img src="img/pencil.png"></a></td>
    <td style="text-align: center; vertical-align: middle;" width="3%"><?= $i; ?></td>
    <td style="vertical-align: middle;"width="13%" name="name"  id="name"><?= $v['name']; ?></td>
    <td width="25%" name="url" id="url"><a target="_blank" href="<?= $v['url']; ?>"><?= $v['url']; ?></a></td>
    <td width="40%" name="text" id="text"><?= $v['text']; ?></td>
    <td style="text-align: center; vertical-align: middle;" width="15%"id="date"><?= date('D, d M Y H:i:s',$v['date']); ?></td>
    <td title=" <?= $v['status_name']; ?>" style="text-align: center; vertical-align: middle;" id="status" style="vertical-align: middle;"><img src="img/status_<?= $v['status_id']; ?>.png"/></td>
   
    
    <td style="text-align: center; vertical-align: middle;"><a href="/delete/<?=$v['id'];?>"><img src="img/remove.png"></a></td>
    <td>  <p><form>
            <select id="status_select" size="1" name="status" rel="<?=$v['id'];?>">
         <?  foreach ($status as $st):?>
                 <option value="<?=$st['id']?>" <?if($st['id'] == $v['status_id']):?>selected="selected"<?endif;?> ><?=$st['status_name']?></option>
         <? endforeach;?>
         </select>
        </form>
        </p></td>
</tr>
<?  $i++; endforeach; ?>

 <hr>
             
</table>