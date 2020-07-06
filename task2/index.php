<form action="index.php" method="post">
    <label>Kata 1</label>
    <input name="kata1" type="text" class="form-control kata1" id="kata1">
    <label>Kata 2</label>
    <input name="kata2" type="text" class="form-control kata2" id="kata2">
    <button type="submit" name="submit" onclick="cek_kata_by_regex()" class="btn btn-success"> Cek !</button>
</form>

<?php
    
    function cek_kata_by_php_param($kata1, $kata2)
    {
        if (strpbrk($kata2, $kata1) !== FALSE)
        {
            echo 'By PHP With Param : True' ; 
        }
        else
        {
            echo 'By PHP With Param : False' ;
        }
    }

    if(isset($_REQUEST['submit'])){
        // cek_kata_by_php_param($_REQUEST['kata2'], $_REQUEST['kata1']);
        echo "</br>";
        if (strpbrk($_REQUEST['kata2'], $_REQUEST['kata1']) !== FALSE)
        {
            echo 'By PHP : True' ; 
        }
        else
        {
            echo 'By PHP : False' ;
        }
    }

    
?>

<script>

    function cek_kata_by_regex () {
        var kata1 = document.getElementById('kata1').value;
        var kata2 = document.getElementById('kata2').value;
        
        // cek_kata_by_custom_strpbrk(kata1, kata2);

        var kata = kata1.split('');

        

        var new_kata1 = '/(';
        for(var data in kata){
            new_kata1 += kata[data];   
            if(data != (kata.length - 1)){
                new_kata1 += '.*?'    
            }

        }
        new_kata1 += ')/g';
       
        var regex_string = eval(new_kata1);
        var rex = new RegExp(regex_string)
        if (kata2.toLowerCase().match(rex)){
            alert("By Javascript : true");
        }else{
            alert("By Javascript : false");
        }
    }

    function cek_kata_by_custom_strpbrk (kata1, kata2) {
        for (var i = 0, len = kata1.length; i < len; ++i) {
            if (kata2.indexOf(kata1.charAt(i)) >= 0) {
               return alert ('By Javascript with param : true')
            }
        }
        return alert("By Javascript with param : false");
    }

</script>