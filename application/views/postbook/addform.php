<form action="postbook" method="POST">
    <p><input required="required" name="title" type="text" placeholder="Заголовок заметки"></p>
    <p><textarea required="required" name="text"  placeholder="Текст заметки"></textarea>
    <p><span>Выбрать тип заметки</span><br>
        
        
         <select required="required" name="type">
        <?php $i = 0;foreach($types as $type) :?>
       
             <option value="<?php echo $type['id']?>"><?php echo $type['type_name'] ?></option>
         
        <?php $i++; endforeach;?>
          </select>
     </p>    
         
    <p><input type="submit" name="submit" value="Отправить"></p>
</form>