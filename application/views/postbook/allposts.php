<script>
    $('form').change()(function() {
        alert(1);
    })
            
          
</script>

<div>
<form>
    <select name="sort">
<? foreach ($sorts as $sort):?>
        <option value="<?=$sort['sort']?>" <?if($_GET && @$_GET['sort'] && $sort['sort'] == $_GET['sort']):?>selected="selected"<?endif;?>><?=$sort['title']?></option>

<?  endforeach;?>
    </select><input type="submit">
    </form>
</div>
<?=$postslist?>

<?=$page?>
<?=$addform?>

<?=$calendar?>
