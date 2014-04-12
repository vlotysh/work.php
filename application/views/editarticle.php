    
    
    
    <table class="table">
    <thead>
   
    <th>Название<br> вакансии</th>
     <th>Пряма ссылка</th>    
    <th>Текст</th>    
    <th>Cмена состояние</th> 
</thead>

<tr>
    <td name="name" width="18%" id="name"><input type="text" value=""/></td>
    <td name="url" width="25%" id="url"><input type="text" value=""/></td>
    <td name="text" width="50%" id="text"><textarea></textarea></td>
    <td name="status" id="status">

       <p><select id="status" size="1" name="status">
         <?  foreach ($status as $st):?>
                 <option value="<?=$st['id']?>" <?if($st['id'] == $articles['status_id']):?>selected="selected"<?endif;?> ><?=$st['status_name']?></option>
         <? endforeach;?>
         </select></p>

    </td>
    
    
   
</tr>

<tbody>
  
</tbody>
</table>