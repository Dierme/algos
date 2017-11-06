<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 01.11.17
 * Time: 15:03
 */
?>

<h1>Align</h1>
<form method="post" action="/align">
    <label for="seq1">First string</label>
    <input name="seq1" id="seq1" value="<?= isset($_POST['seq1']) ? $_POST['seq1']: ''?>">
    <label for="seq2">Second string</label>
    <input name="seq2" id="seq2" value="<?= isset($_POST['seq2']) ? $_POST['seq2']: ''?>">
    <button type="submit">Submit</button>
</form>

<?php
if(isset($result)){
    for($i = 0; $i < count($result) ; $i++) {
        for ($j = 0; $j < count($result[$i]); $j++) {
            print ($result[$i][$j]);
        }
        print ('<br>');
    }
}